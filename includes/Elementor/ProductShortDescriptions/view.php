<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-product-short-description [&_p]:se-text-brand">
<?php
if (is_product()) {
    if(function_exists('woocommerce_template_single_excerpt')){
        woocommerce_template_single_excerpt();
    }
    
} else {
    $this->builder_view();
}
?>
</div>