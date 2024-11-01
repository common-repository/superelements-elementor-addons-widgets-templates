<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    if ( $menu_items ):
     $header_menu = [];
     $header_menu[] = 'primary-navigation-menu se-transition-all se-duration-300 se-left-0 se-top-0 se-z-30 se-w-full se-min-h-[50px] xl:se-min-h-[60px] se-scroll-class';
     $header_menu[] = $settings['se_sticky_menu'];
    ?>
<header class="<?php echo esc_attr(join(' ', $header_menu)); ?>">
    <div class="menu-container se-w-full se-flex se-items-center se-justify-between se-gap-4">
        <!-- LOGO -->
        <div class="site-logo se-w-32 se-h-20">
            <a class="se-inline-block se-max-w-[140px] sm:se-max-w-full se-w-full se-h-full [&>img]:!se-h-full [&>img]:se-w-full" <?php echo esc_attr($this->get_render_attribute_string( 'site_link' )); ?>>
                <?php echo wp_kses_post( wp_get_attachment_image( $settings['site_logo']['id'], 150));?>
            </a>
        </div>
        <!-- NAV --> 
        <nav class="horizontal se-hidden lg:se-block">
            <?php  
                $args = [
                    'menu'=> $settings['selected_menu'],
                    'walker'=> new \SuperElement\SuperNavWalker()
                ];
                wp_nav_menu($args);
            ?>
        </nav>

        <!-- BUTTON -->
        <?php if ( $settings['show_button']==='true' ):?>
        <div class="nav-button se-ms-auto se-shrink-0 lg:se-ms-0 se-text-center">
                <a class='se-inline-block se-transition-all se-duration-300 nav-menu-button se-border se-border-brand/20 se-rounded-full se-px-4 se-py-3' <?php echo esc_attr($this->get_render_attribute_string( 'button_link' )); ?>>
                    <?php echo esc_html($settings['button_text'])?>
                </a>
            </div>
        <?php endif?>

        <!-- small screen menu  -->
        <div class="lg:se-hidden">
            <button class="se-open-drawer se-align-middle se-border-none se-p-0 se-outline-none se-bg-white focus:se-outline-none se-text-[#343D48] hover:se-text-[#EA3A60] hover:se-bg-transparent">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-8 se-h-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>
            </button>

            <!-- small screen drawer menu  -->
            <div class="se-drawer-wrapper se-hidden se-fixed se-inset-0 se-z-[99] se-bg-gray-700/80 se-backdrop-blur-md se-cursor-pointer se-overflow-hidden [&.active]:se-block">
                <div class="se-drawer-content se-max-w-sm se-bg-white se-w-full se-h-full se-ms-auto se-relative se-z-10 se-cursor-auto se-translate-x-full se-transition-transform se-duration-200">
                    <div class="drawer-header se-flex se-items-center se-justify-end se-p-5 se-border-b se-border-b-gray-200">
                        <!-- <h2 class="m-0 text-xl">Drawer Header</h2> -->
                        <button class="se-close-drawer se-align-middle se-bg-white se-p-0.5 se-outline-none focus:se-outline-none se-rounded-full se-border se-border-[#343D48] se-text-[#343D48] hover:se-text-[#EA3A60] hover:se-border-[#EA3A60] hover:se-bg-transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-4 se-h-4">
                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <nav class="vertical se-px-6 se-mt-5 se-h-[calc(100%-93px)] se-overflow-y-auto se-overflow-x-hidden">
                    <?php  
                        $args = [
                            'menu'=> $settings['selected_menu'],
                            'walker'=> new \SuperElement\SuperNavWalkerMobile()
                        ];
                        wp_nav_menu($args);
                    ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<?php else:?>
    <h4 class="se-text-rose-700 se-font-bold se-text-center"><?php esc_html_e('NO MENU ITEMS FOUND','superelements-elementor-addons-widgets-templates')?></h4>          
<?php endif?>
