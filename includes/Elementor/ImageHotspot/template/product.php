<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 $class = ['pointer se-peer se-absolute se-z-10'];
 $class[] = 'elementor-repeater-item-'.$pointer_id;
?>
<div <?php wc_product_class( join(' ', $class), $product ); ?>>
    <?php include __DIR__.'/ping.php'; ?>
    <div class="se-z-10 pointer-content se-invisible se-opacity-0 se-transition-all se-duration-300 se-absolute se-w-[250px] se-bg-white se-p-[15px] se-rounded se-left-[calc(100%_+_10px)] se-top-[-20px]">
        <?php woocommerce_template_loop_product_link_open(); ?>    
            <div class="hotspot-content-image">   
                <?php woocommerce_template_loop_product_thumbnail(); ?>
            </div>
            <div class="heading">
                <?php woocommerce_template_loop_product_title(); ?>
            </div>
        <?php woocommerce_template_loop_product_link_close(); ?>
        <div>
            <?php woocommerce_template_loop_price(); ?>
        </div>
        <div class="content">
            <?php echo wp_kses_post(get_the_excerpt($product_id)); ?>
        </div>
        <div class="add-to-cart">
            <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</div>