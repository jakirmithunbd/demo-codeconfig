<?php defined( 'ABSPATH' )  || exit ;?>

<section class="sl-cta">
    <div class="container">
        <div class="grid">
            <div class="sl-cta__content col-md-6 col-xs-12">

                <?php if (!empty($args['sub_title'])) : ?>
                <div class="stylist-heading secondary"><span class="line"></span><?php echo esc_html($args['sub_title']); ?></div>
                <?php endif; ?>

                <?php if (!empty($args['title'])) : ?>
                <h2><?php echo wp_kses_post($args['title']); ?></h2>
                <?php endif; ?>

            </div>
            <div class="sl-cta__contact col-md-6 col-xs-12">
                <?php if (!empty($args['phone'])) : ?>
                <a href="tel:<?php echo esc_attr($args['phone']); ?>" class="sl-cta__tel sl-flex sl-items-center relative"><?php echo esc_html($args['phone']); ?></a>
                <?php endif; ?>

                <?php if(!empty($args['languages'])) : ?>
                <span class="sl-cta__languages sl-block"><?php echo esc_html($args['languages']); ?></span>
                <?php endif; ?>

                <?php if (!empty($args['button'])) : ?>
                <a target="<?php echo esc_attr($args['button']['target']); ?>" href="<?php echo esc_url($args['button']['url']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($args['button']['title']); ?></a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>