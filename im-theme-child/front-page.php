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
					<?php if( class_exists('ACF') && get_field('home_categories_block') ): ?>

					<?php the_field('home_categories_block'); ?>

				<?php endif; ?>






			</main><!-- #main -->

			<aside id="secondary" class="site-sidebar col-lg-4 col-xl-3" role="complementary">
				<div class="sidebar__inner">
					<?php get_sidebar(); ?>
				</div>
			</aside><!-- #secondary -->
		</div>

	</div><!-- #primary -->
	<div class="second-text-editor">


		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'home' );

			endwhile; // End of the loop.
			?>	


		</div>
	</div><!-- .col-full -->
</div><!-- #content -->


<?php get_footer(); ?>