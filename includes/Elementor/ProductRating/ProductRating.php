<?php

/**
 * Elementor Product Rating Widget.
 *
 * Elementor widget that inserts an Product Rating
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SelectTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
if (!defined('ABSPATH')) {
    exit;
}
class ProductRating extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Rating widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use SelectTraits;
    use SpacingTraits;
    use TextTraits;
    public function get_name()
    {
        return 'se_product_rating';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Rating widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Rating', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Rating widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-rating se-icon';
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
        return ['product-rating'];
    }


    /**
     * Register Product Rating widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
			'se_product_rating_style',
			[
				'label' => esc_html__( 'Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $selectAttrs = [
                'id'                => 'se_product_rating',
                'label'             => esc_html__('View', 'superelements-elementor-addons-widgets-templates'),
                'options'           => [
                    'inline'        => esc_html__('Inline', 'superelements-elementor-addons-widgets-templates'),
                    'stacked'       => esc_html__('Stacked', 'superelements-elementor-addons-widgets-templates'),
                ],
                'default'           => 'inline'
            ];
            $this->se_select_control($selectAttrs);

            $gAttrs = [
                'id'        => 'se_product_rating',
                'class'     => '.se-product-rating .woocommerce-product-rating',
                'separator' => 'after'
            ];
            $this ->se_gap_controls($gAttrs);

            $sAttrs = [
                'id'        => 'se_product_rating_star',
                'label'     => esc_html__('Star ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.se-product-rating .woocommerce-product-rating .star-rating, .star-rating span:before, .star-rating span:before',
                'separator' => 'after'
            ];
            $this ->se_text_style_controls($sAttrs);

            $tAttrs = [
                'id'        => 'se_product_rating',
                'label'     => esc_html__('Text ', 'superelements-elementor-addons-widgets-templates'),
                'class'     => '.se-product-rating .woocommerce-product-rating > a',
            ];
            $this ->se_text_style_controls($tAttrs);

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
    protected function builder_view() { ?>
        <div class="woocommerce-product-rating">
            <?php  echo wp_kses_post(wc_get_rating_html( 4, 50 ));  ?>
            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">1</span> <?php echo esc_html__('customer review', 'superelements-elementor-addons-widgets-templates'); ?>)</a>
		</div>
        <?php
    }
}