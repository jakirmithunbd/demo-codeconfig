
<!-- single page template file  -->
<?php
/**
 * Template Name: Single
 *
 * @package Demo_CodeConfig
 */

get_header(
    null,
    array(
        'class_prefix' => 'cc',
        'logos' => 'cc-logo',
        'menu_name' => 'header-menu',
        'mobile_menu' => 'full',
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