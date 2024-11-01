<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Border Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait BorderTraits {

    //pass class name for your container elements; Example: se_margin_padding_controls('.your-class-name')

    protected function se_border_controls($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => $unique_id.'border',
				'selector' => '{{WRAPPER}} '.$class,
				'condition' => $condition,
			]
		);

        $this->add_responsive_control(
			$unique_id.'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);
    }        

	protected function se_border_radius_controls($attrs=[]){

        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

        $this->add_responsive_control(
			$unique_id.'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);
        
    }

}