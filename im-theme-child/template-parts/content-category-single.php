<div class="blog-item">
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="blog-full-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'full', $attr ); ?></a>
        </div>
        <?php } ?>

        <h3 class="itemTitle blog-item-title" itemprop="headline">
            <a
                href="<?php the_permalink(); ?>"
                rel="bookmark"><?php the_title(); ?></a>
        </h3>

    <div class="blog-item-body clearfix">
            <?php the_excerpt(); ?>
        </div>
</div>