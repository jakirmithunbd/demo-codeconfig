<?php

function cc_theme_setup() {
    define('GET_THEME_URL', dirname(__FILE__));

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_theme_support('menus');

    register_nav_menus(
        [
            'header-menu'       => __('Header Menu', 'codeconfig'),
            'resources-menu'    => __('Resources Menu', 'codeconfig'),
            'company-menu'      => __('Company Menu', 'codeconfig'),
            'products-menu'     => __('Products Menu', 'codeconfig'),
            'dusky-menu'        => __('Dusky Menu', 'codeconfig'),
            'dropbox-menu'      => __('Dropbox Menu', 'codeconfig'),
            'eaw-menu'          => __('Essential Addons Menu', 'codeconfig'),
            'announcement-menu' => __('Announcement Bar Menu', 'codeconfig'),
            'google-drive-menu' => __('Google Drive Menu', 'codeconfig'),
            'accessiy-menu'     => __('Accessiy Menu', 'codeconfig'),
            'help-center'       => __('Help Center', 'codeconfig'),
            'igd-resources'     => __('IGD Resources', 'codeconfig'),
        ]
    );

    require_once GET_THEME_URL . '/core/config.php';
    require_once GET_THEME_URL . '/inc/helpers.php';
    require_once GET_THEME_URL . '/inc/enqueue.php';
    require_once GET_THEME_URL . '/inc/nav-walker.php';
    require_once GET_THEME_URL . '/inc/acf-localized.php';

    // disable gutenberg
    add_filter('use_block_editor_for_post', '__return_false', 10);
    
}
add_action('after_setup_theme', 'cc_theme_setup');
