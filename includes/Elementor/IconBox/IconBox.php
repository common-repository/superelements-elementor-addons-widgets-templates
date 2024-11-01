<?php

/**
 * Elementor Classes.
 *
 * @package Elementor Widgets for Icon Box
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use SuperElement\ElementorControl\Traits\SelectTraits;
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Icon Box
 *
 * Elementor widget for Icon Box.
 *
 * @since 1.0.0
 */
class IconBox extends Widget_Base
{
    /**
     * use button trait 
     */
    use ButtonTraits;
    use SpacingTraits;
    use BorderTraits;
    use ColorTraits;
    use TextTraits;
    use HeadingTraits;
    use WidthHeightTraits;
    use SelectTraits;
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
        return 'se_icon';
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
        return esc_html__('Icon Box', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-info-box se-icon';
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
        return ['bhenfmcm'];
    }

    /**
     * Register Icon Box controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_icon_card_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_icon_card_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Icon Card Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
            );
            $this->add_control(
                'title',
                [
                    'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                    'label_block' => true,
                ]
            );

            $heading_attr = [
                'title_input' => false,
                'id' => 'se_icon_box_heading',
                'link' => false,
                'align' => false,
            ];
            $this->heading_content_control($heading_attr);

            $this->add_control(
                'content',
                [
                    'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Completes all the work associated with planning and processing', 'superelements-elementor-addons-widgets-templates'),
                    'show_label' => false,
                ]
            );

            $this->add_control(
                'se_icon_box_icon_type', [
                    'label'       => esc_html__( 'Icon Type', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options'     => [
                        'none' => [
                            'title' => esc_html__( 'None', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-close-circle',
                        ],
                        'icon' => [
                            'title' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-edit',
                        ],
                        'image' => [
                            'title' => esc_html__( 'Image', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-image',
                        ],
                        'lordicon' => [
                            'title' => esc_html__( 'Lord Icon', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-animation',
                        ],
                    ],
                    'default'       => 'icon',
                ]
            );
            $this->add_control(
                'content_image',
                [
                    'label' => esc_html__('Content Icon', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::MEDIA,
                    'description' => esc_html__('Recommended Size:70x70)','superelements-elementor-addons-widgets-templates'),
                    'media_types' => [
                        'image',
                        'svg'
                    ],
                    'condition' => [
                        'se_icon_box_icon_type' => 'image'
                    ]
                ]
            );
            $this->add_control(
                'se_icon_box_icon',
                [
                    'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-child',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'se_icon_box_icon_type' => 'icon'
                    ]
                ]
            );
            $this->add_control(
                'se_icon_box_lordicon',
                [
                    'label'       => esc_html__( 'lord Icon', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => esc_html__('lord Icon', 'superelements-elementor-addons-widgets-templates' ),
                    'condition'   => [
                        'se_icon_box_icon_type' => 'lordicon'
                    ]
                ]
            );
           
            $this->add_control(
                'icon_box_link_enable',
                [
                    'label'        => esc_html__( 'Wrapper Link', 'superelements-elementor-addons-widgets-templates' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Yes', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off'    => esc_html__( 'No', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'yes',
                    'default'      => '',
                ]
            );
            $this->add_control(
                'icon_box_wrapper_link',
                [
                    'label'   => esc_html__( 'Icon box link', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url'         => '',
                        'is_external' => true,
                        'nofollow'    => true,
                            // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                    'condition'   => [
                        'icon_box_link_enable' => 'yes'
                    ]
                ]
            );
            $this->add_control(
                'icon_box_button',
                [
                    'label'        => esc_html__( 'Enable Button', 'superelements-elementor-addons-widgets-templates' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Yes', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off'    => esc_html__( 'No', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
            );
        $this->end_controls_section();

        // Add button 
        $this->start_controls_section(
            'card_button',
            [
                'label'     => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'icon_box_button' => 'yes'
                ]
            ]
            );
            $this->register_button_content_controls();
        $this->end_controls_section();

        // Style section
        // Card style controls
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('Card', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'icon_position',
                [
                    'label' => esc_html__( 'Icon Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::CHOOSE,
                    'default' => 'column',
                    'options' => [
                        'row' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-h-align-left',
                        ],
                        'column' => [
                            'title' => esc_html__( 'Top', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-v-align-top',
                        ],
                        'row-reverse' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-h-align-right',
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .ic-card' => 'flex-direction: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_text_align',
                [
                    'label' => esc_html__( 'Alignment', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::CHOOSE,
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
                    'default'       => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .ic-card' => 'align-items: {{VALUE}}',
                    ],
                    'condition' => [
                        'icon_position' => 'column'
                    ]
                ]
            );

            $attrs = [
                'id'         => 'se_icon_box_card',
                'class'      => '.ic-card',
            ];
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

            $this->start_controls_tabs(
                'card_normal_hover_style'
            );
                $this->start_controls_tab(
                    'card_normal_style',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates'),
                    ]
                );

                    $attrs = [
                        'id'         => 'se_icon_box_card_normal',
                        'class'      => '.ic-card',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();
                
                $this->start_controls_tab(
                    'card_hover_style',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates'),
                    ]
                );
                
                    $attrs = [
                        'id'         => 'se_icon_box_card_hover',
                        'class'      => '.ic-card:hover',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();
            $this->end_controls_tabs();
        $this->end_controls_section();

         // text and button content alignment 
         $this->start_controls_section(
            'content_style',
            [
                'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_icon_box_content_align',
                'class'      => '.ic-content',
                'default'       => 'center',
            ];
            $this->se_text_alignment_controls($attrs);

        $this->end_controls_section();

        // icon style 
        $this->start_controls_section(
            'icon_style',
            [
                'label'     => esc_html__('Icon / Image', 'superelements-elementor-addons-widgets-templates'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
       
            // icon as image 
            $this->add_responsive_control(
                'se_icon_image',
                [
                    'label' => esc_html__( 'Alignment', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::CHOOSE,
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
                    'default'       => 'center',
                    'selectors' => [
                        '{{WRAPPER}} .se-icon' => 'justify-content: {{VALUE}}',
                    ],
                    'condition' => [
                        'icon_position' => 'column',
                        'se_icon_box_icon_type' => 'image',
                    ]
                ]
            );
            $imgAttrs = [
                'id'         => 'se_icon',
                'class'      => '.icon-bg',
                'condition' => [
                    'se_icon_box_icon_type' => 'image'
                ]
            ];
            $this->se_width_height_controls($imgAttrs);

            // icon as icon 
            $iconAttrs = [
                'id'         => 'se_icon',
                'class'      => '.ic-card > .se-icon',
                'condition' => [
                    'se_icon_box_icon_type' => 'icon'
                ]
            ];
            $this->se_text_style_controls($iconAttrs);

            // icon as lord icon
            $this->add_responsive_control(
                'se_lord_icon_width',
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
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'condition' => [
                        'se_icon_box_icon_type' => 'lordicon'
                    ]
                ]
            );

            $this->add_responsive_control(
                'se_lord_icon_height',
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
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'condition' => [
                        'se_icon_box_icon_type' => 'lordicon'
                    ]
                ]
            );

            // lord icon animation 
            $selectAttrs = [
                'id'            => 'se_icon_box_lord_icon',
                'label'         => 'Icon Animation',
                'options' => [
                    'loop'          => esc_html__('Loop (infinite)', 'superelements-elementor-addons-widgets-templates'),
                    'click'         => esc_html__('Click', 'superelements-elementor-addons-widgets-templates'),
                    'hover'         => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates'),
                    'loop-on-hover' => esc_html__('Loop on Hover', 'superelements-elementor-addons-widgets-templates'),
                    'morph'         => esc_html__('Morph', 'superelements-elementor-addons-widgets-templates'),
                    'morph-two-way' => esc_html__('Morph two way', 'superelements-elementor-addons-widgets-templates'),
                ],
                'default' => 'loop',
                'condition'     => [
                    'se_icon_box_icon_type' => 'lordicon'
                ],
            ];
            $this->se_select_control($selectAttrs);

            // icon as lord icon color controls 
            $primary = [
                'id'            => 'se_lord_icon_primary',
                'label' => 'Primary Color',
                'condition'     => [
                    'se_icon_box_icon_type' => 'lordicon'
                ],
            ];
            $this->se_color_controls($primary);
            $secondary = [
                'id'            => 'se_lord_icon_secondary',
                'label' => 'Secondary Color',
                'condition'     => [
                    'se_icon_box_icon_type' => 'lordicon'
                ],
            ];
            $this->se_color_controls($secondary);
            $tertiary = [
                'id'            => 'se_lord_icon_tertiary',
                'label' => 'Tertiary Color',
                'condition'     => [
                    'se_icon_box_icon_type' => 'lordicon'
                ],
            ];
            $this->se_color_controls($tertiary);
            $quaternary = [
                'id'            => 'se_lord_icon_quaternary',
                'label' => 'Quaternary Color',
                'condition'     => [
                    'se_icon_box_icon_type' => 'lordicon'
                ],
            ];
            $this->se_color_controls($quaternary);

            $mAttrs = [
                'id'            => 'se_image',
                'class'         => '.ic-card > .se-icon',
                'condition'     => [
                    'se_icon_box_icon_type!' => 'lordicon'
                ],
            ];
            $this->se_margin_controls($mAttrs);

        $this->end_controls_section();
       
        //title
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $attrs = [
                'id' => 'se_icon_box_title',
                'class' => '.ic-title',
            ];
            $this->heading_style($attrs); 
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        //content
        $this->start_controls_section(
            'desc_style',
            [
                'label' => esc_html__('Description', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            $attrs = [
                'id' => 'se_icon_box_description',
                'class' => '.ic-content',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // icon box button 
        $this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'text!' => ''
                ]
            ]
        );

            $attrs = [
                'id' => 'se_icon_box_button',
                'class' => '.ic-card .elementor-button',
            ];
            $this->register_button_style_controls($attrs);

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
        include apply_filters('redq_se_widget_icon_box_view', $file, $settings);
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
