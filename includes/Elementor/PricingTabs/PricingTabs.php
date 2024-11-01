<?php

/**
 * Elementor Pricing Widget.
 *
 * Elementor widget that inserts Pricing Tabs.
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
if (!defined('ABSPATH')) {
    exit;
}
class PricingTabs extends Widget_Base
{

	use SpacingTraits;
    use BorderTraits;
    use ColorTraits;
    use TextTraits;
    use WidthHeightTraits;
    /**
     * Get widget name.
     *
     * Retrieve Pricing Tabs name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'se_pricing_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Pricing Tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Pricing Tabs', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Pricing Tabs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-price-table se-icon';
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
        return ['pricing-tabs'];
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
		return [ 'se', 'super', 'super element', 'element', 'pricing', 'tabs', 'pricing tab' ];
	}

    /**
     * Register Pricing Tabs widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_feature1',
            [
                'label' => esc_html__('Pricing Tabs Feature 1', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
			);
			$this->add_control(
				'f1_tab_title',
				[
					'label' => esc_html__( 'Tab Title', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Monthly Plan' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			// badge
			$this->add_control(
				'f1_show_batch',
				[
					'label'        => esc_html__( 'Show Batch', 'superelements-elementor-addons-widgets-templates' ),
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
					'label_off'    => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
					'return_value' => 'yes',
					'default'      => '',
				]
			);
			// badge 
			$this->add_control(
				'f1_pricing_batch_text',
				[
					'label'       => esc_html__( 'Batch Title', 'superelements-elementor-addons-widgets-templates' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => esc_html__( 'Recommended' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
					'condition'   => [
						'f1_show_batch' => 'yes'
					]
				]
			);

			$this->add_control(
				'f1_tab_content_icon',
				[
					'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-user',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'user',
							'dot-circle',
							'square-full',
						],
						'fa-regular' => [
							'user',
							'dot-circle',
							'square-full',
						],
					],
				]
			);

				$this->add_control(
					'f1_pricing_title',
					[
						'label' => esc_html__( 'Pricing Title', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'For Team pack' , 'superelements-elementor-addons-widgets-templates' ),
						'label_block' => true,
					]
				);
				$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'f1_tab_content_list_item',
					[
						'label' => esc_html__( 'Text', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Ultimate access to all course, exercises and assessments' , 'superelements-elementor-addons-widgets-templates' ),
						'label_block' => true,
					]
				);
				$repeater->add_control(
					'f1_tab_content_list_icon',
					[
						'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-dot-circle',
							'library' => 'fa-regular',
						],
						'recommended' => [
							'fa-solid' => [
								'circle',
								'dot-circle',
								'square-full',
							],
							'fa-regular' => [
								'circle',
								'dot-circle',
								'square-full',
							],
						],
					]
				);
				$this->add_control(
					'f1_tab_content_list',
					[
						'label' => esc_html__( 'Content', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::REPEATER,
						'fields' => $repeater->get_controls(),
						'title_field' => '{{{ f1_tab_content_list_item }}}',
						'default' => [
							[
								'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
							[
								'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
							[
								'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
							[
								'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
							[
								'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
							[
								'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
								'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
							],
						],
					]
				);
				
				$this->add_control(
					'f1_tab_button_text',
					[
						'label' => esc_html__( 'Button Text', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Starting from' , 'superelements-elementor-addons-widgets-templates' ),
						'label_block' => true,
					]
				);
				$this->add_control(
					'f1_link_icon',
					[
						'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-arrow-right',
							'library' => 'fa-solid',
						],
						'recommended' => [
							'fa-solid' => [
								'circle',
								'dot-circle',
								'arrow-right',
							],
							'fa-regular' => [
								'circle',
								'dot-circle',
								'square-full',
							],
						],
					]
				);

				$this->start_controls_tabs(
					'se_f1_pricing'
					);
					$this->start_controls_tab(
						'se_f1_pricing_monthly',
						[
							'label' => esc_html__( 'Monthly Plan', 'superelements-elementor-addons-widgets-templates' ),
						]
						);
						$this->add_control(
							'f1_package_link_monthly',
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
							'f1_tab_price_monthly',
							[
								'label' => esc_html__( 'Price', 'superelements-elementor-addons-widgets-templates' ),
								'type' => \Elementor\Controls_Manager::TEXT,
								'default' => esc_html__( '29.99/mo' , 'superelements-elementor-addons-widgets-templates' ),
								'label_block' => true,
							]
						);
					$this->end_controls_tab();

					$this->start_controls_tab(
						'se_f1_pricing_yearly',
						[
							'label' => esc_html__( 'Annual Plan', 'superelements-elementor-addons-widgets-templates' ),
						]
						);
						$this->add_control(
							'f1_package_link_yearly',
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
							'f1_tab_price_yearly',
							[
								'label' => esc_html__( 'Price', 'superelements-elementor-addons-widgets-templates' ),
								'type' => \Elementor\Controls_Manager::TEXT,
								'default' => esc_html__( '29.99/mo' , 'superelements-elementor-addons-widgets-templates' ),
								'label_block' => true,
							]
						);	
					$this->end_controls_tab();
				$this->end_controls_tabs();
			$this->end_controls_section();
			// Feature 2
			$this->start_controls_section(
				'content_feature_2',
				[
					'label' => esc_html__('Pricing Tabs Feature 2', 'superelements-elementor-addons-widgets-templates'),
					'tab' => Controls_Manager::TAB_CONTENT,
				]
			);
			$this->add_control(
				'f2_tab_title',
				[
					'label' => esc_html__( 'Tab Title', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Yearly Plan' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			//batch
			$this->add_control(
				'f2_show_batch',
				[
					'label'        => esc_html__( 'Show Batch', 'superelements-elementor-addons-widgets-templates' ),
					'type'         => \Elementor\Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Show', 'superelements-elementor-addons-widgets-templates' ),
					'label_off'    => esc_html__( 'Hide', 'superelements-elementor-addons-widgets-templates' ),
					'return_value' => 'yes',
					'default'      => '',
				]
			);
			$this->add_control(
				'f2_se_pricing_batch_text',
				[
					'label'       => esc_html__( 'Batch Title', 'superelements-elementor-addons-widgets-templates' ),
					'type'        => \Elementor\Controls_Manager::TEXT,
					'default'     => esc_html__( 'Recommended' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
					'condition'   => [
						'f2_show_batch' => 'yes'
					]
				]
			);
			$this->add_control(
				'f2_tab_content_icon',
				[
					'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-user',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'user',
							'dot-circle',
							'square-full',
						],
						'fa-regular' => [
							'user',
							'dot-circle',
							'square-full',
						],
					],
				]
			);
			$this->add_control(
				'f2_pricing_title',
				[
					'label' => esc_html__( 'Pricing Title', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'For Team pack' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			$repeater2 = new \Elementor\Repeater();

			$repeater2->add_control(
				'f2_tab_content_list_item',
				[
					'label' => esc_html__( 'Text', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Ultimate access to all course, exercises and assessments' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			$repeater2->add_control(
				'f2_tab_content_list_icon',
				[
					'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-dot-circle',
						'library' => 'fa-regular',
					],
					'recommended' => [
						'fa-solid' => [
							'circle',
							'dot-circle',
							'square-full',
						],
						'fa-regular' => [
							'circle',
							'dot-circle',
							'square-full',
						],
					],
				]
			);
			$this->add_control(
				'f2_tab_content_list',
				[
					'label' => esc_html__( 'Content', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater2->get_controls(),
					'title_field' => '{{{ f2_tab_content_list_item }}}',
					'default' => [
						[
							'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
						[
							'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
						[
							'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
						[
							'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
						[
							'list_title' => esc_html__( 'Title #1', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
						[
							'list_title' => esc_html__( 'Title #2', 'superelements-elementor-addons-widgets-templates' ),
							'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'superelements-elementor-addons-widgets-templates' ),
						],
					],
				]
			);
			$this->add_control(
				'f2_link_icon',
				[
					'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-arrow-right',
						'library' => 'fa-solid',
					],
					'recommended' => [
						'fa-solid' => [
							'circle',
							'dot-circle',
							'arrow-right',
						],
						'fa-regular' => [
							'circle',
							'dot-circle',
							'square-full',
						],
					],
				]
			);
			$this->add_control(
				'f2_tab_button_text',
				[
					'label' => esc_html__( 'Button Text', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Starting from' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			$this->start_controls_tabs(
				'se_f2_pricing'
			);
			$this->start_controls_tab(
				'se_f2_pricing_monthly',
				[
					'label' => esc_html__( 'Monthly Plan', 'superelements-elementor-addons-widgets-templates' ),
				]
			);
			$this->add_control(
				'f2_package_link_monthly',
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
				'f2_tab_price_monthly',
				[
					'label' => esc_html__( 'Price', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '29.99/mo' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'se_f2_pricing_yearly',
				[
					'label' => esc_html__( 'Annual Plan', 'superelements-elementor-addons-widgets-templates' ),
				]
			);
			$this->add_control(
				'f2_package_link_yearly',
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
				'f2_tab_price_yearly',
				[
					'label' => esc_html__( 'Price', 'superelements-elementor-addons-widgets-templates' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( '29.99/mo' , 'superelements-elementor-addons-widgets-templates' ),
					'label_block' => true,
				]
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
		$this->end_controls_section();

        // style controls start 
        // =======================
        $this->start_controls_section(
            'pricing_tabs',
            [
                'label' => esc_html__('Tab container', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        	);

			$attrs = [
				'id'         => 'se_pricing_tab_wrapper',
				'class'      => '.se-pricing-tab-wrapper',
			];
			$this->se_background_color_controls($attrs);
			$this->se_gap_controls($attrs);
			$this->se_padding_controls($attrs);
			$this->se_border_radius_controls($attrs);

        $this->end_controls_section();

		// tab item style control 
		$this->start_controls_section(
			'se_pricing_tab_item_style',
			[
				'label' => esc_html__( 'Tab Item', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			); 

			$attrs = [
				'id'         => 'se_pricing_tab_item',
				'class'      => '.se-pricing-tab-item',
			];
			$this->se_typography_controls($attrs);
			$this->se_padding_controls($attrs);
			$this->se_border_radius_controls($attrs);

            $this->start_controls_tabs(
                'se_pricing_tab_normal_hover_active_controls'
            	);

                $this->start_controls_tab(
                    'se_pricing_tab_normal_controls',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
					);

					$attrs = [
						'id'         => 'se_pricing_tab_item_normal',
						'class'      => '.se-pricing-tab-item, .se-pricing-tab-item:focus',
					];
					$this->se_color_controls($attrs);
					$this->se_background_color_controls($attrs);
					$this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_pricing_tab_hover_controls',
                    [
                        'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
                    ]
					);

					$attrs = [
						'id'         => 'se_pricing_tab_item_hover',
						'class'      => '.se-pricing-tab-item:hover',
					];
					$this->se_color_controls($attrs);
					$this->se_background_color_controls($attrs);
					$this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_pricing_tab_active_controls',
                    [
                        'label' => esc_html__( 'Active', 'superelements-elementor-addons-widgets-templates' ),
                    ]
					);

					$attrs = [
						'id'         => 'se_pricing_tab_item_active',
						'class'      => '.se-pricing-tab-item.active',
					];
					$this->se_color_controls($attrs);
					$this->se_background_color_controls($attrs);
					$this->se_box_shadow_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

		// Pricing Card Style Controls
		$this->start_controls_section(
			'se_pricing_card_item_style',
			[
				'label' => esc_html__( 'Pricing Card', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_tab_item',
				'class'      => '.pricing-content',
			];
			$this->se_background_color_controls($attrs);
			$this->se_padding_controls($attrs);
			$this->se_border_controls($attrs);

		$this->end_controls_section();

		// pricing card tag style controls 
		$this->start_controls_section(
			'se_pricing_card_tag_style',
			[
				'label' => esc_html__( 'Pricing Tag', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_tag',
				'class'      => '.pricing-recommended-batch',
			];
			$this->se_text_style_controls($attrs);
			$this->se_background_color_controls($attrs);
			$this->se_padding_controls($attrs);
			$this->se_border_radius_controls($attrs);

		$this->end_controls_section();

		// pricing icon style controls 
		$this->start_controls_section(
			'se_pricing_card_header_icon_style',
			[
				'label' => esc_html__( 'Pricing Card Icon', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_header_icon',
				'class'      => '.pricing-content .header .icon',
			];
			$this->se_text_style_controls($attrs);
			$this->se_padding_controls($attrs);

		$this->end_controls_section();

		// pricing title style controls 
		$this->start_controls_section(
			'se_pricing_card_title_style',
			[
				'label' => esc_html__( 'Pricing Card Title', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_title',
				'class'      => '.pricing-content .title',
			];
			$this->se_text_style_controls($attrs);
			$this->se_margin_padding_controls($attrs);

		$this->end_controls_section();
        
		// pricing list style controls 
		$this->start_controls_section(
			'se_pricing_card_list_style',
			[
				'label' => esc_html__( 'Pricing Card List', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card',
				'class'      => '.pricing-content .content ul li',
			];
			$this->se_text_style_controls($attrs);
			$iAttrs = [
				'id'         => 'se_pricing_card_list_icon',
				'label'		=> esc_html__('Icon Color', 'superelements-elementor-addons-widgets-templates'),
				'class'      => '.pricing-content .content ul li .se-pricing-list-icon',
			];
			$this->se_color_controls($iAttrs);
			$iaAttrs = [
				'id'         => 'se_pricing_card_list_icon_active',
				'label'		=> esc_html__('Icon Active Color', 'superelements-elementor-addons-widgets-templates'),
				'class'      => '.pricing-content .content ul li .se-pricing-list-icon.active',
			];
			$this->se_color_controls($iaAttrs);
			$this->se_padding_controls($attrs);

			$lAttrs = [
				'id'         => 'se_pricing_card_list',
				'label'		=> esc_html__('Container Padding', 'superelements-elementor-addons-widgets-templates'),
				'class'      => '.pricing-content .content',
			];
			$this->se_padding_controls($lAttrs);

		$this->end_controls_section();

		// pricing card footer style controls 
		$this->start_controls_section(
			'se_pricing_card_footer_style',
			[
				'label' => esc_html__( 'Pricing Card Footer', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_footer',
				'class'      => '.pricing-footer',
			];
			$this->se_background_color_controls($attrs);
			$this->se_margin_padding_controls($attrs);
			$this->se_border_controls($attrs);

		$this->end_controls_section();
		// pricing card footer typography style controls 
		$this->start_controls_section(
			'se_pricing_footer_typography',
			[
				'label' => esc_html__( 'Pricing Card Footer TypoGraphy', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
			);

			$attrs = [
				'id'         => 'se_pricing_card_footer_text',
				'label'		=> 	'Text ',
				'class'      => '.pricing-footer-text',
			];
			$this->se_text_style_controls($attrs);
			

			$lAttrs = [
				'id'         => 'se_pricing_card_footer_link',
				'label'		=> 	'Link ',
				'class'      => '.pricing-footer-link',
			];
			$this->se_typography_controls($lAttrs);

			$iAttrs = [
				'id'         => 'se_pricing_card_footer_icon',
				'label'		=> 	'Icon ',
				'class'      => '.pricing-footer-icon',
			];
			$this->se_typography_controls($iAttrs);

			$pAttrs = [
				'id'         => 'se_pricing_card_footer_text',
				'label'		 => esc_html__( 'Text Padding', 'superelements-elementor-addons-widgets-templates' ),
				'class'      => '.pricing-footer-text',
			];
			$this->se_padding_controls($pAttrs);
			
			$this->start_controls_tabs(
				'se_pricing_card_footer_colors_style',
				);

				$this->start_controls_tab(
					'se_pricing_card_footer_normal_style',
					[
						'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
					]
					);

					$attrs = [
						'id'         => 'se_pricing_card_footer_link_normal',
						'class'      => '.pricing-footer-link',
					];
					$this->se_color_controls($attrs);
				
				$this->end_controls_tab();

				$this->start_controls_tab(
					'se_pricing_card_footer_hover_style',
					[
						'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
					]
					);

					$attrs = [
						'id'         => 'se_pricing_card_footer_link_hover',
						'class'      => '.pricing-footer-link:hover',
					];
					$this->se_color_controls($attrs);
				
				$this->end_controls_tab();

			$this->end_controls_tabs();

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
		extract($settings);
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_subscription_view', $file, $settings);
    }
}