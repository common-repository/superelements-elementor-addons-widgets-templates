<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Select Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait SelectTraits {

    // $attrs array required items are:  unique_id
    protected function se_select_control($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $label      = isset($attrs['label']) ? $attrs['label'] : esc_html__('Select', 'superelements-elementor-addons-widgets-templates');
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
		$options 	= isset($attrs['options']) && is_array($attrs['options']) ? $attrs['options'] : [];
		$default 	= isset($attrs['default']) ? $attrs['default'] : null;

        $this->add_control(
            $unique_id.'select',
            [
                'type'      => Controls_Manager::SELECT,
                'label'     => $label,
                'options'   => $options,
                'default'   => esc_html($default),
                'condition' => $condition,
            ]
        );
    }    
}
