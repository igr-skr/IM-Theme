<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package im-theme
 */
get_header(); ?>
<div id="primary" class="content-area kl-blog--layout-def_modern">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                echo do_shortcode('[ajax_load_more]');
                ?>
                <?php endwhile; else: ?>
<p><?php get_template_part( 'template-parts/content', 'none' ); ?></p>
<?php endif; ?>
                    

				
            		</div>
            	<?php //get_sidebar();?><!-- col-3 -->
            </div><!-- General row -->
    	</div><!-- Container -->
	</main>
</div>
<?php get_footer(); ?>