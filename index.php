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

<section class="sl-hero relative">
    <div class="container">
        
        <div class="sl-hero__content">

            <h1><?php _e('Blog', 'sentinelegal'); ?></h1>
        </div>
    </div>
</section>

<div class="sl-page sl-section-spacing">
    <div class="container grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            get_template_part('template-parts/content') ; 
        endwhile; endif; wp_reset_postdata() ;?>
    </div>
</div>



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