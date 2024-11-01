<?php

/**
 * Elementor Related Products Widget.
 *
 * Elementor widget that inserts an Related Products
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
class RelatedProducts extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Related Products widget name.
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
        return 'se_related_products';
    }

    /**
     * Get widget title.
     *
     * Retrieve Related Products widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Related Products', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Related Products widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-related se-icon';
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

    public function get_style_depends()
    {
        return ['related-products'];
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
			'se_product_related_product_section',
			[
				'label' => esc_html__( 'Container Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_related_product_section_title',
                'class'     => '.related.products > h2, .related.products .fusion-title  h2',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_related_product_product_card',
			[
				'label' => esc_html__( 'Product Card Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_title',
                'label'     => esc_html__('Title ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.related .products .product h2',
                'separator' => 'after'
            ];
            $this->se_text_style_controls($attrs);

            $pAttrs = [
                'id'        => 'se_product_price',
                'label'     => esc_html__('Price ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.related .products .product .price, .related .products .product .price .amount',
                'separator' => 'after'
            ];
            $this->se_text_style_controls($pAttrs);

            $pcAttrs = [
                'id'        => 'se_product_card',
                'class'     => '.related .products .product',
            ];
            $this->se_background_color_controls($pcAttrs);
            $this->se_padding_controls($pcAttrs);
            $this->se_border_controls($pcAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_related_product_on_sale_badge',
			[
				'label' => esc_html__( 'Sale Badge Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_related_product_sale_badge',
                'class'     => '.related ul.products li.product a .onsale'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_width_height_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'se_product_related_product_product_card_button',
			[
				'label' => esc_html__( 'Button Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_related_product_product_card_button',
                'class'     => '.related ul.products li.product a.button'
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
        include apply_filters('redq_se_widget_product_rating', $file, $settings);
    }
    protected function builder_view() {
        $query = new \WP_Query([
            'post_type'        => 'product',
            'posts_per_page'      => 4,
        ]);
        $heading = apply_filters( 'woocommerce_product_related_products_heading', esc_html__( 'Related products', 'superelements-elementor-addons-widgets-templates' ) );
      ?>
       <div class="woocommerce">
            <section class="related products">
                <h2><?php echo esc_html( $heading) ?></h2>
                    <ul class="products columns-4">
                        <?php 
                            woocommerce_product_loop_start();
                            while($query->have_posts()) : $query->the_post();
                                $product =  wc_get_product(get_the_ID()); ?>
                                <li <?php wc_product_class( '', $product ); ?>>
                                    <?php
                                        woocommerce_template_loop_product_link_open();
                                        woocommerce_template_loop_product_thumbnail();
                                        woocommerce_template_loop_product_title();
                                        woocommerce_template_loop_price();
                                        woocommerce_template_loop_product_link_close();
                                        woocommerce_template_loop_add_to_cart();
	                                ?>
                                </li>
                            <?php 
                            endwhile;
                            woocommerce_product_loop_end();
                        ?>
                    </ul>
            </section>
       </div>
        <?php
    }
}