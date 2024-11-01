<?php      
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
<div class="se-admin-widget se-pe-3 lg:se-pe-6 mt-6">
    <div class="se-p-6 se-pt-0 se-bg-white se-rounded-md se-drop-shadow">

        <!-- header  -->
        <div class="se-py-5 se-flex se-items-center se-justify-between se-border-b se-border-gray-300">
            <div class="se-flex se-items-center se-gap-5">
                <span class="se-w-12 se-h-12 se-bg-brand/10 se-text-brand se-p-2 se-rounded se-inline-flex se-items-center se-justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-6 se-h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </span>
                <h2 class="se-text-2xl se-text-brand se-font-bold"><?php esc_html_e( 'Dashboard', 'superelements-elementor-addons-widgets-templates' ); ?></h2>
            </div>
            <div class="se-flex se-items-center se-bg-brand/10 se-divide-x se-divide-brand se-px-3 se-py-2.5 se-rounded-md">
                <p class="se-m-0 se-text-brand se-text-xs se-font-medium se-tracking-widest se-pe-6 se-leading-none"><?php esc_html_e( 'Super Element', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                <p class="se-m-0 se-text-brand se-text-xs se-font-medium se-tracking-wider se-ps-6 se-leading-none">v1.0.0</p>
            </div>
        </div>

        <!-- body -->
        <div>
            <!-- banner  -->
            <div class="se-py-10">
                <div class="se-bg-brand se-flex se-items-center se-py-16 xl:se-py-20 3xl:se-py-28 se-rounded-md se-overflow-hidden se-relative">
                    <div class="se-z-10 se-px-4 sm:se-px-10 xl:se-px-20 3xl:se-px-40 se-flex se-items-center se-justify-between se-w-full se-gap-10">
                        <div class="se-text-center sm:se-text-start">
                            <figure class="se-mb-6 se-w-16 se-h-auto se-mx-auto sm:se-ms-0 se-aspect-auto">
                             <?php $redq_se_admin_logo_url1 =  REDQ_SE_IMAGE.'/logo.svg'; ?>    
                            <img src="<?php echo esc_url($redq_se_admin_logo_url1); ?>" alt="logo" width="64" height="64" class="se-w-full se-h-full">
                            </figure>
                            <p class="se-text-sm se-font-semibold se-text-white se-mb-3"><?php esc_html_e( 'Unleash the power of Elementor', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                            <h1 class="se-text-4xl 3xl:se-text-5xl se-font-semibold se-text-white se-mb-5"><?php esc_html_e( 'Super Elements', 'superelements-elementor-addons-widgets-templates' ); ?></h1>
                            <p class="se-text-base se-font-normal se-text-white se-leading-8 se-max-w-xl"><?php esc_html_e( 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum assumenda voluptates accusantium deleniti esse illum, a facere quisquam officiis numquam.', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                        </div>
                        <div class="se-hidden md:se-block">
                            <figure class="se-max-w-md se-w-full se-opacity-80">
                                <?php $redq_se_admin_banner_img_url  = REDQ_SE_IMAGE.'/dashboard-banner.png'; ?>
                                <img src="<?php echo esc_url($redq_se_admin_banner_img_url); ?>" alt="logo" width="800" height="600" class="se-w-full se-h-auto">
                            </figure>
                        </div>
                    </div>

                    <!-- circle left shapes  -->
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-r se-from-gray-300 se-to-brand se-rounded-full se-absolute se-left-20 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-r se-from-gray-300 se-to-brand se-rounded-full se-absolute se-left-40 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-r se-from-gray-300 se-to-brand se-rounded-full se-absolute se-left-60 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-r se-from-gray-300 se-to-brand se-rounded-full se-absolute se-left-80 se-bottom-32 se-opacity-[0.03] "></div>
                    <!-- circle right shapes  -->
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-l se-from-gray-300 se-to-brand se-rounded-full se-absolute se-right-20 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-l se-from-gray-300 se-to-brand se-rounded-full se-absolute se-right-40 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-l se-from-gray-300 se-to-brand se-rounded-full se-absolute se-right-60 se-bottom-32 se-opacity-[0.03] "></div>
                    <div class="se-w-[700px] se-h-[700px] se-bg-gradient-to-l se-from-gray-300 se-to-brand se-rounded-full se-absolute se-right-80 se-bottom-32 se-opacity-[0.03] "></div>

                </div>
            </div>

            <!-- documentation  -->
            <div class="se-py-10 xl:se-py-16 3xl:se-py-24 se-max-w-4xl se-mx-auto se-grid se-grid-cols-1 sm:se-grid-cols-2 se-items-center se-gap-5 xl:se-gap-10">
                <figure class="se-max-w-md se-aspect-auto">
                    <?php $redq_se_doc_link_img =  REDQ_SE_IMAGE.'/documentation.png'; ?>
                    <img src="<?php echo esc_url($redq_se_doc_link_img);  ?>" alt="logo" width="400" height="300" class="se-w-full se-h-full">
                </figure>
                <div>
                    <p class="se-text-sm se-font-semibold se-text-brand se-mb-3 se-uppercase"><?php esc_html_e( 'Documentation', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                    <h2 class="se-text-2xl md:se-text-3xl se-font-bold se-text-brand se-mb-4 se-capitalize"><?php esc_html_e( 'Easy documentation', 'superelements-elementor-addons-widgets-templates' ); ?></h2>
                    <p class="se-text-base se-font-normal se-text-brand se-leading-8 se-max-w-xl se-mb-6"><?php esc_html_e( 'Get started with a quick start view of documentation to get familiar with Super-Element. Build stunning webpages for you or your clients.', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                    <a href="#" class="se-px-6 se-py-3 se-rounded-lg se-bg-brand se-text-white se-font-medium se-tracking-wider se-text-base hover:se-text-white active:se-translate-y-0.5 se-transition-all se-duration-300 se-inline-flex se-items-center se-gap-3 hover:se-shadow-lg focus:se-text-white se-ring-1 se-ring-brand hover:se-ring-0 se-outline-none focus:se-outline-none focus:se-shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-5 se-h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <?php esc_html_e( 'Documentation', 'superelements-elementor-addons-widgets-templates' ); ?>
                    </a>
                </div>
            </div>

            <!-- tutorials  -->
            <div class="se-py-10 xl:se-py-16 3xl:se-py-24">

                <div class="se-text-center se-mb-8 xl:se-mb-14">
                    <p class="se-text-sm se-font-semibold se-text-brand se-mb-3 se-uppercase"><?php esc_html_e( 'Tutorials', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                    <h2 class="se-text-2xl md:se-text-3xl se-font-bold se-text-brand se-mb-4 se-capitalize"><?php esc_html_e( 'Video Tutorials', 'superelements-elementor-addons-widgets-templates' ); ?></h2>
                    <p class="se-text-base se-font-normal se-text-brand se-leading-6"><?php esc_html_e( 'Short videos tutorials with good explanation.', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                </div>

                <div class="se-grid se-grid-cols-2 3xl:se-grid-cols-4 se-gap-4 xl:se-gap-8 se-text-center">
                    <a href="#" class="se-block">
                        <div class="se-bg-white hover:se-shadow-tutorialCard se-rounded-md se-transition-all se-duration-300 se-border se-border-brand/10 se-p-6 se-h-full se-flex se-flex-col">
                            <figure class="sm:se-max-w-xs se-mx-auto se-aspect-auto se-grow">
                             <?php $redq_se_admin_slider_img = REDQ_SE_IMAGE.'slider.png'; ?>    
                            <img src="<?php echo esc_url($redq_se_admin_slider_img); ?>" alt="logo" width="400" height="400" class="se-w-full se-h-full">
                            </figure>
                            <h3 class="se-text-lg se-text-brand se-font-medium se-mt-4"><?php esc_html_e( 'Slider / Carousel', 'superelements-elementor-addons-widgets-templates' ); ?></h3>
                        </div>
                    </a>

                    <a href="#" class="se-block">
                        <div class="se-bg-white hover:se-shadow-tutorialCard se-rounded-md se-transition-all se-duration-300 se-border se-border-brand/10 se-p-6 se-h-full se-flex se-flex-col">
                            <figure class="sm:se-max-w-xs se-mx-auto se-aspect-auto se-grow">
                                <?php $redq_se_admin_tab = REDQ_SE_IMAGE.'tab.png'; ?> 
                               <img src="<?php echo esc_url($redq_se_admin_tab); ?>" alt="logo" width="400" height="400" class="se-w-full se-h-full">
                            </figure>
                            <h3 class="se-text-lg se-text-brand se-font-medium se-mt-4"><?php esc_html_e( 'Tabs & Accordions', 'superelements-elementor-addons-widgets-templates' ); ?></h3>
                        </div>
                    </a>

                    <a href="#" class="se-block">
                        <div class="se-bg-white hover:se-shadow-tutorialCard se-rounded-md se-transition-all se-duration-300 se-border se-border-brand/10 se-p-6 se-h-full se-flex se-flex-col">
                            <figure class="sm:se-max-w-xs se-mx-auto se-aspect-auto se-grow se-items-start">
                               <?php $redq_se_admin_animation_img =  REDQ_SE_IMAGE.'/animation.png'; ?>  
                              <img src="<?php echo esc_url($redq_se_admin_animation_img); ?>" alt="logo" width="400" height="400" class="se-w-full se-h-full">
                            </figure>
                            <h3 class="se-text-lg se-text-brand se-font-medium se-mt-4"><?php esc_html_e( 'Animations', 'superelements-elementor-addons-widgets-templates' ); ?></h3>
                        </div>
                    </a>

                    <a href="#" class="se-block">
                        <div class="se-bg-white hover:se-shadow-tutorialCard se-rounded-md se-transition-all se-duration-300 se-border se-border-brand/10 se-p-6 se-h-full se-flex se-flex-col">
                            <figure class="sm:se-max-w-xs se-mx-auto se-aspect-auto se-grow se-items-start">
                              <?php $redq_se_img_add_to_cart = REDQ_SE_IMAGE.'add-to-cart.png'; ?>
                              <img src="<?php echo esc_url($redq_se_img_add_to_cart); ?>" alt="logo" width="400" height="400" class="se-w-full se-h-full">
                            </figure>
                            <h3 class="se-text-lg se-text-brand se-font-medium se-mt-4"><?php esc_html_e( 'Add to Cart / Counter', 'superelements-elementor-addons-widgets-templates' ); ?></h3>
                        </div>
                    </a>
                </div>

                <div class="se-mt-10 3xl:se-mt-16 se-text-center">
                    <a href="#" class="se-px-6 se-py-3 se-rounded-lg se-bg-brand se-text-white se-font-medium se-tracking-wider se-text-base hover:se-text-white active:se-translate-y-0.5 se-transition-all se-duration-300 se-inline-flex se-items-center se-gap-3 hover:se-shadow-lg focus:se-text-white se-ring-1 se-ring-brand hover:se-ring-0 se-outline-none focus:se-outline-none focus:se-shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-6 se-h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>
                        <?php esc_html_e( 'All Tutorials', 'superelements-elementor-addons-widgets-templates' ); ?>
                    </a>
                </div>

            </div>

            <!-- request features  -->
            <div class="se-py-16 3xl:se-py-24 se-max-w-5xl se-mx-auto se-grid se-grid-cols-1 sm:se-grid-cols-2 se-justify-between se-gap-5 xl:se-gap-10">
                <div>
                    <p class="se-text-sm se-font-semibold se-text-brand se-mb-3 se-uppercase"><?php esc_html_e( 'Features', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                    <h2 class="se-text-2xl md:se-text-3xl se-font-bold se-text-brand se-mb-4 se-capitalize"><?php esc_html_e( 'Request Features', 'superelements-elementor-addons-widgets-templates' ); ?></h2>
                    <p class="se-text-base se-font-normal se-text-brand se-leading-8 se-max-w-md se-mb-6"><?php esc_html_e( 'Get a new feature or a widget for your website. Or just directly contact with us. Get a new feature or a widget for your website. Or just directly contact with us.', 'superelements-elementor-addons-widgets-templates' ); ?></p>
                    <a href="#" class="se-px-6 se-py-3 se-rounded-lg se-bg-brand se-text-white se-font-medium se-tracking-wider se-text-base hover:se-text-white active:se-translate-y-0.5 se-transition-all se-duration-300 se-inline-flex se-items-center se-gap-3 hover:se-shadow-lg focus:se-text-white se-ring-1 se-ring-brand hover:se-ring-0 se-outline-none focus:se-outline-none focus:se-shadow-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="se-w-6 se-h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <?php esc_html_e( 'Request Features', 'superelements-elementor-addons-widgets-templates' ); ?>
                    </a>
                </div>
                <figure class="se-max-w-md se-aspect-auto">
                    <?php $redq_se_admin_fr =  REDQ_SE_IMAGE.'/feature-request.png'; ?>
                    <img src="<?php echo esc_url($redq_se_admin_fr); ?>" alt="logo" width="400" height="300" class="se-w-full se-h-full se-object-contain">
                </figure>
            </div>

            <!-- love our services  -->
            <div class="se-py-10 sm:se-py-16 3xl:se-py-24 se-text-center">
                <h2 class="se-text-2xl md:se-text-3xl se-font-bold se-text-brand se-mb-2 xl:se-mb-4 se-capitalize"><?php esc_html_e( 'Love Our Features', 'superelements-elementor-addons-widgets-templates' ); ?></h2>
                <p class="se-text-base se-font-normal se-text-brand se-mb-6 md:se-mb-10"><?php esc_html_e( 'Don\'t Forget to Rate', 'superelements-elementor-addons-widgets-templates' ); ?> <span class="se-underline"> <?php esc_html_e( 'Super Element', 'superelements-elementor-addons-widgets-templates' ); ?> </span> </p>
                <a href="#" class="se-px-6 se-w-[300px] md:se-w-[400px] se-py-3 se-rounded-lg se-bg-brand se-text-white se-font-medium se-tracking-wider se-text-base hover:se-text-white active:se-translate-y-0.5 se-transition-all se-duration-300 se-inline-flex se-items-center se-justify-center se-gap-3 hover:se-shadow-lg focus:se-text-white se-ring-1 se-ring-brand hover:se-ring-0 se-outline-none focus:se-outline-none focus:se-shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-6 se-h-6">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                    </svg>
                    <?php esc_html_e( 'Rate Now', 'superelements-elementor-addons-widgets-templates' ); ?>
                    </a>
            </div>
        </div>
        
    </div>

</div>