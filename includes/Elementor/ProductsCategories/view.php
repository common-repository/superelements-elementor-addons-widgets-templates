<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
echo  wp_kses_post(do_shortcode('[woocommerce_checkout]'));
