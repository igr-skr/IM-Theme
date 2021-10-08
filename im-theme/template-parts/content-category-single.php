<div
    class="kl-blog-item-container kl-blog--normal-post blog-post post-226 post type-post status-publish format-standard has-post-thumbnail hentry category-art prodpage-style3 "
    itemscope="itemscope"
    itemtype="https://schema.org/Blog">
    <div class="kl-blog-item-head-wrapper">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="zn_full_image kl-blog-full-image">
            <a
                href="<?php the_permalink(); ?>"
                class="kl-blog-full-image-link hoverBorder">
                <?php the_post_thumbnail( 'full', $attr ); ?></a>
        
        </div>
        <?php } ?>

    </div>
    <div class="kl-blog-item-title" itemprop="headline">
        <h3 class="itemTitle kl-blog-item-title" itemprop="headline">
            <a
                href="<?php the_permalink(); ?>"
                rel="bookmark"><?php the_title(); ?></a>
        </h3>
    </div>
    <div class="kl-blog-item-body clearfix">
        <div class="kl-blog-item-content kl-blog-fullimg clearfix">
            <?php the_excerpt(); ?>
        </div>

    </div>
</div>