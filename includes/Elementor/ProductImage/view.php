<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-product-image">  
    <?php 
// Get Product Id 
if (is_product()) {
    if(function_exists('woocommerce_show_product_images')){
        woocommerce_show_product_images();
    }
} else {
    ?>
    <div class="se-w-full se-h-full se-relative">
        <!-- icon  -->
        <span class="se-absolute se-right-4 se-top-3 se-w-5 se-h-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-6 se-h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <!-- preview image  -->
        <figure class="se-w-full se-h-full se-aspect-video">
            <img src="<?php echo esc_url(REDQ_SE_IMAGE); ?>/place-holder.webp" alt="placeholder" class="se-w-full se-h-full se-object-cover">
        </figure>
    </div>
<?php
}
?>
</div>