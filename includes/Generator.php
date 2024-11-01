<?php

namespace  SuperElement;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Generator class
 * 
 * @description: Extended CPTs is a library which provides extended functionality to WordPress custom post types and taxonomies. 
 * This allows developers to quickly build post types and taxonomies without having to write the same code again and again.
 * 
 * @api https://github.com/johnbillion/extended-cpts
 */
class Generator
{
    /**
     * Class initialize
     */
    function __construct()
    {
        add_action('init', [$this, 'init_generator']);
    }

    public function init_generator()
    {
        register_extended_post_type(
            'testimonial',
            [
                'show_in_feed' => false,
                'show_in_rest' => false,
                'exclude_from_search' => true,
                'supports' => ['title', 'excerpt', 'thumbnail'],
                'archive' => ['nopaging' => true],
                'menu_icon' => 'dashicons-testimonial'
            ],
            [
                'singular' => esc_html__('Testimonial', 'superelements-elementor-addons-widgets-templates'),
                'plural'   => esc_html__('Testimonials', 'superelements-elementor-addons-widgets-templates'),
                'slug'     => 'testimonials'
            ]
        );
        register_extended_post_type('super_builder', array(
            'show_in_feed' => true,
            'show_in_rest' => false,
            'archive'      => ['nopaging' => true],
            'supports'     => ['title', 'editor', 'elementor', 'themebuilder_templates_display'],
            'hierarchical' => false,
            'menu_icon' => 'dashicons-insert-after',
            'menu_position' => 60,
            'admin_cols' => [
                'type'      => ['title' => esc_html__('Type', 'superelements-elementor-addons-widgets-templates')],
                'display'   => ['title' => esc_html__('Display', 'superelements-elementor-addons-widgets-templates')],
                'published' => ['title' => esc_html__('Published', 'superelements-elementor-addons-widgets-templates')]
            ],
        ), [
            'singular' => esc_html__('Super builder', 'superelements-elementor-addons-widgets-templates'),
            'plural'   => esc_html__('Super builders', 'superelements-elementor-addons-widgets-templates'),
            'slug'     => 'super_builder'
        ]);
    }
}

