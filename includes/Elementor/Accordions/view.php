<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if (empty($accordions) || !is_array($accordions)) {
    return;
}
?>
<div class="accordion-container lg:se-container se-mx-auto se-px-4">
    <div class="accordion-wrapper se-mx-auto">
        <?php foreach ($accordions as $key => $accordion) : ?>     
            <div class="accordion-item se-mb-4 se-bg-white se-drop-shadow se-rounded-lg">
                <h3 class="accordion-title se-px-8 se-py-6 se-m-0 se-mb-0 se-text-left se-flex se-items-center se-justify-between se-w-full focus:se-border-none focus:se-outline-none se-group se-text-lg se-font-medium se-cursor-pointer">
                    <span class="se-text-inherit se-w-full se-block se-truncate"><?php echo esc_html($accordion['accordion_title']); ?></span>
                    <span class="accordion-icon group-[.active]:se-rotate-90 se-transition-transform se-duration-200">
                      <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                </h3>
                <div class="accordion-body se-overflow-hidden se-hidden">
                    <p class="accordion-content se-px-8 se-pb-8 se-m-0 se-mb-0"> <?php echo wp_kses_post($accordion['accordion_content']); ?></p>
                </div>
            </div>    
        <?php endforeach; ?>
    </div>
</div>