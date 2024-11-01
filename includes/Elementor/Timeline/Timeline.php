<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;

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
class Timeline extends Widget_Base
{

    use SpacingTraits;
    use BorderTraits;
    use ColorTraits;
    use TextTraits;
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
        return 'se_timeline';
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
        return esc_html__('Timeline', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-time-line se-icon';
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

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_timeline_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_timeline_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Timeline Content', 'superelements-elementor-addons-widgets-templates'),
            ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Timeline Title', 'superelements-elementor-addons-widgets-templates'),
                    'label_block' => true,
                ]
            );
        
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
                'timeline_count',
                [
                    'label' => esc_html__('Timeline Count', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('01', 'superelements-elementor-addons-widgets-templates'),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'timeline_image',
                [
                    'label' => esc_html__('Timeline Image', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::MEDIA,
                    'description' => esc_html__('Recommended Size:70x70)','superelements-elementor-addons-widgets-templates'),
                    'media_types' => [
                        'image',
                        'svg'
                    ],
                ]
            );
        $this->end_controls_section();

        // Style section start 
        // card style 
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('Card Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'timeline_card_position',
                [
                    'label' => esc_html__( 'Icon Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::CHOOSE,
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
                    'default'   => 'column',
                    'selectors' => [
                        '{{WRAPPER}} .se-timeline-card' => 'flex-direction: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'icon_align',
                [
                    'label' => esc_html__( 'Icon Alignment', 'superelements-elementor-addons-widgets-templates' ),
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
                    'selectors' => [
                        '{{WRAPPER}} .se-timeline-card' => 'align-items: {{VALUE}};',
                    ],
                    'default' => 'center',
                    'condition' => [
                        'timeline_card_position' => 'column'
                    ]
                ]
            );

            $tcAttrs = [
                'id' => 'se_timeline_content',
                'class' => '.se-timeline-content',
                'default' => 'center',
            ];
            $this->se_text_alignment_controls($tcAttrs);

            $tAttrs = [
                'id' => 'se_timeline_card',
                'class' => '.se-timeline-card',
            ];
            $this->se_background_color_controls($tAttrs);
            $this->se_margin_padding_controls($tAttrs);
            
        $this->end_controls_section();

        // Icon style 
        $this->start_controls_section(
            'icon_style',
            [
                'label'     => esc_html__('Icon Style', 'superelements-elementor-addons-widgets-templates'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            $taAttrs = [
                'id' => 'se_timeline_icon',
                'class' => '.se-timeline-icon span',
            ];
            $this->se_text_style_controls($taAttrs);
            $this->se_background_color_controls($taAttrs);
            $this->se_width_height_controls($taAttrs);
            $this->se_margin_padding_controls($taAttrs);
            $this->se_border_controls($taAttrs);
        
        $this->end_controls_section();
        // title
        $this->start_controls_section(
            'timeline_title_style',
            [
                'label' => esc_html__('Title Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            
            $attrs = [
                'id' => 'se_timeline_title',
                'class' => '.se-timeline-title',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // description
        $this->start_controls_section(
            'desc_style',
            [
                'label' => esc_html__('Description Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id' => 'se_timeline_desc',
                'class' => '.se-timeline-desc',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();
        
        $this->start_controls_section(
            'timeline_image_style',
            [
                'label'     => esc_html__('Timeline Image Style', 'superelements-elementor-addons-widgets-templates'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $attrs = [
                'id' => 'se_timeline_image',
                'class' => '.se-timeline-card .timeline-pos',
            ];
            $this->se_width_height_controls($attrs);

            $this->add_control(
                'icon_x_position',
                [
                    'label' => esc_html__( 'Icon X Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-timeline-card .timeline-pos' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'icon_y_position',
                [
                    'label' => esc_html__( 'Icon Y Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -150,
                            'max' => 150,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-timeline-card .timeline-pos' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

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
