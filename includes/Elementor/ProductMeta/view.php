<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$layout = $settings['se_product_meta_select']

?>
<div class="se-product-meta <?php echo esc_attr($layout); ?>">
    <?php

        if (is_product()) {
            if(function_exists('woocommerce_template_single_meta')){
                woocommerce_template_single_meta();
            }
            
        } else {
        $this->builder_view();
        }

    ?>
</div>