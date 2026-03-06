<!doctype html>
<html lang=<?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php 
    $fav_icon = get_field('logos', 'options');
    if (!empty($fav_icon['fav_icon'])): ?>
        <link rel="icon" href="<?php echo esc_url($fav_icon['fav_icon']['url']); ?>" sizes="32x32" />
    <?php endif; ?>

    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    <meta name="description"
        content="Sentinel Legal — Cabinet d'avocats à Genève et Lyon. Défense pénale, droit des affaires, technologies, contentieux. Intervention d'urgence 022 512 76 00." />
        
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
    <?php wp_body_open(); ?>

    <?php 
        $top_area = get_field('top_area', 'options'); 
        $logos = get_field('logos', 'options');
        $contacts = get_field('contacts', 'options');
    ?>

    <header class="header">
        <div class="header__topbar">
            <div class="container sl-flex-center sl-white">
                <div class="pulse-dot"></div>
                <?php if (!empty($top_area['text'])): ?>
                    <?php echo wp_kses_post($top_area['text']); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="header__menu-area sl-flex-between">
            <div class="container">
                <div class="header__menu-area-wrapper">

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="header__menu-area__logo">
                        <?php if (!empty($logos['main_logo'])): ?>
                            <img src="<?php echo esc_url($logos['main_logo']['url']); ?>" alt="<?php echo esc_attr($logos['main_logo']['alt']); ?>" class="header__logo-img" />
                        <?php endif; ?>
                    </a>

                    <nav class="header__menu-area__nav">

                        <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu([
                                    'theme_location' => 'primary',
                                    'menu_class' => 'header__menu-area__nav-list',
                                    'container' => false,
                                    'walker' => new CCWalkernav(),
                                ]);
                            }
                        ?>
                    </nav>
                    <div class="header__menu-area__cta">
                        <?php if (!empty($contacts['phone'])): ?>
                            <a href="tel:<?php echo esc_attr($contacts['phone']); ?>" class="sl-btn"><?php echo esc_html($contacts['phone']); ?></a>
                        <?php endif; ?>
                    </div>

                    <div class="menu-toggle">
                        <div class="menu-toggle__btn">
                            <span class="menu-toggle__bar"></span>
                            <span class="menu-toggle__bar"></span>
                            <span class="menu-toggle__bar"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="header_gutter"></div>