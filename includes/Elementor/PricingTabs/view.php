<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class='se-tab-container se-w-full se-overflow-x-auto se-overflow-y-hidden se-pb-1'>
   <div class="pricing-tab-menu se-flex se-justify-center se-items-center">
        <div class="se-pricing-tab-wrapper se-p-1.5 se-flex se-justify-center se-items-center se-gap-1 se-rounded-md se-bg-[#F7F8FB]">
            <button data-target="f1-content" class="se-pricing-tab-item se-border-none se-outline-none focus:se-border-none focus:se-outline-none hover:se-bg-white se-rounded-md hover:se-text-brand se-text-brand [&.active]:se-bg-white [&.active]:se-shadow-md active se-px-4 se-py-3 focus:se-bg-transparent focus:se-text-brand" ><?php echo esc_html($settings['f1_tab_title']); ?></button>
            <button data-target="f2-content" class="se-pricing-tab-item se-border-none se-outline-none focus:se-border-none focus:se-outline-none hover:se-bg-white se-rounded-md hover:se-text-brand se-text-brand [&.active]:se-bg-white [&.active]:se-shadow-md se-px-4 se-py-3 focus:se-bg-transparent focus:se-text-brand" ><?php echo esc_html($settings['f2_tab_title']); ?></button>
        </div>
   </div>
   <div class="pricing-tab-content se-mt-10 xl:se-mt-16">
        <!-- tab content section start  -->
        <div class="f1-content se-grid se-grid-cols-1 md:se-grid-cols-2 se-gap-12 md:se-gap-6 lg:se-gap-8">

            <!-- pricing content card one  -->
            <div class="pricing-content se-relative se-flex se-flex-col se-border se-border-brand/20 se-p-6 lg:se-p-10 se-rounded-lg">
                <?php if($f1_show_batch == 'yes'): ?>  
                    <div class="pricing-recommended-batch se-absolute se-top-0 se--translate-y-1/2 se-left-10 se-bg-brand se-text-white se-rounded-md se-text-sm se-px-3 se-py-1.5">
                        <?php echo esc_html($f1_pricing_batch_text); ?>
                    </div>
                <?php endif; ?> 
                <div class="header">

                    <div class="icon se-text-5xl">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['f1_tab_content_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <h2 class="title se-text-2xl se-my-6">
                        <?php echo esc_html($f1_pricing_title); ?>
                    </h2>
                </div>
                <div class="content se-grow">
                    <ul class="se-grid se-grid-cols-1 se-gap-3 !se-pl-0">
                        <?php
                            if(!empty($f1_tab_content_list)){
                                foreach($f1_tab_content_list as $list){?>
                                    <li id="<?php echo esc_attr($list['_id']); ?>" class="se-flex se-items-start se-gap-3 se-text-base">
                                        <span class="se-pricing-list-icon active"><?php \Elementor\Icons_Manager::render_icon( $list['f1_tab_content_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                        <span><?php echo esc_html($list['f1_tab_content_list_item']); ?></span>
                                    </li>
                                <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="pricing-footer se-group se-pt-10">
                    <?php 
                        if ( ! empty( $settings['f1_package_link_monthly']['url'] ) ) {
                            $this->add_link_attributes( 'f1_package_link_monthly', $settings['f1_package_link_monthly'] );
                        }        
                    ?>
                    <p class="pricing-footer-text se-text-2xl se-font-medium se-m-0 se-pb-2"><?php echo esc_html($f1_tab_button_text); ?></p>
                    <a <?php echo esc_attr($this->get_render_attribute_string( 'f1_package_link_monthly' )); ?> data-yearly-url="<?php echo esc_attr($f1_package_link_yearly['url']); ?>" data-monthly-url="<?php echo esc_attr($f1_package_link_monthly['url']); ?>" class="pricing-footer-link se-flex se-items-center se-justify-between se-text-xl se-text-brand">
                        <span data-yearly="<?php echo esc_attr($f1_tab_price_yearly); ?>" data-monthly="<?php echo esc_attr($f1_tab_price_monthly); ?>"><?php echo esc_html($f1_tab_price_monthly); ?></span>
                        <span class="pricing-footer-icon group-hover:se-translate-x-2 se-transition-transform se-duration-200"> <?php \Elementor\Icons_Manager::render_icon( $settings['f1_link_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    </a>
                </div>
            </div>

            <!-- pricing content card two  -->
            <div class="pricing-content se-relative se-flex se-flex-col se-border se-border-brand/20 se-p-6 lg:se-p-10 se-rounded-lg">
                <?php if($f2_show_batch == 'yes'): ?>  
                    <div class="pricing-recommended-batch se-absolute se-top-0 se--translate-y-1/2 se-left-10">
                        <?php echo esc_html($f2_se_pricing_batch_text); ?>
                    </div>
                <?php endif; ?> 
                <div class="header">
                    <div class="icon se-text-5xl">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['f2_tab_content_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <h2 class="title se-text-2xl se-my-6">
                        <?php echo esc_html($f2_pricing_title); ?>
                    </h2>
                </div>
                <div class="content se-grow">
                    <ul class="se-grid se-grid-cols-1 se-gap-3 !se-pl-0">
                        <?php 
                            if(!empty($f2_tab_content_list)){
                                foreach($f2_tab_content_list as $list){?>
                                    <li id="<?php echo esc_attr($list['_id']); ?>" class="se-flex se-items-start se-gap-3 se-text-base">
                                        <span class="se-pricing-list-icon active"><?php \Elementor\Icons_Manager::render_icon( $list['f2_tab_content_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                        <span><?php echo esc_html($list['f2_tab_content_list_item']); ?></span>
                                    </li>
                                <?php 
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="pricing-footer se-group se-pt-10">
                    <?php 
                        if ( ! empty( $settings['f2_package_link_monthly']['url'] ) ) {
                            $this->add_link_attributes( 'f2_package_link_monthly', $settings['f2_package_link_monthly'] );
                        }        
                    ?>
                    <p class="pricing-footer-text se-text-2xl se-font-medium se-m-0 se-pb-2"><?php echo esc_html($f2_tab_button_text); ?></p>
                    <a <?php echo esc_attr($this->get_render_attribute_string( 'f2_package_link_monthly' )); ?> data-yearly-url="<?php echo esc_attr($f2_package_link_yearly['url']); ?>" data-monthly-url="<?php echo esc_attr($f2_package_link_monthly['url']); ?>" class="pricing-footer-link se-flex se-items-center se-justify-between se-text-xl se-text-brand">
                        <span data-yearly="<?php echo esc_attr($f2_tab_price_yearly); ?>" data-monthly="<?php echo esc_attr($f2_tab_price_monthly); ?>"><?php echo esc_html($f2_tab_price_monthly); ?></span>
                        <span class="pricing-footer-icon group-hover:se-translate-x-2 se-transition-transform se-duration-200"> <?php \Elementor\Icons_Manager::render_icon( $settings['f1_link_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                    </a>
                </div>
            </div>

        </div>
        <!-- tab content section end  -->
   </div>
</div>