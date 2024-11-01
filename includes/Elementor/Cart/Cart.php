<?php

/**
 * Elementor Cart Widget.
 *
 * Elementor widget that inserts an  Cart
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

class Cart extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Cart widget name.
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
        return 'se_cart';
    }

    /**
     * Get widget title.
     *
     * Retrieve Cart widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Cart', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Cart widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-woo-cart se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Cart widget belongs to.
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
     * Cart Form widget controls.
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

        $this->start_controls_section(
            'se_cart_table_style',
            [
                'label' => esc_html__('Cart Table', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_control(
                'se_cart_table_header',
                [
                    'label' => esc_html__( 'Table Head', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $thAttrs = [
                'id' => 'se_cart_table_head',
                'class' => '.se-cart-wrapper table thead tr th',
            ];
            $this->se_typography_controls($thAttrs);
            $this->se_color_controls($thAttrs);

            $this->add_control(
                'se_cart_table_body',
                [
                    'label' => esc_html__( 'Table Body', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before'
                ]
            );

            $tbAttrs = [
                'id' => 'se_cart_table_body',
                'class' => '.se-cart-wrapper table tbody tr td, .se-cart-wrapper table tbody tr td a',
            ];
            $this->se_typography_controls($tbAttrs);
            $this->se_color_controls($tbAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_cart_button_style',
            [
                'label' => esc_html__('Cart Buttons', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $cbAttrs = [
                'id' => 'se_cart_button',
                'class' => '.se-cart-wrapper button, .se-cart-wrapper .cart-collaterals .cart_totals .wc-proceed-to-checkout .checkout-button',
            ];
            $this->se_typography_controls($cbAttrs);
            $this->se_color_controls($cbAttrs);
            $this->se_background_color_controls($cbAttrs);
            
        $this->end_controls_section();
        
    }

    /**
     * Render Cart widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_custom_cart', $file, $settings);
    }

}