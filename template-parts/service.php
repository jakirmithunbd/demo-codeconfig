<?php defined('ABSPATH') || exit ;?>

<section class="service <?php echo isset($args['extra_class']) ? esc_attr($args['extra_class']) : ''; ?>">
    <div class="container">
        <div class="sl-section-title">
            <?php if(!empty($args['sub_title'])) : ?>
            <div class="stylist-heading secondary"><span class="line"></span><?php echo esc_html($args['sub_title']); ?></div>
            <?php endif; ?>

            <?php if(!empty($args['title'])) : ?>
            <h2><?php echo esc_html($args['title']); ?></h2>
            <?php endif; ?>
        </div>

        <div class="counter-list ">
            <?php if(!empty($args['selected_services'])) : ?>
                <?php foreach($args['selected_services'] as $service) : ?>
                    <a href="<?php echo get_the_permalink($service->ID); ?>" class="counter-list__item">
                        <h6><?php echo esc_html($service->post_title); ?></h6>
                        <p><?php echo esc_html($service->post_excerpt); ?></p>
                        <span class="arrow">→</span>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <?php 
                $all_services = get_posts([
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ]);
                ?>
                <?php foreach($all_services as $service) : ?>
                    <a href="<?php echo get_the_permalink($service->ID); ?>" class="counter-list__item">
                        <h6><?php echo esc_html($service->post_title); ?></h6>
                        <p><?php echo esc_html($service->post_excerpt); ?></p>

                        <?php $categories = get_the_terms($service->ID, 'service-tags'); ;?>
                        <div class="sl-list sl-list-with-bg">
                            <?php if ($categories && !is_wp_error($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <span class="sl-list__item"><?php echo esc_html($category->name); ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <span class="arrow"><?php _e('Découvrir', domain: 'sentinelegal') ;?> →</span>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>