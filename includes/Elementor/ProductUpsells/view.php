<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (is_product()) {
    if(function_exists('woocommerce_upsell_display')){
        woocommerce_upsell_display();
    }
} else {
  $this->woocommerce_upsell_display();
}