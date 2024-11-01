<?php

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
if (!defined('ABSPATH')) {
    exit;
}

class Menu extends Widget_Base
{
    use ColorTraits;
    use TextTraits;
    use BorderTraits;
    use SpacingTraits;
    use ButtonTraits;
    use WidthHeightTraits;

    public function get_name()
    {
        return 'menu_items_widget';
    }

    public function get_title()
    {
        return esc_html__('Menu', 'superelements-elementor-addons-widgets-templates');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu se-icon';
    }

    public function get_categories()
    {
        return ['se-widgets'];
    }

    public function get_script_depends()
    {
        return ['menu'];
    }

    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }


    protected function register_content_controls() 
    {
        
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Menu', 'superelements-elementor-addons-widgets-templates'),
            ]
        );

            $this->add_control(
                'selected_menu',
                [
                    'label' => esc_html__('Select Menu', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $this->get_menu_options(),
                    'default' => $this->get_menu_options()[0]
                ]
            );

            // Add a select control for menu selection
            $this->add_control(
                'site_logo',
                [
                    'label' => esc_html__('Logo', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::MEDIA,
                    'description' => esc_html__('Recommended Size:70x70)', 'superelements-elementor-addons-widgets-templates'),
                    'media_types' => [
                        'image',
                        'svg'
                    ],
                ]
            );

            $this->add_control(
                'site_link',
                [
                    'label' => esc_html__('Link', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'se_sticky_menu',
                [
                    'label' => esc_html__('Sticky Menu?', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Yes', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('no', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'fixed',
                    'default' => '',
                ]
            );
             $this->add_control(
                'show_button',
                [
                    'label' => esc_html__('Show Button', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('Off', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'true',
                    'default' => 'true',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'condition'   => [
                    'show_button' => ['true']
                ]
            ]
        );

            $this->add_control(
                'button_text',
                [
                    'label' => esc_html__('Text', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Get Started', 'superelements-elementor-addons-widgets-templates'),
                    'placeholder' => esc_html__('Add button text', 'superelements-elementor-addons-widgets-templates'),
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label' => esc_html__('Link', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => ['url', 'is_external', 'nofollow'],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {

        // header style controls 
        $this->start_controls_section(
            'header_style_controls',
            [
                'label' => esc_html__('Header', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $this->start_controls_tabs(
                'header_box_shadow',
                );

                $this->start_controls_tab(
                    'header_normal_style',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $attrs = [
                        'id' => 'se_menu_header_normal',
                        'class' => '.primary-navigation-menu',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_padding_controls($attrs);
                    $this->se_border_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'header_scroll_style',
                    [
                        'label' => esc_html__('Scroll', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $attrs = [
                        'id' => 'se_menu_header_scroll',
                        'class' => '.primary-navigation-menu.isScrolling',
                    ];
                    $this->se_background_color_controls($attrs);
                    $this->se_padding_controls($attrs);
                    $this->se_border_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();
        
        $this->end_controls_section();

        // site logo 
        $this->start_controls_section(
            'menu_logo_style',
            [
                'label' => esc_html__('Logo', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_navigation_menu_logo',            
                'class' => '.menu-container .site-logo',
            ];
            $this->se_width_height_controls($attrs);
            $this->se_margin_controls($attrs);
                
        $this->end_controls_section();

        // navigation items style 
        $this->start_controls_section(
            'nav_style_section',
            [
                'label' => esc_html__('Navigation', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id' => 'se_navigation',
                'class' => '.menu-container nav .menu >  li > a',
            ];
            $this->se_typography_controls($attrs);
            $this->add_responsive_control(
                'se_navigation_alignment_control',
                [
                    'label' => esc_html__( 'AlignMent', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'margin-right' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'margin-left' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle'=> 'true',
                    'selectors' => [
                        '{{WRAPPER}} .menu-container .horizontal' => '{{VALUE}}: auto',
                    ],
                ]
            );

            $this->se_margin_padding_controls($attrs);

            $this->start_controls_tabs('nav_tabs');

                // normal tab 
                $this->start_controls_tab(
                    'nav_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id' => 'se_navigation_normal',
                        'class' => '.menu-container nav li a',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

                // hover tab 
                $this->start_controls_tab(
                    'nav_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id' => 'se_navigation_hover',
                        'class' => '.menu-container nav li a:hover',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // menu button 
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'show_button' => 'true'
                ]
            ]
            );

            $attrs = [
                'id'    => 'se_navigation_button',            
                'class' => '.nav-menu-button',
            ];
            $this->register_button_style_controls($attrs);
                
        $this->end_controls_section();

        // Mega menu
        $this->start_controls_section(
            'mega_menu_style',
            [
                'label' => esc_html__('Mega Menu', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_mega_menu',            
                'class' => '.horizontal .se-mega-menu',
            ];
            $this->se_width_height_controls($attrs);

            $this->add_responsive_control(
                'mega_menu_x_position',
                [
                    'label' => esc_html__( 'X-Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -1000,
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
                        '{{WRAPPER}} .horizontal .se-mega-menu' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mega_menu_y_position',
                [
                    'label' => esc_html__( 'Y-Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -1000,
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
                        '{{WRAPPER}} .horizontal .se-mega-menu' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
                
        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings();
        // Get selected menu items and render them
        if (!empty($settings['site_link']['url'])) {
            $this->add_link_attributes('site_link', $settings['site_link']);
        }
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_link', $settings['button_link']);
        }
        if (!empty($settings['selected_menu'])) {
            $menu_items = wp_get_nav_menu_items($settings['selected_menu']);
            $file = __DIR__ . '/view.php';
            include apply_filters('redq_se_widget_menu_view', $file, $settings);
        }
    }

    protected function get_menu_options()
    {
        $menus = get_terms([
            'taxonomy' => 'nav_menu',
            'hide_empty' => false,
        ]);    
        $menu_options = ['Choose menu'];
        if ($menus && !is_wp_error($menus)) {
            foreach ($menus as $menu) {
                $menu_options[$menu->term_id] = $menu->name;
            }
        }
        return $menu_options;
    }
}
