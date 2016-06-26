<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$sidebar = $class_main = $class_content = $class_sidebar = '';

$sidebar = get_theme_mod('rit_default_product_sidebar', 'no-sidebar');
$class_content = $sidebar;
if (isset($_GET['sidebar'])) {
    switch ($_GET['sidebar']) {
        case 'no-sidebar':
            $sidebar = 'no-sidebar';
            break;
        case 'left-sidebar':
            $sidebar = 'left-sidebar';
            break;
        case 'right-sidebar':
            $sidebar = 'right-sidebar';
            break;
        case 'both-sidebar':
            $sidebar = 'both-sidebar';
            break;
    }
}
if ($sidebar == 'no-sidebar' || $sidebar == '') {
    $class_main = 'col-xs-12 col-sm-12';
} elseif ($sidebar == 'left-sidebar' || $sidebar == 'right-sidebar') {
    $class_main = 'col-xs-12 col-sm-9';
} else {
    $class_main = 'col-xs-12 col-sm-6';
}
$class_main.=' new-product';
get_header();
if (have_posts()) : ?>
    <div class="wrapper-breadcrumb woo-breadcrumb breadcrumb-portfolio-page">
        <div class="container">
            <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action('woocommerce_before_main_content');
            ?>
        </div>
    </div>
<?php endif; ?>
<main id="rit-main" <?php echo esc_attr(is_search() ? 'class=product-search' : ''); ?>>
    <div class="container woo-category-page <?php echo esc_attr($class_content) ?>">
        <div class="row">
            <?php if ($sidebar == 'left-sidebar' || $sidebar == 'both-sidebar') { ?>
                <?php get_template_part('woocommerce/woo', 'sidebar') ?>
            <?php } ?>
            <div class="<?php echo esc_attr($class_main); ?> <?php echo esc_attr(get_theme_mod('rit_product_style', 'default')); ?>">
                <?php if (have_posts()) : ?>

                <div class="header-woopagecat">
                    <?php get_template_part('woocommerce/woo', 'banner') ?>
                    <?php
                    if (is_shop()) {
                        do_action('woocommerce_archive_description');
                    }
                    ?>
                    <div class="woo-opt-page">
                        <div class="row">
                            <div class="ordergroup col-xs-12 col-sm-4">
                                <?php
                                /**
                                 * woocommerce_before_shop_loop hook
                                 *
                                 * @hooked woocommerce_result_count - 20
                                 * remove @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action('woocommerce_before_shop_loop');
                                ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 aligncenter">
                                <div class="sort-by">
                                    <span class="primary-font"><?php _e('Short by:', 'ri-everest'); ?></span>
                                    <?php
                                    /**
                                     * woocommerce_catalog_ordering hook
                                     *
                                     * @hooked woocommerce_catalog_ordering - 10
                                     */
                                    do_action('woocommerce_catalog_ordering');
                                    ?>
                                </div>
                            </div>
                            <div class="pageview pull-right col-xs-12 col-sm-2">
                                <?php
                                $layout='';
                                if (isset($_GET['product-view'])):
                                    $layout=$_GET['product-view'];
                                    ?>
                                    <span data-view="grid" class="pageviewitem <?php
                                    if ($_GET['product-view'] == 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-menu-3"></i> </span>
                                    <span data-view="list" class="pageviewitem  <?php
                                    if ($_GET['product-view'] != 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-list"></i> </span>
                                    <?php
                                elseif (!isset($_COOKIE['product-view'])):

                                    $layout=get_theme_mod('rit_product_layout_view');
                                    ?>
                                    <span data-view="grid" class="pageviewitem <?php
                                    if (get_theme_mod('rit_product_layout_view') == 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-menu-3"></i> </span>
                                    <span data-view="list" class="pageviewitem  <?php
                                    if (get_theme_mod('rit_product_layout_view') != 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-list"></i> </span>
                                    <?php
                                else:
                                    $layout=$_COOKIE['product-view'];
                                    ?>
                                    <span data-view="grid" class="pageviewitem <?php
                                    if ($_COOKIE['product-view'] == 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-menu-3"></i> </span>
                                    <span data-view="list" class="pageviewitem  <?php
                                    if ($_COOKIE['product-view'] != 'grid'):
                                        echo esc_attr('active');
                                    endif; ?>"><i class="clever-icon-list"></i> </span>
                                    <?php
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php
                $i = 0;
                $columns = '';
                if (isset($_GET['cols'])) {
                    $columns = $_GET['cols'];
                } else {
                    $columns = get_theme_mod('rit_product_grid_col');
                }
                while (have_posts()) :
                the_post();
                $i++;
                wc_get_template_part('content', 'product');
                if ($i % $columns==0&&$layout=='grid'){
                ?>
                <div class="clearfix"></div>
        <?php
        }
        endwhile; // end of the loop. ?>

        <?php woocommerce_product_loop_end(); ?>

        <?php
        /**
         * woocommerce_after_shop_loop hook
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action('woocommerce_after_shop_loop');
        ?>
        <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>
            <div class="no-product">
                <?php wc_get_template('loop/no-products-found.php'); ?>
            </div>
        <?php endif; ?>


            <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            //do_action( 'woocommerce_after_main_content' );
            ?>
        </div>
        <?php
        /**
         * woocommerce_sidebar hook
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        //do_action( 'woocommerce_sidebar' );
        ?>

        <?php if ($sidebar == 'right-sidebar' || $sidebar == 'both-sidebar') { ?>
            <?php get_template_part('woocommerce/woo-sidebar', 'right') ?>
        <?php } ?>
    </div>
    </div>
</main>
<?php get_footer(); ?>
