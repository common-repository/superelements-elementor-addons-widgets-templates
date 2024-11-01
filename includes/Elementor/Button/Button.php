<?php

/**
 * Elementor Classes.
 *
 * @package Button 
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\ButtonTraits;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Button
 *
 * Elementor widget for Button.
 *
 * @since 1.0.0
 */
class Button extends Widget_Base
{
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
	use ButtonTraits;
    public function get_name()
    {
        return 'se_button';
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
        return esc_html__('Button', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-button se-icon';
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

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_button_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_button_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
            ]
       );	

        $this->register_button_content_controls();

        $this->end_controls_section();

        $this->start_controls_section(
			'se_section_style',
			[
				'label' => esc_html__( 'Button', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'         => 'elementor-button',
                'class'      => '.elementor-button',
            ];

		    $this->register_button_style_controls($attrs);

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
       
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_button_view', $file, $settings);
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
