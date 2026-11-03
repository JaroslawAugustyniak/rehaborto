<?php
$page_data = get_post_by_slug_and_type( 'cennik', 'section' );
if ( ! $page_data ) {
	return;
}
$text   = rehaborto_split_lead( $page_data->post_content );
$prices = rehaborto_items( 'price' );
$cta    = get_field( 'cta', $page_data->ID );
?>
<section class="section section--white" id="cennik">
	<div class="container">
		<div class="text-center section__head">
			<div class="main__heading"><?php echo esc_html( $page_data->post_title ); ?></div>
			<?php if ( $text['lead'] ) : ?><h2 class="main__title"><?php echo esc_html( $text['lead'] ); ?></h2><?php endif; ?>
		</div>
		<ul class="prices">
			<?php foreach ( $prices as $price ) : ?>
				<li class="price">
					<div class="price__row">
						<span class="price__name"><?php echo esc_html( get_the_title( $price ) ); ?></span>
						<span class="price__value"><?php echo esc_html( (string) get_field( 'cena', $price->ID ) ); ?></span>
					</div>
					<div class="price__body"><?php echo apply_filters( 'the_content', $price->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php if ( $cta ) : ?>
			<div class="text-center price__cta"><?php echo $cta; // phpcs:ignore WordPress.Security.EscapeOutput -- pole WYSIWYG ?></div>
		<?php endif; ?>
	</div>
</section>
