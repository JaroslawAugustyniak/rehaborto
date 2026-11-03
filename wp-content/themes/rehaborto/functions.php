<?php
/**
 * Rehaborto — funkcje motywu.
 */

defined( 'ABSPATH' ) || exit;

// Dodaj do functions.php lub własnej wtyczki
add_action( 'admin_menu', function() {
    // Tworzymy główny element menu
    add_menu_page(
        'Rehaborto',         // Tytuł strony
        'Rehaborto',         // Nazwa w menu
        'edit_posts',    // Uprawnienia
        'rehab_main',    // Slug menu
        '',                  // Funkcja (niepotrzebna – tylko kontener)
        'dashicons-portfolio', // Ikona
        20                   // Pozycja
    );
});

/**
 * Pobiera wpis po slugu i typie wpisu
 *
 * @param string $slug Slug wpisu.
 * @param string $post_type Typ wpisu (np. 'post', 'page', 'places').
 * @return WP_Post|null Zwraca obiekt WP_Post lub null, jeśli nie znaleziono.
 */
function get_post_by_slug_and_type($slug, $post_type = 'post') {
    $post = get_page_by_path($slug, OBJECT, $post_type);

    if ($post instanceof WP_Post) {
        return $post;
    }

    return null;
}

function displayImage($post_id, $class=''){
	if (has_post_thumbnail($post_id)) {
                                $thumb_id = get_post_thumbnail_id($post_id);
                                $thumb_url = wp_get_attachment_url($thumb_id);
                                $file_ext = pathinfo($thumb_url, PATHINFO_EXTENSION);

                                // Jeśli plik jest GIFem – pokaż oryginalny obrazek
                                if (strtolower($file_ext) === 'gif') {
                                    echo '<img src="' . esc_url($thumb_url) . '" alt="' . esc_attr(get_the_title($post_id)) . '" class="img-fluid '.$class.'">';
                                } else {
                                    // W przeciwnym razie pokaż obrazek o określonym rozmiarze (np. 'medium', 'large', 'full')
                                    echo get_the_post_thumbnail($post_id, 'full', ['class' => 'img-fluid '.$class]);
                                }
                            }
}

function displayImageACF($image, $alt='', $class='', $attrs = ''){
	if ($image) {
		echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($alt) . '"  '.$attrs.' class="'.$class.'">';
    }
}

require_once get_theme_file_path( 'inc/helpers.php' );
require_once get_theme_file_path( 'inc/assets.php' );
require_once get_theme_file_path( 'inc/customizer.php' );
require_once get_theme_file_path( 'inc/seo.php' );

add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'rehaborto', get_theme_file_path( 'languages' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', [ 'height' => 104, 'width' => 80, 'flex-width' => true, 'flex-height' => true ] );



		register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rehaborto' ),
			'footer-1' => esc_html__( 'Footer', 'rehaborto' ),			
			'footer-2' => esc_html__( 'Footer 2', 'rehaborto' ),			
		)
	);
} );

// Bez paska administratora na froncie (panel zostaje dostępny w /wp-admin)
add_filter( 'show_admin_bar', '__return_false' );

// Meta: kolor paska przeglądarki i favicon (logo SVG); opis i Open Graph w inc/seo.php
add_action( 'wp_head', function () {
	echo '<meta name="theme-color" content="#0e2a63">' . "\n";
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" type="image/svg+xml" href="%s">' . "\n", esc_url( rehaborto_asset( 'images/logo.svg' ) ) );
	}
}, 1 );

// Klasa "js" na <html> (bez JS opisy w sekcji "W czym możemy Ci pomóc" są rozwinięte)
add_action( 'wp_head', function () {
	echo '<script>document.documentElement.classList.add("js");</script>' . "\n";
}, 0 );

