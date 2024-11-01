<?php

namespace SuperElement\Admin;

/**
 * Admin menu class
 */
if (!defined('ABSPATH')) {
    exit;
}
class CMB2
{
    /**
     * Initialize CMB2
     */
    function __construct()
    {
        add_action('cmb2_admin_init', [$this, 'page_header_metabox']);
        add_action('cmb2_admin_init', [$this, 'testimonial_metabox']);
    }

    public function page_header_metabox()
    {
        $header = new_cmb2_box([
            'id'           => 'turbo_local_settings',
            'title'        => esc_html__('Header Controls', 'superelements-elementor-addons-widgets-templates'),
            'object_types' => ['page'],
            'context'      => 'side',
            'priority'     => 'high',
            'show_names'   => true,
        ]);

        $header->add_field([
            'name'    => esc_html__('Header Control', 'superelements-elementor-addons-widgets-templates'),
            'id'      => '_turbo_page_header_control',
            'desc'    => esc_html__('Header color controls', 'superelements-elementor-addons-widgets-templates'),
            'type'    => 'select',
            'options' => [
                'global'   => esc_html__('Global Settings', 'superelements-elementor-addons-widgets-templates'),
                'local'  => esc_html__('Local Settings', 'superelements-elementor-addons-widgets-templates'),
            ],
            'default' => 'global'
        ]);
    }
    public function testimonial_metabox()
    {
        $testimonial = new_cmb2_box([
            'id'           => 'super_elements_testimonial',
            'title'        => esc_html__('Testimonials Info', 'superelements-elementor-addons-widgets-templates'),
            'object_types' => ['testimonial'],
            'context'      => 'normal',
            'priority'     => 'high',
            'show_names'   => true,
        ]);

        $testimonial->add_field([
            'name' => esc_html__('Author Name', 'superelements-elementor-addons-widgets-templates'),
            'id'   => '_se_author_name',
            'type' => 'text',
        ]);

        $testimonial->add_field([
            'name' => esc_html__('Author Meta', 'superelements-elementor-addons-widgets-templates'),
            'id'   => '_se_author_meta',
            'type' => 'text',
        ]);

        $testimonial->add_field([
            'name' => esc_html__('Rating', 'superelements-elementor-addons-widgets-templates'),
            'id'      => '_se_rating',
            'type'    => 'select',
            'options' => [
                '1' => esc_html__('1', 'superelements-elementor-addons-widgets-templates'),
                '2' => esc_html__('2', 'superelements-elementor-addons-widgets-templates'),
                '3' => esc_html__('3', 'superelements-elementor-addons-widgets-templates'),
                '4' => esc_html__('4', 'superelements-elementor-addons-widgets-templates'),
                '5' => esc_html__('5', 'superelements-elementor-addons-widgets-templates'),
            ],
        ]);
    }
}
