<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> >
	<div id="page" class="mm-page mm-slideout">
		<div class="wrapper site-wrap" id="site_wrap">
			<div class="col-full"><div class="site-top-bar container visible-lg-flex visible-xl-flex">
				<div class="site-top-bar-inner">
          <?php wp_nav_menu( array('theme_location' => 'menu-top-left-nav','container_class' => 'left-links','menu_id' => 'menu-top-left-nav') ); ?>

          <?php //if ( is_active_sidebar( 'lang-switch' ) ) : ?>
          <div class="right-links account-control-links">
            <?php dynamic_sidebar( 'lang-switch' );
            //do_action('wpml_add_language_selector');
            ?>
          </div>
          <?php //endif; ?>

        </div>
      </div><!-- .site-top-bar -->		<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
      <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    </div>
    <header class="sticky site-header grid-row" id="site_header">
     <div class="site-header-inner">

      <div class="responsive-toggles-left hidden-lg hidden-xl">

       <div class="overlay">
        <?php wp_nav_menu( array('theme_location' => 'menu-main-iconic','container'       => 'nav', 'container_class' => 'overlayMenu') ); ?>
      </div>

      <div class="navBurger" role="navigation" id="navToggle"></div> 

      <label class="toggle-label">
        <input class="search-toggle" type="checkbox">
        <span id="toggle-search" class="responsive-search-toggle visible-xs visible-sm">
         <svg class="icon icon-magnifying-glass"><use xlink:href="#magnifying-glass"></use></svg>
         <div class="top-searchform col-sm-3 hidden-xs hidden-sm">
          <form action="https://swemed.co.uk/shop/" method="get" role="search">
           <input data-hj-whitelist="" data-swplive="true" type="text" name="s" value="" placeholder="Search products..." autocomplete="off">
           <span class="btn--search"><svg class="icon icon-magnifying-glass"><use xlink:href="#magnifying-glass"></use></svg></span>
         </form>
       </div>
     </span>
   </label>
 </div><!-- .responsive-toggles-left -->

 <div class="site-logo">
   <a href="<?php echo home_url('/'); ?>"><img class="header-logo" src="/wp-content/uploads/2020/04/logo.png" alt="" width="164" height="98"></a>
 </div>

 <li id="custom_html-9" class="widget_text widget widget_custom_html"><div class="textwidget custom-html-widget">
   <?php wp_nav_menu( array('theme_location' => 'menu-main-iconic','container_class' => 'top-nav visible-lg visible-xl') ); ?>
 </div></li>


 <div class="top-searchform col-sm-3 hidden-xs hidden-sm">
   <?php echo do_shortcode('[wcas-search-form]'); ?>
					<!--
					<form action="https://swemed.co.uk/shop/" method="get" role="search">
						<input data-hj-whitelist="" data-swplive="true" type="text" name="s" value="" placeholder="Search products..." autocomplete="off">
						<span class="btn--search">
							<svg class="icon icon-magnifying-glass">
								<use xlink:href="#magnifying-glass"></use>
							</svg>
						</span>
					</form> -->
				</div><!-- .top-searchform -->

				<div class="contact-number hidden-xs hidden-sm">

					<div class="tel-icon-menu"></div>Customer support        <span><?php if( get_option('phone_number')){ ; ?>
           <a href="tel:+<?php $call_number = get_option('phone_number') ; $call_number = preg_replace('/[^0-9.]/', '', $call_number); echo $call_number; ?>"><?php echo get_option('phone_number') ; ?></a><?php } else { ?>
           <a href="tel:+01444391233">01444 39 1233</a><?php } ?></span>
         </div><!-- .contact-number -->

         <div id="varukorg-knapp" class="top-minicart">
           <a href="<?php echo wc_get_cart_url(); ?>" id="dw_minicart_toggle" title="Basket">

            <img class="icon icon-shopping-basket" src="<?php echo get_stylesheet_directory_uri() ?>/img/png/cart.png" alt="" width="25" height="25">

            <span class="count"><?php echo sprintf ( WC()->cart->get_cart_contents_count() ); ?></span>
          </a>
        </div><!-- .top-minicart -->

        <div class="site-minicart-box" id="dw_minicart_box">


         <p class="no-products">No products.</p>


         <div class="contact-details">
          <span>
           <svg class="icon icon-phone-call2"><use xlink:href="#phone-call2"></use></svg>
           <?php if( get_option('phone_number')){ ; ?>
           <a href="tel:+<?php $call_number = get_option('phone_number') ; $call_number = preg_replace('/[^0-9.]/', '', $call_number); echo $call_number; ?>"><?php echo get_option('phone_number') ; ?></a><?php } else { ?>
           <a href="tel:+01444391233">01444 39 1233</a><?php } ?>
         </span>

         <span>
           <svg class="icon icon-envelope"><use xlink:href="#envelope"></use></svg>
           <a href="mailto:info@swemed.co.uk">info@swemed.co.uk</a>
         </span>
       </div><!-- .contact-details -->


     </div><!-- .site-minicart-box -->
     <!-- .site-minicart-box -->
     <div id="cart-wrapper" style="display: none;"></div>
   </div>

 </header>
 <div class="site-container container">
  <div class="site-container-inner">
   <div class="intro-homepage page-id-<?php get_the_ID()?>">
    <div class="intro-homepage-inner">
      <div class="row">
        <div class="col-lg-4 col-xl-3"></div>
        <div class="col-lg-8 col-xl-9">
          <h1 class="page-title"><?php 
            if(is_woocommerce()){
            woocommerce_page_title();
          }
          elseif(is_archive()){
          the_archive_title();
        }
        else{
        the_title();
      } ?></h1>
      
      <?php if ( !has_excerpt() || is_home() ) {
        echo '';
      } elseif( is_woocommerce() ){
        $shop = get_option( 'woocommerce_shop_page_id' );
        echo get_the_excerpt( $shop );
        //echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
      } else { 
        echo '<p class="short-desc">';
      echo get_the_excerpt();
      echo '</p>';
    } ?>

  <?php if ( is_woocommerce() ) { ?><?php
  $args = array(
  'wrap_before' => '<p id="breadcrumbs-new">',
    'wrap_after'  => '</p>',
    /*
    'delimiter'   => ' &#47; ',

    'before'      => '',
    'after'       => '',
    'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    */
    );
    ?>
    <?php woocommerce_breadcrumb( $args ); ?><?php } else { ?>
    <?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); }?>
  </div>

</div>
</div>
</div>
</div>
</div>