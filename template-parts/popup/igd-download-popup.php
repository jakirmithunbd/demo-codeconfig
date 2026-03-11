
<?php
$global_popup_section = get_field('google_drive_area', 'option');
$download_popup_box = $global_popup_section['download_popup'] ?? [];
$ccp_free_download_link = $download_popup_box['ccp_free_download'];

if (!empty($ccp_free_download_link)):

    $ccp_free_download_link_url = $ccp_free_download_link['url'];
    $free_download_form = $download_popup_box['form_id'] ?? '';
?>
    <section class="ccpigd-section ccp-download-popup-section ccpigd-download-popup-section flex-center cc-transition"
        role="dialog"
        aria-modal="true"
        aria-labelledby="download-popup-title"
        aria-hidden="true">
        <div class="ccp-download-popup cc-relative">
            <button class="d-flex align-center cc-absolute ccp-popup-close-btn ccp-popup-close"
                type="button"
                aria-label="<?php echo esc_attr__('Close popup', 'codeconfig'); ?>">
            </button>

            <div class="text-center ccp-download-popup-content cc-relative">
                <?php
                ?>
                <h3 id="download-popup-title"><?php echo esc_html($download_popup_box['title'] ?? ''); ?></h3>
                <p><?php echo esc_html($download_popup_box['description'] ?? ''); ?></p>
                <a style="display: none;" class="" id="ccp-free-download-link-url" href="<?php echo esc_url($ccp_free_download_link_url); ?>">hidden</a>

                <div class="free-downolad-form">
                    <?php if (!empty($free_download_form)): ?>
                        <?php echo do_shortcode($free_download_form); ?>
                    <?php elseif (!empty($ccp_free_download_link_url)): ?>
                        <a href="<?php echo esc_url($ccp_free_download_link_url, array('http', 'https')); ?>"
                            class="ccpigd-btn primary icon icon-wordpress field-btn ccp-popup-close-btn"
                            <?php if (($ccp_free_download_link['target'] ?? '_self') === '_blank'): ?>
                            target="_blank" rel="noopener noreferrer"
                            <?php endif; ?>>
                            <?php echo esc_html($ccp_free_download_link['title'] ?? __('Download Free', 'codeconfig')); ?>
                        </a>
                    <?php else: ?>
                        <?php if (current_user_can('manage_options')): ?>
                            <p class="text-center" style="color: #e1f2a6;">
                                <?php echo esc_html__('Please set download link or form in theme options.', 'codeconfig'); ?>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>