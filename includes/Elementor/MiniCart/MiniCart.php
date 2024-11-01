<?php

/**
 * Elementor Add To Cart Widget.
 *
 * Elementor widget that inserts an Add To Cart
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
class MiniCart extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Add To Cart widget name.
     *
     * @since 1.0.0
     *
     * @return string widget name
     */

    public function get_name()
    {
        return 'se_menu_cart';
    }

    /**
     * Get widget title.
     *
     * Retrieve Add To Cart widget title.
     *
     * @since 1.0.0
     *
     * @return string widget title
     */
    public function get_title()
    {
        return esc_html__('Mini Cart', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Add To Cart widget icon.
     *
     * @since 1.0.0
     *
     * @return string widget icon
     */
    public function get_icon()
    {
        return 'eicon-product-add-to-cart se-icon';
    }

    public function get_style_depends()
    {
        return ['mini-cart'];
    }

    public function get_script_depends()
    {
        return ['mini-cart'];
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Add To Cart widget belongs to.
     *
     * @since 1.0.0
     *
     * @return array widget categories
     */
    public function get_categories()
    {
        return ['se-widgets-woocommerce'];
    }

    /**
     * Add To Cart Form widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     */
    protected function register_controls()
    {
        $this->register_content_controls();
        $this->register_style_controls();
    }

    public function register_content_controls()
    {
        // default settings
        $this->start_controls_section(
            'default_settings',
            [
                'label' => esc_html__('Default Settings', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'se_mini_cart_handler_type',
                [
                    'label' => esc_html__('Cart Icon Type', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'icon' => [
                            'title' => esc_html__('Icon', 'superelements-elementor-addons-widgets-templates'),
                            'icon' => 'eicon-basket-solid',
                        ],
                        'image' => [
                            'title' => esc_html__('Image', 'superelements-elementor-addons-widgets-templates'),
                            'icon' => 'eicon-image-hotspot',
                        ],
                    ],
                    'default' => 'icon',
                ]
            );

            $this->add_control(
                'se_mini_cart_handler_icon',
                [
                    'label' => esc_html__('Cart Icon', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-cart-plus',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'se_mini_cart_handler_type' => 'icon',
                    ],
                ]
            );

            $this->add_control(
                'se_mini_cart_handler_image',
                [
                    'label' => esc_html__('Cart Image', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::MEDIA,
                    'condition' => [
                        'se_mini_cart_handler_type' => 'image',
                    ],
                ]
            );

        $this->end_controls_section();

        // empty cart settings 
        $this->start_controls_section(
            'mini_cart_empty_cart_settings',
            [
                'label' => esc_html__('Empty Cart Settings', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );

            $this->add_control(
                'mini_cart_empty_image',
                [
                    'label' => esc_html__( 'Empty Image', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'mini_cart_empty_text',
                [
                    'label' => esc_html__( 'Empty Text', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__( 'No products found.', 'superelements-elementor-addons-widgets-templates' ),
                    'placeholder' => esc_html__( 'Type your empty text', 'superelements-elementor-addons-widgets-templates' ),
                ]
            );

        $this->end_controls_section();

    }

    public function register_style_controls()
    {
        // mini cart icon style settings
        $this->start_controls_section(
            'mini_cart_handler_style_settings',
            [
                'label' => esc_html__('Mini Cart Icon', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'mini_cart_handler_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                    'default' => [
                        'unit' => 'px',
                        'size' => 24,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-handler > svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .se-mini-cart-handler' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_mini_cart_handler_type' => 'icon',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_handler_width',
                [
                    'label' => esc_html__('Width', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                        '{{WRAPPER}} .se-mini-cart-handler' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_mini_cart_handler_type' => 'image',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_handler_height',
                [
                    'label' => esc_html__('Height', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                        '{{WRAPPER}} .se-mini-cart-handler' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'se_mini_cart_handler_type' => 'image',
                    ],
                ]
            );

            $this->start_controls_tabs(
                'mini_cart_handler_styles_tabs'
                );

                $this->start_controls_tab(
                    'mini_cart_handler_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_handler_icon_normal_color',
                        [
                            'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-handler > svg' => 'fill: {{VALUE}}',
                                '{{WRAPPER}} .se-mini-cart-handler' => 'color: {{VALUE}}',
                            ],
                            'condition' => [
                                'se_mini_cart_handler_type' => 'icon',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_handler_icon_normal_bg_color',
                        [
                            'label' => esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-handler' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mini_cart_handler_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_handler_icon_hover_color',
                        [
                            'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-handler:hover > svg' => 'fill: {{VALUE}}',
                                '{{WRAPPER}} .se-mini-cart-handler:hover' => 'color: {{VALUE}}',
                            ],
                            'condition' => [
                                'se_mini_cart_handler_type' => 'icon',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_handler_icon_hover_bg_color',
                        [
                            'label' => esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-handler:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_handler_icon_hover_border_color',
                        [
                            'label' => esc_html__('Border Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-handler:hover' => 'border-color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        \Elementor\Group_Control_Box_Shadow::get_type(),
                        [
                            'name' => 'mini_cart_handler_box_shadow',
                            'selector' => '{{WRAPPER}} .se-mini-cart-handler:hover',
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_responsive_control(
                'mini_cart_handler_margin',
                [
                    'label' => esc_html__('Margin', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-handler' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_handler_padding',
                [
                    'label' => esc_html__('Padding', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'separator' => 'after',
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-handler' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'mini_cart_handler_border',
                    'selector' => '{{WRAPPER}} .se-mini-cart-handler',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_handler_radius',
                [
                    'label' => esc_html__('Border Radius', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-handler' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // mini cart counter style settings
        $this->start_controls_section(
            'mini_cart_counter_style_settings',
            [
                'label' => esc_html__('Mini Cart Counter', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'mini_cart_counter_typography',
                    'selector' => '{{WRAPPER}} .se-mini-cart-counter',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_counter_color',
                [
                    'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-counter' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_counter_bg_color',
                [
                    'label' => esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-counter' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'mini_cart_counter_margin',
                [
                    'label' => esc_html__('Margin', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // mini cart container style settings
        $this->start_controls_section(
            'mini_cart_container_style_settings',
            [
                'label' => esc_html__('Cart Container', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'mini_cart_container_max_width',
                [
                    'label' => esc_html__( 'Max Width', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::SLIDER,
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
                        '{{WRAPPER}} .se-mini-cart-content' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_container_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-content' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__total' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_container_padding',
                [
                    'label' => esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // mini cart header style settings 
        $this->start_controls_section(
            'mini_cart_container_header_style_settings',
            [
                'label' => esc_html__('Cart Header', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_control(
                'mini_cart_container_header_heading',
                [
                    'label' => esc_html__( 'Title', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'mini_cart_container_header_title_typography',
                    'selector' => '{{WRAPPER}} .se-mini-cart-header-title',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_container_header_title_color',
                [
                    'label' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-header-title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'mini_cart_container_close_icon_heading',
                [
                    'label' => esc_html__( 'Close Icon', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_close_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 24,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-close > svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .se-mini-cart-close' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'mini_cart_container_header_icon_color',
                [
                    'label' => esc_html__( 'Color', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-close' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'mini_cart_container_header_wrapper_heading',
                [
                    'label' => esc_html__( 'Wrapper', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_container_header_wrapper_padding',
                [
                    'label' => esc_html__( 'Padding', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'mini_cart_container_header_wrapper_border',
                    'selector' => '{{WRAPPER}} .se-mini-cart-header',
                ]
            );

        $this->end_controls_section();

        // mini cart footer total prices 
        $this->start_controls_section(
            'mini_cart_total_prices_style_settings',
            [
                'label' => esc_html__('Total Prices', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );  

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'mini_cart_total_prices_typography',
                    'selector' => '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__total',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_total_prices_color',
                [
                    'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__total' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
        $this->end_controls_section();

        // mini cart footer button style settings 
        $this->start_controls_section(
            'mini_cart_container_footer_button_style_settings',
            [
                'label' => esc_html__('Cart Buttons', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'mini_cart_container_footer_button_typography',
                    'selector' => '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a',
                ]
            );

            $this->start_controls_tabs(
                'mini_cart_footer_button_styles_tabs'
                );

                $this->start_controls_tab(
                    'mini_cart_footer_button_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_footer_button_normal_color',
                        [
                            'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_footer_button_normal_bg_color',
                        [
                            'label' => esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'mini_cart_footer_button_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates'),
                    ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_footer_button_hover_color',
                        [
                            'label' => esc_html__('Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'mini_cart_footer_button_hover_bg_color',
                        [
                            'label' => esc_html__('Background Color', 'superelements-elementor-addons-widgets-templates'),
                            'type' => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a:hover' => 'background-color: {{VALUE}}',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_responsive_control(
                'mini_cart_footer_button_padding',
                [
                    'label' => esc_html__('Padding', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'separator' => 'before',
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'mini_cart_footer_button_border',
                    'selector' => '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a',
                ]
            );

            $this->add_responsive_control(
                'mini_cart_footer_button_radius',
                [
                    'label' => esc_html__('Border Radius', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                    'selectors' => [
                        '{{WRAPPER}} .se-mini-cart-list .woocommerce-mini-cart__buttons a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    /**
     * Render Add To Cart widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);

        $file = __DIR__.'/view.php';
        include apply_filters('redq_se_widget_mini_cart', $file, $settings);
    }
}
