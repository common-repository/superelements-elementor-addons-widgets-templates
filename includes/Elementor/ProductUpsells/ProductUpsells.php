<?php

/**
 * Elementor Product Upsells Widget.
 *
 * Elementor widget that inserts an Product Upsells
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;


use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class ProductUpsells extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Upsells widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use ColorTraits;
    use TextTraits;
    use BorderTraits;
    use ButtonTraits;
    use SpacingTraits;
    use WidthHeightTraits;
    public function get_name()
    {
        return 'se_product_up_sells';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Upsells widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Upsells', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Upsells widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-upsell se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Product Upsells widget belongs to.
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

    public function get_style_depends()
    {
        return ['upsell-products'];
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
			'se_product_up_sell_section',
			[
				'label' => esc_html__( 'Container Title Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_up_sell_section_title',
                'class'     => '.up-sells > h2, .up-sells.products .fusion-title h3',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_up_sell_product_card',
			[
				'label' => esc_html__( 'Product Card Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_title',
                'label'     => esc_html__('Title ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.up-sells .products .product h2, .up-sells .products .product h3 a',
                'separator' => 'after'
            ];
            $this->se_text_style_controls($attrs);

            $pAttrs = [
                'id'        => 'se_product_price',
                'label'     => esc_html__('Price ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.up-sells .products .product .price, .up-sells .products .product .price .amount',
                'separator' => 'after'
            ];
            $this->se_text_style_controls($pAttrs);

            $pcAttrs = [
                'id'        => 'se_product_card',
                'class'     => '.up-sells .products .product',
            ];
            $this->se_background_color_controls($pcAttrs);
            $this->se_padding_controls($pcAttrs);
            $this->se_border_controls($pcAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_up_sell_product_on_sale_badge',
			[
				'label' => esc_html__( 'Sale Badge Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_up_sell_product_sale_badge',
                'class'     => '.up-sells ul.products li.product a .onsale'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_width_height_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_up_sell_product_card_button',
			[
				'label' => esc_html__( 'Button Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_up_sell_product_card_button',
                'class'     => '.up-sells ul.products li.product a.button'
            ];
            $this->register_button_style_controls($attrs);

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
        include apply_filters('redq_se_widget_product_upsellsg', $file, $settings);
    }

    protected function woocommerce_upsell_display($limit = '-1', $columns = 4, $orderby = 'rand', $order = 'desc') {
        $product = wc_get_product(redq_se_get_product_id());

		if ( ! $product ) {
			return;
		}

		// Handle the legacy filter which controlled posts per page etc.
		$args = apply_filters(
			'woocommerce_upsell_display_args',
			array(
				'posts_per_page' => $limit,
				'orderby'        => $orderby,
				'order'          => $order,
				'columns'        => $columns,
			)
		);
		wc_set_loop_prop( 'name', 'up-sells' );
		wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_upsells_columns', isset( $args['columns'] ) ? $args['columns'] : $columns ) );

		$orderby = apply_filters( 'woocommerce_upsells_orderby', isset( $args['orderby'] ) ? $args['orderby'] : $orderby );
		$order   = apply_filters( 'woocommerce_upsells_order', isset( $args['order'] ) ? $args['order'] : $order );
		/**
		 * Filter the number of upsell products should on the product page.
		 *
		 * @param int $limit number of upsell products.
		 * @since 3.0.0
		 */
		$limit = intval( apply_filters( 'woocommerce_upsells_total', $args['posts_per_page'] ?? $limit ) );

		// Get visible upsells then sort them at random, then limit result set.
		$upsells = wc_products_array_orderby( array_filter( array_map( 'wc_get_product', $product->get_upsell_ids() ), 'wc_products_array_filter_visible' ), $orderby, $order );
		$upsells = $limit > 0 ? array_slice( $upsells, 0, $limit ) : $upsells;

		wc_get_template(
			'single-product/up-sells.php',
			array(
				'upsells'        => $upsells,

				// Not used now, but used in previous version of up-sells.php.
				'posts_per_page' => $limit,
				'orderby'        => $orderby,
				'columns'        => $columns,
			)
		);
    }
}