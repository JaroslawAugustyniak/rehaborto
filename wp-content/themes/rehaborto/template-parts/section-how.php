<?php
$page_data = get_post_by_slug_and_type( 'jak-pracujemy', 'section' );
if ( ! $page_data ) {
	return;
}
$text        = rehaborto_split_lead( $page_data->post_content );
$steps       = rehaborto_items( 'step' );
$steps_title = get_field( 'tytul_listy_krokow_do_sprawnosci', $page_data->ID );
$cta         = get_field( 'cta', $page_data->ID );
?>
<section class="section section--white" id="jak-pracujemy">
	<div class="container">
		<div class="text-center section__head">
			<div class="main__heading"><?php echo esc_html( $page_data->post_title ); ?></div>
			<?php if ( $text['lead'] ) : ?><h2 class="main__title"><?php echo esc_html( $text['lead'] ); ?></h2><?php endif; ?>
		</div>
		<div class="how__intro">
			<?php echo $text['body']; // phpcs:ignore WordPress.Security.EscapeOutput -- treść z edytora ?>
		</div>
		<?php if ( $steps_title ) : ?>
			<div class="text-center steps__head">
				<div class="main__heading"><?php echo esc_html( $steps_title ); ?></div>
			</div>
		<?php endif; ?>
		<ol class="steps">
			<?php foreach ( $steps as $step ) : ?>
				<li class="steps__item">
					<?php echo rehaborto_acf_icon( get_field( 'ikona', $step->ID ), 'steps__icon' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					<strong><?php echo esc_html( get_the_title( $step ) ); ?></strong>
					<span><?php echo esc_html( wp_strip_all_tags( $step->post_content ) ); ?></span>
				</li>
			<?php endforeach; ?>
		</ol>
		<?php if ( $cta ) : ?>
			<div class="steps__summary text-center"><?php echo $cta; // phpcs:ignore WordPress.Security.EscapeOutput -- pole WYSIWYG ?></div>
		<?php endif; ?>
	</div>
</section>
