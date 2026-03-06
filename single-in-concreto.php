<?php defined('ABSPATH') || exit; ?>

<?php get_header();
?>

<section class="sl-hero relative">
    <div class="container">
        
        <div class="sl-hero__content">

            <div class="stylist-heading sl-flex">
                <div class="line"></div>
                <span><?php _e('In Concreto', 'sentinelegal'); ?></span>
            </div>

            <h1><?php echo get_the_title(); ?></h1>

            <?php if (!empty(get_the_excerpt())) : ?>
            <h3><?php echo get_the_excerpt() ;?></h3>
            <?php endif; ?>

            <?php $categories = get_the_terms($post->ID, 'in-concreto-tag') ;?>
            <?php if ($categories && !is_wp_error($categories)) : ?>
                <?php $category_names = wp_list_pluck($categories, 'name'); ?>
                <h3><?php echo esc_html(implode(' . ', $category_names)); ?></h3>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php 
$approach = get_field('our_approach') ; 
$process = !empty($approach['process']) ? $approach['process'] : [];
$contacts = get_field('contacts', 'options');
?>
<section class="our-approach">
    <div class="container">
        <div class="approach-content-wrapper grid">
            <div class="col-xs-12 col-lg-6">
                <div class="sl-section-title">
                    <?php if (!empty($approach['sub_title'])) : ?>
                    <div class="stylist-heading"><span class="line"></span><?php echo esc_html($approach['sub_title']); ?></div>
                    <?php endif; ?>

                    <?php if(!empty($approach['description'])) : ?>
                    <p><?php echo wp_kses_post($approach['description']); ?></p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($approach['button'])) : ;?>
                <a target="<?php echo esc_attr($approach['button']['target']); ?>" href="<?php echo esc_url($approach['button']['url']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($approach['button']['title']); ?> →</a>
                <?php endif; ?>

                <div class="stylist-heading secondary"><span class="dot"></span><?php _e('Situation urgente ?', 'sentinelegal') ;?> <a href="tel:<?php echo esc_html($contacts['phone']); ?>"><?php echo esc_html($contacts['phone']); ?></a> </div>
            </div>

            <div class="col-xs-12 col-lg-6">
                <div class="approach-step">

                    <?php if(!empty($process)) : ?>
                    <div class="approach-step">
                        <?php foreach ($process as $item) : ?>
                        <div class="approach-step__item sl-flex sl-flex-wrap">
                            <div class="approach-step__item__number">
                                <span></span>
                            </div>
                            <div class="approach-step__item__content">
                                <h3><?php echo esc_html($item['title']); ?></h3>
                                <?php echo wp_kses_post($item['description']); ?>
                            </div>
                        </div><!-- Item  -->
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $in_practice = get_field('in_practice') ;?>

<section class="in-practice">
    <div class="container grid">
        <div class="col-md-6 col-xs-12">
            <div class="in-practice__content">
                <div class="sl-section-title">

                    <?php if(!empty($in_practice['sub_title'])) : ?>
                    <div class="stylist-heading"><span class="line"></span><?php echo esc_html($in_practice['sub_title']); ?></div>
                    <?php endif; ?>

                    <?php if(!empty($in_practice['title'])) : ?>
                        <h2 class="sl-white"><?php echo esc_html($in_practice['title']); ?></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <?php if (!empty($in_practice['button'])) : ?>
            <div class="in-practice__cta sl-flex sl-items-center sl-justify-end">
                <a target="<?php echo esc_attr($in_practice['button']['target']); ?>" class="sl-btn sl-btn-black" href="<?php echo esc_url($in_practice['button']['url']); ?>"><?php echo esc_html($in_practice['button']['title']); ?> →</a>
            </div>
            <?php endif ;?>
        </div>
    </div>
</section>

<section class="sl-related-concreto">
    <div class="container">
        <div class="stylist-heading"><span class="line"></span><?php _e('In Concreto', 'sentinelegal') ;?></div>

        <?php $query = new WP_Query(array('post_type' => 'in-concreto', 'posts_per_page' => -1, 'post__not_in' => array($post->ID))) ;?>

        <div class="sl-related-concreto__list sl-flex sl-flex-wrap">

            <?php while ($query->have_posts()) : $query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="sl-btn outline black"><?php the_title(); ?> →</a>
            <?php endwhile; wp_reset_postdata(); ?>

        </div>
    </div>
</section>

<?php
$cta = get_field('cta');
$ctaData = [
    'sub_title' => !empty($cta['sub_title']) ? $cta['sub_title'] : '',
    'title' => !empty($cta['title']) ? $cta['title'] : 'Votre situation mérite une lecture lucide.',
    'phone' => !empty($cta['phone']) ? $cta['phone'] : '022 512 76 00',
    'languages' => !empty($cta['languages']) ? $cta['languages'] : 'Genève & Lyon  ·  Français, English, Deutsch',
    'button' => !empty($cta['button']) ? $cta['button'] : [],
];
get_template_part('template-parts/cta', null, $ctaData); ?>

<?php get_footer(); ?>