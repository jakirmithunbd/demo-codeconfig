
<?php
defined( 'ABSPATH' ) || exit ;


$feature_content = get_sub_field('feature_content');

?>
<section class="demo-feature <?php if ($feature_content['section_bg'] == "1") : ?>background<?php endif; ?>">
    <div class="container">
        <?php
        if (!empty($feature_content['title'])) : 
        ?>
        <div class="section-title">
            <?php if (!empty($feature_content['sub_title'])) : ?>
            <span class="subtitle"><?php echo esc_html($feature_content['sub_title']); ?></span>
            <?php endif; ?>

            <h2><?php echo esc_html($feature_content['title']); ?></h2>

            <?php 
            if (!empty($feature_content['description'])) :
            echo wp_kses_post($feature_content['description']); ?>
            <?php endif; ?>
        </div>
        <?php endif; ?> 
        
        <div class="demo-feature__wrapper grid">
            <?php
            $feature = $feature_content['select_feature'];

            if (!empty($feature)) :
                foreach ($feature as $single_feature) :
            ?>
                <div class="demo-feature__wrapper__item col-xs-12 col-md-6 col-lg-4">
                    
                    <?php 
                    $icon = get_field('feature_icon', $single_feature->ID);
                    if (!empty($icon)) : ?>
                        <div class="demo-feature__wrapper__item__icon">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['title']); ?>">
                        </div>
                    <?php endif; ?>

                    <div class="demo-feature__wrapper__item__name">
                        <h3><?php echo esc_html(get_the_title($single_feature->ID)); ?></h3>
                    </div>

                    <p>
                        <?php echo esc_html(get_the_excerpt($single_feature->ID)); ?>
                    </p>

                    <a href="<?php echo esc_url(get_permalink($single_feature->ID)); ?>" class="demo-feature__wrapper__item__link">
                        View Demo
                    </a>

                </div>
            <?php 
                endforeach; 
            endif; 
            ?>
        </div>
    </div>
</section>