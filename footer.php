<?php

$dataMaps = [
	'igd' => [
		'class_prefix' => 'ccpigd',
		'logos' => 'igd-logo',
		'footer_description' => 'igd-footer-description',
		'first_menu_title' => 'Company',
		'first_menu_name' => 'company-menu',
		'second_menu_title' => 'Resources',
		'second_menu_name' => 'igd-resources',
		'payment_logos' => 'light',
		'footer_perticles' => '',
		'popup' => 'igd-download-popup',
	],

];

$page_name = $args['page_name'] ?? 'cc';
$config    = $dataMaps[$page_name] ?? [];


$class_prefix = $config['class_prefix'] ?? 'cta-on-footer cc';
$logos = $config['logos'] ?? 'cc-logo';
$footer_description = $config['footer_description'] ?? 'cc-footer-description';
$first_menu_title = $config['first_menu_title'] ?? 'Company';
$first_menu_name = $config['first_menu_name'] ?? 'company-menu';
$second_menu_title = $config['second_menu_title'] ?? 'Resources';
$second_menu_name = $config['second_menu_name'] ?? 'resources-menu';
$payment_logos_color = $config['payment_logos'] ?? 'colorful';
$footer_perticles = $config['footer_perticles'] ?? 'cc-perticles';
$popup = $config['popup'] ?? '';

?>


<footer class="<?php echo esc_attr($class_prefix); ?>-footer codeconfig-footer">
	<div class="footer-bottom cc-relative">

		<div class="container cc-relative">

			<?php
			if (!empty($footer_perticles)) {
				get_template_part('/template-parts/footer/' . $footer_perticles);
			}
			?>

			<div class="d-flex space-between flex-wrap">
				<div class="left-side">
					<?php get_template_part('/template-parts/logos/' . $logos); ?>

					<div class="footer-menu products cc-products-menu footer-menu-tab-mobile hide-desktop">
						<h2><?php echo __('Products', 'codeconfig'); ?></h2>
						<?php
						wp_nav_menu([
							'theme_location' => 'products-menu',
							'menu_class' => '',
							'container' => false,
							'walker' => new CCWalkernav(),
						]);
						?>
					</div><!-- Products menu  -->

					<?php get_template_part('/template-parts/footer/' . $footer_description); ?>

				</div>
				<div class="right-side d-flex space-between">
					<div class="footer-menu company">
						<h2><?php echo esc_html($first_menu_title); ?></h2>
						<?php
						if (has_nav_menu($first_menu_name)) {

							wp_nav_menu([
								'theme_location' => $first_menu_name,
								'menu_class' => '',
								'container' => false,
								'walker' => false,
							]);
						}
						?>
					</div><!-- Company menu  -->
					<div class="footer-menu resources">
						<h2><?php echo esc_html($second_menu_title); ?></h2>
						<?php
						if (has_nav_menu($second_menu_name)) {

							wp_nav_menu([
								'theme_location' => $second_menu_name,
								'menu_class' => '',
								'container' => false,
								'walker' => false,
							]);
						}
						?>
					</div><!-- Resources menu  -->
					<div class="footer-menu products cc-products-menu hide-tab hide-mobile">
						<h2><?php echo __('Products', 'codeconfig'); ?></h2>
						<?php
						if (has_nav_menu('products-menu')) {

							wp_nav_menu([
								'theme_location' => 'products-menu',
								'menu_class' => '',
								'container' => false,
								'walker' => new CCWalkernav(),
							]);
						}
						?>
					</div><!-- Products menu  -->
					
					<div class="footer-description-optional hide-desktop hide-tab hide-mobile">
						<?php get_template_part('/template-parts/footer/' . $footer_description); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container cc-relative">
			<button
				class="cc-scroll-top-btn flex-center cc-transition"
				aria-label="Scroll to top">
				<span class="scroll-top-btn-icon cc-transition"></span>
			</button>

			<div class="copyright-payment d-flex align-center space-between">
				<p>
					© 2023-<?php echo date('Y'); ?>
					<a href="<?php echo esc_url(site_url()); ?>">
						<?php esc_html_e('CodeConfig', 'codeconfig'); ?>
					</a>
					. <?php esc_html_e('All Rights Reserved.', 'codeconfig'); ?>
				</p>


				<div class="payment-method d-flex align-center">
					<p>Secure Payment :</p>
					<?php 
					$payment_logos = [
						['path' => 'freemius-logo-light.webp', 'alt' => 'Freemius logo', 'default' => 'fremius.svg'],
						['path' => 'paypal-logo-light.webp', 'alt' => 'PayPal logo', 'default' => 'paypal.svg'],
						['path' => 'visa-card-logo-light.webp', 'alt' => 'Visa card logo', 'default' => 'visa-card.svg'],
						['path' => 'mastercard-logo-light.webp', 'alt' => 'MasterCard logo', 'default' => 'master-card.svg'],
						['path' => 'a-ex-card-logo-light.webp', 'alt' => 'American Express logo', 'default' => 'american-express.svg'],
						['path' => 'jcb-card-logo-light.webp', 'alt' => 'JCB logo', 'default' => 'jcb.svg'],
					];
					
					$is_light = $payment_logos_color === 'light';
					$ul_style = $is_light ? ' style="width: 100%; max-width: 450px;"' : '';
					?>
					<ul class="d-flex align-center"<?php echo $ul_style; ?>>
						<?php foreach ($payment_logos as $logo): 
							$image_path = $is_light 
								? '/assets/images/' . $logo['path']
								: '/assets/images/' . $logo['default'];
						?>
							<li>
								<img src="<?php echo esc_url(get_theme_file_uri($image_path)); ?>"
									alt="<?php echo esc_attr($logo['alt']); ?>">
							</li>
						<?php endforeach; ?>
					</ul>
				</div><!-- payment method  -->

			</div><!-- copyright-payment  -->
		</div><!-- container  -->
	</div><!-- copyright  -->
</footer>

<!-- Popup start-->
<?php
if (!empty($popup)) {
	get_template_part('template-parts/popup/' . $popup);
}
?>
<!-- Popup end-->


<?php wp_footer(); ?>

</body>

</html>