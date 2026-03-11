
<?php
$faq_section = isset($args) ? $args : [];

$faq_section_title = $args['faq_section_title'];
if (!empty($faq_section_title['title'])) :
?>
    <section class="ccpigd-section cc-relative ccpigd-faq">
        <div class="ccpigd-container ccpigd-small-width">

            <div class="section-title-box text-center">
                <h2><?php echo esc_html($faq_section_title['title']); ?></h2>
                <?php if (!empty($faq_section_title['description'])) : ?>
                    <p><?php echo esc_html($faq_section_title['description']); ?></p>
                <?php endif; ?>
            </div>

            <div class="ccpigd-faq-wrapper d-flex flex-col cc-accordion" role="list">
                <?php
                $faqs = $args['faqs'];

                if ($faqs) :
                    $i = 0;
                    foreach ($faqs as $faq) :
                        $active_class = ($i === 0) ? 'accordion-active' : '';
                ?>
                        <div class="ccpigd-faq-item accordion-item <?php echo $active_class; ?>" role="listitem">
                            <button class="ccpigd-faq-question d-grid align-center accordion-head">
                                <h4 class="ccpigd-faq-question-title">
                                    <span aria-hidden="true">Q.</span>
                                    <?php echo esc_html($faq['question']); ?>
                                </h4>
                                <span class="ccpigd-dropdown-arrow flex-center cc-relative cc-transition" aria-hidden="true"></span>
                            </button>

                            <div class="ccpigd-faq-answer margin-0 accordion-body">
                                <?php echo wp_kses_post($faq['answer']); ?>
                            </div>
                        </div>
                <?php
                    $i++;
                    endforeach;
                endif;
                ?>
            </div><!-- /.ccpigd-faq-wrapper -->

        </div><!-- /.ccpigd-container -->
    </section>
<?php
endif;
?>