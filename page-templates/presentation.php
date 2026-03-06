<?php defined('ABSPATH') || exit; ?>

<?php
/**
 * Template Name: Presentation
 * */

get_header();

$data = [];

get_template_part('template-parts/hero', null, $data);
?>

<?php $positioning = get_field('position'); ?>

<section class="apart-us">
    <div class="container">
        <div class="grid aprt-us-contents">

            <div class="col-lg-6 col-xs-12">
                <?php if (!empty($positioning['sub_title'])) : ?>
                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php echo esc_html($positioning['sub_title']); ?></span>
                </div>
                <?php endif; ?>


                <?php if (!empty($positioning['content'])) : ?>
                <div class="sl-section-title">
                    <?php echo wp_kses_post($positioning['content']); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 col-xs-12 grid apart-items">

            <?php $list = $positioning['list_item'];
            if (!empty($list)) : foreach ($list as $item) : ?>
                <div class="col-xs-12 apart-item">
                    <h3><?php echo esc_html($item['title']); ?></h3>
                    <p><?php echo esc_html($item['description']); ?></p>
                </div>
            <?php endforeach; endif; ?>

            </div>

        </div>
</section>

<?php $why_us = get_field('why_choose_us'); ?>
<section class="consultation">
    <div class="container">
        <div class="sl-section-title">

            <?php if (!empty($why_us['sub_title'])) : ?>    
            <div class="stylist-heading sl-flex">
                <div class="line"></div>
                <span><?php echo esc_html($why_us['sub_title']); ?></span>
            </div>
            <?php endif; ?>

            <?php if (!empty($why_us['title'])) : ?>
            <h2><?php echo wp_kses_post($why_us['title']); ?></h2>
            <?php endif; ?>

        </div>

        <div class="consult-list list grid">
            <?php if (!empty($why_us['list_item'])) : foreach ($why_us['list_item'] as $item) : ?>
            <div class="list__item col-lg-4 col-sm-6 col-xs-12">
                <h6><?php echo esc_html($item['title']); ?></h6>
                <p><?php echo wp_kses_post($item['description']); ?></p>
            </div>
            <?php endforeach; endif; ?>
        </div>

    </div>
</section>

<?php
$mission = get_field('mission');
$vision = get_field('vision');
?>
<section class="mission-vision">
    <div class="container">
        <div class="mission-vision-wrapper grid">
            <div class="mission col-md-6 col-xs-12">
                <?php if (!empty($mission['sub_title'])) : ?>
                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php echo esc_html($mission['sub_title']); ?></span>
                </div>
                <?php endif; ?>

                <?php if (!empty($mission['title'])) : ?>
                <h3><?php echo esc_html($mission['title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($mission['description'])) : ?>
                <?php echo wp_kses_post($mission['description']); ?>
                <?php endif; ?>

            </div>

            <div class="vision col-md-6 col-xs-12">
                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php echo esc_html($vision['sub_title']); ?></span>
                </div>

                <?php if (!empty($vision['title'])) : ?>
                <h3><?php echo esc_html($vision['title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($vision['description'])) : ?>
                <?php echo wp_kses_post($vision['description']); ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>

<?php $founders = get_field('founders'); ?>
<section class="founders">
    <div class="container">
        <div class="sl-section-title-wrapper sl-flex sl-justify-between">

            <?php if (!empty($founders['sub_title']) || !empty($founders['title'])) : ?>
            <div class="sl-section-title sl-flex-1">

                <?php if (!empty($founders['sub_title'])) : ?>
                <div class="stylist-heading"><span class="line"></span><?php echo esc_html($founders['sub_title']); ?></div>
                <?php endif; ?>

                <?php if (!empty($founders['title'])) : ?>
                <h2><?php echo wp_kses_post($founders['title']); ?></h2>
                <?php endif; ?>

            </div>
            <?php endif; ?>

            <?php if (!empty($founders['button'])) : ?>
            <a target="<?php echo esc_attr($founders['button']['target']); ?>" href="<?php echo esc_url($founders['button']['url']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($founders['button']['title']); ?> →</a>
            <?php endif; ?>

        </div>

        <?php $teams = $founders['team']; if (!empty($teams)) : ?>
        <div class="sl-partners-wrapper grid">
            
        <?php foreach ($teams as $team) : ?>
            <div class="sl-partner col-xs-12 col-md-6">
                <?php if (!empty($team['name'])) : ?>
                <h4 class="sl-partner__name"><?php echo esc_html($team['name']); ?></h4>
                <?php endif; ?>
                
                <?php if (!empty($team['role'])) : ?>
                <span class="sl-partner__role sl-uppercase sl-block"><?php echo wp_kses_post($team['role']); ?></span>
                <?php endif; ?>

                <?php if (!empty($team['area'])) : ?>
                <span class="sl-partner__languages sl-uppercase sl-block"><?php echo wp_kses_post($team['area']); ?></span>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

        </div>
        <?php endif; ?>
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