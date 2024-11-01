<?php

/**
 * Elementor Classes.
 *
 * @package Elementor Widgets for Image Hotspot 
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\Modules\Controls_Manager as Se_Controls_Manager;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Image Hotspot
 *
 * Elementor widget for Image Hotspot.
 *
 * @since 1.0.0
 */
class ImageHotspot extends Widget_Base
{
    /**
     * Width Height traits 
     */
    use WidthHeightTraits;
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'se_image_hotspot';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Image Hotspot', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image-hotspot se-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['se-widgets'];
    }

    public function get_style_depends()
    {
        return ['redq-se-global', 'redq-se-tailwind', 'imagehotspot'];
    }
    public function get_script_depends()
    {
        return ['image-hotspot'];
    }
    /**
     * Register Icon Box controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_hotspot_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_hotspot_controls()
    {
        $this->start_controls_section(
            'se_hotspot_section_title',
            [
                'label' => esc_html__('General', 'superelements-elementor-addons-widgets-templates'),
            ]
        );
        $this->add_control(
            'se_hotspot_bg_image',
            [
                'label' => esc_html__( 'Background Image', 'superelements-elementor-addons-widgets-templates' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );   
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'se_hotspot_point_type',
                [
                    'label' => esc_html__( 'Content Type', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'text',
                    'options' => [
                        'text' => esc_html__( 'Text', 'superelements-elementor-addons-widgets-templates' ),
                        'product' => esc_html__( 'Product', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                ]
            );    
            $repeater->add_control(
                'se_hotspot_point_product_select',
                [
                    'label' => esc_html__('Select Product', 'superelements-elementor-addons-widgets-templates'),
                    'type'      => Se_Controls_Manager::AJAXSELECT2,
                    'options'   =>'ajaxselect2/product_list',
                    'label_block' => true,
                    'multiple'  => false,
                    'condition' => [
                        'se_hotspot_point_type' => 'product'
                    ]
                ]
            );
            $repeater->add_control(
                'se_hotspot_pointer_title',
                [
                    'label' => esc_html__( 'Title', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Default title', 'superelements-elementor-addons-widgets-templates' ),
                    'placeholder' => esc_html__( 'Type your title here', 'superelements-elementor-addons-widgets-templates' ),
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );  
            $repeater->add_control(
                'se_hotspot_pointer_button_text',
                [
                    'label' => esc_html__( 'Button Text', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Button', 'superelements-elementor-addons-widgets-templates' ),
                    'placeholder' => esc_html__( 'Button Text', 'superelements-elementor-addons-widgets-templates' ),
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );   
            $repeater->add_control(
                'se_hotspot_point_link',
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
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );
    		$repeater->add_control(
                'se_hotspot_pointer_content_image',
                [
                    'label' => esc_html__( 'Choose Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'se_hotspot_pointer_content_thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                    'include' => [],
                    'default' => 'large',
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );
    
            $repeater->add_control(
                'se_hotspot_item_description',
                [
                    'label' => esc_html__( 'Description', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => esc_html__( 'Default description', 'superelements-elementor-addons-widgets-templates' ),
                    'placeholder' => esc_html__( 'Type your description here', 'superelements-elementor-addons-widgets-templates' ),
                    'condition' => [
                        'se_hotspot_point_type' => 'text'
                    ]
                ]
            );
    		$repeater->add_responsive_control(
                'se_hotspot_y_position_from',
                [
                    'label' => esc_html__( 'Y position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-v-align-bottom',
                        ],
                    ],
                    'default' => 'bottom',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}}  {{CURRENT_ITEM}}' => '{{VALUE}}:0;',
                    ],
                ]
            );
            $repeater->add_responsive_control(
                'se_hotspot_item_top_position',
                [
                    'label' => esc_html__( 'Y Position From Top', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_hotspot_y_position_from' => 'top'
                    ]
                    
                ]
            );
            $repeater->add_responsive_control(
                'se_hotspot_item_bottom_position',
                [
                    'label' => esc_html__( 'Y Position From Bottom', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_hotspot_y_position_from' => 'bottom'
                    ]
                    
                ]
            );
            $repeater->add_responsive_control(
                'se_hotspot_x_position_from',
                [
                    'label' => esc_html__( 'X position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => '{{VALUE}}: 0;',
                    ],
                ]
            );
            $repeater->add_responsive_control(
                'se_hotspot_item_left_position',
                [
                    'label' => esc_html__( 'X Position From Left', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_hotspot_x_position_from' => 'left'
                    ]
                    
                ]
            );
            $repeater->add_responsive_control(
                'se_hotspot_item_right_position',
                [
                    'label' => esc_html__( 'X Position From Right', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_hotspot_x_position_from' => 'right'
                    ]
                    
                ]
            );
        $this->add_control(
            'se_hotspot_point',
            [
                'label' => esc_html__( 'Add Point', 'superelements-elementor-addons-widgets-templates' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
                        'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
                        'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                ],
                'title_field' => '{{{ se_hotspot_point_type }}}',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
			'se_hotspot_section_bg',
			[
				'label' => esc_html__( 'Background Image', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $_width_args = [
            'id' => 'se_image_hotspot_backgroud_image_width',
            'class' => '.se-image-hotspot .background-image img'
        ];
        $this->se_width_control($_width_args);
        $height_args = [
            'id' => 'se_image_hotspot_backgroud_image_height',
            'class' => '.se-image-hotspot .background-image img'
        ];
        $this->se_height_control($height_args);
        $this->end_controls_section();
        $this->start_controls_section(
			'se_hotspot_icon',
			[
				'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'se_hotspot_background_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .se-image-hotspot .pointer > span >  span.se-hotspot-bg' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_control(
			'se_hotspot_ping_color',
			[
				'label' => esc_html__( 'Ping Background Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .se-image-hotspot .pointer > span span.se-hotspot-ping' => 'background-color: {{VALUE}}',
				],
			]
		);
        $_width_args = [
            'id' => 'se_image_hotspot_backgroud_icon_width',
            'class' => '.se-image-hotspot .pointer .se-hotspot-bg'
        ];
        $this->se_width_control($_width_args);
        $height_args = [
            'id' => 'se_image_hotspot_backgroud_icon_height',
            'class' => '.se-image-hotspot .pointer > span span.se-hotspot-bg'
        ];
        $this->se_height_control($height_args);
        $this->end_controls_section();
        $this->start_controls_section(
			'se_hotspot_popup',
			[
				'label' => esc_html__( 'Popup', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $_width_args = [
            'id' => 'se_image_hotspot_popup_width',
            'class' => '.pointer-content'
        ];
        $this->se_width_control($_width_args);
        $this->add_control(
			'se_hotspot_popup_padding',
			[
				'label' => esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .pointer-content',
			]
		);
        $this->add_control(
			'se_hotspot_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pointer-content .heading' => 'color: {{VALUE}}',
					'{{WRAPPER}} .pointer-content .heading h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'se_hotspot_popup_heading',
				'selector' => '{{WRAPPER}} .pointer-content .heading, {{WRAPPER}} .pointer-content .heading h2',
			]
		);
        $this->add_control(
			'se_hotspot_popup_heading_margin',
			[
				'label' => esc_html__( 'Margin', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content .heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'se_hotspot_popup_description_color',
			[
				'label' => esc_html__( 'Description Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pointer-content .content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'se_hotspot_popup_description',
				'selector' => '{{WRAPPER}} .pointer-content .content',
			]
		);
        $this->add_control(
			'se_hotspot_popup_description_margin',
			[
				'label' => esc_html__( 'Margin', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'se_hotspot_popup_add_to_cart',
			[
				'label' => esc_html__( 'Add to cart', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
			'se_hotspot_popup_button_margin',
			[
				'label' => esc_html__( 'Margin', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content .add-to-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'se_hotspot_popup_button_padding',
			[
				'label' => esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content .add-to-cart .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'se_hotspot_popup_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .pointer-content .add-to-cart .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'se_hotspot_popup_button',
				'selector' => '{{WRAPPER}} .pointer-content .button',
			]
		);
        $this->start_controls_tabs(
			'se_add_to_cart_style_tabs'
		);
		$this->start_controls_tab(
			'se_style_normal_cart_tab',
			[
				'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
			]
		);
        $this->add_control(
			'se_hotspot_popup_button_color',
			[
				'label' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pointer-content .button' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'se_hotspot_popup_button_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .pointer-content .button',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'se_style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
			]
		);
        $this->add_control(
			'se_hotspot_popup_button_hover_color',
			[
				'label' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pointer-content .button:hover' => 'color: {{VALUE}}',
				],
			]
		);
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'se_hotspot_popup_button_hover_bg',
				'types' => [ 'classic', 'gradient'],
				'selector' => '{{WRAPPER}} .pointer-content .button:hover',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
        $this->end_controls_section();
    }

    /**
     * Render Copyright output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings    = $this->get_settings_for_display();
       
        $layout = isset($settings['layout']) ? $settings['layout'] : 'horizontal';
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_image_hotspot_view', $file, $settings);
    }

    /**
     * Render shortcode widget as plain content.
     *
     * Override the default behavior by printing the shortcode instead of rendering it.
     *
     * @since 1.0.0
     * @access public
     */
    public function render_plain_content()
    {
        // In plain mode, render without shortcode.
        echo esc_attr($this->get_settings('shortcode'));
    }

    /**
     * Render shortcode widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.3.0
     * @access protected
     */
    protected function content_template()
    {
    }
    protected function product_html( $product_id, $pointer_id ){
        $args = [
            'post_type' => 'product',
            'post_per_page' => 1,
            'post__in' => [$product_id]
        ];
        $product = new \WP_Query($args);
        if($product->have_posts()){
            while($product->have_posts()){
                $product->the_post();
                include __DIR__.'/template/product.php';
            }
            wp_reset_postdata();
        }else{
            echo esc_html__('Please Select A Product', 'superelements-elementor-addons-widgets-templates');
        }
    }
}
