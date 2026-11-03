<?php
/**
 * Szczegóły fizjoterapeuty (CPT team): u góry zdjęcie i dane, niżej pełna treść wpisu.
 */
get_header();
$phone = rehaborto_data()['site']['phoneHref'];
?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php $short = get_field( 'krotki_opis' ); ?>
	<article <?php post_class( 'therapist' ); ?>>
		<section class="section section--limited therapist__top">
			<div class="container therapist__head">
				<div class="therapist__image parallax">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'large', [ 'alt' => get_the_title(), 'data-speed' => '0.1', 'fetchpriority' => 'high' ] ); ?>
					<?php else : ?>
						<div class="placeholder" role="img" aria-label="Miejsce na zdjęcie terapeuty">Zdjęcie</div>
					<?php endif; ?>
				</div>
				<div class="therapist__info">
					<a class="therapist__back" href="<?php echo esc_url( rehaborto_anchor( '#zespol' ) ); ?>">&larr; Zespół</a>
					<h1 class="therapist__name"><?php the_title(); ?></h1>
					<p class="person__role"><?php echo esc_html( (string) get_field( 'stanowisko' ) ); ?></p>
					<?php if ( $short ) : ?>
						<p class="therapist__short"><?php echo nl2br( esc_html( $short ) ); ?></p>
					<?php endif; ?>
					<a class="btn" href="tel:<?php echo esc_attr( $phone ); ?>">Umów wizytę</a>
				</div>
			</div>
		</section>
		<section class="section section--white therapist__content">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</section>
	</article>
<?php endwhile; ?>
<?php
get_footer();
