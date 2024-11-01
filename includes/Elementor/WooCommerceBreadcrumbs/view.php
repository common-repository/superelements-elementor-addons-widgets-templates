<?php 
// Get Product Id 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$product_id = $product_post_id;
$product = wc_get_product($product_id);

if ($product) {
    if(function_exists('woocommerce_breadcrumb')){
        woocommerce_breadcrumb();
    }
} else {
   while(have_posts()) : the_post();
    global $product;
        if($product) :
            if(function_exists('woocommerce_breadcrumb')){
                woocommerce_breadcrumb();
                }
        endif;
   endwhile;
    wp_reset_postdata();
}