<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    if (is_product()) {
        if(function_exists('woocommerce_output_related_products')){
            woocommerce_output_related_products();
        }
    } else {
        $this->builder_view();
        }