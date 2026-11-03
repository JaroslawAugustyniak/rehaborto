<?php
$d    = rehaborto_data();
$site = $d['site'];

?>
</main>

<footer class="footer">
	<div class="footer__top">
		<div class="container footer__cols">
			<div class="footer__divider">
				<img src="<?php echo esc_url( rehaborto_asset( 'images/logo.svg' ) ); ?>" alt="" width="30" height="39" class="footer__logo"  />
				<div class="footer__title"><?php echo esc_html( $site['name'] ); ?></div>
			</div>
			<div class="footer__divider">
				<div class="footer__title">Menu</div>
				<?php 
					wp_nav_menu( array(
									'theme_location' => 'footer-1',
									'container'      => 'div',
									'container_id'   => 'footer-nav',
									'container_class'=> 'footer-nav'
								) );
				?>
			</div>
			<div class="footer__divider">
				<div class="footer__title">Dokumenty</div>
				<?php 
					wp_nav_menu( array(
									'theme_location' => 'footer-2',
									'container'      => 'div',
									'container_id'   => 'footer2-nav',
									'container_class'=> 'footer2-nav'
								) );
				?>
			</div>
			<div class="footer__divider">
				<div class="footer__title">Skontaktuj się z nami</div>
				<p><a href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>"><?php echo esc_html( $site['phone'] ); ?></a></p>
				<p><a href="mailto:<?php echo esc_attr( $site['email'] ); ?>"><?php echo esc_html( $site['email'] ); ?></a></p>
				<p><?php echo esc_html( $site['addressFull'] ); ?></p>
			</div>
		</div>
	</div>
	<div class="footer__bottom">
		<div class="container">
			<p class="footer__copy"><?php echo esc_html( $site['copyright'] . ' © ' . $site['name'] ); ?></p>
		</div>
	</div>
</footer>

<button type="button" class="fixed-item" aria-label="Wróć na górę strony" title="Wróć na górę" data-scroll-top>
	<?php echo rehaborto_icon( 'arrow-up' ); ?>
</button>

<div class="cookies" role="dialog" aria-live="polite" aria-label="Zgoda na pliki cookies" data-cookies hidden>
	<div class="container cookies__inner">
		<p class="cookies__text">
			Funkcjonowanie naszej strony internetowej jest zgodne z obowiązującymi przepisami prawa w zakresie ochrony danych osobowych. Aby dowiedzieć się więcej na temat stosowanych przez nas zasad w zakresie ochrony danych osobowych i stosowania plików cookies, kliknij – 
			<?php if ( get_privacy_policy_url() ) : ?>
				<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Polityka prywatności</a>
			<?php endif; ?>
		</p>
		<div class="cookies__actions">
			<button type="button" class="btn btn--small" data-cookies-choice="all">Akceptuję</button>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
