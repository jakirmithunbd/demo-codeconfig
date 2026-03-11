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

<section class="ccpigd-section ccpigd-section-top flex-center" style="min-height: 600px; background-color: #d8defa;">
    <div class="container">
        <div class="cc-section-title text-center">
            <h1 style="color: #000;">Google Drive Features</h1>
            <div class="features">
                <?php
                $args = array(
                    'post_type'      => 'igd-feature',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish'
                );

                $features = new WP_Query($args);

                if ($features->have_posts()) :
                    while ($features->have_posts()) : $features->the_post();
                ?>
                        <div class="featre-item">
                            <a href="<?php the_permalink(); ?>" style="font-size: 24px; margin-bottom: 15px; display: block;">
                                🔍 <?php the_title(); ?>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Default CTA -->
<?php get_template_part('/template-parts/footer/footer-cta-default'); ?>
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