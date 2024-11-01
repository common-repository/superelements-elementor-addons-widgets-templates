<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait RepeaterTraits {

   //this fucntion will recieve an elementor reaperter obeject a parameter
    protected function se_add_basic_repeater_controls($repeater,$args=[]){     
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Overview', 'superelements-elementor-addons-widgets-templates'),
                'label_block' => true,    
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                'show_label' => false,
            ]
        );
    }
    
    protected function se_icon_repeater_upload_controls($repeater)
    {
      
        $repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
                'skin'=>'inline',
			]
		);
    }
    protected function se_media_repeater_upload_controls($repeater)
    {
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Use Image', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types'=>[
                    'image','svg'
                ],
			]
		);
    }

    protected function se_add_the_repeater($repeater)
    {
        $this->add_control(
            'cards',
            [
                'label' => esc_html__('Cards', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Overview', 'superelements-elementor-addons-widgets-templates'),
                        'content' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                    ],
                    [
                        'title' => esc_html__('Support', 'superelements-elementor-addons-widgets-templates'),
                        'content' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                    ],
                    [
                        'title' => esc_html__('Contact', 'superelements-elementor-addons-widgets-templates'),
                        'content' => esc_html__('Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', 'superelements-elementor-addons-widgets-templates'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
    }
   

   
}