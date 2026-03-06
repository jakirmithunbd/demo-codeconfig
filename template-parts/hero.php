<?php defined( 'ABSPATH' ) || exit ;?>

<?php 

$class = isset($args['extra_class']) ? $args['extra_class'] : '' ;
$page_banner = get_field('page_banner', get_the_ID()) ;
?>

<section class="sl-hero <?php echo esc_attr($class); ?> relative">
    <div class="container">
        
        <div class="sl-hero__content">

            <?php if (!empty($page_banner['sub_title'])) : ?>
                <div class="stylist-heading sl-flex">
                    <div class="line"></div>
                    <span><?php echo esc_html($page_banner['sub_title']); ?></span>
                </div>
            <?php endif; ?>

            <?php if (!empty($page_banner['content'])) : ?>
                <?php echo wp_kses_post($page_banner['content']); ?>
            <?php endif; ?>
            
            <?php if (!empty($page_banner['button_1']) || !empty($page_banner['button_2'])) : ?>
            <div class="sl-hero__actions">
                <?php if (!empty($page_banner['button_1'])) : ?>
                <a target="<?php echo esc_attr($page_banner['button_1']['target']); ?>" href="<?php echo esc_url($page_banner['button_1']['url']); ?>" class="sl-btn"><?php echo esc_html($page_banner['button_1']['title']); ?> →</a>
                <?php endif; ?>

                <?php if (!empty($page_banner['button_2'])) : ?>
                <a target="<?php echo esc_attr($page_banner['button_2']['target']); ?>" href="<?php echo esc_url($page_banner['button_2']['url']); ?>" class="sl-btn sl-btn-black"><?php echo esc_html($page_banner['button_2']['title']); ?> →</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($page_banner['extra_heading'])) : ?>
            <div class="stylist-heading">
                <div class="dot big"></div>
                <span><?php echo esc_html($page_banner['extra_heading']); ?></span>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>