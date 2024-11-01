<?php 
namespace SuperElement\ElementorControl\Traits;
/**
 * Width Height Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait WidthHeightTraits {
    /**
	 * Width Height Style Control 
	 */
    public function se_width_control($attrs=[]) {
		
		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : '';
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

		$this->add_responsive_control(
			$unique_id.'width',
			[
				'label' => esc_html__( 'Width', 'superelements-elementor-addons-widgets-templates' ),
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
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition
			]
		);
		
	}

	public function se_height_control($attrs = [] ) {
		
		$unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : '';
		$condition 	= isset($attrs['condition']) && is_array($attrs['condition']) ? $attrs['condition'] : [];

		$this->add_responsive_control(
			$unique_id.'height',
			[
				'label' => esc_html__( 'Height', 'superelements-elementor-addons-widgets-templates' ),
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
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => $condition
			]
		);
	}

	public function se_width_height_controls($attrs=[]) {
		
		$this->se_width_control($attrs);
		$this->se_height_control($attrs);

	}
}