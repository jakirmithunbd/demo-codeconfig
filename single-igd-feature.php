
<!-- single igd feature page template file  -->
<?php
/**
 * Template Name: Single IGD Feature
 *
 * @package Demo_CodeConfig
 */

get_header(
    null,
    array(
        'class_prefix' => 'ccpigd',
        'logos' => 'igd-logo',
        'menu_name' => 'google-drive-menu',
        'mobile_menu' => '',
    )
)
?>

<!-- Hero Section Start -->
<section class="ccpigd-section ccpigd-hero-section ccpigd-section-top cc-relative ccpigd-single-feature-section">
    <div class="ccpigd-hero-section-bg cc-absolute">
        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/google-drive/Codeconfig-igd-banner-bg.png')); ?>"
                alt="<?php echo esc_attr__('Hero Background', 'demo-codeconfig'); ?>">
    </div>

    <?php $hero_contents = get_field('hero_contents'); ?>

    <div class="ccpigd-container">
        <div class="ccpigd-row d-flex align-center">
            <div class="content-box">
                <div class="ccpigd-hero-content-box section-title-box">
                    <span class="ccpigd-hero-sub-title d-flex align-center">
                        <i class="flex-center">
                            <img src="<?php echo esc_url(get_theme_file_uri('assets/images/google-drive/shield_lock.svg')); ?>" alt="Security icon" width="24" height="24">
                        </i>
                        <?php echo esc_html__($hero_contents['title_tag'] ?? ''); ?>
                    </span>

                    <h1><?php echo get_the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p><?php echo get_the_excerpt(); ?></p>
                    <?php endif; ?>

                    <div class="ccpigd-btn-group">
                        <!-- Left Button start -->
                        <a href="<?php echo esc_url($hero_contents['pro_button']['url'] ?? ''); ?>"
                            class="ccpigd-link-btn ccpigd-btn primary icon icon-crown"
                            target="<?php echo esc_attr($hero_contents['pro_button']['target'] ?? '_self'); ?>">
                            <?php echo esc_html($hero_contents['pro_button']['title'] ?? ''); ?>
                        </a>
                        <!-- Left Button end -->

                        <!-- Right Button start -->
                        <button class="ccp-free-download-btn ccpigd-btn secondary white icon icon-right icon-arrow"><?php echo esc_html('Download Free', 'demo-codeconfig'); ?></button>
                        <!-- Right Button end -->
                    </div><!-- Button Group -->

                </div>
            </div>
            <div class="image-box flex-center">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<?php
$igd_feature = get_field('igd_feature');
if ($igd_feature) :
?>
    <!-- Feature Section Start -->
    <section class="ccpigd-section cc-relative z-index-plus-1 ccpigd-demo-feature">
        <div class="ccpigd-container">
            <div class="demo-feature-list d-flex flex-wrap">
                <?php
                foreach ($igd_feature as $feature) :
                ?>
                    <div class="demo-feature-item">
                        <div class="text-center">
                            <?php if (!empty($feature['title'])) : ?>
                                <h3><?php echo esc_html($feature['title']); ?></h3>
                            <?php
                            endif;
                            if (!empty($feature['description'])) :
                            ?>
                                <p><?php echo esc_html($feature['description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="demo-feature-shortcode flex-center">
                            <?php
                            $feature_type = $feature['feature_type'];

                            if ($feature_type === 'short_code') :
                                echo do_shortcode($feature['short_code']);

                            elseif ($feature_type === 'image') :
                            ?>
                                <img src="<?php echo esc_url($feature['feature_image']['url']); ?>" alt="<?php echo esc_attr($feature['feature_image']['alt']); ?>" />
                            <?php
                            elseif ($feature_type === 'content') :
                            ?>
                                <div class="igd-feature-content">
                                    <?php
                                    echo wp_kses_post($feature['feature_content']);
                                    ?>
                                </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
    </section>
<?php
endif;
?>
<!-- Feature Section End -->

<!-- FAQ Section Start -->
<?php
$faq_section = get_field('faq_section');

$faqData = [
    'faq_section_title' => !empty($faq_section['faq_section_title']) ?$faq_section['faq_section_title'] : '',
    'faqs' => !empty($faq_section['faqs']) ? $faq_section['faqs'] : '',
];

get_template_part('template-parts/faq', null, $faqData);
?>


<!-- FAQ Section End -->




<!-- Default CTA -->
<?php get_template_part('/template-parts/footer/footer-cta-igd'); ?>
<!-- Default CTA -->

<?php 
get_footer(null, array(
    'class_prefix' => 'ccpigd',
    'logos' => 'igd-logo',
    'footer_description' => 'igd-footer-description',
    'first_menu_title' => 'Company',
    'first_menu_name' => 'company-menu',
    'second_menu_title' => 'Resources',
    'second_menu_name' => 'igd-resources',
    'payment_logos' => 'light',
    'footer_perticles' => '',
    'popup' => 'igd-download-popup',
)); 
?>