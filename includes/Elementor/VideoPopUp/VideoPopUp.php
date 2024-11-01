<?php

/**
 * Elementor Classes.
 *
 * @package Video
 */

namespace SuperElement\Elementor;
use Elementor\Modules\DynamicTags\Module as TagsModule;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\TextTraits;

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
class VideoPopUp extends Widget_Base
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
	use ColorTraits;
	use WidthHeightTraits;
	use BorderTraits;
	use TextTraits;

    public function get_name()
    {
        return 'se_video_pop_up';
    }
    /**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'video', 'player', 'embed', 'youtube', 'vimeo', 'dailymotion', 'supper', 'elements' ];
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
        return esc_html__('Video PopUp', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-play se-icon';
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
		return ['video-pop-up'];
	}
 /**
	 * Register video widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function register_controls() {
		$this-> register_content_controls();
		$this-> register_style_controls();
	}


	protected function register_content_controls() 
	{
		$this->start_controls_section(
			'video_content_section',
			[
				'label' => esc_html__( 'Content', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
			);
			$this->add_control(
				'se_video_url',
				[
					'label' => esc_html__( 'Link', 'superelements-elementor-addons-widgets-templates' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter your URL', 'superelements-elementor-addons-widgets-templates' ) . ' (YouTube)',
					'default' => 'https://www.youtube.com/embed/wfwf79qghJs',
					'label_block' => true,
					'ai' => [
						'active' => false,
					],
					'frontend_available' => true,
				]
			);
			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Poster Image', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_control(
				'video_poster_image_bg',
				[
					'label' => esc_html__( 'Poster Image Background', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_control(
				'video_play_icon',
				[
					'label' => esc_html__( 'Button Icon', 'superelements-elementor-addons-widgets-templates' ),
					'type' => Controls_Manager::ICONS,
					'fa4compatibility' => 'icon',
					'skin' => 'inline',
					'default' => [
						'value' => 'fas fa-play',
						'library' => 'fa-solid',
					],
					'skin_settings' => [
						'inline' => [
							'none' => [
								'label' => 'Default',
								'icon' => 'eicon-play',
							],
							'icon' => [
								'default' => 'eicon-star',
							],
						],
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'video_has_play_effect',
				[
					'label' => esc_html__( 'Button Web Effects', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'superelements-elementor-addons-widgets-templates' ),
					'label_off' => esc_html__( 'No', 'superelements-elementor-addons-widgets-templates' ),
					'return_value' => 'has_play_effect',
					'default' => 'has_play_effect',
				]
			);

		$this->end_controls_section();
	}

	protected function register_style_controls() 
	{
		$this->start_controls_section(
			'video_wrapper',
			[
				'label' => esc_html__( 'Wrapper', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
                'id'        => 'se_video_popup_wrapper',
                'class'        => '.se-pop-up-wrapper',
            ];
			$this->se_width_height_controls($attrs);

		$this->end_controls_section();


		$this->start_controls_section(
			'video_play_button',
			[
				'label' => esc_html__( 'Play Button', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
                'id'        => 'se_video_play_button',
                'class'        => '.video-play-button>button',
            ];
			$this->se_text_style_controls($attrs);
			$this->se_background_color_controls($attrs);

			$anAttrs = [
				'id'        => 'se_video_play_button_animation',
				'label'        => 'Animation Color',
                'class'   	=> '.video-play-animation',
			];
			$this->se_background_color_controls($anAttrs);

			$wAttrs = [
                'id'        => 'se_video_play_button',
                'class'        => '.video-play-button',
            ];
			$this->se_width_height_controls($wAttrs);
			$this->se_border_radius_controls($wAttrs);

		$this->end_controls_section();

		// background image controls 
		$this->start_controls_section(
			'video_modal_background_style_control',
			[
				'label' => esc_html__( 'Poster Image Background', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
                'id'        => 'se_video_poster_image_background',
                'class'        => '.se-pop-up-wrapper .image-background',
            ];
			$this->se_width_height_controls($attrs);

			$this->add_responsive_control(
                'poster_image_x_position',
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
                        '{{WRAPPER}} .se-pop-up-wrapper .image-background' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'poster_image_y_position',
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
                        '{{WRAPPER}} .se-pop-up-wrapper .image-background' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
			

		$this->end_controls_section();
	}

    
	/**
	 * Render video widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        extract($settings);
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_video_popup_view', $file, $settings);
	}
}
