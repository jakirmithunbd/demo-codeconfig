<?php defined( 'ABSPATH' ) || exit ;?>

<?php get_header() ;?>

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

<?php get_footer(); ?>