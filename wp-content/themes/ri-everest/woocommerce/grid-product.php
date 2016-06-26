<?php
/**
 * The Template for displaying all single products.
 *
 * Grid layout item of woo for ri-everest
 *
 * @author        RiverThemes
 * @version     1.0
 */
$classes = array();
$columns='';
if(isset($_GET['cols'])){
    $columns= $_GET['cols'];
}
else{
    $columns=get_theme_mod('rit_product_grid_col');
}

switch ($columns) {
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
        $classes[] .= 'col-xs-12 col-sm-4';
        break;
};
global $post, $product;
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