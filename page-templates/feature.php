

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

<?php get_template_part('template-parts/feature-page/hero', null, ['page_name' => $page_name]); ?>

<?php get_template_part('template-parts/feature-page/feature-section', null, ['page_name' => $page_name]); ?>


<?php 
get_footer(null, ['page_name' => $page_name]); 
?>