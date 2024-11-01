<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-product-tab-container">
<?php

if (is_product()) {
    if(function_exists('woocommerce_output_product_data_tabs')){
        woocommerce_output_product_data_tabs();
    }
} else {
  $this->builder_view();
}
?>

</div>