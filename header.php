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
$page_name = $args['page_name'] ?? 'cc';

get_template_part('template-parts/head', null, ['page_name' => $page_name]);






$dataMaps = [
    'igd' => [
        'class_prefix' => 'igd',
        'logos'        => 'igd-logo',
        'menu_name'    => 'google-drive-menu',
        'mobile_menu'      => 'half',
    ],
    'idb' => [
        'class_prefix' => 'idb',
        'menu_name'    => 'dropbox-menu',
        'container'      => 'contain',
    ],

    'aml' => [
        'class_prefix' => 'aml',
        'menu_name'    => 'aml-menu',
        'container'      => 'contain',
    ],
];


$config    = $dataMaps[$page_name] ?? [];

$class_prefix = $config['class_prefix'] ?? 'cc';      
$logos        = $config['logos']        ?? 'cc-logo';
$menu_name    = $config['menu_name']    ?? 'header-menu';
$mobile_menu  = $config['mobile_menu']  ?? 'full';
?>



<header id="cc-header" class="<?php echo esc_attr($class_prefix); ?>-header codeconfig-header sticky-hero sticky-bar">

    <div class="container">
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