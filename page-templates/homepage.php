<?php
defined('ABSPATH') || exit ;
/*
* Template Name: Homepage
*/
get_header(); ?>

<?php
$data = [];

get_template_part('template-parts/hero', null, $data);

$panel = get_field('panel') ;
$concrete = get_field('concrete') ;

?>
<section class="panel-features panel">
    <div class="container">
        <div class="panel__wrapper">

            <div class="panel__wrapper-content">
                <?php if (!empty($panel['sub_title'])) : ?>
                <div class="stylist-heading">
                    <div class="dot"></div>
                    <span><?php echo esc_html($panel['sub_title']); ?></span>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($panel['title'])) : ?>
                <h2 class="sl-heading"><?php echo wp_kses_post($panel['title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($panel['description'])) : echo wp_kses_post($panel['description']); endif ;?>
                
                <?php if (!empty($panel['tags'])) : ?>
                <div class="sl-list">
                    <?php foreach ($panel['tags'] as $item) : ?>
                        <span class="sl-list__item"><?php echo esc_html($item['text']); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($panel['button'])) : ?>
                <a target="<?php echo esc_attr($panel['button']['target']); ?>" href="<?php echo esc_url($panel['button']['url']); ?>" class="sl-btn sl-white"><?php echo esc_html($panel['button']['title']); ?></a>
                <?php endif; ?>
            </div>

            <div class="panel__wrapper-content panel__wrapper__panel-right">

            <?php if (!empty($concrete['sub_title'])) : ?>
                <span class="panel__wrapper__panel-right__subtitle"><?php echo esc_html($concrete['sub_title']); ?></span>
            <?php endif; ?>

                <?php if (!empty($concrete['quote'])) : ?>
                    <blockquote>
                        <?php echo wp_kses_post($concrete['quote']); ?>
                    </blockquote>
                <?php endif; ?>
                
                <?php if (!empty($concrete['quote_meta'])) : ?>
                <div class="s-penal-credential">
                    <?php echo wp_kses_post($concrete['quote_meta']); ?>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<?php
$service = get_field('service') ;
$data = [
    'sub_title' => !empty($service['sub_title']) ? $service['sub_title'] : '',
    'title' => !empty($service['title']) ? $service['title'] : '',
    'selected_services' => !empty($service['select_service']) ? $service['select_service'] : [],
];

get_template_part('template-parts/service', null, $data); ?>

<?php
$branding = get_field('branding') ;
$brandingData = [
    'sub_title' => !empty($branding['sub_title']) ? $branding['sub_title'] : '',
    'title' => !empty($branding['title']) ? $branding['title'] : '',
    'description' => !empty($branding['description']) ? $branding['description'] : '',
    'button' => !empty($branding['button']) ? $branding['button'] : '',
    'select_style' => !empty($branding['select_list_style']) ? $branding['select_list_style'] : '',
    'list_items' => !empty($branding['list_items']) ? $branding['list_items'] : [],
];

get_template_part('template-parts/branding', null, $brandingData) ;?>


<?php $process = get_field('process') ;?>
<section class="process">
    <div class="container">        

        <?php if (!empty($process['sub_title']) || !empty($process['title'])) : ?>
        <div class="sl-section-title">
            <?php if (!empty($process['sub_title'])) : ?>
            <div class="stylist-heading"><span class="line"></span>Notre approche</div>
            <?php endif; ?>

            <?php if (!empty($process['title'])) : ?>
            <h2><?php echo wp_kses_post($process['title']); ?></h2>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($process['list_items'])) : ?>
        <div class="process__list grid">

            <?php foreach ($process['list_items'] as $item) : ?>
            <div class="counter-list__item col-xs-12 col-sm-6 col-lg-3">
                <h6><?php echo esc_html($item['title']); ?></h6>
                <p><?php echo esc_html($item['description']); ?></p>
            </div>
            <?php endforeach; ?>
            
        </div>
        <?php endif; ?>
    </div>
</section>

<section class="partners">
    <div class="container">

        <?php $team = get_field('team'); ?>                    

        <div class="sl-section-title-wrapper sl-flex sl-justify-between">
            <div class="sl-section-title sl-white sl-flex-1">

                <?php if (!empty($team['sub_title'])) : ?>
                <div class="stylist-heading"><span class="line"></span><?php echo esc_html($team['sub_title']); ?></div>
                <?php endif; ?>

                <?php if (!empty($team['title'])) : ?>
                <h2><?php echo esc_html($team['title']); ?></h2>
                <?php endif; ?>

                <?php if (!empty($team['secondary_title'])) : ?>
                <h3 class="sl-italic"><?php echo esc_html($team['secondary_title']); ?></h3>
                <?php endif; ?>
                
            </div>

            <?php if (!empty($team['button'])) : ?>
            <a target="<?php echo esc_attr($team['button']['target']); ?>" href="<?php echo esc_url($team['button']['url']); ?>" class="sl-btn"><?php echo esc_html($team['button']['title']); ?> →</a>
            <?php endif; ?>
        </div>

        <div class="sl-partners-wrapper grid">

        <?php $members = get_field('members', 'options');

if (!empty($members)) : foreach ($members as $member) : ?>

            <div class="sl-partner col-xs-12 col-lg-6">

                <?php if (!empty($member['image'])) : ?>
                <img src="<?php echo esc_url($member['image']['url']); ?>" alt="<?php echo esc_attr($member['image']['title']); ?>"/>
                <?php endif; ?>

                <?php if (!empty($member['name'])) : ?>
                <h4 class="sl-partner__name"><?php echo esc_html($member['name']); ?></h4>
                <?php endif; ?>

                <?php if (!empty($member['position'])) : ?>
                <span class="sl-partner__role sl-uppercase sl-block"><?php echo esc_html($member['position']); ?></span>
                <?php endif; ?>

                <?php if (!empty($member['languages'])) : ?>
                <span class="sl-partner__languages sl-uppercase sl-block"><?php echo esc_html($member['languages']); ?></span>
                <?php endif; ?>

                <?php if (!empty($member['description'])) : ?>
                <p><?php echo esc_html($member['description']); ?></p>
                <?php endif; ?>
                </p>

                <?php if (!empty($member['email']) || !empty($member['linkedin'])) : ?>
                <div class="sl-partner__contact sl-flex sl-flex-wrap">

                    <?php if (!empty($member['email'])) : ?>
                    <a href="mailto:<?php echo esc_attr($member['email']); ?>">Email →</a>
                    <?php endif; ?>

                    <?php if (!empty($member['linkedin'])) : ?>
                    <a target="_blank" href="<?php echo esc_url($member['linkedin']); ?>">LinkedIn →</a>
                    <?php endif; ?>

                </div>
                <?php endif; ?>
            </div>

            <?php endforeach; endif; ?>

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

<?php get_footer(); ?>
