<?php

namespace SuperElement\Traits;

use WP_Query;
use DateTime;
use DatePeriod;
use DateInterval;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Test Trait
 */
trait PostTrait
{
    public function get_testimonials()
    {
        global $wpdb;
            $args = [
                'post_type'      => 'testimonial',
                'posts_per_page' => -1,
            ];

            $testimonials = get_posts($args);
            
            // Restore original post data
            wp_reset_postdata();
         return $testimonials;
    }

    public function get_blog_posts($args = [], $term = '')
    {
        $defaults = [
            'post_type'        => 'post',
            'orderby'          => 'date',
            'order'            => 'desc',
            'fields'           => 'ids',
            'posts_per_page'   => 3,
            'suppress_filters' => false
        ];

        if ($term) {
            $defaults['tax_query'] = [
                [
                    'taxonomy' => 'category',
                    'field'    => 'id',
                    'terms'    => $term,
                ],
            ];
        }
        $args = wp_parse_args($args, $defaults);
        $cache_key = redq_se_generate_cache_key($args, 'post');
        $posts = get_transient($cache_key);

        if (empty($posts)) {
            $ids = get_posts($args);
            $posts = redq_se_prepare_blog_grid($ids);
            set_transient($cache_key, $posts);
        }

        return $posts;
    }
    
}
