<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="add-to-cart">
    <?php 
        $product_id = $product_post_id;
        $product = wc_get_product($product_id);
        if ($product && !$is_editor) {
            if(function_exists('woocommerce_template_single_add_to_cart')){
                woocommerce_template_single_add_to_cart();
            }
        } else { ?>
        <form class="cart" action="" method="post" enctype="multipart/form-data">
            <div class="quantity">
                <label class="screen-reader-text" for="quantity_651a589e5f493"><?php echo esc_html__('WordPress Pennant quantity', 'superelements-elementor-addons-widgets-templates') ?></label>
                    
                    <div class="quantity-btn quantity-btn-down">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M3.75 12a.75.75 0 01.75-.75h15a.75.75 0 010 1.5h-15a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path></svg>
                    </div>
                        
                    <input type="number" id="quantity_651a589e5f493" class="input-text qty text" name="quantity" value="6" aria-label="Product quantity" size="4" min="1" max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                    
                    <div class="quantity-btn quantity-btn-up">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg>
                    </div>
                    
                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html__('Add to cart', 'superelements-elementor-addons-widgets-templates'); ?></button>
            </div>
        </form>
    <?php } ?>
</div>
