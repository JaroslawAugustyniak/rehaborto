<?php
/**
 * Nagłówek: górny pasek z kontaktem + przyklejone menu.
 */
$d    = rehaborto_data();
$site = $d['site'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="top-wrapper" data-header>
	<header class="top">
		<div class="container top__wrapper">
			<a class="top__logo" href="<?php echo esc_url( rehaborto_anchor( '#start' ) ); ?>">
				<?php echo rehaborto_logo( 40, 52 ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</a>
			<div class="top__contacts">
				<div class="top__contacts-item hidden-md">
					<div class="top__contacts-item-top"><?php echo rehaborto_icon( 'pin' ); ?>Adres</div>
					<div class="top__contacts-item-bottom"><?php echo esc_html( $site['addressFull'] ); ?></div>
				</div>
				<div class="top__contacts-item">
					<div class="top__contacts-item-top"><?php echo rehaborto_icon( 'phone' ); ?>Telefon</div>
					<div class="top__contacts-item-bottom"><a href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>"><?php echo esc_html( $site['phone'] ); ?></a></div>
				</div>
				<?php if($site['email']): ?>
				<div class="top__contacts-item hidden-sm">
					<div class="top__contacts-item-top"><?php echo rehaborto_icon( 'mail' ); ?>Adres e-mail</div>
					<div class="top__contacts-item-bottom"><a href="mailto:<?php echo esc_attr( $site['email'] ); ?>"><?php echo esc_html( $site['email'] ); ?></a></div>
				</div>
				<?php endif; ?>
				<a class="top__action" href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>" aria-label="Zadzwoń / Umów wizytę" title="Zadzwoń / Umów wizytę">
					<?php echo rehaborto_icon( 'phone' ); ?>
				</a>
			</div>
			<button class="top__toggle" type="button" aria-expanded="false" aria-controls="main-nav" data-nav-toggle>
				<span class="sr-only">Menu</span><span class="top__burger" aria-hidden="true"></span>
			</button>
		</div>
	</header>
	<div class="navigation">
		<div class="container navigation__inner">
			<!-- logo i telefon widoczne dopiero, gdy górny pasek (.top) wyjedzie poza ekran -->
			<a class="navigation__logo" href="<?php echo esc_url( rehaborto_anchor( '#start' ) ); ?>" aria-label="<?php echo esc_attr( $site['name'] ); ?> — początek strony" tabindex="-1">
				<img src="<?php echo esc_url( rehaborto_asset( 'images/logo.svg' ) ); ?>" alt="" width="30" height="39" />
			</a>

				<?php 
				wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'container'      => 'nav',
								'container_id'   => 'main-nav',
								'container_class'=> 'nav'
							) );
			?>


						
			<a class="navigation__phone" href="tel:<?php echo esc_attr( $site['phoneHref'] ); ?>" aria-label="Zadzwoń / Umów wizytę" title="Zadzwoń / Umów wizytę" tabindex="-1">
				<?php echo rehaborto_icon( 'phone' ); ?>
			</a>
		</div>
	</div>
</div>

<main>
