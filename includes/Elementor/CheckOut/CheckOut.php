<?php

/**
 * Elementor Add To Cart Widget.
 *
 * Elementor widget that inserts an Add To Cart
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

class CheckOut extends Widget_Base
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
        return 'se_checkout';
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
        return esc_html__('CheckOut', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-checkout se-icon';
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

        // checkout headings
        $this->start_controls_section(
            'se_checkout_headings',
            [
                'label' => esc_html__('Headings', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $hAttrs = [
                'id' => 'se_checkout_heading',
                'class' => '.se-checkout-wrapper h3',
            ];
            $this->se_typography_controls($hAttrs); 
            $this->se_color_controls($hAttrs); 

        $this->end_controls_section();

        $this->start_controls_section(
            'se_checkout_input_labels',
            [
                'label' => esc_html__('Label', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $lAttrs = [
                'id' => 'se_checkout_label',
                'class' => '.se-checkout-wrapper label',
            ];
            $this->se_typography_controls($lAttrs); 
            $this->se_color_controls($lAttrs); 

        $this->end_controls_section();

        $this->start_controls_section(
            'se_checkout_inputs',
            [
                'label' => esc_html__('Inputs', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $iAttrs = [
                'id' => 'se_checkout_input',
                'class' => '.se-checkout-wrapper input, .se-checkout-wrapper textarea, .se-checkout-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered',
            ];
            $this->se_typography_controls($iAttrs); 
            $this->se_color_controls($iAttrs); 

        $this->end_controls_section();

        $this->start_controls_section(
            'se_checkout_buttons',
            [
                'label' => esc_html__('Buttons', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $bAttrs = [
                'id' => 'se_checkout_button',
                'class' => '.se-checkout-wrapper button',
            ];
            $this->se_typography_controls($bAttrs); 
            $this->se_color_controls($bAttrs); 
            $this->se_background_color_controls($bAttrs); 

        $this->end_controls_section();

        $this->start_controls_section(
            'se_checkout_table',
            [
                'label' => esc_html__('Table', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $this->add_control(
                'se_checkout_table_header_control_heading',
                [
                    'label' => esc_html__( 'Table Header', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $thAttrs = [
                'id' => 'se_checkout_table_header',
                'class' => '.se-checkout-wrapper table thead tr th',
            ];
            $this->se_typography_controls($thAttrs); 
            $this->se_color_controls($thAttrs); 

            $this->add_control(
                'se_checkout_table_body_control_heading',
                [
                    'label' => esc_html__( 'Table Body', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $tbAttrs = [
                'id' => 'se_checkout_table_body',
                'class' => '.se-checkout-wrapper table tbody tr td',
            ];
            $this->se_typography_controls($tbAttrs); 
            $this->se_color_controls($tbAttrs); 

            $this->add_control(
                'se_checkout_table_footer_control_heading',
                [
                    'label' => esc_html__( 'Table Footer', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $tfAttrs = [
                'id' => 'se_checkout_table_footer',
                'class' => '.se-checkout-wrapper table tfoot tr td, .se-checkout-wrapper table tfoot tr th',
            ];
            $this->se_typography_controls($tfAttrs); 
            $this->se_color_controls($tfAttrs); 

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