<?php
/**
 * Plugin Name: Better – Rank Math: treść strony głównej
 * Description: Dodaje do analizy Rank Math treść strony głównej motywu Rehaborto (sekcje z template-parts/section-*.php), bo sama strona główna w edytorze jest pusta.
 * Version: 2.0.0
 * Author: Jarosław Augustyniak
 */

defined( 'ABSPATH' ) || exit;

/** Sekcje strony głównej, w kolejności z front-page.php motywu. */
const BETTER_RM_HOME_SECTIONS = array( 'hero', 'help', 'how', 'methods', 'team', 'pricing', 'contact' );

/** Czy wpis jest statyczną stroną główną (Ustawienia → Czytanie). */
function better_rm_is_front_page( $post ) {
	return $post
		&& 'page' === $post->post_type
		&& 'page' === get_option( 'show_on_front' )
		&& (int) get_option( 'page_on_front' ) === (int) $post->ID;
}

/**
 * Renderuje te same template-parts co front-page.php motywu
 * i zwraca oczyszczony HTML (sam tekst i obrazy z alt, bez skryptów i SVG).
 */
function better_rm_home_content() {
	static $cache = null;
	if ( null !== $cache ) {
		return $cache;
	}

	global $post;
	$original_post = $post;

	$html = '';
	foreach ( BETTER_RM_HOME_SECTIONS as $section ) {
		if ( ! locate_template( "template-parts/section-{$section}.php" ) ) {
			continue;
		}
		ob_start();
		try {
			get_template_part( 'template-parts/section', $section );
		} catch ( \Throwable $e ) {
			// Pomijamy sekcję, która nie renderuje się w panelu.
		}
		$html .= ob_get_clean();

		// Szablony mogą zmieniać globalny $post – przywracamy edytowany wpis.
		$post = $original_post;
		if ( $post ) {
			setup_postdata( $post );
		}
	}

	$html = preg_replace( '/<!--.*?-->/s', '', $html );
	$html = preg_replace( '#<(script|style|svg|noscript|iframe|template)\b[^>]*>.*?</\1>#is', '', $html );
	$html = wp_kses_post( $html );
	$html = preg_replace( '/(\s*\n\s*){2,}/', "\n", $html );

	$cache = trim( $html );
	return $cache;
}

add_action( 'admin_enqueue_scripts', function ( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) || ! better_rm_is_front_page( get_post() ) ) {
		return;
	}

	$html = better_rm_home_content();
	if ( '' === $html ) {
		return;
	}

	wp_add_inline_script(
		'wp-hooks',
		'wp.hooks.addFilter("rank_math_content","better/home",function(content){return content+' . wp_json_encode( $html ) . ';});'
	);
} );

// Podgląd (tylko do odczytu) treści widzianej przez Rank Math, pod edytorem strony głównej.
add_action( 'add_meta_boxes_page', function ( $post ) {
	if ( ! better_rm_is_front_page( $post ) ) {
		return;
	}

	add_meta_box(
		'better-rm-home-preview',
		'Treść strony głównej widoczna dla Rank Math (podgląd)',
		function () {
			$html = better_rm_home_content();
			echo '<p class="description">Tylko do odczytu. Treść pochodzi z wpisów CPT „section”, „step”, „team”, „price” i z pól sekcji, a Rank Math dołącza ją do analizy tej strony. Edytuj ją w odpowiednich wpisach.</p>';
			echo '<div style="max-height:400px;overflow:auto;padding:0 12px;border:1px solid #dcdcde;background:#fff">';
			echo '' !== $html ? $html : '<p><em>Brak treści do wyświetlenia.</em></p>';
			echo '</div>';
		},
		'page',
		'normal',
		'default'
	);
} );
