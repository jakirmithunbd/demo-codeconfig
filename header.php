<?php

/**
 * Header Template
 * 
 * @package CodeConfig
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
get_template_part('template-parts/head');

$class_prefix = $args['class_prefix'] ?? '';
$logos = $args['logos'] ?? '';
$menu_name = $args['menu_name'];
$mobile_menu = $args['mobile_menu'] ?? "";
?>

<header id="cc-header" class="<?php echo esc_attr($class_prefix); ?>-header codeconfig-header sticky-hero sticky-bar">

    <div class="<?php echo esc_attr($class_prefix); ?>-container container">
        <div class="header-menu-wrap d-flex space-between align-center"> <!-- toggle-active -->
            <div class="logo-wrapper d-flex align-center space-between">
                <?php
                get_template_part('template-parts/logos/' . $logos);
                ?>
                <div class="bars toggler cc-relative hide-desktop ccp-mobile-menu-open">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            
            <div class="main-header-menu cc-transition <?php echo esc_attr($mobile_menu); ?>-mobile-menu">
                <div class="mobile-logo logo-wrapper d-flex align-center justify-start hide-desktop">
                    <?php
                    get_template_part('template-parts/logos/' . $logos);
                    ?>
                </div>
                <?php
                if (has_nav_menu($menu_name)) {
                    wp_nav_menu([
                        'theme_location' => $menu_name,
                        'menu_class' => 'main-menu cc-transition',
                        'container' => false,
                        'walker' => new CCWalkernav(),
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if (is_single()) { ?>
        <div class="cc-blog-reading-progress-bar cc-absolute"></div>
    <?php }; ?>
</header>