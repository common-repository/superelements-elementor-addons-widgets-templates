<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (is_product()) {
    if(function_exists('woocommerce_template_single_price')){
        woocommerce_template_single_price();
    }
} else {
   $this->builder_view();
}