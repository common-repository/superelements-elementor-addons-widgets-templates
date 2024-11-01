<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 $wrapper_class = [];
 $wrapper_class[] = 'se-subscription-block-container';
 $wrapper_class[] = $settings['button_style'];
?>
<div class="se-group <?php echo esc_attr(join(' ', $wrapper_class)); ?>">
    <div class="se-subscribe-form-wrap se-subscribe-form-block">
        <div class="se-subscribe-container">
            <div class="se-subscribe-data">
                <h2 class="se-title"><?php echo esc_html($settings['title']); ?></h2>
                <p class="se-subscribe-message"><?php echo wp_kses_post($settings['text']); ?></p>
                <form method="post" class="se-subscription se-mx-auto se-relative group-[.overlay]:se-p-3 group-[.overlay]:se-bg-brand/10 group-[.overlay]:se-rounded-full">
                    <input type="hidden" name="audienceid" value="<?php echo esc_attr($settings['sf_audienceId']); ?>">
                    <input type="hidden" name="api" value="<?php echo esc_attr($settings['sf_api']);  ?>">
                    <?php 
                     
                     $dc_get = explode('-', $settings['sf_api']);
                     $dc = 'us4';
                     if(!empty($dc_get)){
                        $dc = end($dc_get);
                     }
                    ?>
                    <input type="hidden" name="dc" value="<?php echo esc_attr($dc);  ?>">
                    <div class="se-input-group se-flex se-flex-col sm:se-flex-row sm:se-items-center">
                        <input type="text" name="email" class="email se-form-control focus:!se-border-none focus:!se-outline-none se-outline-none se-grow group-[.overlay]:se-border-none group-[.overlay]:se-rounded-full" placeholder="Enter your email">
                        <button class="se-subscribe-submit focus:!se-outline-none !se-outline-none group-[.overlay]:se-bg-brand group-[.overlay]:se-border-brand group-[.overlay]:se-text-white group-[.overlay]:se-rounded-full" type="submit"><?php echo esc_html($settings['button_text']); ?></button>
                    </div>
                    <p class="se-alert se-absolute se-left-0 se--bottom-9"></p>
                </form>
            </div>
        </div>
    </div>
</div>