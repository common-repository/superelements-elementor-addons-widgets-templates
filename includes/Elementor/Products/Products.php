<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\ProductsControlsTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use SuperElement\Traits\ProductsTrait;
use \WC_Shortcode_Products;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor test
 *
 * Elementor widget for test.
 *
 * @since 1.0.0
 */
class Products extends Widget_Base
{
    use ProductsTrait;
    use ProductsControlsTraits;
    use TextTraits;
    use SpacingTraits;
    use ColorTraits;
    use BorderTraits;
    use WidthHeightTraits;
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'se_products';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Products', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-post-slider se-icon';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
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
    public function get_keywords()
    {
        return ['se', 'super', 'super element', 'element', 'products', 'woocommerce', 'shop', 'store', 'archive'];
    }

    public function get_script_depends()
    {
        return ['products'];
    }

    public function get_style_depends()
    {
        return ['products'];
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_products_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_products_controls()
    {
        $this->grid_settings_controls();
        $this->add_query_controls();
        $this->register_style_controls();
    }

    public function register_style_controls() {

        $this->start_controls_section(
            'se_product_container_style',
            [
                'label' => esc_html__('Container', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

           $this->add_responsive_control(
			'se_products_column_control',
			[
				'label' => esc_html__( 'Columns', 'superelements-elementor-addons-widgets-templates' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 20,
				'step' => 1,
				'default' => 4,
                'selectors' => [
                    '{{WRAPPER}} .se-products-container .woocommerce ul.products' => 'grid-template-columns: repeat({{VALUE}}, minmax(0, 1fr));',
                ],
			]
            );

            $pAttrs = [
                'id' => 'se_products_gap',
                'class' => '.se-products-container .woocommerce ul.products',
            ];

            $this->se_gap_controls($pAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_product_image_style',
            [
                'label' => esc_html__('Image', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $pimAttrs = [
                'id' => 'se_products_image',
                'class' => '.se-products-container .woocommerce ul.products li.product a img',
            ];

            $this->se_width_height_controls($pimAttrs);
            $this->se_padding_controls($pimAttrs);
            $this->se_margin_controls($pimAttrs);
            $this->se_border_radius_controls($pimAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_product_title_style',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $ptAttrs = [
                'id' => 'se_products_title',
                'class' => '.se-products-container .woocommerce ul.products li.product a .woocommerce-loop-product__title',
            ];

            $this->se_typography_controls($ptAttrs);
            $this->se_color_controls($ptAttrs);
            $this->se_margin_controls($ptAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_product_price_style',
            [
                'label' => esc_html__('Price', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $ppAttrs = [
                'id' => 'se_products_price',
                'class' => '.se-products-container .woocommerce ul.products li.product a .price',
            ];

            $this->se_typography_controls($ppAttrs);
            $this->se_color_controls($ppAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
            'se_product_button_style',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $pbAttrs = [
                'id' => 'se_products_button',
                'class' => '.se-products-container .woocommerce ul.products li.product a.button',
            ];

            $this->se_typography_controls($pbAttrs);
            $this->se_color_controls($pbAttrs);
            $this->se_background_color_controls($pbAttrs);
            $this->se_padding_controls($pbAttrs);
            $this->se_margin_controls($pbAttrs);
            $this->se_border_controls($pbAttrs);

        $this->end_controls_section();
    }

    /**
     * Render Copyright output on the frontend.
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
        if ( 'yes' !== $settings['allow_order'] ) {
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
        }

        if ( 'yes' !== $settings['show_result_count'] ) {
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
        }
        if (class_exists('WC_Shortcode_Products')) {
            // Create an instance of WC_Shortcode_Products
            $attributes = [
                'rows'     => $rows,
                'columns'  => $columns,
                'orderby'  => $orderby,
                'order'    => $order,
                'class'    => 'se-woo-products',
            ];
            if($product_cat != '' && !empty($product_cat)){
                $attributes['category'] = join(',', $product_cat);
            }
            if($product_tag != '' && !empty($product_tag)){
                $attributes['tag'] = join(',', $product_tag);
            }
            if($paginate == 'yes'){
                $attributes['paginate'] = true;
            }
            if($products_type == 'featured_products' && function_exists('wc_get_featured_product_ids')){
                $feature_id = join(',', wc_get_featured_product_ids());
                $attributes['ids'] = $feature_id;
            }
            if($products_type == 'by_ids'){
                $ids = $settings['prodcut_by_ids'];
                $attributes['ids'] = join(',', $ids);
            }
            $products = new WC_Shortcode_Products($attributes);
        }        
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_tm_widget_products_view', $file, $products, $settings);
    }

    /**
     * Render shortcode widget as plain content.
     *
     * Override the default behavior by printing the shortcode instead of rendering it.
     *
     * @since 1.0.0
     * @access public
     */
    public function render_plain_content()
    {
        // In plain mode, render without shortcode.
        echo esc_attr($this->get_settings('shortcode'));
    }

    /**
     * Render shortcode widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.3.0
     * @access protected
     */
    protected function content_template()
    {

    }
    public function get_sale_product(){
        $onsale_product_ids = array();

    // Get on-sale products
        $onsale_products = wc_get_products(array(
            'status' => 'publish',
            'limit' => -1,
            'meta_query' => array(
                array(
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'NUMERIC',
                ),
            ),    
        ));

    // Extract product IDs
        foreach ($onsale_products as $product) {
            $onsale_product_ids[] = $product->get_id();
        }

      return $onsale_product_ids;   
    }

}
