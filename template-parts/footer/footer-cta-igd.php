<?php
$footer_cta = get_field('footer_cta', 'option');
$igd_footer_cta = $footer_cta['igd_footer_cta'];

if(!empty($igd_footer_cta['title'])):
?>
<section class="ccpigd-section ccpigd-footer-cta cc-relative">
    <div class="ccpigd-container">
        <div class="ccpigd-footer-cta-wrapper text-center cc-relative">

                <div class="section-title-box text-center">
                    <h3><?php echo esc_html($igd_footer_cta['title']); ?></h3>
                    <?php if (!empty($igd_footer_cta['description'])) : ?>
                        <p><?php echo esc_html($igd_footer_cta['description']); ?></p>
                    <?php endif; ?>
                </div>

            <div class="ccpigd-btn-group">
                <button class="ccp-free-download-btn ccpigd-btn secondary icon icon-wordpress">Free Download</button>
                <?php if (!empty($igd_footer_cta['cta_pro_button']['url'])) : ?>
                <a class="ccpigd-link-btn ccpigd-btn primary icon icon-crown" 
                href="<?php echo esc_url($igd_footer_cta['cta_pro_button']['url']); ?>"
                target="<?php echo esc_attr($igd_footer_cta['cta_pro_button']['target'] ?? '_self'); ?>"
                >
                <?php echo esc_html($igd_footer_cta['cta_pro_button']['title']); ?>
                </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>