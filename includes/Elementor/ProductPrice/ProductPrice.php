<?php

/**
 * Elementor Product Price Widget.
 *
 * Elementor widget that inserts an Product Price
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;


use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class ProductPrice extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Price widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use TextTraits;
    use SpacingTraits;
    public function get_name()
    {
        return 'se_product_price';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Price widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Price', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Price widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-price se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Product Title widget belongs to.
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
     * Register Product Price widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // card control 
		$this->start_controls_section(
			'se_card_style',
			[
				'label' => esc_html__( 'Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            );

            $attrs = [
                'id'        => 'se_product_price',
                'class'        => '.price, .price ins .amount, .price .amount',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();
        
    }

    /**
     * Render Product Price widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $file            = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_price', $file, $settings);
    }

    protected function builder_view(){ ?>
        <p class="price"><?php echo wp_kses_post(wc_price(18)); ?></p>
     <?php
    }
}