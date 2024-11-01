<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$effect = $settings['video_has_play_effect'];
$videoUrl = $settings['se_video_url'];

?>

<div class="se-pop-up-wrapper se-relative se-w-full se-h-full se-aspect-square se-flex se-justify-center se-items-center">
    <div class="se-pop-up-image se-w-full se-z-10 se-h-full se-absolute se-overflow-hidden se-inset-0 se-rounded-lg [&_img]:se-w-full [&_img]:!se-h-full [&_img]:se-object-cover">
        <?php
            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'class', 'my-custom-class' );
            echo wp_kses_post(\Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image' ));
        ?>
    </div>

    <!-- Poster Image Background  -->
    <div class="image-background se-absolute se-max-w-md se-bottom-0 se-left-0 se-w-full se-h-1/2 se--translate-x-1/3 se-translate-y-1/3 se-hidden xl:se-block [&_img]:se-w-full [&_img]:!se-h-full [&_img]:se-object-cover">
        <?php echo wp_kses_post(wp_get_attachment_image($settings['video_poster_image_bg']['id'], 'full' )); ?>
    </div>

    <!-- video play button  -->
    <div class="video-play-button se-relative se-z-20 se-w-20 se-h-20 lg:se-w-24 lg:se-h-24 se-rounded-full">
        <?php 
         $button_class = 'play-video '.$video_has_play_effect;
        ?>
        <button class="se-modal-handler se-w-full se-h-full se-text-3xl lg:se-text-4xl se-bg-[#ffffff80] hover:se-bg-[#ffffff80] se-text-white se-border-none se-outline-none focus:se-border-none focus:se-outline-none se-rounded-full <?php echo esc_attr($button_class); ?>" data-src="<?php echo esc_attr($se_video_url); ?>">
            <?php \Elementor\Icons_Manager::render_icon( $settings['video_play_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </button>
        <span class="video-play-animation se--z-10 se-absolute se-left-0 se-top-0 se-inline-flex se-h-full se-w-full se-rounded-full se-bg-[#EA3A60] se-opacity-75 <?php echo esc_attr($effect ? 'se-animate-ping-motion' : ''); ?> "></span>
    </div>


    <!-- modal  -->
    <div class="se-modal-container se-cursor-pointer se-fixed se-inset-0 se-z-[99] se-hidden se-bg-gray-700/80 se-px-4 se-backdrop-blur-md se-justify-center se-items-center [&.active]:!se-flex">
        <div class="se-modal se-cursor-auto se-relative se-shadow-main se-max-w-2xl lg:se-max-w-4xl 3xl:se-max-w-6xl se-aspect-video se-w-full se-p-0.5 se-bg-white">
        <!-- close modal button -->
            <button class="se-close-modal se-absolute se-right-0 se-top-0 se-translate-x-1/2 se--translate-y-1/2 se-w-8 active:se-scale-95 se-transition-transform se-h-8 se-rounded-full se-border-none se-outline-none focus:se-border-none focus:se-outline-none se-bg-[#0F2137] se-text-[#EA3A60] se-flex se-justify-center se-items-center hover:se-bg-[#0F2137] hover:se-text-[#EA3A60]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-4 se-h-4 se-shrink-0">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
            <iframe class="se-video-paly se-w-full se-h-full" src="<?php echo esc_attr($videoUrl) ?>"  frameborder="0" allowfullscreen>
            </iframe>
        </div>
    </div>
   
</div>