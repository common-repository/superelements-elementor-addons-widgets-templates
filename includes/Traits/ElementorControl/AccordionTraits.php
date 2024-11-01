<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
use SuperElement\ElementorControl\Traits\RepeaterTraits;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait AccordionTraits {
    use RepeaterTraits;


    protected function accordion_repeater_settings($args=[]){
        $default_args = [
            'section_condition' => []
        ];
        $args = wp_parse_args( $args, $default_args );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'accordion_title',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('WHY MUST I MAKE PAYMENT IMMEDIATELY AT CHECKOUT?', 'superelements-elementor-addons-widgets-templates'),
                'label_block' => true,
                'condition' => $args['section_condition'],
            ]
        );

        $repeater->add_control(
            'accordion_content',
            [
                'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                'show_label' => false,
                'condition' => $args['section_condition'],
            ]
        );
        
        $this->add_control(
            'accordions',
            [
                'label' => esc_html__('Accordion', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'accordion_title' => esc_html__('Why must I make payment immediately at checkout?', 'superelements-elementor-addons-widgets-templates'),
                        'accordion_content' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                    ],
                ],
                'title_field' => '{{{ accordion_title }}}',
            ]
        );


    }
}