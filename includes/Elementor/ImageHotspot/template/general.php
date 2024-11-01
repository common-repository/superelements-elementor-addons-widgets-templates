<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="pointer se-peer se-absolute se-z-10 elementor-repeater-item-<?php echo esc_attr($pointer['_id']) ?>">
    <?php include __DIR__.'/ping.php'; ?>
    <div class="se-z-10 pointer-content se-invisible se-opacity-0 se-transition-all se-duration-300 se-absolute se-w-[250px] se-bg-white se-p-[15px] se-rounded se-left-[calc(100%_+_10px)] se-top-[-20px]">
        <div class="hotspot-content-image">
            <?php 
            if ( ! empty( $pointer['se_hotspot_point_link']['url'] ) ) {
                $this->add_link_attributes( $pointer['_id'], $pointer['se_hotspot_point_link'] );
            } ?>    
            <a <?php echo esc_attr($this->get_render_attribute_string( $pointer['_id'] )); ?>>
                <?php echo wp_kses_post( \Elementor\Group_Control_Image_Size::get_attachment_image_html( $pointer, 'se_hotspot_pointer_content_thumbnail', 'se_hotspot_pointer_content_image' )); ?>
            </a>
        </div>
        <div class="heading">
            <?php echo esc_html($pointer['se_hotspot_pointer_title']); ?>
        </div>
        <div class="content">
            <?php echo wp_kses_post($pointer['se_hotspot_item_description']); ?>
        </div>
        </div>
</div>