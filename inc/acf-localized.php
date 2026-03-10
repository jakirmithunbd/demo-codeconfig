<?php
function cc_demo_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '../';
}
add_filter( 'acf/settings/save_json', 'cc_demo_acf_json_save_point' );

function cc_demo_acf_json_load_point( $paths ) {
    unset( $paths[0] );

    $paths[] = get_stylesheet_directory() . '/acf-fields';

    return $paths;
}
add_filter( 'acf/settings/load_json', 'cc_demo_acf_json_load_point' );