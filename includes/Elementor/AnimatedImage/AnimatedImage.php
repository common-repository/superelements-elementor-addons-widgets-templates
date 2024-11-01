<?php

/**
 * Elementor Classes.
 *
 * @package Animated Image
 */

 namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\IconUploadTraits;
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Animated Image
 *
 * Elementor widget for Animated Image.
 *
 * @since 1.0.0
 */
class AnimatedImage extends Widget_Base
{
    use SpacingTraits;
    use TextTraits;
    use ColorTraits;
    use IconUploadTraits;
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
        return 'se_animated_image';
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
        return __('Animated Image', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-search-results se-icon';
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

    public function get_custom_help_url()
    {
        return 'https://wordpress-rental-booking-doc.vercel.app/accordion-widget';
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'se_image_section',
            [
                'label' => esc_html__('Image', 'superelements-elementor-addons-widgets-templates'),
            ]
            );
       
            $this->add_control(
                'image',
                [
                    'label' => esc_html__( 'Choose Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::MEDIA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
                    'default' => 'large',
                    'separator' => 'none',
                ]
            );

            $this->add_responsive_control(
                'align',
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
                    ],
                    'selectors' => [
                        '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'se_main_image_z_index',
                [
                    'label'       => esc_html__( 'z-index', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::NUMBER,
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper .main-image' => 'z-index: {{VALUE}};',
                    ],

                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'se_image_animation_name',
                [
                    'label'       => esc_html__( 'Animation Name', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );    
            $repeater->add_control(
                'se_image_add_animated_image',
                [
                    'label'   => esc_html__( 'Choose Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'se_image_position_start_pos_x',
                [
                    'label'   => esc_html__( 'Icon Position X', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::CHOOSE,
                    'default' => 'left',
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-h-align-left',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-h-align-right',
                        ],
                    ],    
                ]
            );
            $repeater->add_control(
                'se_image_position_start_pos_y',
                [
                    'label'   => esc_html__( 'Icon Position Y', 'superelements-elementor-addons-widgets-templates' ),
                    'type'    => \Elementor\Controls_Manager::CHOOSE,
                    'default' => 'top',
                    'options' => [
                        'top' => [
                            'title' => esc_html__( 'Top', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-v-align-top',
                        ],
                        'bottom' => [
                            'title' => esc_html__( 'Bottom', 'superelements-elementor-addons-widgets-templates' ),
                            'icon'  => 'eicon-v-align-bottom',
                        ],
                    ],    
                ]
            );
            $repeater->add_responsive_control(
                'se_image_animate_image_pos_x_left',
                [
                    'label' => esc_html__( 'X Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_image_position_start_pos_x' => 'left'
                    ]
                ]
            );  
            $repeater->add_responsive_control(
                'se_image_animate_image_pos_x_right',
                [
                    'label' => esc_html__( 'X Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_image_position_start_pos_x' => 'right'
                    ]
                ]
            ); 
            $repeater->add_responsive_control(
                'se_image_animate_image_pos_y',
                [
                    'label' => esc_html__( 'Y Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_image_position_start_pos_y' => 'top'
                    ]
                ]
            );   
            $repeater->add_responsive_control(
                'se_image_animate_image_pos_y_top',
                [
                    'label' => esc_html__( 'Y Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -10000,
                            'max'  => 10000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => -100,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_image_position_start_pos_y' => 'bottom'
                    ]
                ]
            ); 
            $repeater->add_responsive_control(
                'se_image_animate_image_width',
                [
                    'label' => esc_html__( 'Width', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}} img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );    
            $repeater->add_responsive_control(
                'se_image_animate_image_height',
                [
                    'label' => esc_html__( 'Height', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => 0,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}} img' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $repeater->add_control(
                'se_image_animate_image_animation',
                [
                    'label' => esc_html__( 'Animation Type', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        ''                     => esc_html__( 'Default', 'superelements-elementor-addons-widgets-templates' ),
                        'none'                 => esc_html__( 'None', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-spin'      => esc_html__( 'Spin', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-translate' => esc_html__( 'Translate', 'superelements-elementor-addons-widgets-templates' ),
                        'se-animate-tilt'      => esc_html__( 'Tilt', 'superelements-elementor-addons-widgets-templates' ),
                        'double'               => esc_html__( 'Double', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                ]
            );   
            $repeater->add_responsive_control(
                'se_image_animate_image_z_index',
                [
                    'label'       => esc_html__( 'z-index', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::NUMBER,
                    'selectors' => [
                        '{{WRAPPER}} .se-image-wrapper {{CURRENT_ITEM}}' => 'z-index: {{VALUE}};',
                    ],

                ]
            );
            $this->add_control(
                'se_image_animalist',
                [
                    'label'       => esc_html__( 'Add Animated Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ se_image_animation_name }}}',
                ]
            );
        $this->end_controls_section();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */

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
        include apply_filters('redq_se_widget_animated_image_view', $file, $settings);
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
