<?php 
if (!defined('ABSPATH')) {
    exit;
}
 get_header();
    $single_layout_id = \SuperElement\ThemeBuilder::get_product_page_content_layout();
    while(have_posts()) : the_post();
        $elementor = \Elementor\Plugin::instance();
        echo   wp_kses_post($elementor->frontend->get_builder_content_for_display( $single_layout_id  ));
    endwhile;
 get_footer();

?>