<?php
$footer_cta = get_field('footer_cta', 'option');
$cc_footer_cta = $footer_cta['cc_footer_cta'];

if(!empty($cc_footer_cta['title'])):
?>
<section class="cc-footer-cta cc-relative cc-cta-default cta-container-width">
    <div class="cc-cta-default-wrap" style="background-image: url(<?php echo esc_url(get_theme_file_uri('/assets/images/Codeconfig-footer-top-bg.jpg')); ?>);">


        <div class="container flex-center space-between">
            <div class="content-side">
                <h2><?php echo esc_html($cc_footer_cta['title']); ?></h2>
                <?php if (!empty($cc_footer_cta['description'])) : ?>
                    <p><?php echo esc_html($cc_footer_cta['description']); ?></p>
                <?php endif; ?>
            </div>
            <div class="button-side">
                <?php if (!empty($cc_footer_cta['cta_pro_button']['url'])) : ?>
                <a href="<?php echo esc_url($cc_footer_cta['cta_pro_button']['url']); ?>" 
                target="<?php echo esc_attr($cc_footer_cta['cta_pro_button']['target'] ?? '_self'); ?>" 
                class="cc-btn white icon icon-right icon-window"
                >
                    <?php echo esc_html($cc_footer_cta['cta_pro_button']['title']); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section><!-- Cta Default  -->
<?php endif; ?>