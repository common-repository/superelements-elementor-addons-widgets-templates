<?php

/**
 * Elementor WooCommerce Breadcrumbs Widget.
 *
 * Elementor widget that inserts an WooCommerce Breadcrumbs
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class WooCommerceBreadcrumbs extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve WooCommerce Breadcrumbs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use TextTraits;
    public function get_name()
    {
        return 'se_woocommerce_breadcrumbs';
    }

    /**
     * Get widget title.
     *
     * Retrieve WooCommerce Breadcrumbs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('WooCommerce Breadcrumbs', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve WooCommerce Breadcrumbs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-breadcrumbs se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the WooCommerce Breadcrumbs widget belongs to.
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
            'breadcrumbs_style',
            [
                'label' => esc_html__('Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

                $attrs = [
                    'id'        => 'breadcrumbs_text',
                    'class'     => '.woocommerce-breadcrumb a'
                ];
                $this->heading_style($attrs);

                $aAttrs = [
                    'id'        => 'breadcrumbs_text_active',
                    'label'     => esc_html__('Active', 'superelements-elementor-addons-widgets-templates'),
                    'class'     => '.woocommerce-breadcrumb'
                ];
                $this->se_text_style_controls($aAttrs);

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
        $product_post_id = $this->get_product_id_for_template_view();
        $is_editor       = $this->is_editor();
        $file            = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_rating', $file, $settings);
    }
    protected function get_product_id_for_template_view() {
        global $post;
        $id = isset($post->ID) ? $post->ID : '';

        $args = array(
            'fields'      => 'ids',
            'numberposts' => 1,
            'post_type'   => 'product'
        );
        $posts = get_posts($args);
        $post_id = isset($posts[0]) ? $posts[0] : get_the_ID();
        if($this->is_editor()){
            return $post_id;
        }else{
            return $id;
        }
       
    }
    protected function is_editor() {
        if(\Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode()){
            return true;
        }
        return false;
    }
}