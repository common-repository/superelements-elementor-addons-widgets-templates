<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    $layout = $settings['se_product_rating_select']
?>
<div class="se-product-rating <?php echo esc_attr($layout); ?> woocommerce">
    <?php
        if (is_product()) {
            if(function_exists('woocommerce_template_single_rating')){
                woocommerce_template_single_rating();
            }
        } else {
            $this->builder_view();
        }
    ?>
</div>