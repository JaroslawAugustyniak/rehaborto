<?php
$page_data = get_post_by_slug_and_type( 'z-czego-korzystamy', 'section' );
if ( ! $page_data ) {
	return;
}
$text    = rehaborto_split_lead( $page_data->post_content );
$obrazek = get_field( 'obrazek', $page_data->ID );
?>
<section class="banner banner--small" id="metody">
	<div class="banner__bg parallax">
		<?php displayImageACF( $obrazek, $obrazek['alt'] ?? '', '', 'data-speed="0.2" loading="lazy"' ); ?>
	</div>
	<div class="container">
		<div class="banner__wrapper">
			<div class="banner__title"><?php echo esc_html( $page_data->post_title ); ?></div>
			<?php if ( $text['lead'] ) : ?><h2 class="banner__text"><?php echo esc_html( $text['lead'] ); ?></h2><?php endif; ?>
			<div class="banner__content">
				<?php echo $text['body']; // phpcs:ignore WordPress.Security.EscapeOutput -- treść z edytora ?>
			</div>
		</div>
	</div>
</section>
