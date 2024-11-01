<?php

namespace SuperElement\Traits;

//use SuperElement\Traits\ElementorControls\SelectTraits;
use Elementor\Controls_Manager;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Test Trait
 */
trait ProductsTrait
{
    protected $fields=[];
    protected function get_query_results()
    {
        $results = WC_Shortcode_Products::get_query_results();
        // Start edit.
        if ($this->is_added_product_filter) {
            remove_action('pre_get_posts', [wc()->query, 'product_query']);
        }
        // End edit.

        return $results;
    }
    public function get_all_product_categories() {
        $categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
        ));
        $options =[];
        foreach ($categories as $term) {
            $options[$term->slug] = $term->name;
        }
        return $options;
    }
    public function get_all_product_tags(){
        $tags = get_terms(array(
            'taxonomy' => 'product_tag',
            'hide_empty' => false,
        ));       
        $options =[];
        foreach ($tags as $term) {
            $options[$term->slug] = $term->name;
        }
        return $options;
    }


}
