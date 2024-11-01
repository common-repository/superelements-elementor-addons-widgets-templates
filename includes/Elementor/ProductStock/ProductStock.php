<?php

/**
 * Elementor Product Stock Widget.
 *
 * Elementor widget that inserts an Product Stock
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
if (!defined('ABSPATH')) {
    exit;
}
class ProductStock extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Stock widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use TextTraits;
    use SpacingTraits;
    public function get_name()
    {
        return 'se_product_stock';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Stock widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Stock', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Stock widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-stock se-icon';
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
     * Register Product Stock widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
       
        $this->start_controls_section(
			'se_card_style',
			[
				'label' => esc_html__( 'Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'    => 'se_single_product_stock',
                'class' => '.stock'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();
        
    }

    /**
     * Render Product Rating widget output on the frontend.
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
        include apply_filters('redq_se_widget_product_rating', $file, $settings);
    }
    protected function builder_view() {
        $product = wc_get_product(redq_se_get_product_id());
        if($product){
            echo wp_kses_post(wc_get_stock_html( $product ));
        }
    }
}