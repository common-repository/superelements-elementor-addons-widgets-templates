<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (is_product()) {
    global $product;
    if(function_exists('wc_get_stock_html')){
        echo wp_kses_post(wc_get_stock_html( $product ));
    }
} else {
  $this->builder_view();
}