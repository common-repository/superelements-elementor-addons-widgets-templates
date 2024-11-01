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
use SuperElement\ElementorControl\Traits\SpacingTraits;
use SuperElement\ElementorControl\Traits\TextTraits;
use SuperElement\ElementorControl\Traits\ColorTraits;
use SuperElement\ElementorControl\Traits\BorderTraits;
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
class Posts extends Widget_Base
{
    use PostTrait;
    use TextTraits;
    use SpacingTraits;
    use ColorTraits;
    use BorderTraits;
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
        return 'se_post';
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
        return esc_html__('Post', 'superelements-elementor-addons-widgets-templates');
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
        return 'eicon-post-slider se-icon';
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
		return [ 'se', 'super', 'super element', 'element', 'post', 'slider', 'post slider' ];
	}

    public function get_script_depends()
    {
        return ['slick','posts'];
    }

    public function get_style_depends()
    {
        return ['posts','slick'];
    }


    /**
     * Register Copyright controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->register_post_grid_controls();
    }

    /**
     * Register Copyright General Controls.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_post_grid_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Post Grid Settings', 'superelements-elementor-addons-widgets-templates'),
            ]
            );

            $this->add_control(
                'layout',
                [
                    'label' => esc_html__('Layout', 'superelements-elementor-addons-widgets-templates'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'slider',
                    'options' => [
                        'fixed_layout'  => esc_html__('Fixed Layout', 'superelements-elementor-addons-widgets-templates'),
                        'slider'  => esc_html__('Slider View', 'superelements-elementor-addons-widgets-templates'),
                        
                    ],
                ]
            );

            $this->add_control(
                'show_button',
                [
                    'label' => esc_html__('Show All Post Button', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('On', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('Off', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'true',
                    'default' => 'true',
                    'condition'   =>[
                        'layout'=>[
                            'fixed_layout',
                        ]
                    ]
                ]
            );

            $this->add_control(
                'text_all_post',
                [
                    'label'       => esc_html__('All post Button Text ', 'superelements-elementor-addons-widgets-templates'),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'default'     => esc_html__('Read More ', 'superelements-elementor-addons-widgets-templates'),
                    'condition'=>[
                        'show_button'=>'true',
                        'layout'=>[
                            'fixed_layout',
                        ]
                    ]
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label' => esc_html__('All Post Button Link', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__('https://your-link.com', 'superelements-elementor-addons-widgets-templates'),
                    'options' => ['url', 'is_external', 'nofollow'],
                    'default' => [
                        'url' => 'https://your-link.com',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'label_block' => true,
                    'condition'=>[
                        'show_button'=>'true',
                        'layout'=>[
                            'fixed_layout',
                        ]
                    ]
                ]
            );
            $this->add_control(
                'post_by_category',
                [
                    'label' => esc_html__( 'Query By Category?', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'superelements-elementor-addons-widgets-templates' ),
                    'label_off' => esc_html__( 'No', 'superelements-elementor-addons-widgets-templates' ),
                    'return_value' => 'yes',
                    'default' => '',
                    'condition' => [
                        'layout' => 'slider'
                    ]
                ]
            );
    
            $this->add_control(
                'post_cat',
                [
                    'label' => esc_html__( 'Show Elements', 'superelements-elementor-addons-widgets-templates' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => $this->get_post_cat(),
                    'condition' => [
                        'post_by_category' => ['yes'],
                        'layout' => 'slider'
                    ]
                ]
            );
    
            $this->add_control(
                'number_of_post',
                [
                    'label' => esc_html__('Number of Post', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'step' => 1,
                    'default' => 10,
                    'condition'=>[
                        'layout'=>[
                            'fixed_layout',
                            'slider',

                        ]
                    ]
                ]
            );

            $this->add_control(
                'order_by',
                [
                    'label' => esc_html__('Order By', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none' => esc_html__('None', 'superelements-elementor-addons-widgets-templates'),
                        'ID'  => esc_html__('ID', 'superelements-elementor-addons-widgets-templates'),
                        'author' => esc_html__('Author', 'superelements-elementor-addons-widgets-templates'),
                        'title' => esc_html__('Title', 'superelements-elementor-addons-widgets-templates'),
                        'date' => esc_html__('Date', 'superelements-elementor-addons-widgets-templates'),
                        'meta_value_num' => esc_html__('Meta Value Num ', 'superelements-elementor-addons-widgets-templates'),
                        'meta_value' => esc_html__('Meta Value', 'superelements-elementor-addons-widgets-templates'),
                        'menu_order' => esc_html__('Menu Order', 'superelements-elementor-addons-widgets-templates'),
                    ],
                    'condition'=>[
                        'layout'=>[
                            'fixed_layout',
                            'slider'
                        ]
                    ]
                ]
            );
            $this->add_control(
                'order',
                [
                    'label' => esc_html__('Order By', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'ASC' => esc_html__('ASC', 'superelements-elementor-addons-widgets-templates'),
                        'DESC'  => esc_html__('DESC', 'superelements-elementor-addons-widgets-templates'),
                    ],
                    'condition'=>[
                        'layout'=>[
                            'fixed_layout',
                            'slider'

                        ]
                    ]
                ]
            );

            //post slider controls
            $this->add_control(
                'slides_to_show',
                [
                    'label' => esc_html__('Numbel of slide', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 5,
                    'step' => 1,
                    'default' => 4,
                    'condition'=>[
                        'layout'=>'slider'
                    ]
                ]
            );

            $this->add_control(
                'slider_autoplay',
                [
                    'label' => esc_html__('Enable autoplay', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('Enable', 'superelements-elementor-addons-widgets-templates'),
                    'label_off' => esc_html__('Disable', 'superelements-elementor-addons-widgets-templates'),
                    'return_value' => 'true',
                    'default' => 'true',
                    'condition'=>[
                        'layout'=>'slider'
                    ]
                ]
            );

            $this->add_control(
                'autoplay_speed',
                [
                    'label' => esc_html__('Autoplay speed', 'superelements-elementor-addons-widgets-templates'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => 500,
                    'max' => 5000,
                    'step' => 500,
                    'default' => 2000,
                    'condition'=>[
                        'layout'=>'slider'
                    ]
                ]
            );

        $this->end_controls_section();

         // Style section
        // post card style control
        $this->start_controls_section(
            'card_style_section',
            [
                'label' => esc_html__('Card', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'slider',
                ]
            ]
            );

                $attrs = [
                    'id'    => 'se_post_card',
                    'class' => '.se-post-card',
                ];
                $this->se_background_color_controls($attrs);
                $this->se_margin_padding_controls($attrs);
                $this->se_border_controls($attrs);
                $this->se_box_shadow_controls($attrs);

        $this->end_controls_section();

        // post image style control 
        $this->start_controls_section(
            'card_image_style',
            [
                'label' => esc_html__('Card Image', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'slider',
                ]
            ]
            );

            $attrs = [
                'id'    => 'se_post_card_image',
                'class' => '.se-post-card > a',
            ];
            $this->se_width_height_controls($attrs);

        $this->end_controls_section();

        // post footer style control 
        $this->start_controls_section(
            'card_footer_style_section',
            [
                'label' => esc_html__('Card Footer', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'slider',
                ]
            ]
            );

            $attrs = [
                'id'    => 'se_post_card_footer',
                'class' => '.se-post-footer',
            ];
            $this->se_padding_controls($attrs);

        $this->end_controls_section();

        // post title style control 
        $this->start_controls_section(
            'card_title_style_section',
            [
                'label' => esc_html__('Card Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'slider',
                ]
            ]
            );

            $attrs = [
                'id'    => 'se_post_card_title',
                'class' => '.se-post-title',
            ];
            $this->se_typography_controls($attrs);
            $this->se_margin_controls($attrs);

            $this->start_controls_tabs(
                'card_tabs',
                );

                $this->start_controls_tab(
                    'card_normal_tab',
                    [
                        'label' => esc_html__('Normal', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'    => 'se_post_card_title_normal',
                        'class' => '.se-post-title',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'card_hover_tab',
                    [
                        'label' => esc_html__('Hover', 'superelements-elementor-addons-widgets-templates')
                    ]
                    );

                    $attrs = [
                        'id'    => 'se_post_card_title_hover',
                        'class' => '.se-post-title:hover',
                    ];
                    $this->se_color_controls($attrs);

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // post meta style control 
        $this->start_controls_section(
            'card_meta_style_section',
            [
                'label' => esc_html__('Card Meta', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'slider',
                ]
            ]
            );

            $attrs = [
                'id'    => 'se_post_author_name',
                'label'    => 'Author ',
                'class'    => '.se-post-author',
            ];
            $this->se_text_style_controls($attrs);

            $dAttrs = [
                'id'    => 'se_post_date',
                'label'    => 'Date ',
                'class'    => '.se-post-date',
            ];
            $this->se_text_style_controls($dAttrs);

        $this->end_controls_section();

        // fixed_layout post style controls start
        // ===================================
        $this->start_controls_section(
            'masonry_post_classic_style_section',
            [
                'label' => esc_html__('Classic Post', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $cPostAttrs = [
                'id'    => 'masonry_post_classic',
                'class'    => '.se-masonry-post-classic',
            ];
            $this->se_background_color_controls($cPostAttrs);
            $this->se_margin_padding_controls($cPostAttrs);
            $this->se_border_controls($cPostAttrs);

        $this->end_controls_section();

        // fixed_layout post style controls 
        // =============================
        $this->start_controls_section(
            'masonry_post_classic_image_style_section',
            [
                'label' => esc_html__('Classic Post Image', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $cPiAttrs = [
                'id'    => 'masonry_post_classic_image',
                'class'    => '.se-masonry-post-classic-image',
            ];
            $this->se_border_radius_controls($cPiAttrs);

        $this->end_controls_section();

        // classic post title controls 
        // ============================
        $this->start_controls_section(
            'masonry_post_classic_footer',
            [
                'label' => esc_html__('Classic Post Footer', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_classic_footer',
                'class'    => '.se-masonry-post-classic-footer',
            ];
            $this->se_padding_controls($attrs);

        $this->end_controls_section();

        // classic post title controls 
        // ============================
        $this->start_controls_section(
            'masonry_post_classic_title',
            [
                'label' => esc_html__('Classic Post Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_classic_title',
                'class'    => '.se-masonry-post-classic-title',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // classic post description controls 
        // ==================================
        $this->start_controls_section(
            'masonry_post_classic_description',
            [
                'label' => esc_html__('Classic Post Description', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_classic_desc',
                'class'    => '.se-masonry-post-classic-desc',
            ];
            $this->se_text_style_controls($attrs);
            $this->se_margin_controls($attrs);

        $this->end_controls_section();

        // classic post link controls 
        // ============================
        $this->start_controls_section(
            'masonry_post_classic_link',
            [
                'label' => esc_html__('Classic Post Link', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_classic_link',
                'class'    => '.se-masonry-post-classic-link',
            ];
            $this->se_typography_controls($attrs);
            $this->se_padding_controls($attrs);

            $this->start_controls_tabs(
                'masonry_post_classic_link_tabs'
                );
            
                $this->start_controls_tab(
                    'masonry_post_classic_link_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'    => 'masonry_post_classic_link_normal',
                        'class'    => '.se-masonry-post-classic-link',
                    ];
                    $this->se_color_controls($attrs);
                
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'masonry_post_classic_link_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'    => 'masonry_post_classic_link_hover',
                        'class'    => '.se-masonry-post-classic-link:hover',
                    ];
                    $this->se_color_controls($attrs);
                
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        // fixed_layout post style controls 
        // =============================
        $this->start_controls_section(
            'masonry_post_modern_style_section',
            [
                'label' => esc_html__('Modern Post', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_modern',
                'class'    => '.se-masonry-post-modern>a',
            ];
            $this->se_padding_controls($attrs);

            $attrs = [
                'id'    => 'masonry_post_modern',
                'class'    => '.se-masonry-post-modern',
            ];
            $this->se_margin_controls($attrs);

            $attrs = [
                'id'    => 'masonry_post_modern',
                'class'    => '.se-masonry-post-modern',
            ];
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // fixed_layout post modern typography controls 
        // =============================
        $this->start_controls_section(
            'masonry_post_modern_typography_style',
            [
                'label' => esc_html__('Modern Post Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_modern_title',
                'class'    => '.se-masonry-post-modern-title',
            ];
            $this->se_text_style_controls($attrs);

        $this->end_controls_section();

        // fixed_layout text post style controls 
        // =================================
        $this->start_controls_section(
            'masonry_post_text_style_section',
            [
                'label' => esc_html__('Text Post', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_text',
                'class'    => '.se-masonry-post-text',
            ];
            $this->se_background_color_controls($attrs);
            $this->se_margin_padding_controls($attrs);
            $this->se_border_controls($attrs);

        $this->end_controls_section();

        // fixed_layout post text typography controls 
        // ======================================
        $this->start_controls_section(
            'masonry_post_text_typography_style',
            [
                'label' => esc_html__('Text Post Title', 'superelements-elementor-addons-widgets-templates'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition'=>[
                    'layout'=> 'fixed_layout',
                ]
            ]
            );

            $attrs = [
                'id'    => 'masonry_post_text_title',
                'class'    => '.se-masonry-post-text-title',
            ];
            $this->se_typography_controls($attrs);

            $this->start_controls_tabs(
                'masonry_post_text_title_normal_hover_style'
                );
            
                $this->start_controls_tab(
                    'masonry_post_text_title_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'    => 'masonry_post_text_title_normal',
                        'class'    => '.se-masonry-post-text-title',
                    ];
                    $this->se_color_controls($attrs);
                
                $this->end_controls_tab();

                $this->start_controls_tab(
                    'masonry_post_text_title_hover_tab',
                    [
                        'label' => esc_html__( 'Hover', 'superelements-elementor-addons-widgets-templates' ),
                    ]
                    );

                    $attrs = [
                        'id'    => 'masonry_post_text_title_hover',
                        'class'    => '.se-masonry-post-text-title:hover',
                    ];
                    $this->se_color_controls($attrs);
                
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

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
        $args = [
            'post_type'        => 'post',
            'posts_per_page'   =>$number_of_post,
            'fields'           => 'ids',
            'orderby'          => $order_by,
            'order'            => $order
        ];
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_link', $settings['button_link']);
        }

        $layout = isset($settings['layout']) ? $settings['layout'] : 'grid';
        if ($layout === 'slider') {
            $data_slick = [];
            $data_slick['slidesToShow'] = (int) esc_html($slides_to_show);
            $data_slick['autoplay'] = (bool) esc_html($slider_autoplay);
            $data_slick['autoplaySpeed'] = (int) esc_html($autoplay_speed);
            $data_slick['slidesToScroll'] = 1;
            
        }
       
        
        $file = __DIR__ . '/' . $layout . '.php';
        include apply_filters('redq_tm_widget_post_grid_view', $file, $settings);
        //include __DIR__ . '/' . $layout . '.php';
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
    /**
     * Render Post Category to Query post by category 
     *
     *
     * @since 1.3.0
     * @access protected
     */
    protected function get_post_cat()
    {
        $post_cat = [];
        $terms = get_terms( array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
        ) );
        if(!empty($terms)){
            foreach($terms as $term){
                $post_cat[$term->term_id] = $term->name;
            }
        }
        return $post_cat;
    }
}
