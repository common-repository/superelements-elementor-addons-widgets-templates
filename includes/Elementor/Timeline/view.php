<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-timeline-card se-flex">
    <div class="se-timeline-icon">
        <span class="se-flex se-justify-center se-items-center se-p-5 se-border se-border-brand/20 se-rounded-lg se-text-5xl se-font-bold"><?php echo esc_html($settings['timeline_count']); ?></span>
    </div>
    <div class="se-timeline-content">
        <h2 class="se-timeline-title se-text-2xl"><?php echo esc_html($settings['title']); ?></h2>
        <p class="se-timeline-desc"><?php echo wp_kses_post($settings['content']); ?></p>
    </div>
    <?php echo wp_kses_post(wp_get_attachment_image($settings['timeline_image']['id'], 'full', null, ['class' => 'se-absolute se-top-0 se-left-full se-hidden xl:se-block timeline-pos'])); ?>
</div>