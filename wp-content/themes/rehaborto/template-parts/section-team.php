<?php
$page_data = get_post_by_slug_and_type( 'poznaj-nasz-zespol', 'section' );
if ( ! $page_data ) {
	return;
}
$text   = rehaborto_split_lead( $page_data->post_content );
$people = rehaborto_items( 'team' );
?>
<section class="section section--limited" id="zespol">
	<div class="container">
		<div class="text-center section__head">
			<div class="main__heading"><?php echo esc_html( $page_data->post_title ); ?></div>
			<?php if ( $text['lead'] ) : ?><h2 class="main__title"><?php echo esc_html( $text['lead'] ); ?></h2><?php endif; ?>
			<div class="main__text-small"><?php echo $text['body']; // phpcs:ignore WordPress.Security.EscapeOutput -- treść z edytora ?></div>
		</div>
		<div class="team-grid">
			<?php foreach ( $people as $person ) : ?>
				<?php $short = get_field( 'krotki_opis', $person->ID ); ?>
				<article class="person">
					<div class="person__image parallax">
						<a href="<?php echo esc_url( get_permalink( $person ) ); ?>">
						<?php if ( has_post_thumbnail( $person ) ) : ?>
							<?php echo get_the_post_thumbnail( $person, 'large', [ 'alt' => get_the_title( $person ), 'loading' => 'lazy' ] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<?php else : ?>
							<div class="placeholder" role="img" aria-label="Miejsce na zdjęcie terapeuty">Zdjęcie</div>
						<?php endif; ?>
						</a>
					</div>
					<div class="person__body">
						<h3><?php echo esc_html( get_the_title( $person ) ); ?></h3>
						<p class="person__role"><?php echo esc_html( (string) get_field( 'stanowisko', $person->ID ) ); ?></p>
						<a class="btn btn--small" href="<?php echo esc_url( get_permalink( $person ) ); ?>">Czytaj więcej</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
