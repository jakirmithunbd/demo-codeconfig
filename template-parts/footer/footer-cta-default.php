
<?php
$footer_cta = get_field('footer_cta', 'options');
$cta_default = $footer_cta['default'] ?? '';

if (!empty($cta_default['button'])): // Check if the array is not empty
?>

    <section class="cc-footer-cta cc-relative cc-cta-default cta-container-width">
        <div class="cc-cta-default-wrap" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/Codeconfig-footer-top-bg.jpg')); ?>);">


            <div class="container flex-center space-between">
                <div class="content-side">
                    <h2><?php esc_html_e($cta_default['title'] ?? ""); ?></h2>
                    <p>
                        <?php esc_html_e($cta_default['description'] ?? ""); ?>
                    </p>
                </div>
                <div class="button-side">
                    <a class="cc-btn btn-white btn-icon icon-right icon-bg-black" href="<?php echo esc_url($cta_default['button']['url'] ?? "#"); ?>" target="<?php echo esc_attr($cta_default['button']['target'] ?? ""); ?>">
                        <span class="cc-btn-text"><?php esc_html_e($cta_default['button']['title'] ?? ""); ?></span>
                        <span class="cc-btn-icon">
                            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/explore-products-icon.svg')); ?>" alt="<?php echo esc_attr('Explore products icon'); ?>">
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section><!-- Cta Default  -->
<?php endif; ?>