<?php
$site      = rehaborto_data()['site'];
$page_data = get_post_by_slug_and_type( 'kontakt', 'section' );
if ( ! $page_data ) {
	return;
}
$text    = rehaborto_split_lead( $page_data->post_content );
$intro   = trim( explode( '<ul', $text['body'] )[0] ); // akapity przed listą; lista i przycisk z Dostosuj → Dane kontaktowe
$obrazek = get_field( 'obrazek', $page_data->ID );
?>
<section class="section section--limited contact-section" id="kontakt">
	<div class="container contact">
		<div class="contact__info">
			<div class="main__heading"><?php echo esc_html( $page_data->post_title ); ?></div>
			<?php if ( $text['lead'] ) : ?><h2 class="main__title"><?php echo esc_html( $text['lead'] ); ?></h2><?php endif; ?>
			<div class="main__text-small"><?php echo $intro; // phpcs:ignore WordPress.Security.EscapeOutput -- treść z edytora ?></div>
			<ul class="contact__list">
				<li><span>Telefon:</span> <a href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>"><?php echo esc_html( $site['phone'] ); ?></a></li>
				<?php if ( $site['email'] ) : ?>
					<li><span>E-mail:</span> <a href="mailto:<?php echo esc_attr( $site['email'] ); ?>"><?php echo esc_html( $site['email'] ); ?></a></li>
				<?php endif; ?>
				<li><span>Adres:</span> <?php echo esc_html( $site['addressFull'] ); ?></li>
			</ul>
			<a class="btn" href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>">Zadzwoń i umów wizytę</a>
		</div>
		<div class="contact__map">
			<?php if ( ! empty( $site['mapEmbed'] ) ) : ?>
				<iframe src="<?php echo esc_url( $site['mapEmbed'] ); ?>" title="Mapa dojazdu" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
			<?php else : ?>
				<div class="contact__photo parallax">
					<?php displayImageACF( $obrazek, $obrazek['alt'] ?? 'Wnętrze gabinetu', '', 'data-speed="0.1" loading="lazy"' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
