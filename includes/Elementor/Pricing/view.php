<?php 
   if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class='se-pricing-wrapper relative'>
  <?php if($show_batch == 'yes'): ?>  
    <div class="pricing-recommended-batch absolute top-0">
        <?php echo esc_html($se_pricing_batch_text); ?>
    </div>
  <?php endif; ?> 
  <div class="pricing-content">
  <div class="icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['se_pricing_content_icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </div>
    <div class="title">
        <?php echo esc_html($se_pricing_title); ?>
    </div>
    <div class="content">
        <ul>
        <?php 
          if(!empty($se_pricing_content_list)){
                foreach($se_pricing_content_list as $list){?>
                    <li id="<?php echo esc_attr($list['_id']); ?>">
                        <span><?php \Elementor\Icons_Manager::render_icon( $list['se_pricing_content_list_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                        <span><?php echo esc_html($list['se_pricing_content_list_item']); ?></span>
                    </li>
                   <?php 
                }
          }
        ?>
        </ul>
    </div>
    <div class="pricing-footer">
         <?php 
            if ( ! empty( $settings['se_pricing_package_link']['url'] ) ) {
                $this->add_link_attributes( 'se_pricing_package_link', $settings['se_pricing_package_link'] );
            }        
         ?>
          <span><?php echo esc_html($se_pricing_button_before_text); ?></span>
          <a <?php echo esc_attr($this->get_render_attribute_string( 'se_pricing_package_link' )); ?>>
            <span><?php echo esc_html($se_pricing_price); ?></span>
            <span> <?php \Elementor\Icons_Manager::render_icon( $settings['se_pricing_link_icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
          </a>
    </div>
  </div>
</div>