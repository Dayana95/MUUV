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
$classes[]="row product";
?>
<li <?php post_class($classes); ?>>
    <div class="col-xs-4">
        <?php do_action('woocommerce_before_shop_loop_item'); ?>
        <div class="wrapper-top-product">
            <a href="<?php the_permalink(); ?>">

                <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action('woocommerce_before_shop_loop_item_title');
                if(is_plugin_active('yith-woocommerce-wishlist/init.php')) {
                    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                }
                $postdate   = get_the_time( 'Y-m-d' );   // Post date
                $postdatestamp  = strtotime( $postdate );   // Timestamped post date
                $newness   =  get_theme_mod('rit_days_products_new','30');  // Newness in days

                if ( ( time() - ( 60*60*24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
                    echo '<span class="product-label label-new">' . esc_html(__( 'New', 'ri-everest' )) . '</span>';
                }
                ?>
            </a>
        </div>
    </div>
    <div class="col-xs-8">
        <div class="product-info">
            <?php echo get_the_term_list( get_the_ID(), 'product_cat', '<div class="product-cat primary-font">', ' - ', '</div>'); ?>
            <h3 class="product-name">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </h3>

            <div class="product-description">
                <?php echo apply_filters('woocommerce_short_description', $post->post_excerpt) ?>
            </div>
            <div class="item-title">
                <?php
                /**
                 * woocommerce_after_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action('woocommerce_after_shop_loop_item_title');
                do_action('woocommerce_template_single_rating');
                ?>
            </div>
            <div class="group-btn">

                <?php

                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_after_shop_loop_item');
                do_action('woocommerce_template_loop_add_to_cart');
                ?>
            </div>
        </div>
    </div>
</li>
