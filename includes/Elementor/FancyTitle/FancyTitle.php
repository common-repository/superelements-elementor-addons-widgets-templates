<?php

/**
 * Elementor Classes.
 *
 * @package Elementor Widgets for Fancy Title
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\HeadingTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Fancy Title
 *
 * Elementor widget for Fancy Title.
 *
 * @since 1.0.0
 */
class FancyTitle extends Widget_Base
{
    use TextTraits;
    use SpacingTraits;
    use HeadingTraits;
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
        return 'se_fancy_title';
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
        return esc_html__('Fancy Title', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-archive-title se-icon';
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
        $this->register_fancy_title_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_fancy_title_controls()
    {

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Fancy Title Settings ', 'superelements-elementor-addons-widgets-templates'),
            ]
            );
            $this->add_control(
                'title',
                [
                    'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default' => esc_html__('A very good title', 'superelements-elementor-addons-widgets-templates'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $heading_attr = [
                'title_input' => false,
                'id' => 'se_heading',
                'link' => false,
                'align' => false,
            ];
            $this->heading_content_control($heading_attr);

            $this->add_control(
                'content',
                [
                    'label' => esc_html__('Leading Text', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' => esc_html__('The proper business solution for your developing business', 'superelements-elementor-addons-widgets-templates'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            $this->add_control(
                'description',
                [
                    'label' => esc_html__('Description', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' => esc_html__('The proper business solution for your developing business', 'superelements-elementor-addons-widgets-templates'),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

        $this->end_controls_section();

        // Style section
        // leading text style control
        $this->start_controls_section(
            'container_section',
            [
                'label' => esc_html__('Container', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id' => 'se_fancy_title_alignment',
                'class' => '.se-title-wrapper',
                'default'   => 'center',
            ];
            $this->se_text_alignment_controls($attrs);

        $this->end_controls_section();

        // leading text style control
        $this->start_controls_section(
            'leading_text_section',
            [
                'label' => esc_html__('Leading Text', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $attrs = [
                'id' => 'se_fancy_leading_text',
                'class' => '.se-leading-text'
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // title style control
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $attrs = [
                'id' => 'se_fancy_title_heading',
                'class' => '.se-title-text',
            ];
            $this->heading_style($attrs);   
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // description text style control
        $this->start_controls_section(
            'description_section',
            [
                'label' => esc_html__('Description', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id' => 'se_fancy_title_description',
                'class' => '.se-description-text',
            ];
        
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

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

        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_fancy_title_view', $file, $settings);
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
