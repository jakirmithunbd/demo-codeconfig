<?php 
$logos = get_field('logos', 'options');
$contacts = get_field('contacts', 'options'); 
$footer = get_field('footer', 'options');
$copyright = get_field('copyright', 'options');
?>

<footer class="s-footer">

	<div class="s-footer-brand">
		<div class="s-footer-logo">
			<?php if (!empty($logos['main_logo'])): ?>
				<img src="<?php echo esc_url($logos['main_logo']['url']); ?>" alt="<?php echo esc_attr($logos['main_logo']['alt']); ?>" class="header__logo-img" />
			<?php endif; ?>
		</div>
		<?php if (!empty($footer['description'])): echo wp_kses_post($footer['description']); endif ;?>
	</div>

	<div class="sentinelegal-footer__address">
		<h4><?php _e('copyright', 'sentinelegal'); ?></h4>
		<?php 
			if (!empty($contacts['offices'])) : foreach ($contacts['offices'] as $office): 
				printf('<span>%s</span> <br />', wp_kses_post($office['office']));
			endforeach; endif;
		?>
	</div>

	<div class="sentinelegal-footer__contact">
		<h4><?php _e('contact', 'sentinelegal'); ?></h4>

		<?php if (!empty($contacts['phone'])): ?>
			<a href="tel:<?php echo esc_attr($contacts['phone']); ?>"><?php echo esc_html($contacts['phone']); ?></a>
		<?php endif; ?>
		<?php if (!empty($contacts['email'])): ?>
			<a href="mailto:<?php echo esc_attr($contacts['email']); ?>"><?php echo esc_html($contacts['email']); ?></a>
		<?php endif; ?>
		<br />
		<a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('contact', 'sentinelegal'); ?></a>
	</div>

</footer>
<div class="s-footer-bottom">
	<span>© <?php echo date('Y'); ?> <?php echo esc_html($copyright['copyright_text']); ?></span>
	<span><?php echo esc_html($copyright['signature']); ?></span>
</div>

<?php wp_footer(); ?>
