<?php

function codeconfigdemo_load_scripts()
{
    wp_enqueue_style('codeconfigdemo-style', get_stylesheet_uri(), [], _S_VERSION);

    wp_enqueue_style('codeconfigdemo-main', ASSETS_DIR . '/css/main.css', [], time(), 'all');

    wp_enqueue_script('codeconfigdemo_scripts', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'wp-util'], time(), true);

    $data = [
        'site_url' => get_template_directory_uri(),
        'preloader' => get_template_directory_uri() . '/assets/images/ajax-loader.gif',
        'admin_ajax' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sentinelegal_ajax_nonce'),
    ];


    wp_localize_script('codeconfigdemo_scripts', 'ajax', $data);
}
add_action('wp_enqueue_scripts', 'codeconfigdemo_load_scripts');
