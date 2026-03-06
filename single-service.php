<?php defined( 'ABSPATH' ) || exit ;?>

<?php get_header(); ?>

<?php $banner = get_field('banner') ;?>
<section class="sl-hero relative">
    <div class="container">
        
        <div class="sl-hero__content">
            <?php $extra_banner = $banner['extra_banner'] ; if ($extra_banner !== true) : ?>
            <div class="stylist-heading sl-flex">
                <div class="line"></div>
                <span><?php _e('Service', 'sentinelegal'); ?></span>
            </div>

            <h1><?php echo get_the_title(); ?></h1>

            <?php $categories = get_the_terms($post->ID, 'service-tags') ;?>
            <?php if ($categories && !is_wp_error($categories)) : ?>
                <?php $category_names = wp_list_pluck($categories, 'name'); ?>
                <h3><?php echo esc_html(implode(' . ', $category_names)); ?></h3>
            <?php endif; ?>

            <?php else : ?>
                <?php $content = $banner['content'] ;?>

                <?php if (!empty($content['sub_title'])) : ?>
                <div class="stylist-heading sl-flex">
                    <div class="dot"></div>
                    <span><?php echo esc_html($content['sub_title']); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($content['content'])) : ;?>
                <?php echo wp_kses_post($content['content']); ?>
                <?php endif; ?>

                <?php if (!empty($content['button_1']) || !empty($content['button_2'])) : ?>
                <div class="sl-hero__actions">

                    <?php if (!empty($content['button_1'])) : ?>
                    <a target="<?php echo esc_attr($content['button_1']['target']); ?>" href="<?php echo esc_url($content['button_1']['url']); ?>" class="sl-btn"><?php echo esc_html($content['button_1']['title']); ?> →</a>
                    <?php endif; ?>

                    <?php if (!empty($content['button_2'])) : ?>
                    <a target="<?php echo esc_attr($content['button_2']['target']); ?>" href="<?php echo esc_url($content['button_2']['url']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($content['button_2']['title']); ?> →</a>
                    <?php endif; ?>

                </div>
                <?php endif; ?>

                <?php $service_info = $content['service_info'] ; if (!empty($service_info)) :?>
                <div class="service-info sl-flex sl-flex-wrap">
                    
                <?php foreach($service_info as $item) : ?>
                    <div class="service-info__item">
                        <span class="service-info__item__name"><?php echo esc_html($item['sub_title']); ?></span>
                        <p class="service-info__item__value"><?php echo esc_html($item['title']); ?></p>
                    </div>
                <?php endforeach; ?>

                </div>
                <?php endif ;?>
            <?php endif ;?>

        </div>
    </div>
</section>

<?php $sd = get_field('service_details') ;?>

<section class="service-details">
    <div class="container grid">
        <div class="col-md-6 col-xs-12">
            <div class="service-details__content">
                <div class="sl-section-title">
                    <?php if (!empty($sd['sub_title'])) : ?>
                        <div class="stylist-heading secondary"><span class="line"></span><?php echo esc_html($sd['sub_title']); ?></div>
                    <?php endif; ?>

                    <?php if (!empty($sd['title'])) : ?>
                        <h2><?php echo esc_html($sd['title']); ?></h2>
                    <?php endif; ?>
                </div>

                <?php if (!empty($sd['description'])) : ?>
                    <?php echo wp_kses_post($sd['description']); ?>
                <?php endif; ?>
            </div>

            <?php $features = $sd['features']; if (!empty($features)) : ?>
            
            <div class="service-details__features">

                <?php foreach($features as $feature) : ?>
                    <div class="service-details__features__item">
                        <h6><?php echo esc_html($feature['title']); ?></h6>
                        <p><?php echo esc_html($feature['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php endif; ?>
        </div>

        <div class="col-md-6 col-xs-12">
            <?php $practice_area = $sd['practice_area'] ; if (!empty($practice_area)) : ?>
            <div class="service-details__practice-area">
                <?php foreach($practice_area as $item) : ?>
                <div class="service-details__practice-area-item">
                    <h6><?php echo esc_html($item['title']); ?></h6>
                    <p><?php echo wp_kses_post($item['description']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
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

<section class="other-services">
    <div class="container grid">
        <div class="col-md-6 col-xs-12">
            <div class="in-practice__content">
                <div class="sl-section-title">
                    <div class="stylist-heading"><span class="line"></span><?php _e('Autres expertises', 'sentinelegal'); ?></div>
                    
                    <a class="sl-btn sl-btn-black" href="/services"><?php _e('Voir tous les services', 'sentinelegal'); ?> →</a>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
$cta = get_field('cta') ;
$ctaData = [
    'sub_title' => !empty($cta['sub_title']) ? $cta['sub_title'] : '',
    'title' => !empty($cta['title']) ? $cta['title'] : 'Votre situation mérite une lecture lucide.',
    'phone' => !empty($cta['phone']) ? $cta['phone'] : '022 512 76 00',
    'languages' => !empty($cta['languages']) ? $cta['languages'] : 'Genève & Lyon  ·  Français, English, Deutsch',
    'button' => !empty($cta['button']) ? $cta['button'] : [],
];
get_template_part('template-parts/cta', null, $ctaData) ;?>

<?php get_footer() ;?>