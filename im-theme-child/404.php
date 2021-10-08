<?php
/**
 * The template for displaying 404 pages (not found).

 *

 * @link https://codex.wordpress.org/Creating_an_Error_404_Page

 *

 * @package im-theme

 */
get_header(); ?>
<div class="site-container container">
  <div class="site-container-inner">
    <div class="intro-homepage page-id-18">
      <div class="intro-homepage-inner">
        <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'storefront' ); ?></h1>
      </div>
    </div>
    <div class="site-main-blocks grid-row">
      <div class="site-main-blocks-inner">
        <main class="main-block order-lg-2 col-lg-8 col-xl-9" role="main">
          <?php get_template_part( 'template-parts/content', 'page-nf' );	?>
        </main>
        <!-- #main -->
        <aside id="secondary" class="site-sidebar col-lg-4 col-xl-3" role="complementary">
          <?php get_sidebar(); ?>
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