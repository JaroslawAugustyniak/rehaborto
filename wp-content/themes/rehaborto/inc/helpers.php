<?php
/**
 * Pomocnicze funkcje motywu: dane strony, adresy zasobów, ikony.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Treść i dane kontaktowe strony (inc/site.json).
 * Docelowo to miejsce do podmiany na Customizer / pola ACF.
 */
function rehaborto_data(): array {
	static $data = null;
	if ( null === $data ) {
		$json = file_get_contents( get_theme_file_path( 'inc/site.json' ) );
		$data = json_decode( (string) $json, true ) ?: [];

		// Dane kontaktowe z Dostosuj mają pierwszeństwo przed site.json
		$site                = $data['site'] ?? [];
		$site['addressFull'] = trim( ( $site['address'] ?? '' ) . ', ' . ( $site['city'] ?? '' ), ', ' );
		if ( $address = get_theme_mod( 'rehaborto_address' ) ) {
			$site['addressFull'] = $address;
		}
		if ( $phone = get_theme_mod( 'rehaborto_phone' ) ) {
			$digits             = preg_replace( '/[^\d+]/', '', $phone );
			$site['phone']      = $phone;
			$site['phoneHref']  = ( 9 === strlen( $digits ) ? '+48' : '' ) . $digits;
		}
		if ( $email = get_theme_mod( 'rehaborto_email' ) ) {
			$site['email'] = $email;
		}

		
		$site['name'] = get_bloginfo( 'name' ) ?: ( $site['name'] ?? '' );
		$data['site'] = $site;
	}
	return $data;
}

/** Zawartość pliku SVG z katalogu assets/ wstawiona inline (dziedziczy currentColor); pusty ciąg, gdy brak pliku. */
function rehaborto_svg( string $path, string $class = '' ): string {
	$file = get_theme_file_path( 'assets/' . ltrim( $path, '/' ) );
	if ( 'svg' !== pathinfo( $file, PATHINFO_EXTENSION ) || ! is_readable( $file ) || str_contains( $path, '..' ) ) {
		return '';
	}
	return rehaborto_svg_markup( (string) file_get_contents( $file ), $class );
}

/** Czyści plik SVG do wstawienia inline (bez prologu XML i komentarzy) i dodaje klasę. */
function rehaborto_svg_markup( string $svg, string $class = '' ): string {
	$svg = preg_replace( [ '/<\?xml.*?\?>/s', '/<!DOCTYPE.*?>/is', '/<!--.*?-->/s' ], '', $svg );
	$svg = trim( (string) $svg );
	return $class ? preg_replace( '/^<svg/', '<svg class="' . esc_attr( $class ) . '" aria-hidden="true"', $svg, 1 ) : $svg;
}

/**
 * Treść wpisu po filtrach edytora, z wydzielonym pierwszym nagłówkiem (zdanie przewodnie sekcji).
 *
 * @return array{lead: string, body: string}
 */
function rehaborto_split_lead( string $content ): array {
	$html = apply_filters( 'the_content', $content );
	$lead = '';
	if ( preg_match( '#^\s*<h([1-6])[^>]*>(.*?)</h\1>#s', $html, $m ) ) {
		$lead = trim( wp_strip_all_tags( $m[2] ) );
		$html = substr( $html, strlen( $m[0] ) );
	}
	return [ 'lead' => $lead, 'body' => trim( $html ) ];
}

/** Obraz z pola ACF (Image jako tablica): SVG wstawiony inline, pozostałe jako <img>. */
function rehaborto_acf_icon( $image, string $class = '' ): string {
	if ( ! is_array( $image ) || empty( $image['ID'] ) ) {
		return '';
	}
	$file = get_attached_file( $image['ID'] );
	if ( $file && 'svg' === strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ) && is_readable( $file ) ) {
		return rehaborto_svg_markup( (string) file_get_contents( $file ), $class );
	}
	return sprintf( '<img class="%s" src="%s" alt="" />', esc_attr( $class ), esc_url( $image['url'] ) );
}

/** Wpisy danego typu w kolejności z pola „Kolejność”. */
function rehaborto_items( string $post_type ): array {
	return get_posts( [
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => [ 'menu_order' => 'ASC', 'date' => 'ASC' ],
	] );
}

/** Adres pliku z katalogu assets/ motywu (np. images/hero.jpg). */
function rehaborto_asset( string $path ): string {
	return get_theme_file_uri( 'assets/' . ltrim( $path, '/' ) );
}

/** Logo z Dostosuj → Tożsamość witryny; bez wgranego pliku wraca do logo z motywu. */
function rehaborto_logo( int $fallback_w, int $fallback_h, string $class = '' ): string {
	$id  = (int) get_theme_mod( 'custom_logo' );
	$src = $id ? wp_get_attachment_image_src( $id, 'full' ) : false;
	if ( $src ) {
		[ $url, $w, $h ] = $src;
	} else {
		$url = rehaborto_asset( 'images/logo.svg' );
		$w   = $fallback_w;
		$h   = $fallback_h;
	}
	return sprintf(
		'<img%s src="%s" alt="" width="%d" height="%d" />',
		$class ? ' class="' . esc_attr( $class ) . '"' : '',
		esc_url( $url ),
		$w,
		$h
	);
}

/** Adres sekcji na stronie głównej (działa też z podstron). */
function rehaborto_anchor( string $href ): string {
	return home_url( '/' ) . $href;
}

/** Ikony SVG używane w szablonach. */
function rehaborto_icon( string $name, string $class = 'ico' ): string {
	$paths = [
		'phone'    => '<path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11 11 0 0 0 3.6.6 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.6 3.6a1 1 0 0 1-.25 1z"/>',
		'mail'     => '<path d="M3 5h18a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm9 7.5L4 7.5V17h16V7.5z"/>',
		'pin'      => '<path d="M12 2a7 7 0 0 0-7 7c0 5 7 13 7 13s7-8 7-13a7 7 0 0 0-7-7zm0 9.5A2.5 2.5 0 1 1 12 6.5a2.5 2.5 0 0 1 0 5z"/>',
	];
	$stroke = [
		'arrow-up' => '<path d="M12 19V5M5 12l7-7 7 7"/>',
		'plus'     => '<path d="M12 5v14M5 12h14"/>',
	];

	if ( isset( $paths[ $name ] ) ) {
		return sprintf( '<svg class="%s" viewBox="0 0 24 24" aria-hidden="true">%s</svg>', esc_attr( $class ), $paths[ $name ] );
	}
	if ( isset( $stroke[ $name ] ) ) {
		return sprintf(
			'<svg class="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" aria-hidden="true">%s</svg>',
			esc_attr( $class ),
			$stroke[ $name ]
		);
	}
	return '';
}
