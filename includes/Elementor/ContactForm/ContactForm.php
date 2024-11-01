<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

 namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use WP_Query;

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
class ContactForm extends Widget_Base
{
    use TextTraits;
    use ColorTraits;
    use SpacingTraits;
    use BorderTraits;
    use ButtonTraits;
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
        return 'se_contact_form';
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
        return esc_html__('Contact Form', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-my-account se-icon';
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

    public function get_style_depends()
    {
        return ['contact-form'];
    }


    protected function get_all_cf_7_shortcodes()
    {
        $contact_forms = get_posts(array(
            'post_type' => 'wpcf7_contact_form',
            'posts_per_page' => -1,
        ));
        
    
        $shortcode_options = [];
    
        foreach ($contact_forms as $form) {
            $shortcode_options[$form->ID]=$form->post_title;   
        }
        return $shortcode_options;
        
     
    }

    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_helpline_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_helpline_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Contact Form Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
        );
        
        $default_form = isset($this->get_all_cf_7_shortcodes()[0]) ? array_keys($this->get_all_cf_7_shortcodes())[0] : '';
        $this->add_control(
            'form_shortcode',
            [
                'label' => esc_html__('Select Form', 'superelements-elementor-addons-widgets-templates'),
                'type' => Controls_Manager::SELECT,
                'default' => $default_form,
                'options' => $this->get_all_cf_7_shortcodes(),
            ]
        );

        $this->end_controls_section();

        // Style section
        // Form Container style
        $this->start_controls_section(
            'se_contact_form_style',
            [
                'label' => esc_html__('Form Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form',
                'class' => '.cf7_form_container.se-contact-form',
            ];
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);
            $this->se_box_shadow_controls($attrs);

        $this->end_controls_section();

        // label style
        $this->start_controls_section(
            'se_contact_form_label_style',
            [
                'label' => esc_html__('Label Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form_label',
                'class' => '.cf7_form_container.se-contact-form p.label, .cf7_form_container.se-contact-form p label',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // input style
        $this->start_controls_section(
            'se_contact_form_input_style',
            [
                'label' => esc_html__('Input Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_contact_form_input',
                'class' => '.cf7_form_container.se-contact-form p input[type=text], .cf7_form_container.se-contact-form p input[type=email], .cf7_form_container.se-contact-form p input[type=password]',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $pAttrs = [
                'id'    => 'se_contact_form_input_placeholder',
                'label' => 'Placeholder ',
                'class' => '.cf7_form_container.se-contact-form p input[type=text]::placeholder, .cf7_form_container.se-contact-form p input[type=email]::placeholder, .cf7_form_container.se-contact-form p input[type=password]::placeholder',
            ];
            $this->se_text_style_controls($pAttrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // textarea style
        $this->start_controls_section(
            'se_contact_form_textarea_style',
            [
                'label' => esc_html__('Textarea Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form_textarea',
                'class' => '.cf7_form_container.se-contact-form p textarea',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // submit style
        $this->start_controls_section(
            'se_contact_form_submit_button_style',
            [
                'label' => esc_html__('Submit Button Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_contact_form_submit_button',
                'class' => '.cf7_form_container.se-contact-form p input[type=submit]',
            ];
            $this->register_button_style_controls($attrs);
            $this->add_responsive_control(
                'se_contact_form_alignment',
                [
                    'label' => esc_html__( 'AlignMent', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'margin-right' => [
                            'title' => esc_html__( 'Left', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'margin-left' => [
                            'title' => esc_html__( 'Right', 'superelements-elementor-addons-widgets-templates' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'toggle'=> 'true',
                    'selectors' => [
                        '{{WRAPPER}} .cf7_form_container.se-contact-form p input[type=submit]' => '{{VALUE}}: auto',
                    ],
                ]
            );

        $this->end_controls_section();

        // form field error text style
        $this->start_controls_section(
            'se_contact_form_field_error_text_style',
            [
                'label' => esc_html__('Field Error Text Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form_field_error_text',
                'class' => '.se-contact-form form p .wpcf7-not-valid-tip',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->add_responsive_control(
                'field_error_text_x_position',
                [
                    'label' => esc_html__( 'X-Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -1000,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-contact-form form p .wpcf7-not-valid-tip' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'field_error_text_y_position',
                [
                    'label' => esc_html__( 'Y-Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min'  => -1000,
                            'max'  => 1000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-contact-form form p .wpcf7-not-valid-tip' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

         // form success controls
         $this->start_controls_section(
            'se_contact_form_success',
            [
                'label' => esc_html__('Form Submit Success Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form_success',
                'class' => '.cf7_form_container.se-contact-form form.sent .wpcf7-response-output',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // form error controls
        $this->start_controls_section(
            'se_contact_form_error',
            [
                'label' => esc_html__('Form Submit Error Style', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );


            $attrs = [
                'id'    => 'se_contact_form_error',
                'class' => '.cf7_form_container.se-contact-form form.invalid .wpcf7-response-output',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

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
        include apply_filters('redq_tm_widget_contact_form_view', $file, $settings);
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
