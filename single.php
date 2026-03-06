<?php defined( 'ABSPATH' ) || exit ;?>

<?php get_header() ;?>

<section class="sl-hero relative">
    <div class="container">
        
        <div class="sl-hero__content">

            <h1><?php _e('Blog', 'sentinelegal'); ?></h1>

            <?php $categories = get_the_terms($post->ID, 'category') ;?>
            <?php if ($categories && !is_wp_error($categories)) : ?>
                <?php $category_names = wp_list_pluck($categories, 'name'); ?>
                <h3><?php echo esc_html(implode(' . ', $category_names)); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="sl-page sl-section-spacing">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            get_template_part('template-parts/single-content') ; 
        endwhile; endif; wp_reset_postdata() ;?>
    </div>
</div>

<?php get_footer(); ?>