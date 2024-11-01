<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

namespace SuperElement\Elementor;

use SuperElement\Traits\PostTrait;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SliderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;


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
class Testimonial extends Widget_Base
{
    use PostTrait;
    use SliderTraits;
    use ColorTraits;
    use SpacingTraits;
    use BorderTraits;
    use TextTraits;
    use WidthHeightTraits;

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
        return 'se_testimonials';
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
        return esc_html__('Testimonials', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-testimonial-carousel se-icon';
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
        return ['slick', 'testimonial'];
    }

    public function get_style_depends()
    {
        return ['slick', 'testimonial'];
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_testimonials_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_testimonials_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Testimonials Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
            );
            $this->add_control(
                'layout',
                [
                    'label' => esc_html__('Layout', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__('Default', 'superelements-elementor-addons-widgets-templates'),
                        'styled-box'  => esc_html__('Styled Box', 'superelements-elementor-addons-widgets-templates'),    
                    ],
                ]
            );
            $this->add_control(
                'rating_switch',
                [
                    'label' => esc_html__('Show Rating', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Enable', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('Disable', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'true',
                    'default' => 'true',
                ]
            );
            $this->add_control(
                'title_switch',
                [
                    'label' => esc_html__('Show Title', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Enable', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('Disable', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'true',
                    'default' => 'true',
                ]
            );

            $this->se_slider_controls();

        $this->end_controls_section();

        // Style section start 
        // ==========================
        $this->start_controls_section(
            'card_style',
            [
                'label' => esc_html__('Card Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'         => 'se_card',
                'class'      => '.slide-container',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);

            $this->start_controls_tabs(
                'card_tabs',
            );

                $this->start_controls_tab(
                    'card_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates'),
                    ],
                );

                    $attrs = [
                        'id'         => 'se_card_normal',
                        'class'      => '.slide-container',
                    ];
                    $this->se_border_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'card_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates'),
                    ]
                );

                    $attrs = [
                        'id'         => 'se_card_hover',
                        'class'      => '.slide-container:hover',
                    ];
                    $this->se_border_controls($attrs);
                    $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // slider box style 
        $this->start_controls_section(
            'slider_card_box_style',
            [
                'label' => esc_html__('Slider Box', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'layout' => 'styled-box'
                ]
            ]
            );

            $attrs = [
                'id'         => 'se_testimonial_box',
                'class'      => '.slide-container .slide-box',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);
            $this->se_box_shadow_controls($attrs);

        $this->end_controls_section();


        // rating style controls
        $this->start_controls_section(
            'rating_style',
            [
                'label' => esc_html__('Rating Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'rating_switch' => 'true'
                ]
            ]
            );
            
            $ratingSVGattrs = [
                'id'         => 'se_rating_svg_normal',
                'class'      => '.rating_star>svg',
            ];
            $this->se_color_controls($ratingSVGattrs);
            
            $ratingSVGactiveAttrs = [
                'id'         => 'se_rating_svg_active',
                'label'      => 'Active Color',
                'class'      => '.rating_star>svg.active',
            ];
            $this->se_color_controls($ratingSVGactiveAttrs);
        
            $ratingPaddingAttrs = [
                'id'         => 'se_rating',
                'class'      => '.rating_star',
            ];
            $this->se_margin_padding_controls($ratingPaddingAttrs);

        $this->end_controls_section();

        // Title style controls
        $this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__('Title Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'title_switch' => 'true'
                ]
            ]
            );

            $tAttrs = [
                'id'         => 'se_testimonial_title',
                'class'      => '.testimonial-title',
            ];
            $this->se_text_style_controls($tAttrs);
            $this->se_margin_padding_controls($tAttrs);
            
        $this->end_controls_section();

        // Description style controls
        $this->start_controls_section(
            'desc_style',
            [
                'label' => esc_html__('Description Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );
            $dAttrs = [
                'id'         => 'se_testimonial_desc',
                'class'      => '.testimonial-desc',
            ];
            $this->se_text_style_controls($dAttrs);
            $this->se_margin_padding_controls($dAttrs);

        $this->end_controls_section();

        // Author image style controls 
        $this->start_controls_section(
            'author_image_style_section',
            [
                'label' => esc_html__('Author Image Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $athIAttrs = [
                'id'         => 'se_testimonial_author_image',
                'class'      => '.author-image',
            ];
            $this->se_width_height_controls($athIAttrs);
            $this->se_border_controls($athIAttrs);

        $this->end_controls_section();

        // Author name style controls 
        $this->start_controls_section(
            'author_style_section',
            [
                'label' => esc_html__('Author Name Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $athAttrs = [
                'id'         => 'se_testimonial_author_name',
                'class'      => '.author-name',
            ];
            $this->se_text_style_controls($athAttrs);
            $this->se_margin_padding_controls($athAttrs);

        $this->end_controls_section();

        // Author meta style controls 
        $this->start_controls_section(
            'meta_style_section',
            [
                'label' => esc_html__('Author Meta Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $athMeAttrs = [
                'id'         => 'se_testimonial_author_meta',
                'class'      => '.author-meta',
            ];
            $this->se_text_style_controls($athMeAttrs);
            $this->se_margin_padding_controls($athMeAttrs);
        
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
        $data_slick = [];
        $data_slick['slidesToShow'] = (int) esc_html($slides_to_show);
        $data_slick['autoplay'] = (bool) esc_html($slider_autoplay);
        $data_slick['autoplaySpeed'] = (int) esc_html($autoplay_speed);
        $data_slick['slidesToScroll'] = 1;
        $file = __DIR__ . '/'.$layout.'.php';

        include apply_filters('redq_se_widget_testimonials_view', $file, $settings);
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
