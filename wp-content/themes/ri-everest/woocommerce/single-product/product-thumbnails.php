<?php
/**
 * Single Product Thumbnails
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
?>

<div class="thumbnails">
    <ul class="list-thumbnails">
        <?php
        if (has_post_thumbnail()) {

            $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
            $image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
            $image_link = wp_get_attachment_url(get_post_thumbnail_id());
            $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
                'title' => $image_title,
                'alt' => $image_title
            ));

            $attachment_count = count($product->get_gallery_attachment_ids());

            if ($attachment_count > 0) {
                $gallery = '[product-gallery]';
            } else {
                $gallery = '';
            }

            echo apply_filters('woocommerce_single_product_image_html', sprintf('<li class="active"><a href="%s" title="%s" rel="lightbox[]">%s</a></li>', $image_link, $image_caption, $image), $post->ID);

        }
        if ($attachment_ids) {
            $loop = 0;
            $columns = apply_filters('woocommerce_product_thumbnails_columns', 3);

            foreach ($attachment_ids as $attachment_id) {

                $classes = array('zoom');

                if ($loop == 0 || $loop % $columns == 0)
                    $classes[] = 'first';

                if (($loop + 1) % $columns == 0)
                    $classes[] = 'last';

                $image_link = wp_get_attachment_url($attachment_id);

                if (!$image_link)
                    continue;

                $image = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_thumbnail'));
                $image_class = esc_attr(implode(' ', $classes));
                $image_title = esc_attr(get_the_title($attachment_id));
                echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf('<li><a href="%s" title="%s" rel="lightbox[]" >%s</a></li>', $image_link, $image_title, $image), $post->ID);
                //echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></li>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

                $loop++;
            }
        }
        ?>
    </ul>
    <span id="slide-up" class="slider-control"><i class="clever-icon-up"></i> </span>
    <span id="slide-down" class="slider-control"><i class="clever-icon-down"></i> </span>
</div>