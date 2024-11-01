<?php

/**
 * Elementor WooCommerce notice Widget.
 *
 * Elementor widget that inserts an WooCommerce notice
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class Notice extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Add To Cart widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use WidthHeightTraits;
    use ButtonTraits;
    use TextTraits;
    use BorderTraits;
    use ColorTraits;
    use SpacingTraits;
    public function get_name()
    {
        return 'se_notice';
    }

    /**
     * Get widget title.
     *
     * Retrieve Add To Cart widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Notice', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Add To Cart widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-woocommerce-notices se-icon';
    }
   /**
    * style dependency 
    */
    public function get_style_depends()
    {
        return ['notice'];
    }
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Add To Cart widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
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
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_style_controls();
    }
    
    public function register_style_controls() {

        // add to cart structure
        $this->start_controls_section(
            'se_product_form_wrapper',
            [
                'label' => esc_html__('Form Wrapper', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'form_wrapper_direction',
                [
                    'label' => esc_html__( 'Direction', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'row' => [
                            'title' => esc_html__( 'Row', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-arrow-right',
                        ],
                        'column' => [
                            'title' => esc_html__( 'Column', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-arrow-down',
                        ],
                    ],
                    'default' => 'row',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .add-to-cart .cart' => 'flex-direction: {{VALUE}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'form_wrapper_max_width',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Max Width', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .add-to-cart .cart' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $attrs = [
                'id'    => 'se_form_wrapper',
                'class' => '.add-to-cart .cart'
            ];
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // stock text style  
        $this->start_controls_section(
			'add_to_card_stock_text_style',
			[
				'label' => esc_html__( 'Stock Text Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'    => 'se_single_product_stock',
                'class' => '.add-to-cart .stock'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // quantity wrapper style 
        $this->start_controls_section(
            'se_product_quantity_wrapper',
            [
                'label' => esc_html__('Quantity Wrapper', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_responsive_control(
                'quantity_wrapper_max_width',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Max Width', 'superelements-elementor-addons-widgets-templates' ),
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
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .add-to-cart .quantity' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // input style 
        $this->start_controls_section(
            'se_product_quantity_input',
            [
                'label' => esc_html__('Quantity Input', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_quantity_input',
                'class'      => '.quantity input',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_width_height_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // quantity button style 
        $this->start_controls_section(
            'se_product_quantity_button',
            [
                'label' => esc_html__('Quantity Buttons', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_quantity_button',
                'class'      => '.quantity .quantity-btn',
            ];
            $this->se_width_height_controls($attrs);

            // button normal and hover styles 
            $this->start_controls_tabs(
                'se_quantity_buttons_tabs'
                );

                $this->start_controls_tab(
                    'se_quantity_button_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'         => 'quantity_buttons',
                        'class'      => '.quantity .quantity-btn',
                    ];
                    $this->se_color_controls($attrs);
                    $this->se_background_color_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_quantity_button_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'         => 'quantity_buttons_hover',
                        'class'      => '.quantity .quantity-btn:hover',
                    ];
                    $this->se_color_controls($attrs);
                    $this->se_background_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // quantity button left style 
        $this->start_controls_section(
            'se_product_quantity_button_left',
            [
                'label' => esc_html__('Quantity Button Left', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_quantity_button_left',
                'class'      => '.quantity .quantity-btn.quantity-btn-down',
            ];
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // quantity button right style 
        $this->start_controls_section(
            'se_product_quantity_button_right',
            [
                'label' => esc_html__('Quantity Button Right', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_quantity_button_right',
                'class'      => '.quantity .quantity-btn.quantity-btn-up',
            ];
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // add to cart button style 
        $this->start_controls_section(
            'se_product_add_to_cart_button',
            [
                'label' => esc_html__('Add To Cart Button', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_add_to_cart_button',
                'class'      => '.add-to-cart > form.cart > .single_add_to_cart_button',
            ];
            $this->register_button_style_controls($attrs);

        $this->end_controls_section();
    }

    /**
     * Render Add To Cart widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings            = $this->get_settings_for_display();
        $file = __DIR__ . '/view.php';
       include apply_filters('redq_se_widget_checkout', $file, $settings);
    }
}