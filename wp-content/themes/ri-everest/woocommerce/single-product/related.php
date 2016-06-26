<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
	<?php
	if(get_theme_mod('rit_enable_slider_related_product')=='yes'):?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery(".list-related").owlCarousel({
					// Most important owl features
					items :'<?php echo get_theme_mod('rit_number_products_related_display_per_row',4);?>',
					itemsCustom : false,
					itemsDesktop : [1199,<?php echo get_theme_mod('rit_number_products_related_display_per_row',4);?>],
					itemsDesktopSmall : [980,<?php if( get_theme_mod('rit_number_products_related_display_per_row',4)>1) echo  get_theme_mod('rit_number_products_related_display_per_row',4)-1;else echo  get_theme_mod('rit_number_products_related_display_per_row',4);?>],
					itemsTablet: [768,<?php if( get_theme_mod('rit_number_products_related_display_per_row',4)>2) echo  get_theme_mod('rit_number_products_related_display_per_row',4)-2; else echo  get_theme_mod('rit_number_products_related_display_per_row',4);?>],
					itemsTabletSmall: false,
					itemsMobile : [479,1],
					singleItem : false,
					itemsScaleUp : false,
					// Navigation
					pagination : false,
					navigation : true,
					navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
					rewindNav : true,
					scrollPerPage : false});})
		</script>
		<?php
	endif;
	?>
	<div class="related products product_style_2">

		<h3 class="title"><span><?php _e( 'Related Products', 'woocommerce' ); ?></span></h3>
        <div class="row">
		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product-related' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>
        </div>
	</div>

<?php endif;

wp_reset_postdata();
