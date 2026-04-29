
<?php
defined('ABSPATH') || exit;

$page_settings = get_field('page_settings');
$page_name = !empty($page_settings['select_product']) ? $page_settings['select_product'] : '';



$dataMaps = [
    'cc' => [
        'container_width' => 'half',
        'vertical_position' => 'bottom',
    ],

    'igd' => [
        'container_width' => 'half',
        'vertical_position' => 'top',
    ],
];


$config    = $dataMaps[$page_name] ?? [];

$container_width   = $config['container_width'] ?? 'half';      
$vertical_position = $config['vertical_position'] ?? 'bottom';


$footer_cta_section = get_field('footer_cta', 'option');
$footer_cta = $footer_cta_section[$page_name] ?? '';
?>

<section class="footer-cta <?php echo esc_attr($page_name . "-footer-cta"); ?> <?php echo esc_attr($vertical_position . "-position"); ?>">
    <div class="footer-cta__wrapper <?php if ($container_width === 'full') { echo esc_attr( "full-" ); } else { echo esc_attr( "" ); } ?>container">
        <div class="footer-cta__wrapper__inner <?php if ($container_width === 'full') { echo esc_attr( "container" ); } ?>">
            <div class="footer-cta__wrapper__inner__content">
                <?php if (!empty($footer_cta['title'])) : ?>
                <h2><?php echo wp_kses_post($footer_cta['title']); ?></h2>
                <?php endif;
                if (!empty($footer_cta['description'])) :
                echo wp_kses_post($footer_cta['description']); 
                endif; ?>
            </div>
            <div class="footer-cta__wrapper__inner__buttons btn-group">

                <?php if ($page_name === 'igd' || $page_name === 'idb' || $page_name === 'aml') : ?>
                    <?php if (!empty($footer_cta['pro_button']['url'])) : ?>
                        <a href="<?php echo esc_url($footer_cta['pro_button']['url']); ?>" class="feature-btn primary icon icon-crown" target="<?php echo esc_attr($footer_cta['pro_button']['target']); ?>"><?php echo esc_html($footer_cta['pro_button']['title']); ?></a>
                    <?php endif; ?>
                    <button class="ccp-free-download-btn feature-btn secondary icon icon-wordpress"><?php echo esc_html__('Download Free', 'codeconfig'); ?></button>

                <?php else: ?>
                    <?php if (!empty($footer_cta['pro_button']['url'])) : ?>
                    <a class="cc-btn btn-white btn-icon icon-right icon-bg-black" href="<?php echo esc_url($footer_cta['pro_button']['url']); ?>" target="<?php echo esc_attr($footer_cta['pro_button']['target']); ?>">
                        <span class="cc-btn-text"><?php echo esc_html($footer_cta['pro_button']['title']); ?></span>
                        <span class="cc-btn-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/explore-products-icon.svg')); ?>" alt="<?php echo esc_attr('Explore products icon'); ?>">
                        </span>
                    </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
