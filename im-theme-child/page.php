<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package im-theme
 */

get_header(); ?>

<div class="site-container container">
	<div class="site-container-inner">
		<div class="site-main-blocks grid-row">
			<div class="site-main-blocks-inner row">
				<main class="main-block order-lg-2 col-lg-8 col-xl-9" role="main">
          <?php
while ( have_posts() ) : the_post();
get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop.
?>
        		</main>
        		<aside id="secondary" class="site-sidebar col-lg-4 col-xl-3" role="complementary">
				<div class="sidebar__inner">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- #secondary -->
			<div class="clear"></div>

			</div>
		</div>
	</div>
</div>
<?php  get_footer(); ?>