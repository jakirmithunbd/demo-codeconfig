<?php
function _acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-fields';
}
add_filter( 'acf/settings/save_json', '_acf_json_save_point' );

function _acf_json_load_point( $paths ) {
    unset( $paths[0] );

    $paths[] = get_stylesheet_directory() . '/acf-fields';

    return $paths;
}
add_filter( 'acf/settings/load_json', '_acf_json_load_point' );