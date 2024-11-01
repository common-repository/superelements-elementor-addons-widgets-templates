<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$items_count = WC()->cart->get_cart_contents_count();
$super_cart_count = $items_count ? $items_count : '0';

?>

<div class="se-mini-cart se-group">

    <!-- mini cart handler -->
    <button aria-label="open mini cart drawer" class="se-mini-cart-handler se-text-lg se-p-0 se-m-0 se-rounded-none se-border-none se-bg-transparent hover:se-bg-transparent se-relative se-transition-all se-duration-200">

    <span class="se-mini-cart-counter se-absolute -se-top-1 se-left-full se-z-10 se-text-sm se-bg-brand se-text-white se-px-1.5 se-rounded-full se-inline-block">
        <span class="se-counter"><?php echo esc_html($super_cart_count); ?></span>
    </span>

    <?php
        if ($se_mini_cart_handler_icon) {
            \Elementor\Icons_Manager::render_icon($se_mini_cart_handler_icon, ['aria-hidden' => 'true']);
        }
        if ($se_mini_cart_handler_image) {
            echo wp_get_attachment_image($se_mini_cart_handler_image['id'], [30, 30], true, ['loading' => 'lazy', 'alt' => esc_html__('mini-cart-icon', 'superelements-elementor-addons-widgets-templates'), 'class' => 'se-w-full !se-h-full se-object-contain']);
        }?>
    </button>

    
        <!-- mini cart content -->
        <div class="se-mini-cart-content se-bg-white se-max-w-sm se-w-full se-fixed se-inset-y-0 se-z-20 se-end-0 se-translate-x-full group-[.active]:se-translate-x-0 [body.admin-bar_&]:se-pt-8 se-flex se-flex-col se-justify-center se-items-center se-transition-transform se-duration-300">
            
            <div class="se-mini-cart-header se-flex se-items-center se-justify-between se-text-brand se-p-4 se-w-full se-border-b se-border-b-[#dfdfdf]">
                <p class="se-mini-cart-header-title se-text-lg se-font-medium se-m-0">
                    <?php echo esc_html__('Shopping Cart', 'superelements-elementor-addons-widgets-templates'); ?>
                </p>
                <button aria-label="close mini cart drawer" class="se-mini-cart-close se-p-0 se-text-lg se-m-0 se-rounded-none se-border-none se-text-brand se-bg-transparent hover:se-text-brand hover:se-bg-transparent se-transition-all se-duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-6 se-h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <div class="se-mini-cart-list-container se-h-full se-overflow-y-auto se-overflow-x-hidden se-w-full se-grow se-relative se-flex se-flex-col group-[.loading]:se-justify-center group-[.loading]:se-items-center group-[.empty-cart]:se-justify-center group-[.empty-cart]:se-items-center">

                <span class="se-w-10 se-h-10 se-hidden se-rounded-full group-[.loading]:se-inline-block se-border-4 se-border-brand/50 se-border-r-transparent se-animate-spin se-mx-auto"></span>

                <div class="se-hidden group-[.loading]:se-hidden group-[.empty-cart]:se-block se-text-center">
                    <?php if($mini_cart_empty_image['id']) : ?>
                        <figure class="se-m-0 se-max-w-xs se-w-full">
                            <?php echo wp_get_attachment_image($mini_cart_empty_image['id'], [400, 300], false, ['loading' => 'lazy', 'alt' => esc_html__('mini cart empty image', 'superelements-elementor-addons-widgets-templates'), 'class' => 'se-w-full se-object-contain']); ?>
                        </figure>
                    <?php endif; ?>
                    <p><?php echo esc_html($mini_cart_empty_text); ?></p>
                </div>
                
                <div class="se-mini-cart-list se-flex se-flex-col group-[.loading]:se-hidden group-[.empty-cart]:se-hidden se-h-full">
                    <?php woocommerce_mini_cart(); ?>
                </div>
            </div>
            
        </div>
        
        <div class="se-mini-cart-overlay se-fixed se-inset-0 se-z-10 se-bg-brand/30 se-backdrop-blur-sm se-invisible group-[.active]:se-visible se-opacity-0 group-[.active]:se-opacity-100 se-transition-opacity se-duration-200 se-cursor-pointer"></div>

</div>
