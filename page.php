<?php 
	get_header(); 
	$data = [];

	get_template_part('template-parts/hero', null, $data);
?>

<main id="primary" class="site-main cc-default-template">

	<div class="container">
		<div class="cc-default-content">
			<?php
			while (have_posts()):
				the_post();

				echo get_the_content();
			endwhile;
			?>
		</div>
	</div>

</main><!-- #main -->

<!--Default CTA  -->
<?php get_template_part('/template-parts/footer_cta_default'); ?>
<!--Default CTA  -->


<?php get_footer(); ?>
