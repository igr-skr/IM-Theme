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
Page shop
<?php
    /**
   * woocommerce_before_shop_loop hook
     *
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
    */
    do_action( 'woocommerce_before_shop_loop' );
?>

<?php woocommerce_product_loop_start(); ?>
 
    <?php woocommerce_product_subcategories(); ?>
 
    <?php while ( have_posts() ) : the_post(); ?>
 
        <?php wc_get_template_part( 'content', 'product' ); ?>
 
    <?php endwhile; // end of the loop. ?>
 
<?php woocommerce_product_loop_end(); ?>

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
<!-- #main -->
<aside id="secondary" class="sticky site-sidebar col-lg-4 col-xl-3" role="complementary">
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