<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait LinkTraits {
    protected function se_add_link_controls($args=[])
    {
        $default_args = [
            'section_condition' => []
        ];
        $args = wp_parse_args( $args, $default_args );
       
        $this->add_control(
            'link_switch',
            [
                'label' => esc_html__('Enable Link', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'superelements-elementor-addons-widgets-templates'),
                'label_off' => esc_html__('Disable', 'superelements-elementor-addons-widgets-templates'),
                'return_value' => 'true',
                'default' => 'true',
                'condition' => $args['section_condition'],
            ]
        );
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition'=>[
                    'link_switch'=>'true'
                ]
			]
		);

    }
}