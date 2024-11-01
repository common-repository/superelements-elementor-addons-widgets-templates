<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
/**
 * Comment Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait CommentTraits {
    use ColorTraits;
    use SpacingTraits;
    use BorderTraits;
    use TextTraits;
    use WidthHeightTraits;


    protected function comment_section_style_controls($args=[]){
        
        $this->se_padding_controls($args);
        $this->se_border_controls($args);

    }

    protected function comment_image_style_controls($args=[]){
        
        $this->se_width_height_controls($args);
        $this->se_margin_padding_controls($args);
        $this->se_border_controls($args);

    }

    protected function comment_container_controls($args=[]){
        
        $this->se_margin_padding_controls($args);
        $this->se_border_controls($args);

    }

    protected function comment_meta_controls($args=[]){
        
        $this->se_text_style_controls($args);
        $this->se_margin_padding_controls($args);

    }

    protected function comment_description_controls($args=[]){
        
        $this->se_text_style_controls($args);
        $this->se_margin_padding_controls($args);

    }

}