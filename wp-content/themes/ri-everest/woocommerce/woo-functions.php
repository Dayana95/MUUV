<?php
/**
 * Created by PhpStorm.
 * User: NTK
 * Date: 6/22/2015
 * Time: 4:18 PM
 * All custom function of woo.
 */
if (class_exists('WooCommerce')) {
    add_action( 'after_setup_theme', 'ri_everest_woocommerce_support' );
    function ri_everest_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    //Remove link close woo 2.5
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
//Custom number product display
    add_filter('loop_shop_per_page', create_function('$cols', 'return ' . get_theme_mod('rit_number_products_display') . ';'), 20);
//Update topcart when addtocart(Ajax cart)
    add_filter('woocommerce_add_to_cart_fragments', 'ri_everest_top_cart');

    function ri_everest_top_cart($fragments)
    {
        ob_start();
        get_template_part('included/templates/topheadcart');
        $fragments['#topcart'] = ob_get_clean();
        return $fragments;
    }

//Custom hook for product page woocommerce
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    add_action('woocommerce_template_single_rating', 'woocommerce_template_single_rating', 11);
    add_action('ri_everest_woocommerce_show_product_loop_sale_flash','woocommerce_show_product_loop_sale_flash',5);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    add_action('woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    add_action('woocommerce_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
    add_action('ri_everest_template_single_title', 'woocommerce_template_single_title', 5);
//Custom number products related display
    add_filter('woocommerce_output_related_products_args', 'ri_everest_related_products_args');
    function ri_everest_related_products_args($args)
    {
        if (get_theme_mod('rit_number_products_related_display') == '') {
            $args['posts_per_page'] = 4; // 4 related products
        } else
            $args['posts_per_page'] = get_theme_mod('rit_number_products_related_display');
        return $args;
    }
    add_action('woocommerce_before_shop_loop_item_title', 'ri_everest_loop_product_thumbnail', 10);

    function ri_everest_loop_product_thumbnail($size = 'shop_catalog') {
        $id = get_the_ID();
        $image_product_hover  = get_theme_mod('rit_woo_product_hover');
        $gallery = get_post_meta($id, '_product_image_gallery', true);
        if (!empty($gallery) && ($image_product_hover != 'off')) {
            $gallery = explode(',', $gallery);
            $first_image_id = $gallery[0];
            echo wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image'));
        }
    }
}