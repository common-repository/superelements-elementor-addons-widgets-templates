<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait ColorTraits {

    //pass class name for your container elements; Example: se_margin_padding_controls('.your-class-name')

    protected function se_color_controls($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $label  = isset($attrs['label']) ? $attrs['label'] : esc_html__('Color', 'superelements-elementor-addons-widgets-templates');
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
        $condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
        
        
        $this->add_responsive_control(
            $unique_id.'color',
            [
                'label' => $label,
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$class => 'color: {{VALUE}}',
                ],
                'condition' => $condition,
            ]
        );
    }    

    protected function se_background_color_controls($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $label  = isset($attrs['label']) ? $attrs['label'].'_' : esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates');
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
        $condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
        
        $this->add_responsive_control(
            $unique_id.'background_color',
            [
                'label' => $label,
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} '.$class => 'background-color: {{VALUE}}',
                ],
                'condition' => $condition,
            ]
        );
    }    

    protected function se_box_shadow_controls($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
        $condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => $unique_id.'box_shadow',
                'selector' => '{{WRAPPER}} '.$class,
                'condition' => $condition,
            ]
        );
        
        
    }        

}