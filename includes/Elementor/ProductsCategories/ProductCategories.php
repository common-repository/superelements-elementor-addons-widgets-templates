<?php

/**
 * Elementor Pricing Widget.
 *
 * Elementor widget that inserts Pricing Tabs.
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
if (!defined('ABSPATH')) {
    exit;
}
class ProductCategories extends Widget_Base
{

	use SpacingTraits;
    use BorderTraits;
    use ColorTraits;
    use TextTraits;
    use WidthHeightTraits;
    /**
     * Get widget name.
     *
     * Retrieve Pricing Tabs name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'se_product_category';
    }

    /**
     * Get widget title.
     *
     * Retrieve Pricing Tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Category', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Pricing Tabs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-categories se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
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
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
    public function get_keywords() {
		return [ 'se', 'super', 'super element', 'element', 'category', 'product'];
	}

    /**
     * Register Pricing Tabs widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'product_category',
            [
                'label' => esc_html__('Content', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
			);
		$this->end_controls_section();
    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings            = $this->get_settings_for_display();
		extract($settings);
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_cat_view', $file, $settings);
    }
    private function get_shortcode() {
		$short_code = sprintf( '[product_categories]', '' );
		return $short_code;
	}
}