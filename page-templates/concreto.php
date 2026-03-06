<?php defined('ABSPATH') || exit; ?>

<?php
/**
 * Template Name: In Concreto
 * */

get_header();

$hero = get_field('hero');
$consult = get_field('consult');
$contacts = get_field('contacts', 'options');
?>

<section class="sl-hero in-concreto-hero relative">
    <div class="container grid">

        <div class="col-lg-6 col-md-12">
            <div class="sl-hero__content">

                <?php if (!empty($hero['sub_title'])) : ?>
                    <div class="stylist-heading sl-flex">
                        <div class="line"></div>
                        <span><?php echo esc_html($hero['sub_title']); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($hero['title'])) : ?>
                    <h1><?php echo wp_kses_post($hero['title']); ?></h1>
                <?php endif; ?>

                <?php if (!empty($hero['description'])) : ?>
                    <h3><?php echo wp_kses_post($hero['description']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($hero['taglines'])) : ?>
                    <div class="sl-hero__content__taglines">
                        <?php foreach ($hero['taglines'] as $tagline) : ?>
                            <span class="tagline"><?php echo esc_html($tagline['text']); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($hero['situation'])) : ?>
                    <div class="stylist-heading">
                        <div class="dot big"></div>
                        <span><?php echo esc_html($hero['situation']); ?></span>

                        <?php if (!empty($contacts['phone'])) : ?>
                            <a href="tel:<?php echo esc_html($contacts['phone']); ?>"><?php echo esc_html($contacts['phone']); ?></a>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="in-concreto-hero__list">

                <span class="in-concreto-hero__list__title"><?php echo esc_html($consult['title']); ?></span>

                <?php if (!empty($consult['consult_areas'])) : ?>
                    <div class="list">
                        <?php foreach ($consult['consult_areas'] as $item) : ?>
                            <div class="list__item">
                                <h6><?php echo esc_html($item['title']); ?></h6>
                                <p><?php echo wp_kses_post($item['description']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>


<?php $cases = get_field('concrete_cases'); ?>
<section class="sl-example">
    <div class="container">
        
        <div class="sl-section-title">

            <?php if(!empty($cases['sub_title'])) : ?>
                <div class="stylist-heading"><span class="line"></span><?php echo esc_html($cases['sub_title']); ?></div>
            <?php endif; ?>

            <?php if(!empty($cases['title'])) : ?>
                <h2><?php echo wp_kses_post($cases['title']); ?></h2>
            <?php endif; ?>

            <?php if(!empty($cases['description'])) : ?>
                <p><?php echo wp_kses_post($cases['description']); ?></p>
            <?php endif; ?>

        </div>

        <div class="example-wrapper grid">

            <?php $case = $cases['cases']; if (!empty($case)) : foreach ($case as $item) : ?>
            <div class="example-item col-lg-4 col-md-6 col-xs-12">

                <div class="example-item__icon">
                    <?php if(!empty($item['icon'])) : ?>
                    <span><?php echo wp_kses_post($item['icon']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="example-item__content">

                    <?php if(!empty($item['sub_title'])) : ?>
                    <span class="example-item__content__subtitle"><?php echo esc_html($item['sub_title']); ?></span>
                    <?php endif; ?>

                    <?php if(!empty($item['title'])) : ?>
                    <h3 class="example-item__content__title"><?php echo esc_html($item['title']); ?></h3>
                    <?php endif; ?>

                    <?php if(!empty($item['description'])) : ?>
                    <p><?php echo wp_kses_post($item['description']); ?></p>
                    <?php endif; ?>

                    <?php if(!empty($item['tags'])) : ?>
                    <div class="example-item__content__tags">
                        <span><?php echo esc_html($item['tags']); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div><!-- Item  -->
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<?php 
$approach = get_field('our_approach') ; 
$process = !empty($approach['process']) ? $approach['process'] : [];
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

            </div>

            <div class="col-xs-12 col-lg-6">
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
</section>

<section class="sl-practical">
    <div class="container">
        <div class="sl-section-title">
            <div class="stylist-heading"><span class="line"></span><?php _e('Aspects pratiques', 'sentinelegal') ;?></div>
            <h2><?php _e('Par domaine', 'sentinelegal') ;?></h2>
        </div>

        <div class="sl-practical__items sl-flex sl-flex-wrap">
            
            <?php $query = new WP_Query(array('post_type' => 'in-concreto', 'posts_per_page' => -1)) ;?>
            
            <?php while ($query->have_posts()) : $query->the_post(); ?>

            <a class="sl-practical__items__item" href="<?php the_permalink(); ?>">
                <span class="sl-practical__items__item__number"></span>
                <h3 class="sl-practical__items__item__title"><?php the_title(); ?></h3>
                <span class="sl-practical__items__item__arrow">→</span>
            </a> <!-- Item  -->
            
            <?php endwhile; wp_reset_postdata(); ?>

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