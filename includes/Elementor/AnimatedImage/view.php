<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="se-image-wrapper relative">
    <?php 
     $get_animated_image = $settings['se_image_animalist'];
     if(!empty($get_animated_image)){
        foreach($get_animated_image as $image){ 
            $animated_image_wrapper_class = [];
            $animated_image_wrapper_class[] = 'se-absolute';
            $animated_image_wrapper_class[] = 'elementor-repeater-item-'.$image['_id'];
            $animated_image_wrapper_class[] = $image['se_image_animate_image_animation'];
            if($image['se_image_position_start_pos_y'] == 'top'){
                $animated_image_wrapper_class[] = 'se-top-0';
            }
            if($image['se_image_position_start_pos_y'] == 'bottom'){
                $animated_image_wrapper_class[] = 'se-bottom-0';
            }
            if($image['se_image_position_start_pos_x'] == 'left'){
                $animated_image_wrapper_class[] = 'se-left-0';
            }
            if($image['se_image_position_start_pos_x'] == 'right'){
                $animated_image_wrapper_class[] = 'se-right-0';
            }
            ?>
             <div class="<?php echo esc_attr(join(' ', $animated_image_wrapper_class)); ?>">
                 <?php echo wp_get_attachment_image($image['se_image_add_animated_image']['id']); ?>
             </div>
            <?php 
        }
     }
    ?>
    <div class="main-image relative">
        <?php \Elementor\Group_Control_Image_Size::print_attachment_image_html( $settings ); ?>
    </div>
</div>