
<?php
defined( 'ABSPATH' ) || exit ;

$page_name = $args['page_name'] ?? '';

if ( empty( $page_name ) ) {
    return;
}
$dataMaps = [
    'igd' => [
        'background_url' => get_theme_file_uri('assets/images/google-drive/Codeconfig-igd-banner-bg.png'),
    ],
];

$config    = $dataMaps[$page_name] ?? [];

$pro_button = get_field('igd_global', 'option');
$hero_contents = get_sub_field('banner_content');


if (!empty($hero_contents['title'])):
?>
<section class="feature-hero section-top">
    <div class="feature-hero__bg">
        <img src="<?php echo esc_url($config['background_url']); ?>"
                alt="<?php echo esc_attr__('Hero Background', 'demo-codeconfig'); ?>">
    </div>

    <div class="container">
        <div class="section-title">
            <span class="title-tag">
                <i></i>
                <span><?php echo esc_html__($hero_contents['sub_title'] ?? ''); ?></span>
            </span>

            <h1><?php echo wp_kses_post($hero_contents['title']) ?></h1>
            <?php if (!empty($hero_contents['description'])) : ?>
                <?php echo wp_kses_post($hero_contents['description']) ?>
            <?php endif; ?>

            <div class="btn-group">                        
                <button class="ccp-free-download-btn feature-btn primary icon icon-left icon-wordpress"><?php echo esc_html('Download Free', 'demo-codeconfig'); ?></button>
                <?php if (!empty($pro_button['pro_button']['url'])) : ?>
                <a href="<?php echo esc_url($pro_button['pro_button']['url'] ?? ''); ?>"
                    class="ccpigd-link-btn feature-btn secondary icon icon-crown"
                    target="<?php echo esc_attr($pro_button['pro_button']['target'] ?? '_self'); ?>">
                    <?php echo esc_html($pro_button['pro_button']['title'] ?? ''); ?>
                </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>