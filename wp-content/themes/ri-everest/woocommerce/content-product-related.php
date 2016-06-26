<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop'])) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns'])) {
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);
}

// Ensure visibility
if (!$product || !$product->is_visible()) {
    return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if (0 == ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns']) {
    $classes[] = 'first';
}
if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns']) {
    $classes[] = 'last';
}
if (get_theme_mod('rit_enable_slider_related_product') == 'no' || get_theme_mod('rit_enable_slider_related_product') == false) {
    switch (get_theme_mod('rit_number_products_related_display_per_row')) {
        case '1':
            $classes[] .= 'col-xs-12';
            break;
        case '2':
            $classes[] .= 'col-xs-12 col-sm-6';
            break;
        case '3':
            $classes[] .= 'col-xs-12 col-sm-4';
            break;
        case '4':
            $classes[] .= 'col-xs-12 col-sm-3';
            break;
        case '5':
            $classes[] .= 'col-xs-12 col-sm-1-5';
            break;
        case '6':
            $classes[] .= 'col-xs-12 col-sm-2';
            break;
        default:
            $classes[] .= 'col-xs-12 col-sm-3';
            break;
    }
}

?>

<li <?php post_class($classes); ?>>
    <div class="wrapper-top-product">
        <?php do_action('woocommerce_before_shop_loop_item'); ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
        </a>
        <?php
        /**
         * woocommerce_after_shop_loop_item hook
         *
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        do_action('woocommerce_after_shop_loop_item');
        ?>
    </div>
    <div class="product-info">
        <h3 class="product-name"><a href="<?php the_permalink(); ?>"
                                    title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <?php
        echo get_the_term_list( get_the_ID(), 'product_cat', '<div class="product-cat primary-font">', ' - ', '</div>');
        ?>
        <div class="other-info">
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
            do_action('woocommerce_after_shop_loop_item_title');
            ?>
            <?php do_action('woocommerce_template_single_rating'); ?>
            <div class="wrapper-product-opt">
                <?php
                /**
                 * woocommerce_template_loop_add_to_cart hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_template_loop_add_to_cart');
                ?>
            </div>
        </div>
    </div>
</li>