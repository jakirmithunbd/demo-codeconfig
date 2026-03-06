<?php 
defined('ABSPATH') || exit; // Exit if accessed directly

// support svg upload
function sentinelegal_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'sentinelegal_mime_types');