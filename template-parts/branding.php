<?php defined('ABSPATH') || exit ;?>

<section class="branding">
    <div class="container grid">
        <div class="col-md-6 col-xs-12">
            <div class="branding__content">

                <?php if (!empty($args['sub_title']) || !empty($args['title'])) : ?>
                <div class="sl-section-title">
                    <div class="stylist-heading"><span class="line"></span><?php echo esc_html($args['sub_title']); ?></div>

                    <h2 class="sl-white"><?php echo wp_kses_post($args['title']); ?></h2>
                </div>
                <?php endif; ?>

                <?php if (!empty($args['description'])) : ?>
                <p class="sl-white"><?php echo wp_kses_post($args['description']); ?></p>
                <?php endif; ?>

                <?php if (!empty($args['button'])) : ?>
                <a target="<?php echo esc_attr($args['button']['target']); ?>" href="<?php echo esc_url($args['button']['url']); ?>" class="sl-btn"><?php echo esc_html($args['button']['title']); ?> →</a>
                <?php endif; ?>

            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <?php if (!empty($args['list_items'])) : ?>
            <div class="list <?php echo esc_attr($args['select_style'] === 'style2' ? 'list__style-2' : ''); ?>">
                <?php foreach ($args['list_items'] as $item) : ?>
                <div class="list__item">
                    <h6><?php echo esc_html($item['title']); ?></h6>
                    <?php echo wp_kses_post($item['description']); ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>