<?php

/**
 * Elementor Classes.
 *
 * @package Header Footer Elementor
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\LinkTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\TextTraits;

if (!defined('ABSPATH')) {
    exit;
}
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
class Team extends Widget_Base
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
    use LinkTraits;
    use ColorTraits;
    use SpacingTraits;
    use BorderTraits;
    use TextTraits;

    public function get_name()
    {
        return 'se_team';
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
        return esc_html__('Team', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-user-circle-o se-icon';
    }
    public function get_style_depends()
    {
        return ['elementor-icons-shared-0', 'elementor-icons-fa-brands', 'elementor-icons-fa-solid'];
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
        $this->register_team_content_controls();
        $this->register_team_style_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_team_content_controls()
    {
        $this->start_controls_section(
            'se_section_title',
            [
                'label' => esc_html__('Team', 'superelements-elementor-addons-widgets-templates'),
            ]
        );
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'team_name',
			[
				'label' => esc_html__( 'Name', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Saimon Harmer', 'superelements-elementor-addons-widgets-templates' ),
				'placeholder' => esc_html__( 'Name', 'superelements-elementor-addons-widgets-templates' ),
			]
		);
        $this->add_control(
			'team_position',
			[
				'label' => esc_html__( 'Position', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO and Founder', 'superelements-elementor-addons-widgets-templates' ),
				'placeholder' => esc_html__( 'Position', 'superelements-elementor-addons-widgets-templates' ),
			]
		);
        $this->se_add_link_controls();
        $this->add_control(
			'team_enable_social_link',
			[
				'label'        => esc_html__( 'Enable Social Link', 'superelements-elementor-addons-widgets-templates' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'superelements-elementor-addons-widgets-templates' ),
				'label_off'    => esc_html__( 'No', 'superelements-elementor-addons-widgets-templates' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'se_team_social_link',
            [
                'label'     => esc_html__('Social Link', 'superelements-elementor-addons-widgets-templates'),
                'condition' => [
                    'team_enable_social_link' => 'yes'
                ]
            ]
        );
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'social_icon',
			[
				'label'   => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fab fa-facebook-f',
					'library' => 'fa-solid',
				],
			]
		);
        $repeater->add_control(
			'se_team_social_link',
			[
				'label' => esc_html__( 'Link', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'se_team_social_media_list',
			[
				'label' => esc_html__( 'List', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'social_icon' =>  [
                            'value' => 'fab fa-facebook-f',
                            'library' => 'fa-solid',
                        ],
						'se_team_social_link' => '#',
					],
					[
						'social_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-solid',
                        ],
						'se_team_social_link' => '#'
					],
					[
						'social_icon' => [
                            'value' => 'fab fa-instagram',
                            'library' => 'fa-solid'
                        ],
						'se_team_social_link' => '#'
					],
				],
				'title_field' => '<i class="{{ social_icon.value }}" aria-hidden="true"></i>',
			]
		);

        $this->end_controls_section();
    }

	protected function register_team_style_controls(){
        
        // card control 
		$this->start_controls_section(
			'se_card_style',
			[
				'label' => esc_html__( 'Card Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'        => 'se_team_card',
                'class'        => '.se-team-card',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

            // extra effects tab 
            $this->start_controls_tabs(
                'card_tabs',
                );
                
                // normal tab 
                $this->start_controls_tab(
                    'card_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                        $attrs = [
                            'id'        => 'se_team_card_normal',
                            'class'        => '.se-team-card',
                        ];
                        $this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                // hover tab 
                $this->start_controls_tab(
                    'card_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                        $attrs = [
                            'id'        => 'se_team_card_hover',
                            'class'        => '.se-team-card:hover',
                        ];
                        $this->se_box_shadow_controls($attrs);

                        // card hover title color 
                        $tAttrs = [
                            'id'        => 'se_team_card_hover',
                            'label'     => 'Title Color',
                            'class'     => '.se-team-card:hover .se-team-title',
                        ];
                        $this->se_color_controls($tAttrs);

                        $dAttrs = [
                            'id'        => 'se_team_card_description_hover',
                            'label'     => 'Description Color',
                            'class'     => '.se-team-card:hover .se-team-desc',
                        ];
                        $this->se_color_controls($dAttrs);

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

		$this->end_controls_section();

        // card image control 
		$this->start_controls_section(
			'se_image_style',
			[
				'label' => esc_html__( 'Image Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'        => 'se_team_card_image',
                'class'     => 'figure.se-team-img',
            ];
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // card title control 
		$this->start_controls_section(
			'se_title_style',
			[
				'label' => esc_html__( 'Title Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $attrs = [
                'id'        => 'se_team_card_title',
                'class'     => '.se-team-title',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

		$this->end_controls_section();

        // card description control 
		$this->start_controls_section(
			'se_desc_style',
			[
				'label' => esc_html__( 'Description Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
            $attrs = [
                'id'        => 'se_team_card_desc',
                'class'     => '.se-team-desc',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_padding_controls($attrs);

		$this->end_controls_section();

        // card social icon control 
        $this->start_controls_section(
			'se_social_style',
			[
				'label' => esc_html__( 'Social Icon Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        // extra effects tab 
            $this->start_controls_tabs(
                'card_social_tabs',
                );

                // normal tab style
                $this->start_controls_tab(
                    'social_normal_style',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'        => 'se_team_card_social_icon_normal',
                        'class'     => '.se-team-social>a',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

                // hover tab style
                $this->start_controls_tab(
                    'social_hover_style',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'        => 'se_team_card_social_icon_hover',
                        'class'     => '.se-team-social>a:hover',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $attrs = [
                'id'        => 'se_team_card_social',
                'class'     => '.se-team-social',
            ];
            $this->se_margin_controls($attrs);

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
        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'] );
		}
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
