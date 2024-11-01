<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

 namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\AccordionTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\IconUploadTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
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
class Accordions extends Widget_Base
{
    use AccordionTraits;
    use SpacingTraits;
    use TextTraits;
    use ColorTraits;
    use IconUploadTraits;
    use BorderTraits;
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
        return 'se_accordion';
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
        return esc_html__('Accordion', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-search-results se-icon';
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
        return ['se-widgets'];
    }

    public function get_script_depends()
    {
        return ['accordions'];
    }

   
    public function get_custom_help_url()
    {
        return 'https://wordpress-rental-booking-doc.vercel.app/accordion-widget';
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_accordion_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_accordion_controls()
    {
        $this->start_controls_section(
            'accordion_section',
            [
                'label' => __('Accordion Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
            );
        
            $this->accordion_repeater_settings();
            $this->se_icon_upload_controls();
        
        $this->end_controls_section();
       
        // Style section start

        ///Accordion Settings Section
        $this->start_controls_section(
            'accordion_style_section',
            [
                'label' => __('Accordions', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_accordion_item',
                'class'      => '.accordion-item',
            ];
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);
        
        $this->end_controls_section();

        ///Accordion Title style section
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_accordion_title',
                'class'      => '.accordion-title',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_text_alignment_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // Content wrapper style section
        $this->start_controls_section(
            'content_wrapper_style_section',
            [
                'label' => __('Content Wrapper', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_accordion_body',
                'class'      => '.accordion-body',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

       //Content style section
        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_accordion_content',
                'class'      => '.accordion-content',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_text_alignment_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();
       
        //Icon style section 
        $this->start_controls_section(
            'icon_style_section',
            [
                'label' => __('Icon', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_accordion_icon',
                'class'      => '.accordion-icon',
            ];
            $this->se_color_controls($attrs);

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
        $settings    = $this->get_settings_for_display();
        extract($settings);
        if ( ! empty( $settings['contact_link']['url'] ) ) {
			$this->add_link_attributes( 'contact_link', $settings['contact_link'] );
		}
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widge_accordion_view', $file, $settings);
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
}
