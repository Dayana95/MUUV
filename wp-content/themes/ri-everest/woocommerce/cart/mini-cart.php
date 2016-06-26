<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.5.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<div  id="mini-cart">
<?php do_action('woocommerce_before_mini_cart'); ?>
<ul class="cart_list product_list_widget <?php echo $args['list_class']; if (sizeof(WC()->cart->get_cart()) <= 0) {echo 'cart-empty';} ?>">

    <?php if (sizeof(WC()->cart->get_cart()) > 0) : ?>

        <?php
        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {

                $product_name = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('shop_catalog'), $cart_item, $cart_item_key);
                $product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                ?>
                <li>
                    <div class="wrapper-thumb col-xs-3" >
                    <?php echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">&times;</a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), __('Remove this item', 'woocommerce')), $cart_item_key); ?>
                    <?php if (!$_product->is_visible()) : ?>
                        <?php echo str_replace(array('http:', 'https:'), '', $thumbnail) . $product_name . '&nbsp;'; ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url($_product->get_permalink($cart_item)); ?>" class="mini-cart-img">
                            <?php echo str_replace(array('http:', 'https:'), '', $thumbnail) ?>
                        </a>
                    <?php endif; ?>
                    </div>
                    <div class="cart-item-detail col-xs-9 primary-font">
                        <?php if ($_product->is_visible()) : ?>
                        <a class="primary-font" href="<?php echo esc_url($_product->get_permalink($cart_item)); ?>">
                            <?php echo $product_name ?>
                        </a>
                        <?php endif; ?>
                        <?php echo WC()->cart->get_item_data($cart_item); ?>
                        <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
                    </div>
                </li>
                <?php
            }
        }
        ?>

    <?php else : ?>

        <li class="empty primary-font"><?php  _e('Your cart is currently empty.', 'woocommerce'); ?></li>

    <?php endif; ?>

</ul><!-- end product list -->

<?php if (sizeof(WC()->cart->get_cart()) > 0) : ?>

    <p class="total"><strong class="primary-font"><?php  _e('Subtotal', 'woocommerce'); ?>
            :</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

    <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

    <p class="buttons">
        <a href="<?php echo WC()->cart->get_cart_url(); ?>"
           class="button btn wc-forward"><?php  _e('View Cart', 'woocommerce'); ?></a>
        <a href="<?php echo WC()->cart->get_checkout_url(); ?>"
           class="button btn checkout wc-forward"><?php  _e('Checkout', 'woocommerce'); ?></a>
    </p>

<?php endif; ?>
<script>
    jQuery(document).ready(function () {
        jQuery("#topcart .cart_list.product_list_widget").niceScroll({
            touchbehavior: true,
            cursorcolor: "#fff",
            cursoropacitymax: 0.7,
            cursorwidth: 6,
            autohidemode: true
        });
    })
</script>
<?php do_action('woocommerce_after_mini_cart'); ?>
</div>