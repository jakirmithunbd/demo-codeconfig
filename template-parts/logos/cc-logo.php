
<div class="logos cc-logos d-flex align-center justify-start">
    <?php
    $ccLogo = get_field('cc_logo', 'options');
    $ccLogoUrl = isset($ccLogo['url']) ? $ccLogo['url'] : IMAGES_DIR . '/codeconfig-logo.svg';
    $ccLogoAlt = isset($ccLogo['title']) ?? 'CodeConfig Logo';
    ?>
    <a href="<?php echo esc_url(site_url()); ?>" class="cc-logo d-flex">
        <img class="cc-transition" src="<?php echo esc_url($ccLogoUrl); ?>" height="24" width="203"
            alt="<?php echo esc_attr($ccLogoAlt); ?>">
    </a>
</div>