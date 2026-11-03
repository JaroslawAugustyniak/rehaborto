<?php
/**
 * Dostosuj: dane kontaktowe (adres, telefon, e-mail).
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', function ( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section( 'rehaborto_contact', [
		'title'    => 'Dane kontaktowe',
		'priority' => 30,
	] );

	$fields = [
		'rehaborto_address' => [ 'Adres', 'text', 'sanitize_text_field' ],
		'rehaborto_phone'   => [ 'Numer telefonu', 'tel', 'sanitize_text_field' ],
		'rehaborto_email'   => [ 'E-mail', 'email', 'sanitize_email' ],
	];

	foreach ( $fields as $id => [ $label, $type, $sanitize ] ) {
		$wp_customize->add_setting( $id, [
			'default'           => '',
			'sanitize_callback' => $sanitize,
			'transport'         => 'refresh',
		] );
		$wp_customize->add_control( $id, [
			'section' => 'rehaborto_contact',
			'label'   => $label,
			'type'    => $type,
		] );
	}
} );
