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

class CustomAddToCart extends Widget_Base
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
        return 'se_custom_add_to_cart';
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
        return esc_html__('Custom Add To Cart', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-product-add-to-cart se-icon';
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
        return ['se-widgets'];
    }

    public function get_style_depends()
    {
        return [];
    }
    public function get_script_depends()
    {
        return [];
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
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Add to Cart', 'superelements-elementor-addons-widgets-templates'),
            ]
        );
        $this->add_control(
            'product_id',
            [
                'label' => esc_html__('Select Product', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $this->get_product_options(),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'quantity',
            [
                'label' => esc_html__('Quantity', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'min' => 1,
            ]
        );

        $this->add_control(
            'show_variations',
            [
                'label' => esc_html__('Show Variations', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'variations_heading',
            [
                'label' => esc_html__('Variations Heading', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Select Variations', 'superelements-elementor-addons-widgets-templates'),
                'condition' => [
                    'show_variations' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'superelements-elementor-addons-widgets-templates'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-shopping-cart',
                    'library' => 'solid',
                ],
            ]
        );
        
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
        // $settings = $this->get_settings_for_display();
        // extract($settings);
        $settings = $this->get_settings_for_display();
        $product_id = $settings['product_id'];        
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_custom_add_to_cart', $file, $settings);
    }
    protected function get_product_options() {
        $products = get_posts(array('post_type' => 'product', 'numberposts' => -1));

        $options = array();
        foreach ($products as $product) {
            $options[$product->ID] = $product->post_title;
        }

        return $options;
    }
    protected function is_editor() {
        if(\Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode()){
            return true;
        }
        return false;
    }
}