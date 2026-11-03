<?php $site = rehaborto_data()['site']; 

$page_data = get_post_by_slug_and_type('fizjoterapia-skierniewice', 'section');
$obrazek = get_field('obrazek', $page_data->ID);


?>
<section class="banner banner--hero" id="start">
	<div class="banner__bg parallax">
		<?php displayImageACF($obrazek, $obrazek['alt'], '', 'data-speed="0.25" fetchpriority="high"'); ?>
		<!-- <img src="<?php echo esc_url( rehaborto_asset( $site['heroImage'] ) ); ?>" alt="Fizjoterapeuta pracujący z pacjentem w gabinecie" data-speed="0.25" fetchpriority="high" /> -->
	</div>
	<div class="container">
		<div class="banner__wrapper">
			<div class="banner__title"><?php echo esc_html( $site['heroEyebrow'] ); ?></div>
			<h1 class="banner__text"><?=$page_data->post_title?></h1>
			<?=$page_data->post_content?>

		</div>
	</div>
</section>
