
<?php
/**
 * Template Name: Homepage
 */

defined( 'ABSPATH' ) || exit ;?>

<?php get_header() ;?>

<section class="section-top flex-center" style="min-height: 600px; background-color: #d8defa;">
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
<?php get_template_part('/template-parts/footer/footer-cta'); ?>
<!-- Default CTA -->

<?php 
get_footer(); 
?>