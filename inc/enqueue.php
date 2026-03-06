<?php

function sentinelegal_load_scripts()
{
    wp_enqueue_style('sentinelegal-style', get_stylesheet_uri(), [], _S_VERSION);

    wp_enqueue_style('sentinelegal-main', ASSETS_DIR . '/css/main.css', [], time(), 'all');

    wp_enqueue_script('sentinelegal_scripts', get_template_directory_uri() . '/assets/js/scripts.js', ['jquery', 'wp-util'], time(), true);

    $data = [
        'site_url' => get_template_directory_uri(),
        'preloader' => get_template_directory_uri() . '/assets/images/ajax-loader.gif',
        'admin_ajax' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sentinelegal_ajax_nonce'),
    ];


    wp_localize_script('sentinelegal_scripts', 'ajax', $data);
}
add_action('wp_enqueue_scripts', 'sentinelegal_load_scripts');
