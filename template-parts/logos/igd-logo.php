
<div class="logos igd-logos d-flex align-center justify-start">
    <!-- CodeConfig Logo -->
    <a class="cc-logo flex-center"
        href="<?php echo esc_url(home_url('/')); ?>"
        aria-label="<?php echo esc_attr__('CodeConfig Home', 'codeconfig'); ?>">
        <img src="<?php echo esc_url(IMAGES_DIR . '/Codeconfig-icon.svg'); ?>"
            alt="<?php echo esc_attr__('CodeConfig', 'codeconfig'); ?>"
            width="40"
            height="40">
    </a>

    <span class="logo-divider" aria-hidden="true"></span>

    <!-- Google Drive Integration Logo -->
    <a class="ccp-google-drive-logo d-flex align-center margin-0"
        href="<?php echo esc_url(home_url('/integration-google-drive')); ?>"
        aria-label="<?php echo esc_attr__('Integration for Google Drive', 'codeconfig'); ?>">
        <img src="<?php echo esc_url(IMAGES_DIR . '/ccp-google-drive/integration_for_google_drive.svg'); ?>"
            alt="<?php echo esc_attr__('Integration for Google Drive', 'codeconfig'); ?>"
            width="50"
            height="50">
        <div class="logo-label d-flex flex-col align-start text-left hide-mobile">
            <span><?php echo esc_html__('INTEGRATION FOR', 'codeconfig'); ?></span>
            <h6><?php echo esc_html__('GOOGLE DRIVE', 'codeconfig'); ?></h6>
        </div>
    </a>
</div><!-- /.logos -->