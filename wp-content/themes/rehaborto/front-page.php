<?php
/**
 * Strona główna — jednostronicowy układ z sekcjami (template-parts/section-*.php).
 */
get_header();

foreach ( [ 'hero', 'help', 'how', 'methods', 'team', 'pricing', 'contact' ] as $section ) {
	get_template_part( 'template-parts/section', $section );
}

get_footer();
