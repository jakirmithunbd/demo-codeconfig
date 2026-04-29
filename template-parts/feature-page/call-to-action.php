<?php
defined ( 'ABSPATH' ) || exit ;

$page_name = $args['page_name'] ?? '';

if ( empty( $page_name ) ) {
    return;
}
?>

<?php
$call_to_action_content = get_sub_field('call_to_action_content');

if (!empty($call_to_action_content['title'])) : ?>
<section class="footer-cta <?php echo esc_attr($page_name . "-footer-cta"); ?>">
    <div class="container footer-cta__wrapper">
        <div class="footer-cta__wrapper__inner">

            <div class="footer-cta__wrapper__inner__content">
                <h2><?php echo wp_kses_post($call_to_action_content['title']); ?></h2>
                <?php
                if (!empty($call_to_action_content['description'])) :
                echo wp_kses_post($call_to_action_content['description']); 
                endif; ?>
            </div>

            <div class="footer-cta__wrapper__inner__buttons btn-group">

                <?php if (!empty($call_to_action_content['button']['url'])) : ?>
                    <a 
                    href="<?php echo esc_url($call_to_action_content['button']['url']); ?>" 
                    class="feature-btn primary icon icon-category-search" 
                    target="<?php echo esc_attr($call_to_action_content['button']['target']); ?>">
                        <?php echo esc_html($call_to_action_content['button']['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>