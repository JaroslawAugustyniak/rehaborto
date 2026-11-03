<?php $d = rehaborto_data(); 

$page_data = get_post_by_slug_and_type('w-czym-mozemy-ci-pomoc', 'section');
$cta = get_field('cta', $page_data->ID);
$cta_button = get_field('cta_button', $page_data->ID);
$situations = get_posts( [
	'post_type'      => 'situation',
	'post_status'    => 'publish',
	'posts_per_page' => -1,
	'orderby'        => [ 'menu_order' => 'ASC', 'date' => 'ASC' ],
] );

?>
<section class="section section--first" id="w-czym-pomagamy">
	<div class="container">
		<div class="help" data-help data-interval="4500">
			<div class="help__intro">
				<div class="main__heading"><?=$page_data->post_title?></div>
				<?=$page_data->post_content?>
			</div> 
			<div class="help__list">
				<?php foreach ( $situations as $situation ) : ?>
					<article class="help__item" tabindex="0" aria-expanded="false" data-help-item>
						<h3 class="help__title">
							<span><?php echo esc_html( get_the_title( $situation ) ); ?></span>
							<?php echo rehaborto_icon( 'plus', 'help__icon' ); ?>
						</h3>
						<div class="help__body">
							<div class="help__body-inner">
								<?php echo apply_filters( 'the_content', $situation->post_content ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="help__cta">
			<div class="help__cta-text">
				<?=$cta?>
			</div>
			<a class="btn" href="<?=$cta_button['url']?>"><?=$cta_button['title']?></a>
		</div>
	</div>
</section>
