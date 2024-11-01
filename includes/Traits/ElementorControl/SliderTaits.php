<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait SliderTraits {
  

    protected function se_slider_controls( $args = [] )
     {
        $default_args = [
            'section_condition' => []
        ];
        $args = wp_parse_args( $args, $default_args );

        $this->add_control(
            'slides_to_show',
            [
                'label' => esc_html__('Number Of Slides', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 3,
                'condition' => $args['section_condition'],
            ]
        );
        $this->add_control(
            'slider_autoplay',
            [
                'label' => esc_html__('Enable Autoplay', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'superelements-elementor-addons-widgets-templates'),
                'label_off' => esc_html__('Disable', 'superelements-elementor-addons-widgets-templates'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => $args['section_condition'],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 5000,
                'step' => 500,
                'default' => 4000,
                'condition' => $args['section_condition'],
            ]
        );
        $this->add_control(
			'nav_switch',
			[
				'label' => esc_html__( 'Enable Navigation', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'block' => esc_html__( 'Enable', 'superelements-elementor-addons-widgets-templates' ),
					'none' => esc_html__( 'Disable', 'superelements-elementor-addons-widgets-templates' ),
				],
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => 'display: {{VALUE}} !important;',
				],
			]
		);


     }
}