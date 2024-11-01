<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    $heading_tag = isset($settings['se_product_title_header_tag']) ? $settings['se_product_title_header_tag']: 'h2';
    $product_title = esc_html(get_the_title($product_post_id));
    $link_start = '';
    $link_end = '';
    if ( ! empty( $settings['se_product_title_link']['url'] ) ) {
        $this->add_link_attributes( 'se_product_title_link', $settings['se_product_title_link'] );
        $link_start = '<a '.$this->get_render_attribute_string( 'se_product_title_link' ).'>';
        $link_end = '</a>';
        }
    printf('<%s class="se-product-title">%s%s%s</%s>', 
        wp_kses_post($heading_tag), 
        wp_kses_post($link_start), 
        wp_kses_post($product_title), 
        wp_kses_post($link_end), 
        wp_kses_post($heading_tag)
    );