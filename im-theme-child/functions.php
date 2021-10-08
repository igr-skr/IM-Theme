<?php

add_action( 'wp_enqueue_scripts', 'im_theme_child_styles_scripts' );
function im_theme_child_styles_scripts() {
 
//    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );  
/*
    wp_enqueue_style( 'owl-carousel-style', get_stylesheet_directory_uri() . '/css/owl/owl.carousel.min.css' );
    wp_enqueue_style( 'owl-carousel-theme', get_stylesheet_directory_uri() . '/css/owl/owl.theme.default.min.css' );
    
    wp_enqueue_script('owl-carousel-script', get_stylesheet_directory_uri() .'/js/owl/owl.carousel.js', array('jquery'));
    wp_enqueue_script('owl-carousel-min', get_stylesheet_directory_uri() .'/js/owl/owl.carousel.min.js', array('jquery'));
    wp_enqueue_script('owl-carousel-init', get_stylesheet_directory_uri() .'/js/owl/owl-carousel-init.js', array('jquery'));
*/  
    wp_enqueue_script('sticky-blocks', get_stylesheet_directory_uri() .'/js/jquery.sticky-sidebar.js', array('jquery'));
    
    wp_enqueue_style( 'template-style', get_stylesheet_directory_uri() . '/css/theme-style.css', array( 'im-bootstrap-style','im-theme-style' ));
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/custom-style.css');
    wp_enqueue_style( 'media-style', get_stylesheet_directory_uri() . '/css/media-style.css');

}

function im_theme_menu_areas() {
    register_nav_menu('menu-top-left-nav',__( 'Top Left Menu' ));
    register_nav_menu('right-links',__( 'Account Links' ));
    register_nav_menu('menu-main-iconic',__( 'Main Top Menu' ));
    register_nav_menu('menu-left-vertical',__( 'Left Vertical Menu' ));
}
add_action( 'init', 'im_theme_menu_areas' );

function imt_theme_widgets() {

    register_sidebar( array(
        'name'          => 'Footer Column 1',
        'id'            => 'footer-col-1',
//        'before_widget' => '',
//        'after_widget'  => '',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Column 2',
        'id'            => 'footer-col-2',
//        'before_widget' => '',
//        'after_widget'  => '',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Column 3',
        'id'            => 'footer-col-3',
//        'before_widget' => '',
//        'after_widget'  => '',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Column 4',
        'id'            => 'footer-col-4',
//        'before_widget' => '',
//        'after_widget'  => '',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Woocommerce Sidebar',
        'id'            => 'woo-sidebar',
        'before_widget' => '<section class="widget-block categories-navigation-widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'before_widget' => '<section class="widget-block categories-navigation-widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

    register_sidebar( array(
        'name'          => 'Language Switcher',
        'id'            => 'lang-switch',
        'before_title'  => '<span class="gamma widget-title">',
        'after_title'   => '</span>',
    ) );

}
add_action( 'widgets_init', 'imt_theme_widgets' );

function widget_params( $params ) { 
  if ('Main Sidebar' === $params[0]['name']) {
    // do something
  }
  return $params;
}
add_filter( 'dynamic_sidebar_params', 'widget_params' );
/*

add_filter( 'woocommerce_product_categories_widget_args', 'custom_woocommerce_product_subcategories_args' );

function custom_woocommerce_product_subcategories_args( $args ) {

$args['exclude'] = get_option( 'default_product_cat' );

return $args;

}
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => __( 'Top Header Post Image', 'im-theme'),
            'id' => 'header-post-image',
            'post_type' => 'post'
        )
    );
}
*/

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4;
    }
}

add_filter( 'loop_shop_per_page', function ( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 12;
}, 20 );

add_post_type_support( 'page', 'excerpt' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 4 );

function woocommerce_open_add_to_cart_block(){
    global $post;

    echo "<div class='product-cart-add-wrap'>";
    if (get_field('brand', $post->ID) || get_field('delivery_time', $post->ID)){
    echo '<ul class="product_meta brand">';

    if (get_field('brand', $post->ID)){ echo '<li class="brand"><span class="posted_in">Brand:</span> ' . get_field('brand', $post->ID) . '</li>'; }
    if (get_field('delivery_time', $post->ID)){ echo '<li class="delivery"><span class="posted_in">Delivery time:</span> ' . get_field('delivery_time', $post->ID) . '</li>'; }

    echo '</ul>';
    }
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_open_add_to_cart_block', 6 );

function woocommerce_close_add_to_cart_block(){
    echo "</div>";
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_close_add_to_cart_block', 65 );




//remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
//remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}



/**
 * Add the custom tab
 */
function my_simple_custom_product_tab( $tabs ) {

    $tabs['specifications'] = array(
        'title'    => __( 'Specifications', 'woocommerce', 'im-theme' ),
        'callback' => 'woo_spec_product_tab_content',
        'priority' => 50,
    );

    return $tabs;

}
add_filter( 'woocommerce_product_tabs', 'my_simple_custom_product_tab' );

function woo_spec_product_tab_content() {
  global $post;   

  echo '<div class="product-spec">'. get_field('specifications', $post->ID) . '</div>';

  woocommerce_product_additional_information_tab();
}



/* удалить количество товаров в категории WooCommerce */
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
return;
}

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function theme_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 50;
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );

function customizer_theme_logo() {
    add_theme_support( 'custom-logo', array(
        'width'       => 165,
        'height'      => 100,
        'flex-width' => true ) );
    }
add_action( 'after_setup_theme', 'customizer_theme_logo' );

function theme_settings_page()
{
    ?>
        <div class="wrap">
        <h1>Theme Settings</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields("section");
                do_settings_sections("theme-options");      
                submit_button(); 
            ?>          
        </form>
        </div>
    <?php
}

function add_theme_menu_item()
{
    add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_phone_element()
{
    ?>
        <input type="text" name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("phone_number", "Phone Number on site header", "display_phone_element", "theme-options", "section");
    
    register_setting("section", "phone_number");

}

add_action("admin_init", "display_theme_panel_fields");

function dimox_breadcrumbs() {

    /* === ОПЦИИ === */
    $text['home']     = 'Home'; // текст ссылки "Главная"
    $text['category'] = '%s'; // текст для страницы рубрики
    $text['search']   = 'Search Results for "%s"'; // текст для страницы с результатами поиска
    $text['tag']      = 'Posts Tagged "%s"'; // текст для страницы тега
    $text['author']   = 'Articles of %s author'; // текст для страницы автора
    $text['404']      = '404 page'; // текст для страницы 404
    $text['page']     = '%s'; // текст 'Страница N'
    $text['cpage']    = 'Comments page %s'; // текст 'Страница комментариев N'

    $wrap_before    = '<p id="breadcrumbs-new" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
    $wrap_after     = '</p><!-- .breadcrumbs -->'; // закрывающий тег обертки
    $sep            = '<span class="separator"> / </span>'; // разделитель между "крошками"
    $before         = '<span class="current">'; // тег перед текущей "крошкой"
    $after          = '</span>'; // тег после текущей "крошки"

    $show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }

        if ( is_category() ) {
            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $position += 1;
                $post_type = get_post_type_object( get_post_type() );
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
            } else {
                $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    elseif ( $show_last_sep ) echo $sep;
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $post_type->label . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()


/*
add_filter( 'woocommerce_product_categories_widget_args', 'woo_product_cat_widget_args' );
function woo_product_cat_widget_args( $cat_args ) {
  
    $cat_args['exclude'] = array('15');
  
    return $cat_args;
}

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
*/


add_filter( 'get_terms', 'get_subcategory_terms', 10, 3 );

function get_subcategory_terms( $terms, $taxonomies, $args ) {

  $new_terms = array();

  // если находится в товарной категории и на странице магазина
  if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_shop() ) {

    foreach ( $terms as $key => $term ) {

      if ( ! in_array( $term->slug, array( 'uncategorized', 'stock-clearance' ) ) ) {
        $new_terms[] = $term;
      }

    }

    $terms = $new_terms;
  }

  return $terms;
}

/*
add_filter ( 'pre_get_posts', 'exclude_category_home' ); 
*/
add_filter( 'get_terms', 'organicweb_exclude_category', 10, 3 );
function organicweb_exclude_category( $terms, $taxonomies, $args ) {
  $new_terms = array();
  // if a product category and on a page
  if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_page() ) {
    foreach ( $terms as $key => $term ) {
// Enter the name of the category you want to exclude in place of 'uncategorised'
      if ( ! in_array( $term->slug, array( 'uncategorized', 'stock-clearance' ) ) ) {
        $new_terms[] = $term;
      }
    }
    $terms = $new_terms;
  }
  return $terms;
}
