<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-image-hotspot se-relative se-text-center">
    <div class="background-image se-z-0 se-relative">
        <?php echo wp_kses_post( \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'se_hotspot_image_thumbnail', 'se_hotspot_bg_image' )); ?>
    </div>
   <?php $get_pointer = $settings['se_hotspot_point']; 
   if(!empty($get_pointer)){
         foreach($get_pointer as $pointer){
            if($pointer['se_hotspot_point_type'] == 'product')   {
                echo  wp_kses_post( $this->product_html($pointer['se_hotspot_point_product_select'], $pointer['_id']));
            }else{
                include __DIR__.'/template/general.php';
                }
                } 
         } 
     ?>
</div>
