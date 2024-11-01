<?php

/**
 * Elementor Classes.
 *
 * @package Tab Elementor
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\RepeaterTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;

use function PHPSTORM_META\type;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor test
 *
 * Elementor widget for test.
 *
 * @since 1.0.0
 */
class Tab extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    use RepeaterTraits;
    use SpacingTraits;
    use BorderTraits;
    use ColorTraits;
    use TextTraits;
    use WidthHeightTraits;

    public function get_name()
    {
        return 'se_tab';
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
        return esc_html__('Super Tab', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-tabs se-icon';
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

    public function get_script_depends()
    {
        return ['tab'];
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_tab_content_controls();
        $this->register_tab_style_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_tab_content_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Tab Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
            );

            $repeater = new \Elementor\Repeater();
            $this->se_add_basic_repeater_controls($repeater);
            $this->se_icon_repeater_upload_controls($repeater);
            $this->se_media_repeater_upload_controls($repeater);
            $this->se_add_the_repeater($repeater);

        $this->end_controls_section();

       
    }

	protected function register_tab_style_controls()
    {
        // tab wrapper control 
		$this->start_controls_section(
			'se_tab_wrapper_style',
			[
				'label' => esc_html__( 'Tab Wrapper', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );    

            $attrs = [
                'id'         => 'se_tab_wrapper',
                'class'      => '.se-tab-wrapper',
            ];
            $this->se_background_color_controls($attrs);
            $this->add_responsive_control(
                'se_tab_items_alignment_control',
                [
                    'label' => esc_html__( 'AlignMent', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'flex-start' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'flex-end' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default'   => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-wrapper' => 'justify-content: {{VALUE}}',
                    ],
                ]
            );
            $this->se_width_control($attrs);
            $this->se_gap_controls($attrs);
            $this->se_padding_controls($attrs);
            $this->se_border_controls($attrs);


        $this->end_controls_section();

         // tab item control 
		$this->start_controls_section(
			'se_tab_item_style',
			[
				'label' => esc_html__( 'Tab Item', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            ); 

            $attrs = [
                'id'         => 'se_tab_item',
                'class'      => '.se-tab-item',
            ];
            $this->se_typography_controls($attrs);
            $this->se_padding_controls($attrs);
            $this->se_border_radius_controls($attrs);

            $this->start_controls_tabs(
                'se_tab_normal_hover_active_controls'
                );

                $this->start_controls_tab(
                    'se_tab_normal_controls',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_normal',
                        'class'      => '.se-tab-item, .se-tab-item:focus',
                    ];
                    $this->se_color_controls($attrs);
                    $bAttrs = [
                        'id'         => 'se_tab_item_normal',
                        'class'      => '.se-tab-item, .se-tab-item:focus',
                    ];
                    $this->se_background_color_controls($bAttrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_hover_controls',
                    [
                        'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_hover',
                        'class'      => '.se-tab-item:hover',
                    ];
                    $this->se_color_controls($attrs);
                    $this->se_background_color_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_active_controls',
                    [
                        'label' => esc_html__( 'Active', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_active',
                        'class'      => '.se-tab-item-active',
                    ];
                    $this->se_color_controls($attrs);
                    $this->se_background_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // tab active state style control 
		$this->start_controls_section(
			'se_tab_item_active_state_style',
			[
				'label' => esc_html__( 'Tab Item Active', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'         => 'se_tab_item_active_state',
                'class'      => '.se-tab-item-active-state',
            ];
            $this->se_border_radius_controls($attrs);

            $this->start_controls_tabs(
                'se_tab_active_state_controls'
            );

                $this->start_controls_tab(
                    'se_tab_active_normal_controls',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_active_state_normal',
                        'class'      => '.se-tab-item-active-state',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_width_height_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_active_hover_controls',
                    [
                        'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_active_state_hover',
                        'class'      => '.se-tab-item:hover .se-tab-item-active-state',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_width_height_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_active_active_controls',
                    [
                        'label' => esc_html__( 'Active', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_active_state_active',
                        'class'      => '.se-tab-item-active .se-tab-item-active-state',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_width_height_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_responsive_control(
                'se_tab_active_state_top_position',
                [
                    'label' => esc_html__( 'Top Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -2000,
                            'max' => 2000,
                        ],
                    ],
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-item-active-state' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'se_tab_active_state_right_position',
                [
                    'label' => esc_html__( 'Right Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -2000,
                            'max' => 2000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-item-active-state' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'se_tab_active_state_bottom_position',
                [
                    'label' => esc_html__( 'Bottom Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -2000,
                            'max' => 2000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-item-active-state' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'se_tab_active_state_left_position',
                [
                    'label' => esc_html__( 'Left Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -2000,
                            'max' => 2000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-item-active-state' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'se_tab_active_state_translate-position',
                [
                    'label' => esc_html__( 'Translate X Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -2000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -2000,
                            'max' => 2000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-tab-item-active-state' => 'transform: translateX({{SIZE}}{{UNIT}});',
                    ],
                ]
            );

        $this->end_controls_section();

        // tab item icon style control
		$this->start_controls_section(
			'se_tab_item_icon_style',
			[
				'label' => esc_html__( 'Tab Item Icon', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    ); 

            $attrs = [
                'id'         => 'se_tab_item_icon',
                'class'      => '.se-tab-item-icon',
            ];
            $this->se_typography_controls($attrs);

            $this->start_controls_tabs(
                'se_tab_item_icon_normal_hover_style'
                );

                $this->start_controls_tab(
                    'se_tab_item_icon_normal',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_icon_normal',
                        'class'      => '.se-tab-item-icon',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_item_icon_hover',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_icon_hover',
                        'class'      => '.se-tab-item:hover .se-tab-item-icon',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_tab_item_icon_active',
                    [
                        'label' => esc_html__('Active', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'         => 'se_tab_item_icon_active',
                        'class'      => '.se-tab-item-active .se-tab-item-icon',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();
        
        $this->start_controls_section(
            'se_tab_content_panel',
            [
                'label' => esc_html__( 'Tab Panel Style', 'superelements-elementor-addons-widgets-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            ); 

            $attrs = [
                'id'         => 'se_tab_content_panel',
                'class'      => '.se-tab-content',
            ];
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_tab_content_style',
            [
                'label' => esc_html__( 'Tab Content Style', 'superelements-elementor-addons-widgets-templates' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            ); 

            $hAttrs = [
                'id'         => 'se_tab_content_heading',
                'label'      => 'Title ',
                'class'      => '.se-tab-content h3',
            ];
            $this->se_text_style_controls($hAttrs);

            $attrs = [
                'id'         => 'se_tab_content',
                'label'      => 'Text ',
                'class'      => '.se-tab-content p',
            ];
            $this->se_text_style_controls($attrs);

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
        extract($settings);
       
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_tab_view', $file, $settings);
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
}
