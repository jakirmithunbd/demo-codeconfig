<?php defined( 'ABSPATH' ) || exit ;?>

<?php get_header(
    null,
    array(
        'class_prefix' => 'cc',
        'logos' => 'cc-logo',
        'menu_name' => 'header-menu',
        'mobile_menu' => 'full',
    )
) ;?>




<!-- Default CTA -->
<?php get_template_part('/template-parts/footer/footer_cta_default'); ?>
<!-- Default CTA -->

<?php 
get_footer(null, array(
    'class_prefix' => 'cta-on-footer cc',
    'logos' => 'cc-logo',
    'footer_description' => 'cc-footer-description',
    'first_menu_title' => 'Company',
    'first_menu_name' => 'company-menu',
    'second_menu_title' => 'Resources',
    'second_menu_name' => 'resources-menu',
    'payment_logos' => 'colorful',
    'footer_perticles' => 'cc-perticles',
    'popup' => '',
)); 
?>