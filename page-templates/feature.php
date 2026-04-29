

<!-- feature page template file  -->
<?php
/**
 * Template Name: Feature
 *
 * @package Demo_CodeConfig
 */

$page_settings = get_field('page_settings');
$page_name = !empty($page_settings['select_product']) ? $page_settings['select_product'] : '';


get_header( null, ['page_name' => $page_name,] )
?>


<?php if( have_rows('demo_feature_content') ): ?>
    <?php while( have_rows('demo_feature_content') ): the_row(); ?>

        <?php if( get_row_layout() === 'banner' ): ?>
            <?php get_template_part('template-parts/feature-page/hero', null, ['page_name' => $page_name]); ?>

        <?php elseif( get_row_layout() === 'feature' ): ?>
            <?php get_template_part('template-parts/feature-page/feature-section', null, ['page_name' => $page_name]); ?>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>



<!-- Default CTA -->
<?php get_template_part('/template-parts/footer/footer-cta'); ?>
<!-- Default CTA -->

<?php 
get_footer(null, ['page_name' => $page_name]); 
?>