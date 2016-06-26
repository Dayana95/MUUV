<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
if (!defined('ABSPATH')) {
    exit;
}

global $product;

$attribute_keys = array_keys($attributes);

do_action('woocommerce_before_add_to_cart_form'); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data'
      data-product_id="<?php echo absint($product->id); ?>"
      data-product_variations="<?php echo esc_attr(json_encode($available_variations)) ?>">
    <?php do_action('woocommerce_before_variations_form'); ?>

    <?php if (empty($available_variations) && false !== $available_variations) : ?>
        <p class="stock out-of-stock"><?php _e('This product is currently out of stock and unavailable.', 'woocommerce'); ?></p>
    <?php else :
        ?>
        <div class="wrapper-product-attr variations">
            <?php
            foreach ($attributes as $attribute_name => $options) :
                if (0 === strpos($attribute_name, 'pa_')):
                    ?>
                    <div class="product-att-item">
                        <label class="primary-font"
                               for="<?php echo sanitize_title($attribute_name); ?>"><?php echo wc_attribute_label($attribute_name); ?></label>
                        <div class="value" id="<?php echo sanitize_title($attribute_name); ?>-wrapp" for="<?php echo sanitize_title($attribute_name); ?>">
                            <?php
                            $terms = get_terms($attribute_name);
                            $selected = isset($_REQUEST['attribute_' . sanitize_title($attribute_name)]) ? wc_clean($_REQUEST['attribute_' . sanitize_title($attribute_name)]) : $product->get_variation_default_attribute($attribute_name);
                            $classSelected = '';
                            foreach ($terms as $term) {
                                if (in_array($term->slug, $options)) {
                                    $classSelected = $term->slug == $selected ? 'active' : '';
                                    if($attribute_name=='pa_color'){
                                        echo '<span style="background:' . $term->description . '" class="color-attr product-attr ' . $classSelected . '" data-id="'.$term->slug.'"></span>';
                                    }
                                    else{
                                        echo '<span class="text-attr product-attr ' . $classSelected . '" data-id="'.$term->slug.'">'.$term->name.'</span>';
                                    }
                                }
                            }
                            echo '<div class="wrapper-attr-select hidden">';
                            $selected = isset($_REQUEST['attribute_' . sanitize_title($attribute_name)]) ? wc_clean($_REQUEST['attribute_' . sanitize_title($attribute_name)]) : $product->get_variation_default_attribute($attribute_name);
                            wc_dropdown_variation_attribute_options(array('options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected));
                            ?>
                            </div>
                        </div>
                    </div>
                    <?php
                else:
                    ?>
                    <div class="product-att-item">
                        <label class="primary-font"
                               for="<?php echo sanitize_title($attribute_name); ?>"><?php echo wc_attribute_label($attribute_name); ?></label>
                        <div class="value">
                            <?php
                            $selected = isset($_REQUEST['attribute_' . sanitize_title($attribute_name)]) ? wc_clean($_REQUEST['attribute_' . sanitize_title($attribute_name)]) : $product->get_variation_default_attribute($attribute_name);
                            wc_dropdown_variation_attribute_options(array('options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected));
                            ?>
                        </div>
                    </div>
                <?php endif;
                echo end($attribute_keys) === $attribute_name ? '<a class="reset_variations" href="#">' . __('Clear selection', 'woocommerce') . '</a><a class="clear_variations btn-border" href="#">' . __('Clear selection', 'woocommerce') . '</a>' : '';
            endforeach; ?>

        </div>

        <?php do_action('woocommerce_before_add_to_cart_button'); ?>

        <div class="single_variation_wrap" style="display:none;">
            <?php
            /**
             * woocommerce_before_single_variation Hook
             */
            do_action('woocommerce_before_single_variation');

            /**
             * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
             * @since 2.4.0
             * @hooked woocommerce_single_variation - 10 Empty div for variation data.
             * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
             */
            do_action('woocommerce_single_variation');

            /**
             * woocommerce_after_single_variation Hook
             */
            do_action('woocommerce_after_single_variation');
            ?>
        </div>

        <?php do_action('woocommerce_after_add_to_cart_button'); ?>
    <?php endif; ?>

    <?php do_action('woocommerce_after_variations_form'); ?>
</form>
<script type="text/javascript">
    (function ($) {
        'use strict';
        jQuery(document).ready(function () {
            var data;
            var parent;
            $('.clear_variations').hide();
            $('.product-attr').on('click', function () {
                $('.clear_variations').show();
                parent = $(this).parent('div');
                data = $(this).attr('data-id');
                parent.find('.active').removeClass('active');
                $(this).addClass('active');
                parent.find('option:selected').removeAttr('selected');
                if (parent.find('option[value="' + data + '"]')[0]) {
                    parent.find('option[value="' + data + '"]').attr('selected', 'selected');
                }
                else {
                    parent.find('select').trigger('change');
                    parent.find('option[value="' + data + '"]').attr('selected', 'selected');
                }
                parent.find('select').trigger('change');
            });
            $('.clear_variations.btn-border').bind("click", function (e) {
                e.preventDefault();
                $('.reset_variations').trigger('click');
                $('.product-attr').removeClass('active');
                $('.clear_variations').hide();
            });
        })
    })(jQuery)
</script>
<?php do_action('woocommerce_after_add_to_cart_form'); ?>
