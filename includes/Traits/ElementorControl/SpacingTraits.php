<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait SpacingTraits {

    //pass class name for your container elements; Example: se_margin_padding_controls('.your-class-name')

    protected function se_padding_controls($attrs=[])
	{
        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
        $label      = isset($attrs['label']) ? $attrs['label'] : esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' );
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

        $this->add_responsive_control(
			$unique_id.'padding',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => $label,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);
	}

	protected function se_margin_controls($attrs=[])
	{
		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

        $this->add_responsive_control(
			$unique_id.'margin',
			[
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'label' => esc_html__( 'Margin', 'superelements-elementor-addons-widgets-templates' ),
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} '.$class  => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => $condition,
			]
		);
    }

	protected function se_gap_controls($attrs=[])
	{
		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];
		$separator  = isset($attrs['separator']) ? $attrs['separator'] : null;

        $this->add_responsive_control(
			$unique_id.'gap',
			[
				'label' => esc_html__( 'Gap', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition,
				'separator'		=> esc_html($separator),
			]
		);
    }

	protected function se_margin_padding_controls($attrs=[])
	{
		
		$this->se_padding_controls($attrs);
		$this->se_margin_controls($attrs);

	}

}