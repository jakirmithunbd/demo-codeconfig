<?php
get_header(
    null,
    array(
        'class_prefix' => 'cc',
        'logos' => 'cc-logo',
        'menu_name' => 'header-menu',
    )
);
?>

<section class="cc-common-hero cc-blog-hero relative text-center <?php echo (is_user_logged_in() && wp_is_mobile()) ? 'cc-user-logged-in' : ''; ?>">
    <div class="container">

        <div class="cc-per-triangle color-pink-deep"></div>
        <div class="cc-per-capsule color-pink"></div>
        <div class="cc-per-star color-blue"></div>
        <div class="cc-per-circle color-blue"></div>

        <div class="cc-section-title text-center">
            <h1><?php printf(__('Search Results for: <span>%s</span>', 'codeconfig'), esc_html(get_search_query())); ?></h1>
        </div>
    </div>
</section>

<section class="blog-section">
    <div class="container relative">
        <?php if (have_posts()) : ?>
            <div class="cc-blog d-flex flex-wrap">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="cc-blog-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-details">
                            <div class="cc-post-meta d-flex flex-wrap align-center space-between">
                                <div class="cc-post-category">
                                    <ul>
                                        <?php
                                        $categories = get_the_category();
                                        if (! empty($categories)) :
                                            foreach ($categories as $category) :
                                        ?>
                                                <li><?php echo esc_html($category->name); ?></li>
                                            <?php endforeach;
                                        else : ?>
                                            <li><?php esc_html_e('No category', 'codeconfig'); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <div class="cc-post-date d-flex align-center space-between">
                                    <span class="date-icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/date-icon.svg')); ?>" alt="<?php esc_attr_e('Codeconfig Post Date icon', 'codeconfig'); ?>">
                                    </span>
                                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                                </div>
                            </div>

                            <a class="post-title" href="<?php the_permalink(); ?>">
                                <h5><?php echo esc_html(get_the_title()); ?></h5>
                            </a>

                            <p class="post-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?></p>

                            <div class="blog-read-more">
                                <a href="<?php the_permalink(); ?>" class="cc-small-btn">
                                    <?php esc_html_e('Read More', 'codeconfig'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="cc-post-pagination flex-center">
                <?php
                the_posts_pagination(array(
                    'prev_text' => __('', 'codeconfig'),
                    'next_text' => __('', 'codeconfig'),
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="cc-no-results text-center">
                <h2><?php esc_html_e('Nothing Found', 'codeconfig'); ?></h2>
                <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'codeconfig'); ?></p>

                <div class="result-search-form relative">
                    <div class="cc-search-form d-flex space-between">
                        <?php get_search_form(); ?>
                        <span class="cc-search-icon cc-search-toggle"></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_template_part('/template-parts/footer_cta_default'); ?>

<?php 
get_footer(null, array(
    'class_prefix' => 'cta-on-footer cc',
    'logos' => 'cc-logo',
    'footer_description' => 'cc-footer-description',
    'first_menu_title' => 'Company',
    'first_menu_name' => 'company-menu',
    'second_menu_title' => 'Resources',
    'second_menu_name' => 'resources-menu',
    'payment_logos' => 'colorful',
    'footer_perticles' => 'cc-perticles',
    'popup' => '',
)); 
?>