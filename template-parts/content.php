<div class="col-md-4 col-xs-12">
    <div class="sl-post">
        <a href="<?php the_permalink(); ?>">
            <div class="sl-post__thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        </a>
        <div class="sl-post__content">
            <h3 class="sl-post__content__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="sl-post__content__excerpt">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="sl-post__content__read-more"><?php _e('Read More', 'sentinelegal'); ?></a>
        </div>
    </div>            
</div>