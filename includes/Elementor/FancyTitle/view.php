<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-title-wrapper">
    <?php if (!empty($settings['content'])) : ?>
        <p class="se-leading-text se-w-full"><?php echo wp_kses_post($settings['content']) ?></p>
    <?php 
      endif; 
      $heading_tag = $settings['se_heading_header_tag'];
    ?>
    <?php printf('<%s class="se-title-text se-w-full">%s</%s>', 
    wp_kses_post($heading_tag), 
    esc_html($settings['title']), 
    wp_kses_post($heading_tag)); ?>
    <?php if (!empty($settings['description'])) : ?>
        <p class="se-description-text se-w-full"><?php echo wp_kses_post($settings['description']) ?></p>
    <?php endif; ?>
</div>