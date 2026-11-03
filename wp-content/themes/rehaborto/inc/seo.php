<?php
/**
 * Metadane i SEO: opis strony i obraz udostępniania (Dostosuj → SEO i metadane),
 * znaczniki Open Graph / Twitter. Tytuł strony pochodzi z Ustawienia → Ogólne.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', function ( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section( 'rehaborto_seo', [
		'title'       => 'SEO i metadane',
		'description' => 'Tytuł i opis skrótowy witryny ustawisz w Ustawienia → Ogólne.',
		'priority'    => 31,
	] );

	$wp_customize->add_setting( 'rehaborto_meta_description', [
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	] );
	$wp_customize->add_control( 'rehaborto_meta_description', [
		'section'     => 'rehaborto_seo',
		'label'       => 'Opis strony (meta description)',
		'description' => 'Zalecane 120–160 znaków. Puste pole: opis domyślny.',
		'type'        => 'textarea',
	] );

	$wp_customize->add_setting( 'rehaborto_og_image', [
		'default'           => 0,
		'sanitize_callback' => 'absint',
	] );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'rehaborto_og_image', [
		'section'   => 'rehaborto_seo',
		'label'     => 'Obraz do udostępniania (Open Graph)',
		'mime_type' => 'image',
	] ) );
} );

/** Opis strony: z Dostosuj, a gdy pusty — domyślny z danymi miasta. */
function rehaborto_meta_description(): string {
	$custom = trim( (string) get_theme_mod( 'rehaborto_meta_description' ) );
	if ( '' !== $custom ) {
		return $custom;
	}
	$city = rehaborto_data()['site']['city'] ?? '';
	return 'Pomagamy wrócić do ruchu, pracy, sportu i codziennych aktywności. Fizjoterapia ortopedyczna, sportowa, pooperacyjna i stomatologiczna — ' . $city . '.';
}

add_action( 'wp_head', function () {
	$title = wp_get_document_title();
	$desc  = rehaborto_meta_description();
	$url   = is_front_page() ? home_url( '/' ) : (string) get_permalink();

	if ( is_front_page() ) {
		printf( '<meta name="description" content="%s">' . "\n", esc_attr( $desc ) );
	}

	$image_id = (int) get_theme_mod( 'rehaborto_og_image' ) ?: (int) get_theme_mod( 'custom_logo' );
	$image    = $image_id ? wp_get_attachment_image_url( $image_id, 'full' ) : '';

	$og = [
		'og:locale'      => get_locale(),
		'og:type'        => 'website',
		'og:site_name'   => get_bloginfo( 'name' ),
		'og:title'       => $title,
		'og:description' => $desc,
		'og:url'         => $url,
		'og:image'       => $image,
	];
	foreach ( array_filter( $og ) as $property => $content ) {
		printf( '<meta property="%s" content="%s">' . "\n", esc_attr( $property ), esc_attr( $content ) );
	}
	printf( '<meta name="twitter:card" content="%s">' . "\n", $image ? 'summary_large_image' : 'summary' );
}, 2 );
