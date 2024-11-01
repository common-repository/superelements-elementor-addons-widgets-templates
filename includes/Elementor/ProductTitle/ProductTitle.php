<?php

/**
 * Elementor Product Title Widget.
 *
 * Elementor widget that inserts an Product Title
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
if (!defined('ABSPATH')) {
    exit;
}
class ProductTitle extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Title widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use SpacingTraits;
    public function get_name()
    {
        return 'se_product_title';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Title widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Title', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Title widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-title se-icon';
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
     * Register Product Title widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_content_control();
        $this->register_style_controls();
    }

    public function register_content_control() {
        $this->start_controls_section(
            'se_product_title_content_section',
            [
                'label' => esc_html__('Product Title Settings', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $heading_attrs = [
            'title_input' => false,
            'id'         => 'se_product_title',
            'class'      => '.se-product-title',
        ];
        $this->heading_content_control( $heading_attrs );
        $this->end_controls_section();
    }

    public function register_style_controls() {
        $this->start_controls_section(
            'se_product_title_style_section',
            [
                'label' => esc_html__('Product Title Style', 'superelements-elementor-addons-widgets-templates'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
            );

            $heading_attrs = [
                'id'         => 'se_product_title',
                'class'      => '.se-product-title',
            ];
            $this->heading_style($heading_attrs);
            $this->se_margin_controls($heading_attrs);
            
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
        $product_post_id = $this->get_product_id_for_template_view();
        $is_editor = $this->is_editor();
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_title', $file, $settings);
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