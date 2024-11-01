<?php

/**
 * Elementor Product Meta Widget.
 *
 * Elementor widget that inserts an Product Meta
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\SelectTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class ProductMeta extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Meta widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use SelectTraits;
    use TextTraits;
    use ColorTraits;
    use SpacingTraits;
    public function get_name()
    {
        return 'se_product_meta';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Meta widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Meta', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Meta widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-meta se-icon';
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
        return ['product-meta'];
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

            $selectAttrs = [
                'id'                => 'se_product_meta',
                'label'             => esc_html__('View', 'superelements-elementor-addons-widgets-templates'),
                'options'           => [
                    'inline'        => esc_html__('Inline', 'superelements-elementor-addons-widgets-templates'),
                    'stacked'       => esc_html__('Stacked', 'superelements-elementor-addons-widgets-templates'),
                ],
                'default'           => 'inline'
            ];
            $this->se_select_control($selectAttrs);

            $gAttrs = [
                'id'        => 'se_product_meta',
                'class'     => '.se-product-meta .product_meta',
            ];
            $this ->se_gap_controls($gAttrs);
            
            $attrs = [
                'id'        => 'se_product_meta',
                'class'     => '.se-product-meta .product_meta > span, .se-product-meta .product_meta > span > a',
            ];
            $this->se_typography_controls($attrs);
            $this->se_color_controls($attrs);

            // text style 
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'se_product_meta_text',
                    'label' => esc_html__( 'Text Typography', 'superelements-elementor-addons-widgets-templates' ),
                    'selector' => '{{WRAPPER}} .se-product-meta .product_meta > span > span',
                ]
            );
            $this->add_control(
                'text_color',
                [
                    'label' => esc_html__( 'Text Color', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-product-meta .product_meta > span > span' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // link text style 
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'se_product_meta_link',
                    'label' => esc_html__( 'Link Typography', 'superelements-elementor-addons-widgets-templates' ),
                    'selector' => '{{WRAPPER}} .se-product-meta .product_meta > span > a',
                ]
            );
            $this->add_control(
                'link_color',
                [
                    'label' => esc_html__( 'Link Color', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .se-product-meta .product_meta > span > a' => 'color: {{VALUE}}',
                    ],
                ]
            );

           
            
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
        ?>
        <div class="product_meta">
        <span class="sku_wrapper"><?php echo esc_html__('SKU:', 'superelements-elementor-addons-widgets-templates'); ?><span class="sku"><?php echo esc_html__('wp-pennant', 'superelements-elementor-addons-widgets-templates'); ?></span></span>
            <span class="posted_in"><?php echo esc_html__('Category:', 'superelements-elementor-addons-widgets-templates'); ?> <a href="http://super-elementor.local/?product_cat=decor" rel="tag"><?php echo esc_html__('Decor', 'superelements-elementor-addons-widgets-templates'); ?></a></span>
        </div>
        <?php
    }
}