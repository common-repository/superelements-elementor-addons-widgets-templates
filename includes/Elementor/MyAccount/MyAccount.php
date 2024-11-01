<?php

/**
 * Elementor My account Widget.
 *
 * Elementor widget that inserts an My account
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\WidthHeightTraits;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) {
    exit;
}
class MyAccount extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve My account widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */    use TextTraits;
    use ColorTraits;
    use WidthHeightTraits;


    public function get_name()
    {
        return 'se_my_account';
    }

    /**
     * Get widget title.
     *
     * Retrieve My account widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('My Account', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve My account widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-my-account se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the My account widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['se-widgets-woocommerce'];
    }

    /**
     * My account Form widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_style_controls();
    }
    
    public function register_style_controls() {
      
        // my account navigation style 
        $this->start_controls_section(
            'se_my_account_navigation_style',
            [
                'label' => esc_html__('Navigation Page', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );

            $attrs = [
                'id' => 'se_my_account_normal_nav',
                'class' => '.se-my-account-wrapper .woocommerce-MyAccount-navigation ul li a',
            ];
            $this->se_typography_controls($attrs); 

            $this->start_controls_tabs('se_my_account_nav_style_tabs',);

                $this->start_controls_tab(
                    'se_my_account_nav_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $this->se_color_controls($attrs); 
                    $this->se_background_color_controls($attrs); 

                $this->end_controls_tab(); 

                $this->start_controls_tab(
                    'se_my_account_nav_active_tab',
                    [
                        'label' => esc_html__( 'Active', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $aAttrs = [
                        'id' => 'se_my_account_active_nav',
                        'class' => '.se-my-account-wrapper .woocommerce-MyAccount-navigation ul li.is-active a',
                    ];

                    $this->se_color_controls($aAttrs); 
                    $this->se_background_color_controls($aAttrs); 

                $this->end_controls_tab(); 

            $this->end_controls_tabs(); 

        $this->end_controls_section();

        $this->start_controls_section(
            'se_my_account_content_style',
            [
                'label' => esc_html__('Account Content', 'superelements-elementor-addons-widgets-templates'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
            );
        
            $pAttrs = [
                'id' => 'se_my_account_primary',
                'label' => 'Primary Color',
                'class' => '.se-my-account-wrapper .woocommerce-MyAccount-content table thead tr th, .se-my-account-wrapper .woocommerce-MyAccount-content h2, .se-my-account-wrapper .woocommerce-MyAccount-content h3, .se-my-account-wrapper .woocommerce-MyAccount-content input, .se-my-account-wrapper .woocommerce-MyAccount-content span em',
            ];
            $this->se_color_controls($pAttrs); 

            $sAttrs = [
                'id' => 'se_my_account_secondary',
                'label' => 'Secondary Color',
                'class' => '.se-my-account-wrapper .woocommerce-MyAccount-content > p, .se-my-account-wrapper .woocommerce-MyAccount-content table tbody tr td, .se-my-account-wrapper .woocommerce-MyAccount-content table tbody tr td a, .se-my-account-wrapper .woocommerce-MyAccount-content table tfoot tr td, .se-my-account-wrapper .woocommerce-MyAccount-content table tfoot tr th, .se-my-account-wrapper .woocommerce-MyAccount-content address, .se-my-account-wrapper .woocommerce-MyAccount-content label, .se-my-account-wrapper .woocommerce-MyAccount-content fieldset legend',
            ];
            $this->se_color_controls($sAttrs); 
            
        $this->end_controls_section();
    }

    /**
     * Render My account widget output on the frontend.
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
        include apply_filters('redq_se_widget_custom_my_account', $file, $settings);
    }
}