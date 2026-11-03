<?php
/**
 * Ładowanie styli i skryptów zbudowanych w Vite.
 *
 * - tryb deweloperski: gdy działa `npm run dev`, w motywie istnieje plik "hot" z adresem serwera Vite;
 * - tryb produkcyjny: pliki z dist/ wskazane przez dist/.vite/manifest.json (nazwy z hashem).
 */

defined( 'ABSPATH' ) || exit;

const REHABORTO_VITE_ENTRY = 'src/js/main.js';

add_action( 'wp_enqueue_scripts', function () {
	// Domyślne style bloków nie są potrzebne w motywie klasycznym
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );

	$hot = get_theme_file_path( 'hot' );
	if ( file_exists( $hot ) && 'local' === wp_get_environment_type() ) {
		$server = untrailingslashit( trim( (string) file_get_contents( $hot ) ) );
		wp_enqueue_script( 'rehaborto-vite-client', $server . '/@vite/client', [], null, true );
		wp_enqueue_script( 'rehaborto-vite-main', $server . '/' . REHABORTO_VITE_ENTRY, [], null, true );
		return;
	}

	$manifest_file = get_theme_file_path( 'dist/.vite/manifest.json' );
	if ( ! file_exists( $manifest_file ) ) {
		return; // brak builda: uruchom `npm run build` w katalogu motywu
	}
	$manifest = json_decode( (string) file_get_contents( $manifest_file ), true );
	$entry    = $manifest[ REHABORTO_VITE_ENTRY ] ?? null;
	if ( ! $entry ) {
		return;
	}

	foreach ( $entry['css'] ?? [] as $i => $css ) {
		wp_enqueue_style( 'rehaborto-main-' . $i, get_theme_file_uri( 'dist/' . $css ), [], null );
	}
	wp_enqueue_script( 'rehaborto-vite-main', get_theme_file_uri( 'dist/' . $entry['file'] ), [], null, true );
} );

// Skrypty Vite to moduły ES
add_filter( 'script_loader_tag', function ( $tag, $handle, $src ) {
	if ( str_starts_with( $handle, 'rehaborto-vite-' ) ) {
		return sprintf( '<script type="module" src="%s"></script>' . "\n", esc_url( $src ) );
	}
	return $tag;
}, 10, 3 );
