<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
/**
 * Accordion Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait HeadingTraits {
    /**
     *  Heading Content 
     */
    public function heading_content_control($attrs = []) {
		
        $show_title = isset($attrs['title_input']) ? $attrs['title_input'] : true;
        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;
		
        $show_link      = isset($attrs['link']) ? $attrs['link'] : true;
        $show_align      = isset($attrs['align']) ? $attrs['align'] : true;
		
        if($show_title){
            $this->add_control(
                $unique_id.'title',
                [
                    'label' => esc_html__( 'Title', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'ai' => [
                        'type' => 'text',
                    ],
                    'dynamic' => [
                        'active' => true,
                    ],
                    'placeholder' => esc_html__( 'Enter your title', 'superelements-elementor-addons-widgets-templates' ),
                    'default' => esc_html__( 'Add Your Heading Text Here', 'superelements-elementor-addons-widgets-templates' ),
                ]
            );
        }

		if( $show_link){
			$this->add_control(
				$unique_id.'link',
				[
					'label' => esc_html__( 'Link', 'superelements-elementor-addons-widgets-templates' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'default' => [
						'url' => '',
					],
					'separator' => 'before',
				]
			);
	   }

        $this->add_control(
            $unique_id.'header_tag',
            [
                'label' => esc_html__( 'HTML Tag', 'superelements-elementor-addons-widgets-templates' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default' => 'h2',
            ]
        );
		
		if($show_align){
        $this->add_responsive_control(
			$unique_id.'align',
			[
				'label' => esc_html__( 'Alignment', 'superelements-elementor-addons-widgets-templates' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'superelements-elementor-addons-widgets-templates' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} '.$class => 'text-align: {{VALUE}};',
				],
			]
		);
	}
    }
    /**
     * Heading Typography
     */
    public function heading_style($attrs = []) {
        $unique_id  = isset($attrs['id']) ? $attrs['id'].'_' : null;
        $class      = isset($attrs['class']) ? $attrs['class'] : null;

        $this->add_control(
			$unique_id.'title_color',
			[
				'label' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} '.$class => 'color: {{VALUE}};',
					'{{WRAPPER}} '.$class.' a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => $unique_id.'typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}} '.$class,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => $unique_id.'text_stroke',
				'selector' => '{{WRAPPER}} '.$class,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => $unique_id.'text_shadow',
				'selector' => '{{WRAPPER}} '.$class,
			]
		);

		$this->add_control(
			$unique_id.'blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'superelements-elementor-addons-widgets-templates' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
					'multiply' => esc_html__( 'Multiply', 'superelements-elementor-addons-widgets-templates' ),
					'screen' => esc_html__( 'Screen', 'superelements-elementor-addons-widgets-templates' ),
					'overlay' => esc_html__( 'Overlay', 'superelements-elementor-addons-widgets-templates' ),
					'darken' => esc_html__( 'Darken', 'superelements-elementor-addons-widgets-templates' ),
					'lighten' => esc_html__( 'Lighten', 'superelements-elementor-addons-widgets-templates' ),
					'color-dodge' => esc_html__( 'Color Dodge', 'superelements-elementor-addons-widgets-templates' ),
					'saturation' => esc_html__( 'Saturation', 'superelements-elementor-addons-widgets-templates' ),
					'color' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
					'difference' => esc_html__( 'Difference', 'superelements-elementor-addons-widgets-templates' ),
					'exclusion' => esc_html__( 'Exclusion', 'superelements-elementor-addons-widgets-templates' ),
					'hue' => esc_html__( 'Hue', 'superelements-elementor-addons-widgets-templates' ),
					'luminosity' => esc_html__( 'Luminosity', 'superelements-elementor-addons-widgets-templates' ),
				],
				'selectors' => [
					'{{WRAPPER}} '.$class => 'mix-blend-mode: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
    }
}