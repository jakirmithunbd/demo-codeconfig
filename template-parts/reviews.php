
<?php
defined( 'ABSPATH' ) || exit;
$page_name = $args['page_name'] ?? '';
if ( empty( $page_name ) ) {
    return;
}

$global_reviews  = get_field($page_name . '_global', 'option');
$feature_reviews = $global_reviews['reviews'] ?? [];

$fm_review_section_header = get_sub_field( 'reviews_content' );
if ( ! empty( $fm_review_section_header['title'] ) ) :
?>
<section class="feature-review">
    <div class="container">
        <div class="section-title">
            <?php if ( !empty( $fm_review_section_header['sub_title'] ) ) : ?>
            <span class="subtitle"><?php echo esc_html( $fm_review_section_header['sub_title'] ); ?></span>
            <?php endif; ?>
            <h2><?php echo wp_kses_post( $fm_review_section_header['title'] ); ?></h2>
        </div>
        <div class="feature-review-list cc-reviews">
            <?php
            if ( !empty( $feature_reviews ) ) :
            foreach ( $feature_reviews as $review ) :
            ?>
            <div class="feature-review-list__item cc-review-item">
                <div class="feature-review-list__item__rating"></div>
                <?php if ( !empty( $review['quote_title'] ) ) : ?>
                <h3><?php echo wp_kses_post( $review['quote_title'] ); ?></h3>
                <?php endif; 
                if (!empty($review['quote'])) :
                echo wp_kses_post( $review['quote'] );
                endif;
                ?>
                <div class="feature-review-list__item__client-info">
                    <?php if (!empty($review['photo']['url'])) : ?>
                    <div class="photo">
                        <img src="<?php echo esc_url( $review['photo']['url'] ); ?>" alt="<?php echo esc_attr( $review['photo']['alt'] ); ?>">
                    </div>
                    <?php endif; ?>
                    <div class="client-bio">
                        <span class="name"><?php echo esc_html( $review['name'] ); ?></span>
                        <span class="role"><?php echo esc_html( $review['role'] ); ?></span>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>