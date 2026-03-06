<?php defined( 'ABSPATH' ) || exit ;?>

<?php 
/**
 * Template Name: Services
 * */ 

get_header();

$data = [];

get_template_part('template-parts/hero', null, $data); 
?>

<?php 
$data = [
    'sub_title' => get_field('service_title') ? get_field('service_title') : '',
    'extra_class' => 'counter-list-secondary',
];

get_template_part('template-parts/service', null, $data); ?>

<?php 
$branding = get_field('branding') ;
$brandingData = [
    'sub_title' => !empty($branding['sub_title']) ? $branding['sub_title'] : '',
    'title' => !empty($branding['title']) ? $branding['title'] : '',
    'description' => !empty($branding['description']) ? $branding['description'] : '',
    'button' => !empty($branding['button']) ? $branding['button'] : '',
    'select_style' => !empty($branding['select_list_style']) ? $branding['select_list_style'] : '',
    'list_items' => !empty($branding['list_items']) ? $branding['list_items'] : [],
];

get_template_part('template-parts/branding', null, $brandingData) ;?>

<?php 
$cta = get_field('cta') ;
$ctaData = [
    'sub_title' => !empty($cta['sub_title']) ? $cta['sub_title'] : '',
    'title' => !empty($cta['title']) ? $cta['title'] : 'Votre situation mérite une lecture lucide.',
    'phone' => !empty($cta['phone']) ? $cta['phone'] : '022 512 76 00',
    'languages' => !empty($cta['languages']) ? $cta['languages'] : 'Genève & Lyon  ·  Français, English, Deutsch',
    'button' => !empty($cta['button']) ? $cta['button'] : [],
];
get_template_part('template-parts/cta', null, $ctaData) ;?>

<?php get_footer(); ?>