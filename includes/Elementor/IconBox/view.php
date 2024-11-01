<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    
    if ( ! empty( $settings['icon_box_wrapper_link']['url'] ) ) {
        $this->add_link_attributes( 'icon_box_wrapper_link', $settings['icon_box_wrapper_link'] );
        ?>
                <a <?php echo esc_attr(  $this->get_render_attribute_string( 'icon_box_wrapper_link' )); ?> class="focus:se-outline-none se-outline-none">
        <?php 
    }     
    $icon_type = $settings['se_icon_box_icon_type'];
    $icon_position = $settings['icon_position'];
?>
<div class="se-flex ic-card se-transition-shadow se-duration-300">
    
    <div class="se-icon se-text-5xl se-mb-6 <?php echo esc_attr($icon_type == 'image' && $icon_position == 'column' ? 'se-flex se-w-full' : ''); ?>">
        <?php 
         if( $icon_type == 'image'){
            if (isset($settings['content_image']['url']) && !empty($settings['content_image']['url'])) : ?>
                <figure class="icon-bg se-w-16 md:se-w-20 elementor-icon-space [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover se-overflow-hidden <?php echo esc_attr($icon_type == 'image' && $icon_position == 'column' ? 'se-shrink-0' : 'se-shrink'); ?>">
                    <?php echo wp_kses_post(wp_get_attachment_image($settings['content_image']['id'], 'full')); ?>
                 </figure>
        <?php endif; } 
         if( $icon_type == 'icon'){
             \Elementor\Icons_Manager::render_icon( $settings['se_icon_box_icon'], [ 'aria-hidden' => 'true' ] ); 
          }  
         if( $icon_type == 'lordicon'){ 
            $load_icon_url = $settings['se_icon_box_lordicon'];
            // Width 
            $icon_width = $settings['se_lord_icon_width'];
            $width = $icon_width['size'].$icon_width['unit'];
            //  height 
            $icon_height = $settings['se_lord_icon_height'];
            $height = $icon_height['size'].$icon_height['unit'];
            ?>
            <lord-icon
				src="<?php echo esc_url( $load_icon_url ); ?>"
                trigger="<?php echo esc_attr($settings['se_icon_box_lord_icon_select_box']); ?>"
				colors="primary:<?php echo esc_attr($settings['se_lord_icon_primary_color']); ?>,secondary:<?php echo esc_attr($settings['se_lord_icon_secondary_color']); ?>,tertiary:<?php echo esc_attr($settings['se_lord_icon_tertiary_color']); ?>,quaternary:<?php echo esc_attr($settings['se_lord_icon_quaternary_color']); ?>"
                style="width:<?php echo esc_attr($width); ?>;height:<?php echo esc_attr($height); ?>">
		    </lord-icon>
        <?php  } ?>  
        
    </div>
    <div class="ic-content [&_svg]:!se-h-3 [&_svg]:se-ms-2 [&_svg]:se-hover:ms-3 [&>div>a>span]:se-items-center [&_svg]:se-transition-all [&_svg]:se-duration-200">
    <?php
     $heading_tag = $settings['se_icon_box_heading_header_tag'];
     printf('<%s class="ic-title se-text-brand">%s</%s>', 
     wp_kses_post($heading_tag), 
     esc_html($settings['title']), 
     wp_kses_post($heading_tag));
    ?>    
        <p class="ic-content se-text-brand"><?php echo wp_kses_post($settings['content']); ?></p>
        <?php $this->render_button(); ?>
    </div>
</div>
<?php 
    if ( ! empty( $settings['icon_box_wrapper_link']['url'] ) ) { ?>
        </a>
    <?php }
?>    