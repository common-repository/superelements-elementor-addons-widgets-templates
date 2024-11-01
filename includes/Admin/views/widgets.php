<?php      
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
<div class="se-admin-widget se-pe-3 lg:se-pe-6 se-mt-6 se-relative se-w-full se-overflow-hidden">

    <!-- all the notifications  -->
    <div class="se-widget-saved-changes se-group se-absolute se-z-10 se-right-12 se-top-20 se-w-80 se-h-auto se-translate-x-96 [&.active]:se-translate-x-0 [&.notify-error]:se-translate-x-0 se-transition-transform se-duration-300 se-ease-in-out">
        <div class="se-p-5 se-bg-white se-drop-shadow se-rounded-md se-flex se-items-center se-gap-3 se-relative se-overflow-hidden">
            <span class="group-[.active]:se-text-green-500 group-[.notify-error]:se-text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-8 se-h-8">
                    <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                </svg>
            </span>
            <p class="se-text-base se-text-brand se-font-medium se-hidden group-[.active]:se-inline-block"><?php esc_html_e('Saved Changes Successfully.', 'superelements-elementor-addons-widgets-templates'); ?></p>
            <p class="se-text-base se-text-brand se-font-medium se-hidden group-[.notify-error]:se-inline-block"><?php esc_html_e('Something Went Wrong.', 'superelements-elementor-addons-widgets-templates'); ?></p>
            <span class="se-w-0 se-h-1 group-[.active]:se-bg-green-500 group-[.notify-error]:se-bg-red-500 block se-absolute se-bottom-0 se-left-0 group-[.active]:se-w-full group-[.notify-error]:se-w-full se-transition-all se-duration-[3000ms] se-delay-500 se-ease-in-out"></span>
        </div>
    </div>

    <!-- contents  -->
    <div class="se-p-6 se-pt-0 se-bg-white se-rounded-md se-drop-shadow">
        <form id="se-widgets-form" method="POST">
            <!-- header  -->
            <div class="se-py-5 se-flex se-flex-col sm:se-flex-row se-items-center se-justify-between se-gap-5 se-border-b se-border-gray-300">
                <div class="se-flex se-items-center se-gap-5">
                    <span class="se-w-12 se-h-12 se-bg-brand/10 se-text-brand se-p-2 se-rounded se-inline-flex se-items-center se-justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="se-w-6 se-h-6"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21.64 3.64l-1.28-1.28a1.21 1.21 0 0 0-1.72 0L2.36 18.64a1.21 1.21 0 0 0 0 1.72l1.28 1.28a1.2 1.2 0 0 0 1.72 0L21.64 5.36a1.2 1.2 0 0 0 0-1.72ZM14 7l3 3M5 6v4m14 4v4M10 2v2M7 8H3m18 8h-4M11 3H9"/></svg>
                    </span>
                    <h2 class="se-text-2xl se-text-brand se-font-bold"><?php esc_html_e('Widgets', 'superelements-elementor-addons-widgets-templates'); ?></h2>
                </div>
                <div class="se-flex se-flex-col md:se-flex-row se-items-center se-gap-5 md:se-gap-10 se-w-full sm:se-w-auto">

                    <!-- enable all disable all switch  -->
                    <div class="se-flex se-items-center se-shrink-0 se-gap-4">
                        <button type="button" id="enableAll" class="se-text-sm se-font-medium se-text-brand/50 se-cursor-pointer se-outline-none focus:se-shadow-none hover:se-text-brand [&.active]:se-text-brand <?php echo esc_attr($enable_all == 1 ? 'active' : '') ;?>"><?php esc_html_e('Enable All', 'superelements-elementor-addons-widgets-templates'); ?></button>
                        <label for="enableDisableAllCheckbox" class="se-group/switch se-mb-0 se-inline-flex se-items-center [&_.knob]:se-bg-gray-900 [&_.knob]:se-text-white">
                            <input id="enableDisableAllCheckbox" type="checkbox" class="se-peer/switch se-absolute se--z-[1] se-opacity-0 [&:checked:enabled~span>.knob>.knob-off-icon]:se-hidden [&:checked:enabled~span>.knob>.knob-on-icon]:se-opacity-100 [&:checked:enabled~span>.knob]:se-text-brand [&:checked:enabled~span>.knob]:se-bg-white [&:checked+span>.knob]:se-translate-x-[1.14rem] rtl:[&:checked+span>.knob]:se--translate-x-[1.14rem]" <?php checked($enable_all, 1) ;?>>
                            <span class="se-flex se-items-center se-cursor-pointer se-transition se-duration-200 se-ease-in-out se-w-10 se-h-6 se-rounded-full se-border se-border-gray-900 peer-checked/switch:se-bg-gray-900 peer-checked/switch:se-border-gray-900">
                                <span class="knob se-relative se-flex se-justify-center se-items-center se-transform se-transition se-duration-200 se-ease-in-out se-w-[1.13rem] se-h-[1.13rem] se-rounded-full se-translate-x-[2.5px] rtl:se--translate-x-[2.5px] se-bg-gray-300 se-text-gray-900">
                                        <span class="knob-off-icon se-inline-flex se-items-center"></span>
                                        <span class="knob-on-icon se-absolute se-inset-0 se-inline-flex se-items-center se-justify-center se-opacity-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="se-h-3.5 se-w-3.5">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </span>
                            </span>
                        </label>
                        <button type="button" id="disableAll" class="se-text-sm se-font-medium se-text-brand/50 se-cursor-pointer se-outline-none focus:se-shadow-none hover:se-text-brand [&.active]:se-text-brand <?php echo esc_attr($enable_all != 1 ? 'active' : '') ;?>"><?php esc_html_e('Disable All', 'superelements-elementor-addons-widgets-templates'); ?></button>
                    </div>

                    <!-- save changes button  -->
                    <button type="submit" class="se-block se-w-full md:se-w-auto se-text-center se-text-sm se-font-medium se-cursor-pointer se-outline-none focus:se-shadow-none se-text-white hover:se-text-white se-px-4 se-py-3 se-bg-brand se-rounded-md hover:se-shadow-lg se-transition-all se-tracking-wider active:se-translate-y-0.5 focus:se-text-white se-save-widget-settings"><?php esc_html_e('Save Changes', 'superelements-elementor-addons-widgets-templates'); ?></button>
                </div>
            </div>

            <!-- body -->
            <div class="se-widgets-body">
                <!-- notice  -->
                <p class="se-text-base se-p-5 se-border se-border-gray-300 se-rounded-md se-border-l-8 se-border-l-brand se-mt-8"><?php esc_html_e('You can disable the elements you are not using on your site. That will disable all associated assets of those widgets to improve your site loading speed.', 'superelements-elementor-addons-widgets-templates'); ?></p>

                <!-- card section start -->
                <div class="se-mt-8 sm:se-mt-12">
                    <h3 class="se-text-xl se-font-semibold se-text-brand"><?php esc_html_e('General Widgets', 'superelements-elementor-addons-widgets-templates'); ?></h3>

                    <!-- cards container  -->
                    <div class="se-mt-4 sm:se-mt-6 se-grid se-grid-cols-1 sm:se-grid-cols-2 md:se-grid-cols-3 2xl:se-grid-cols-4 se-gap-4 xl:se-gap-6">
                        <!-- card  -->
                        <?php foreach ($widgets_list as $handle => $widget): ?>
                        <?php 
                        $key    = strtolower($handle);
                        $active = isset($widget_settings[$key]) ? $widget_settings[$key] : 0
                        ?>
                            <button type="button" class="widget-item se-px-5 se-py-4 se-rounded-md se-bg-white se-flex se-items-center se-justify-between se-border se-border-gray-300 hover:se-drop-shadow se-transition-all se-duration-300 se-cursor-pointer se-w-full se-gap-6 [&.active]:se-border-brand/40 <?php echo esc_attr($active ? 'active' : '')?>">
                                <span class="se-inline-block se-text-base se-font-medium se-text-brand se-capitalize"><?php echo esc_html($widget['label']); ?></span>

                                <label for="<?php echo esc_attr($key); ?>" class="se-group/switch se-mb-0 se-inline-flex se-items-center [&_.knob]:se-bg-gray-900 [&_.knob]:se-text-white">
                                    <input id="<?php echo esc_attr($key); ?>" type="checkbox" class="se-peer/switch se-absolute se--z-[1] se-opacity-0 [&:checked:enabled~span>.knob>.knob-off-icon]:se-hidden [&:checked:enabled~span>.knob>.knob-on-icon]:se-opacity-100 [&:checked:enabled~span>.knob]:se-text-brand [&:checked:enabled~span>.knob]:se-bg-white [&:checked+span>.knob]:se-translate-x-[1.14rem] rtl:[&:checked+span>.knob]:se--translate-x-[1.14rem]" name="<?php echo esc_attr($key); ?>" value="1" <?php checked($active, 1); ?>>
                                    <span class="se-flex se-items-center se-cursor-pointer se-transition se-duration-200 se-ease-in-out se-w-10 se-h-6 se-rounded-full se-border se-border-gray-900 peer-checked/switch:se-bg-gray-900 peer-checked/switch:se-border-gray-900">
                                        <span class="knob se-relative se-flex se-justify-center se-items-center se-transform se-transition se-duration-200 se-ease-in-out se-w-[1.13rem] se-h-[1.13rem] se-rounded-full se-translate-x-[2.5px] rtl:se--translate-x-[2.5px] se-bg-gray-300 se-text-gray-900">
                                            <span class="knob-off-icon se-inline-flex se-items-center"></span>
                                            <span class="knob-on-icon se-absolute se-inset-0 se-inline-flex se-items-center se-justify-center se-opacity-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="se-h-3.5 se-w-3.5">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- card section start -->
                <div class="se-mt-8 sm:se-mt-12">
                    <h3 class="se-text-xl se-font-semibold se-text-brand"><?php esc_html_e('WooCommerce Widgets', 'superelements-elementor-addons-widgets-templates'); ?></h3>

                    <!-- cards container  -->
                    <div class="se-mt-4 sm:se-mt-6 se-grid se-grid-cols-1 sm:se-grid-cols-2 md:se-grid-cols-3 2xl:se-grid-cols-4 se-gap-4 xl:se-gap-6">
                        <!-- card  -->
                        <?php foreach ($woo_widgets_list as $handle => $widget): ?>
                        <?php 
                        $key    = strtolower($handle);
                        $active = isset($widget_settings[$key]) ? $widget_settings[$key] : 0
                        ?>
                            <button type="button" class="widget-item se-px-5 se-py-4 se-rounded-md se-bg-white se-flex se-items-center se-justify-between se-border se-border-gray-300 hover:se-drop-shadow se-transition-all se-duration-300 se-cursor-pointer se-w-full se-gap-6 [&.active]:se-border-brand/40 <?php echo esc_attr($active ? 'active' : '')?>">
                                <span class="se-inline-block se-text-base se-font-medium se-text-brand se-capitalize"><?php echo esc_html($widget['label']); ?></span>

                                <label for="<?php echo esc_attr($key); ?>" class="se-group/switch se-mb-0 se-inline-flex se-items-center [&_.knob]:se-bg-gray-900 [&_.knob]:se-text-white">
                                    <input id="<?php echo esc_attr($key); ?>" type="checkbox" class="se-peer/switch se-absolute se--z-[1] se-opacity-0 [&:checked:enabled~span>.knob>.knob-off-icon]:se-hidden [&:checked:enabled~span>.knob>.knob-on-icon]:se-opacity-100 [&:checked:enabled~span>.knob]:se-text-brand [&:checked:enabled~span>.knob]:se-bg-white [&:checked+span>.knob]:se-translate-x-[1.14rem] rtl:[&:checked+span>.knob]:se--translate-x-[1.14rem]" name="<?php echo esc_attr($key); ?>" value="1" <?php checked($active, 1); ?>>
                                    <span class="se-flex se-items-center se-cursor-pointer se-transition se-duration-200 se-ease-in-out se-w-10 se-h-6 se-rounded-full se-border se-border-gray-900 peer-checked/switch:se-bg-gray-900 peer-checked/switch:se-border-gray-900">
                                        <span class="knob se-relative se-flex se-justify-center se-items-center se-transform se-transition se-duration-200 se-ease-in-out se-w-[1.13rem] se-h-[1.13rem] se-rounded-full se-translate-x-[2.5px] rtl:se--translate-x-[2.5px] se-bg-gray-300 se-text-gray-900">
                                            <span class="knob-off-icon se-inline-flex se-items-center"></span>
                                            <span class="knob-on-icon se-absolute se-inset-0 se-inline-flex se-items-center se-justify-center se-opacity-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="se-h-3.5 se-w-3.5">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </form>        
    </div>
</div>