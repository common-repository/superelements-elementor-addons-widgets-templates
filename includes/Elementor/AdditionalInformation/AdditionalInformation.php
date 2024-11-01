<?php

/**
 * Elementor Additional Information Widget.
 *
 * Elementor widget that inserts an Additional Information
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
if (!defined('ABSPATH')) {
    exit;
}
class AdditionalInformation extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Additional Information widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use TextTraits;
    use ColorTraits;
    use SpacingTraits;
    use WidthHeightTraits;

    public function get_name()
    {
        return 'se_additional_information';
    }

    /**
     * Get widget title.
     *
     * Retrieve Additional Information widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Additional Information', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Additional Information widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-info se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Additional Information widget belongs to.
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
        return ['additional-information'];
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
        // stock text style  
        $this->start_controls_section(
			'additional_information',
			[
				'label' => esc_html__( 'Title Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            );

            $attrs = [
                'id'        => 'additional_info_title',
                'class'     => '.se-additional-info h2',
            ];
            $this->se_text_style_controls($attrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'additional_information_table_heading',
			[
				'label' => esc_html__( 'Table Heading Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            );

            $thAttrs = [
                'id'        => 'additional_info_table_heading',
                'class'     => '.se-additional-info table tr th',
            ];
            $this->se_text_style_controls($thAttrs);
            $this->se_width_control($thAttrs);
            $this->se_padding_controls($thAttrs);

        $this->end_controls_section();

        $this->start_controls_section(
			'additional_information_table_data',
			[
				'label' => esc_html__( 'Table Data Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
            );

            $tdAttrs = [
                'id'        => 'additional_info_table_data',
                'class'     => '.se-additional-info table tr td'
            ];
            $this->se_text_style_controls($tdAttrs);
            $this->se_padding_controls($tdAttrs);

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
        include apply_filters('redq_se_widget_additional_information', $file, $settings);
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