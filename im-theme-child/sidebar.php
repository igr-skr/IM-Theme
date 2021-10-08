<?php
/**
* The sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package im-theme
*/
?>
<section class="widget-block categories-navigation-widget">
<?php
$prod_cat_args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name', // здесь по какому полю сортировать
    'hide_empty' => false, // скрывать категории без товаров или нет
    //    'parent'      => 0 // id родительской категории
    'hierarchical' => true,
    'exclude'      => 15,
);

$woo_categories = get_categories($prod_cat_args);
echo '<span class="gamma widget-title">Categories</span>';
echo '<ul class="product-categories">';
foreach ($woo_categories as $woo_cat)
{
    $woo_cat_id = $woo_cat->term_id; //category ID
    $woo_cat_name = $woo_cat->name; //category name
    $woo_cat_slug = $woo_cat->slug; //category slug
    $category_thumbnail_id = get_term_meta($woo_cat_id, 'thumbnail_id', true);
    $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);

    if ($woo_cat->category_parent == 0)
    {
        echo '<li class="cat-item ' . $woo_cat_id . ' cat-parent">';

        if ($thumbnail_image_url)
        {
//            echo '<img src="' . $thumbnail_image_url . '"/>';
        }

        echo '<a href="' . get_term_link($woo_cat_id, "product_cat") . '">' . $woo_cat_name . '</a>';
        $prod_cat_child = array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name', // здесь по какому полю сортировать
            'hide_empty' => false, // скрывать категории без товаров или нет
            'parent' => $woo_cat_id            
        );

        $sub_cats = get_categories($prod_cat_child);
        if ($sub_cats)
        {
            echo '<ul class="children">';
            foreach ($sub_cats as $sub_category)
            {
                $woo_sub_cat_id = $sub_category->term_id; //category ID
                $woo_sub_cat_name = $sub_category->name; //category name
                $woo_sub_cat_slug = $sub_category->slug; //category slug
                $category_thumbnail_id = get_term_meta($woo_sub_cat_id, 'thumbnail_id', true);
                $thumbnail_image_url = wp_get_attachment_url($category_thumbnail_id);

                echo '<li class="cat-item cat-item-59">';
                echo '<a href="' . get_term_link($woo_sub_cat_id, "product_cat") . '">';

                if ($thumbnail_image_url)
                {
                    echo '<img src="' . $thumbnail_image_url . '"/>';
                }

                echo $sub_category->name . '</a>';
                echo "</li>\n";
            }
            echo '</ul>';
        }

        echo "</li>\n";
    }

}
?>
</section>
<?php dynamic_sidebar( 'woo-sidebar' );  ?>