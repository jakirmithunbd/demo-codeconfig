<?php
$class_prefix = $args['class_prefix'] ?? '';
$logos = $args['logos'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$first_menu_title = $args['first_menu_title'] ?? '';
$first_menu_name = $args['first_menu_name'];
$second_menu_title = $args['second_menu_title'] ?? '';
$second_menu_name = $args['second_menu_name'];
$payment_logos_color = $args['payment_logos'] ?? '';
$footer_perticles = $args['footer_perticles'] ?? '';
$popup = $args['popup'] ?? '';

?>


<footer class="<?php echo esc_attr($class_prefix); ?>-footer codeconfig-footer">
	<div class="footer-bottom relative">

		<div class="<?php echo esc_attr($class_prefix); ?>-container container relative">

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
		<div class="container relative">
			<button
				class="cc-scroll-top-btn flex-center transition"
				aria-label="Scroll to top">
				<span class="scroll-top-btn-icon transition"></span>
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
					<ul class="unstyle d-flex align-center"<?php echo $ul_style; ?>>
						<?php foreach ($payment_logos as $logo): 
							$image_path = $is_light 
								? '/assets/images/accessiy-page/' . $logo['path']
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

<?php
if (is_page('home') && empty($_COOKIE['codeconfig_reviews'])):
	$reviewer_list = get_field('cc_review_area', 'options');
?>
	<div class="cc-review-slider-window hide-mobile hide-tab cc-cookie-body" data-cookie-id="codeconfig_reviews">
		<?php if (!empty($reviewer_list['review-list']) && is_array($reviewer_list['review-list'])):
			foreach ($reviewer_list['review-list'] as $reviewer):
				$review_processor = $reviewer['class_name'] ? 'WordPress' : 'Freemius';
				$review_verified_url = $reviewer['verified_url'] ?? site_url();
				$client_profile_url = $reviewer['client_profile_url'] ?? site_url();
				$reviewerMeta = $reviewer['client'];
				$review_product = $reviewer['select_product']['label'];
				$cc_products = get_field('cc_product', 'options') ?: [];
				$product_image = null;
				$product_name = null;

				foreach ($cc_products as $product) {
					if (empty($product['select_product']['label'])) {
						continue;
					}
					if (strcasecmp($product['select_product']['label'], $review_product) === 0) {
						$product_image = $product['product_image']['url'] ?? null;
						$product_name = $product['select_product']['label'] ?? null;
						$class_name = isset($product['select_product']['value'])
							? $product['select_product']['value'] . '-icon'
							: 'codeconfig-icon';

						break;
					}
				}

		?>
				<div class="cc-review-card d-flex" title="Verify Review from the source">

					<div class="cc-product-image cc-review-product-logo <?php echo esc_attr($class_name); ?>">
						<img src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_name); ?>">
					</div>


					<div class="cc-review-title">
						<?php printf('<p class="quote-title"><i></i><i></i><i></i><i></i><i></i> Form <a href="%s" target="_blank">%s</a> on <a href="%s">%s</a></p>', esc_url($client_profile_url), esc_html($reviewerMeta['client_name'] ?? 'Client'), $review_verified_url, esc_html($review_processor));
						$shortened_quote = $reviewer['client_quote'];
						printf('<p class="cc-quote">%s</p>', esc_attr($shortened_quote)); ?>
					</div>
				</div>
		<?php

			endforeach;
		endif; ?>

		<div class="cc-cookie-close-btn cc-review-window-close">
			<span></span>
			<span></span>
		</div>
	</div>
<?php endif; ?>


<?php wp_footer(); ?>

</body>

</html>