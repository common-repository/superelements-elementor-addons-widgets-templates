<?php

/**
 * Elementor Subscription Form Widget.
 *
 * Elementor widget that inserts an Subscription Form
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
use SuperElement\ElementorControl\Traits\HeadingTraits;
if (!defined('ABSPATH')) {
    exit;
}
class SubscriptionForm extends Widget_Base
{

    use TextTraits;
    use SpacingTraits;
    use ColorTraits;
    use BorderTraits;
    use WidthHeightTraits;
    use ButtonTraits;
    use HeadingTraits;
    /**
     * Get widget name.
     *
     * Retrieve Subscription Form widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    
    public function get_name()
    {
        return 'se_subscription_form';
    }

    /**
     * Get widget title.
     *
     * Retrieve Subscription Form widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Subscription Form', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Subscription Form widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-mailchimp se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
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
        return ['subscription-form', 'redq-se-global'];
    }

    /**
     * Register Subscription Form widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Subscription Form Settings', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
            );
            $this->add_control(
                'custom_panel_alert',
                [
                    'type' => \Elementor\Controls_Manager::ALERT,
                    'alert_type' => 'info',
                    'heading' => esc_html__( 'Mailchimp API', 'superelements-elementor-addons-widgets-templates' ),
                    'content' => esc_html__( 'This form sends data to Mailchimp for managing subscriptions. Please review Mailchimp\'s .', 'superelements-elementor-addons-widgets-templates' ) . ' <a href="'.esc_url('https://mailchimp.com/legal/terms/').'" target="_blank">' . esc_html__( 'Terms of Use ', 'superelements-elementor-addons-widgets-templates' ) . '</a>'.__('and', 'superelements-elementor-addons-widgets-templates') . ' <a href="https://mailchimp.com/legal/privacy/" target="_blank">' . esc_html__('Privacy Policy', 'superelements-elementor-addons-widgets-templates') . '</a>'
                ]
            );   
            $this->add_control(
                'sf_api',
                [
                    'label' => esc_html__('API', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'placeholder' => esc_html__('Enter API', 'superelements-elementor-addons-widgets-templates'),
                ]
            );
            $this->add_control(
                'sf_audienceId',
                [
                    'label' => esc_html__('Audience Id', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => '',
                    'placeholder' => esc_html__('Audience Id', 'superelements-elementor-addons-widgets-templates'),
                ]
            );
            $this->add_control(
                'button_style',
                [
                    'label' => esc_html__( 'Button Style', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'overlay' => esc_html__( 'Overlay', 'superelements-elementor-addons-widgets-templates' ),
                        'inline'  => esc_html__( 'Inline', 'superelements-elementor-addons-widgets-templates' ),
                    ],
                    'default' => 'inline',
                ]
            );
            $this->add_control(
                'button_text',
                [
                    'label' => esc_html__('Button Text', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Subscribe', 'superelements-elementor-addons-widgets-templates'),
                    'placeholder' => esc_html__('Button Text', 'superelements-elementor-addons-widgets-templates'),
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Get The Best Of All Hands Delivered To Your Inbox', 'superelements-elementor-addons-widgets-templates'),
                    'placeholder' => esc_html__('Enter section title', 'superelements-elementor-addons-widgets-templates'),
                ]
            );
            $heading_tag = [
                'title_input' => false,
                'id' => 'se_subscription_form',
                'link' => false,
                'align' => false
            ];
            $this->heading_content_control($heading_tag);

            $this->add_control(
                'text',
                [
                    'label' => esc_html__('Short Message', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Subscribe to our newsletter and stay updated.', 'superelements-elementor-addons-widgets-templates'),
                    'placeholder' => esc_html__('Enter section text details', 'superelements-elementor-addons-widgets-templates'),
                ]
            );

        $this->end_controls_section();

        // style controls start 
        // =======================
        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Card', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );
            $attrs = [
                'id'    => 'se_sub',
                'class' => '.se-subscribe-form-wrap',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_radius_controls($attrs);

        $this->end_controls_section();

        // title style controls 
        $this->start_controls_section(
            'title_section',
            [
                'label' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_sub_title',
                'default' => 'center',
                'class' => '.se-title',
            ];
            $attrs2 = [
                'id'    => 'se_title',
                'default' => 'center',
                'class' => '.se-title',
            ];
            $this->heading_style($attrs2);
            $this->se_text_alignment_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // description style controls 
        $this->start_controls_section(
            'desc_section',
            [
                'label' => esc_html__('Description', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_sub_desc',
                'default' => 'center',
                'class' => '.se-subscribe-message',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_text_alignment_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // form card style 
        $this->start_controls_section(
            'sub_form_section',
            [
                'label' => esc_html__('Form', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

                $attrs = [
                    'id'    => 'se_sub_form',
                    'class' => '.se-subscription',
                ];
                $this->se_background_color_controls($attrs);
                $this->se_width_control($attrs);
                $this->se_padding_controls($attrs);
                $this->se_border_controls($attrs);

        $this->end_controls_section();

        // input style controls 
        $this->start_controls_section(
            'input_section',
            [
                'label' => esc_html__('Input', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_sub_input',
                'class' => '.se-subscription .email',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_background_color_controls($attrs);

            $pAttrs = [
                'id'    => 'se_sub_input_placeholder',
                'label' => 'Placeholder ',            
                'class' => '.se-subscription .email::placeholder',
            ];
            $this->se_text_style_controls($pAttrs);

            $this->se_text_alignment_controls($attrs);
            $this->se_padding_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // button style controls 
        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_sub_button',            
                'class' => '.se-subscribe-submit',
            ];
            $this->register_button_style_controls($attrs);

        $this->end_controls_section();

        // form error text 
        $this->start_controls_section(
            'form_error_text',
            [
                'label' => esc_html__('Error Text', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id'    => 'se_sub_form_error_text',            
                'class' => '.se-subscription .se-alert',
            ];
            $this->se_text_style_controls($attrs);

            $this->add_responsive_control(
                'se_text_bottom_position',
                [
                    'label' => esc_html__( 'Bottom Position', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 2000,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => -1000,
                            'max' => 1000,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .se-subscription .se-alert' => 'bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

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
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_subscription_view', $file, $settings);
    }
}