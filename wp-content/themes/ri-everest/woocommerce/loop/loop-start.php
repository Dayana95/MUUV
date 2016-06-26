<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
$class='';
if(is_product()):
    $class='grid-layout list-related';
    else:
    if(isset($_GET['product-view'])):
        if ($_GET['product-view'] == 'grid'):
            $class='grid-layout row';
        else:
            $class='list-layout';
        endif;
    elseif (!isset($_COOKIE['product-view'])):
        if(get_theme_mod('rit_product_layout_view')=='grid'):
            $class='grid-layout row';
        else:
            $class='list-layout';
        endif;
    else:
        if ($_COOKIE['product-view'] == 'grid'):
            $class='grid-layout row';
        else:
            $class='list-layout';
        endif;
    endif;
endif;
?>

<ul class="rit-products clearfix <?php echo esc_attr($class);?>">