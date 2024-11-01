<?php

/**
 * Elementor Product Tabs Widget.
 *
 * Elementor widget that inserts an Product Tabs
 *
 * @since 1.0.0
 */

namespace SuperElement\Elementor;

use SuperElement\ElementorControl\Traits\HeadingTraits;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\CommentTraits;
use SuperElement\ElementorControl\Traits\ButtonTraits;
if (!defined('ABSPATH')) {
    exit;
}
class ProductTabs extends Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Product Tabs widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    use HeadingTraits;
    use ColorTraits;
    use SpacingTraits;
    use BorderTraits;
    use TextTraits;
    use CommentTraits;
    use ButtonTraits;
    public function get_name()
    {
        return 'se_product_tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve Product Tabs widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Product Tabs', 'superelements-elementor-addons-widgets-templates');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Product Tabs widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-product-tabs se-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Product Title widget belongs to.
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

    public function get_style_depends()
    {
        return ['product-tabs'];
    }


    /**
     * Register Product Stock widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
       // tabs container 
		$this->start_controls_section(
			'se_product_tab_style',
			[
				'label' => esc_html__( 'Tab Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab',
                'class'        => '.se-product-tab-container .tabs',
            ];
            $this->se_margin_padding_controls($attrs);

            $tAttrs = [
                'id'        => 'se_product_tab_before',
                'class'        => '.se-product-tab-container .tabs::before',
            ];
            $this->se_border_controls($tAttrs);

        $this->end_controls_section();

        // tab item container 
		$this->start_controls_section(
			'se_product_tab_item_style',
			[
				'label' => esc_html__( 'Tab Item Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_item',
                'class'        => '.se-product-tab-container .tabs li a',
            ];
            $this->se_typography_controls($attrs);

            $mpAttrs = [
                'id'        => 'se_product_tab_item',
                'class'        => '.se-product-tab-container .tabs li a',
            ];
            $this->se_margin_padding_controls($mpAttrs);

            $bbAttrs = [
                'id'        => 'se_product_tab_item_normal',
                'class'        => '.se-product-tab-container .tabs li a',
            ];
            $this->se_border_controls($bbAttrs);

            $this->start_controls_tabs('se_product_tab_normal_hover_active');

                $this->start_controls_tab(
                    'se_product_tab_normal',
                    [
                        'label'     => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $cAttrs = [
                        'id'        => 'se_product_tab_item_normal',
                        'class'        => '.se-product-tab-container .tabs li a',
                    ];
                    $this->se_color_controls($cAttrs);
                    $this->se_background_color_controls($cAttrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_product_tab_hover',
                    [
                        'label'     => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $cAttrs = [
                        'id'        => 'se_product_tab_item_hover',
                        'class'        => '.se-product-tab-container .tabs li a:hover',
                    ];
                    $this->se_color_controls($cAttrs);
                    $this->se_background_color_controls($cAttrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'se_product_tab_active',
                    [
                        'label'     => esc_html__('Active', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $cAttrs = [
                        'id'        => 'se_product_tab_item_active',
                        'class'        => '.se-product-tab-container .tabs li.active a',
                    ];
                    $this->se_color_controls($cAttrs);
                    $this->se_background_color_controls($cAttrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();


        // tab panel style 
        $this->start_controls_section(
			'se_product_tab_panel_style',
			[
				'label' => esc_html__( 'Tab Panel Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );
            
                $attrs = [
                    'id'        => 'se_product_tab_panel',
                    'class'        => '.woocommerce-Tabs-panel.panel',
                ];
                $this->se_margin_padding_controls($attrs);

        $this->end_controls_section();

        // tab panel text style 
        $this->start_controls_section(
			'se_product_tab_panel_text',
			[
				'label' => esc_html__( 'Tab Panel Text Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );
            
                $tAttrs = [
                    'id'            => 'se_product_tab_panel_title',
                    'label'         => esc_html__('Title ', 'superelements-elementor-addons-widgets-templates'),
                    'class'         => '.se-product-tab-container .woocommerce-Tabs-panel h2, .se.single-product .se-product-tab-container .woocommerce-Tabs-panel h3',
                    'separator'     => 'after',
                ];
                $this->se_text_style_controls($tAttrs);

                $dAttrs = [
                    'id'            => 'se_product_tab_panel_desc',
                    'label'         => esc_html__('Description ', 'superelements-elementor-addons-widgets-templates'),
                    'class'         => '.woocommerce-Tabs-panel p',
                    'separator'     => 'after',
                ];
                $this->se_text_style_controls($dAttrs);

                $cmAttrs = [
                    'id'            => 'se_product_tab_panel_comment_replay_title',
                    'label'         => esc_html__('Comment Reply ', 'superelements-elementor-addons-widgets-templates'),
                    'class'         => '.comment-reply-title',
                ];
                $this->se_text_style_controls($cmAttrs);

        $this->end_controls_section();

        // review items style
        $this->start_controls_section(
			'se_product_tab_panel_comment',
			[
				'label' => esc_html__( 'Review Item Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_comment_container',
                'class'     => '.se-product-tab-container .comment_container'
            ];
            $this->comment_section_style_controls($attrs);

        $this->end_controls_section();

        // tab panel review comment image
        $this->start_controls_section(
			'se_product_tab_panel_comment_image',
			[
				'label' => esc_html__( 'Review User Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_comment_user_image',
                'class'     => '.se-product-tab-container #reviews #comments ol.commentlist li .comment_container img.avatar'
            ];
            $this->comment_image_style_controls($attrs);

        $this->end_controls_section();

        // tab panel review comment text container
        $this->start_controls_section(
			'se_product_tab_panel_comment_user_details',
			[
				'label' => esc_html__( 'Comment Text Container Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_comment_user_details',
                'class'     => '.se-product-tab-container #reviews #comments ol.commentlist li .comment_container .comment-text'
            ];
            $this->comment_container_controls($attrs);

        $this->end_controls_section();

        // tab panel review star rating
        $this->start_controls_section(
			'se_product_tab_panel_comment_meta',
			[
				'label' => esc_html__( 'Comment Meta Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_comment_meta',
                'class'     => '.se-product-tab-container #reviews #comments ol.commentlist li .comment_container .comment-text .meta'
            ];
            $this->comment_meta_controls($attrs);

        $this->end_controls_section();

        // tab panel review description style
        $this->start_controls_section(
			'se_product_tab_panel_comment_description',
			[
				'label' => esc_html__( 'Comment Description Style', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_comment_desc',
                'class'     => '.se-product-tab-container #reviews #comments ol.commentlist li .comment_container .comment-text .description>p'
            ];
            $this->comment_description_controls($attrs);

        $this->end_controls_section();

        // review submit button style
        $this->start_controls_section(
			'se_product_tab_panel_review_submit_button',
			[
				'label' => esc_html__( 'Review Submit Button', 'superelements-elementor-addons-widgets-templates' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		    );

            $attrs = [
                'id'        => 'se_product_tab_review_submit',
                'class'     => '.se-product-tab-container #review_form #respond .form-submit input'
            ];
            $this->register_button_style_controls($attrs);

        $this->end_controls_section();
    }

    /**
     * Render Product Rating widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $file            = __DIR__ . '/view.php';
        include apply_filters('redq_se_widget_product_rating', $file, $settings);
    }
    protected function builder_view() {  ?>
       <div class="woocommerce-tabs wc-tabs-wrapper">
            <ul class="tabs wc-tabs" role="tablist">
                <li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                    <a href="#tab-description">
                    <?php echo esc_html__('Description', 'superelements-elementor-addons-widgets-templates'); ?>				
                    </a>
                </li>
                <li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                    <a href="#tab-additional_information">
                        <?php echo esc_html__('Additional information', 'superelements-elementor-addons-widgets-templates'); ?>						
                    </a>
                </li>
                <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                    <a href="#tab-reviews">	
                        <?php echo esc_html__('Reviews (1)', 'superelements-elementor-addons-widgets-templates'); ?>				
                    </a>
                </li>
            </ul>
            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="">		
                <h2><?php echo esc_html__('Description', 'superelements-elementor-addons-widgets-templates'); ?></h2>
                <p><?php echo esc_html__('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', 'superelements-elementor-addons-widgets-templates'); ?></p>
            </div>
        </div>	
      <?php 
    }
}