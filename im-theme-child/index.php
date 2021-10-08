<?php
/**
 * The template for displaying archive pages.
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
get_template_part( 'template-parts/content', 'category-single' );
endwhile; // End of the loop.
?>
        </main>
        <!-- #main -->
        <aside id="secondary" class="sticky site-sidebar col-lg-4 col-xl-3" role="complementary">
          <?php get_sidebar('blog'); ?>
        </aside>
        <!-- #secondary -->
      </div>
    </div>
    <!-- #primary -->
  </div>
  <!-- .col-full -->
</div>
<!-- #content -->
<?php get_footer(); ?>