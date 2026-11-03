<?php
/**
 * Szablon domyślny (podstrony, wpisy, wyniki wyszukiwania, 404).
 */
get_header();
?>
<section class="section">
	<div class="container container--content">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<h1>Nie znaleziono strony</h1>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Wróć na stronę główną</a></p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
