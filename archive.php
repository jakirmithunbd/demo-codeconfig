<?php get_header(null, array(
    'class_prefix' => 'cc',
    'logos' => 'cc-logo',
    'menu_name' => 'header-menu',
));

$object_id = get_queried_object_id(); ?>

<section class="cc-common-hero cc-post-cat-hero relative text-center <?php echo (is_user_logged_in() && wp_is_mobile()) ? 'cc-user-logged-in' : ''; ?>">
    <div class="container">
        <div class="cc-section-title text-center">
            <h1><?php echo wp_kses_post(get_the_archive_title()); ?></h1>
        </div>
        <div class="cc-blog-subscribe-form subscribe-form">
            <?php get_template_part('/template-parts/brevo_subscribe_form'); ?>
        </div>
    </div>
</section>

<section class="blog-section">
    <div class="container relative">
        <div class="blog-head d-flex relative">
            <div class="blog-filter-menu d-flex align-center relative">
                <div class="tabs d-flex align-center hide-mobile">
                    <?php
                    $terms = get_categories();
                    if ($terms && !is_wp_error($terms)) {
                    ?>
                        <a href="/blog" class="tab-codeconfig-btn">All</a>
                    <?php
                        foreach ($terms as $term) {
                            $class = ($term->term_id == $object_id) ? 'active' : '';
                            printf(
                                '<a href="%s" class="tab-codeconfig-btn %s">%s</a>',
                                esc_url(get_term_link($term->term_id)),
                                esc_attr($class),
                                esc_html($term->name)
                            );
                        }
                    }
                    ?>
                </div>
                <select name="tabs" id="tabs-select" class="tabs-option hide-desktop hide-tab">
                    <option value="<?php echo esc_url(home_url('/blog')); ?>">
                        <?php esc_html_e('All', 'codeconfig'); ?>
                    </option>
                    <?php
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            printf(
                                '<option value="%s">%s</option>',
                                esc_url(get_term_link($term->term_id)),
                                esc_html($term->name)
                            );
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="cc-search-form d-flex space-between">
                <?php get_search_form(); ?>
            </div>
        </div>

        <div class="cc-blog d-flex flex-wrap">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => $paged,
            ];
            if (is_category()) {
                $args['cat'] = get_queried_object_id();
            }
            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()):
                    $loop->the_post();
            ?>
                    <div class="cc-blog-item">
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', ['class' => 'home_post_image']);
                                } ?>
                            </a>
                        </div>
                        <div class="post-details">
                            <div class="cc-post-meta d-flex flex-wrap align-center space-between">
                                <div class="cc-post-category">
                                    <ul>
                                        <?php
                                        $categories = get_the_category();
                                        if ($categories) {
                                            foreach ($categories as $category) {
                                                echo '<li>' . esc_html($category->name) . '</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="cc-post-date d-flex align-center space-between">
                                    <span class="date-icon">
                                        <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/date-icon.svg')); ?>"
                                            alt="<?php esc_attr_e('Post Date icon', 'codeconfig'); ?>">
                                    </span>
                                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                                </div>
                            </div>
                            <a class="post-title" href="<?php the_permalink(); ?>">
                                <h5><?php the_title(); ?></h5>
                            </a>
                            <p class="post-excerpt">
                                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 15)); ?>
                            </p>
                            <div class="blog-read-more">
                                <a href="<?php the_permalink(); ?>" class="cc-small-btn">
                                    <?php esc_html_e('Read More', 'codeconfig'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else: ?>
                <div class="entry-content notResult">
                    <h4 class="no-content text-center" style="padding: 0 0 50px; margin-top: 30px;">
                        <?php esc_html_e('No posts found!', 'codeconfig'); ?>
                    </h4>
                </div>
            <?php endif; ?>
        </div>

        <div class="cc-post-pagination flex-center">
            <?php
            echo paginate_links([
                'total' => $loop->max_num_pages,
                'current' => $paged,
                'prev_text' => __('', 'codeconfig'),
                'next_text' => __('', 'codeconfig'),
            ]);
            ?>
        </div>
    </div>
</section>

<!-- Default CTA -->
<?php get_template_part('/template-parts/footer_cta_default'); ?>
<!-- Default CTA -->

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