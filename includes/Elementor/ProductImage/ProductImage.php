<?php

/**
 * Elementor Product Image Widget.
 *
 * Elementor widget that inserts an Product Image
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit;
}
class ProductImage extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Image widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use WidthHeightTraits;
    public function get_name()
    {
        return 'se_product_image';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Image widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Product Image.
     */
    public function get_title()
    {
        return esc_html__('Product Image', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Image widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-images se-icon';
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
        return ['product-image'];
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
			'se_product_image_style',
			[
				'label' => esc_html__( 'Gallery Nav Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'                => 'se_product_image',
                'class'             => '.se-product-image .flex-control-nav li',
            ];
            $this->se_width_control($attrs);

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
    protected function builder_view(){
        $product = wc_get_product(redq_se_get_product_id());
        if( $product) :
        if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
            return;
         }
         $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
        $post_thumbnail_id = $product->get_image_id();
        $wrapper_classes   = apply_filters(
            'woocommerce_single_product_image_gallery_classes',
            array(
                'woocommerce-product-gallery',
                'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
                'woocommerce-product-gallery--columns-' . absint( $columns ),
                'images',
            )
            );
        ?>
         <div class="woocommerce">
            <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	             <div class="woocommerce-product-gallery__wrapper">
                        <?php
                        if ( $post_thumbnail_id ) {
                            $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
                        } else {
                            $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                            $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'superelements-elementor-addons-widgets-templates' ) );
                            $html .= '</div>';
                        }
                            echo wp_kses_post(apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ));
                            do_action( 'woocommerce_product_thumbnails' );
                        ?>
                </div>
            </div>
         </div>
        <?php
        endif;
    }
}