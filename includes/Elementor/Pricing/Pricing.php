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
if (!defined('ABSPATH')) {
    exit;
}
class Pricing extends Widget_Base
{
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
        return 'se_pricing';
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
        return esc_html__('Pricing', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-price-table';
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

    public function get_style_depends()
    {
        return [];
    }
    public function get_script_depends()
    {
        return [];
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
            'se_pricing_plan',
            [
                'label' => esc_html__('Pricing Plan', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		//batch
		$this->add_control(
			'show_batch',
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
			'se_pricing_batch_text',
			[
				'label'       => esc_html__( 'Batch Title', 'superelements-elementor-addons-widgets-templates' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Recommended' , 'superelements-elementor-addons-widgets-templates' ),
				'label_block' => true,
				'condition'   => [
					'show_batch' => 'yes'
				]
			]
		);
        $this->add_control(
			'se_pricing_content_icon',
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
			'se_pricing_title',
			[
				'label' => esc_html__( 'Pricing Title', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'For Team pack' , 'superelements-elementor-addons-widgets-templates' ),
				'label_block' => true,
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'se_pricing_content_list_item',
			[
				'label' => esc_html__( 'Text', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Ultimate access to all course, exercises and assessments' , 'superelements-elementor-addons-widgets-templates' ),
				'label_block' => true,
			]
		);
        $repeater->add_control(
			'se_pricing_content_list_icon',
			[
				'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
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
			'se_pricing_content_list',
			[
				'label' => esc_html__( 'Content', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ se_pricing_content_list_item }}}',
			]
		);
        $this->add_control(
			'se_pricing_package_link',
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
			'se_pricing_button_before_text',
			[
				'label' => esc_html__( 'Button Before Text', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Starting from' , 'superelements-elementor-addons-widgets-templates' ),
				'label_block' => true,
			]
		);
        $this->add_control(
			'se_pricing_price',
			[
				'label' => esc_html__( 'Price', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '29.99/mo' , 'superelements-elementor-addons-widgets-templates' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'se_pricing_link_icon',
			[
				'label' => esc_html__( 'Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
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
        $settings = $this->get_settings_for_display();
		extract($settings);
        $file = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_subscription_view', $file, $settings);
    }
}