
<?php
defined('ABSPATH') || exit;

$faq_section = $args['faq_section'];

$faq_section_title = $faq_section['faq_section_title'];
if (!empty($faq_section_title['title'])) :
?>
    <section class="cc-faqs">
        <div class="container small-container">

            <div class="section-title">
                <h2><?php echo esc_html($faq_section_title['title']); ?></h2>
                <?php if (!empty($faq_section_title['description'])) : ?>
                    <?php echo wp_kses_post($faq_section_title['description']); ?>
                <?php endif; ?>
            </div>

            <div class="cc-faqs__wrapper cc-accordion" role="list">
                <?php
                $faqs = $faq_section['faqs'];

                if ($faqs) :
                    $i = 0;
                    foreach ($faqs as $faq) :
                        $active_class = ($i === 0) ? 'open-body' : '';
                ?>
                        <div class="cc-faqs__wrapper__item accordion-item <?php echo $active_class; ?>" role="listitem">
                            <button class="cc-faqs__wrapper__item__question d-grid align-center accordion-head">
                                <h4 class="cc-faqs__wrapper__item__question__title">
                                    <span aria-hidden="true">Q.</span>
                                    <?php echo esc_html($faq['question']); ?>
                                </h4>
                                <span class="cc-faqs__wrapper__item__question__arrow flex-center cc-relative cc-transition" aria-hidden="true"></span>
                            </button>

                            <div class="cc-faqs__wrapper__item__answer margin-0 accordion-body">
                                <?php echo wp_kses_post($faq['answer']); ?>
                            </div>
                        </div>
                <?php
                    $i++;
                    endforeach;
                endif;
                ?>
            </div>

        </div>
    </section>
<?php
endif;
?>