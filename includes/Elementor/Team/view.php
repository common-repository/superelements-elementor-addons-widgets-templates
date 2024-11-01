<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(isset($settings['link_switch']) && $settings['link_switch']==='true'):?>
<a class="se-block se-no-underline" <?php echo esc_attr($this->get_render_attribute_string( 'link' )); ?>> 
<?php endif?>
<div class='se-team-card se-text-center se-relative se-w-full se-transition-shadow se-duration-[400ms] se-ease-in-out se-group se-border se-border-brand/20 se-rounded-md se-py-6'>
    <figure class="se-team-img se-w-20 se-h-20 md:se-w-24 md:se-h-24 lg:se-w-32 lg:se-h-32 se-rounded-full se-overflow-hidden se-inline-block">
        <?php 
            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
            $this->add_render_attribute( 'image', 'alt', \Elementor\Control_Media::get_image_alt( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );
            $this->add_render_attribute( 'image', 'class', 'se-object-cover se-w-full se-h-full' );
            echo wp_kses_post(\Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ));
        ?>
    </figure>
    <h3 class="se-team-title se-transition se-duration-300"><?php echo esc_html($settings['team_name']); ?></h3>
    <p class="se-team-desc se-transition se-duration-300"><?php echo esc_html($settings['team_position']); ?></p>
    <div class="se-team-social se-static se-flex se-items-center se-justify-center se-gap-4 sm:se-gap-3 se-mt-4 sm:se-mt-0 sm:se-absolute sm:se-flex-col se-bottom-8 xl:se-bottom-[30px] sm:se-end-5 xl:se-end-8">
        <?php
          $social_link = $settings['se_team_social_media_list'];
          if(!empty($social_link)) {
            foreach($social_link as $link){
                $this->add_link_attributes( 'se_team_social'.$link['_id'], $link['se_team_social_link'] );
         ?>    
        <a <?php echo esc_attr($this->get_render_attribute_string( 'se_team_social'.$link['_id'] )); ?> class="se-inline-block se-w-3.5 se-h-3.5 sm:se-w-5 sm:se-h-5 sm:se-translate-y-10 sm:group-hover:se-translate-y-0 sm:se-transition-all sm:se-duration-300 sm:se-opacity-0 sm:group-hover:se-opacity-100">
            <?php \Elementor\Icons_Manager::render_icon( $link['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
       <?php 
            }
        } ?>
    </div>
</div>
<?php if(isset($settings['link_switch']) && $settings['link_switch']==='true'):?>
</a>
<?php endif?>