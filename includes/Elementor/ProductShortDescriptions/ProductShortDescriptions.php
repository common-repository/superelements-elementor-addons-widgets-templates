<?php

/**
 * Elementor Product Short Descriptions Widget.
 *
 * Elementor widget that inserts an Product Short Descriptions
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
class ProductShortDescriptions extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Short Descriptions widget name.
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
        return 'se_product_short_descriptions';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Short Descriptions widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Short Descriptions', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Short Descriptions widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-description se-icon';
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
			'se_product_short_description_style',
			[
				'label' => esc_html__( 'Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'    => 'se_product_short_description',
                'class' => '.se-product-short-description p'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

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
        $settings        = $this->get_settings_for_display();
        $file            = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_rating', $file, $settings);
    }

    protected function builder_view() { ?>
        <div class="woocommerce-product-details__short-description">
	        <p><?php echo esc_html__('This is a simple product.', 'superelements-elementor-addons-widgets-templates'); ?></p>
        </div>
        <?php 
    }
}