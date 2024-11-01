<?php

namespace SuperElement\Admin;
if (!defined('ABSPATH')) {
    exit;
}
class AdminManager
{
   
    /**
     * Class initialize
     */
    function __construct()
    {
        add_action('save_post', [$this, 'delete_cache'], 10, 3);
        add_action('elementor/editor/after_save', [$this, 'delete_cache_from_elementor'], 10, 2);
        add_action('woocommerce_settings_saved', [$this, 'woocommerce_setting_saved']);
    }

    public function delete_cache($post_id, $post, $update)
    {
        if (!$post_id || wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
            return;
        }

        switch ($post->post_type) {
            case 'product':
                $identifier = 'product';
                break;
            case 'inventory':
                $identifier = 'product';
                break;
            case 'post':
                $identifier = 'post';
                break;
            case 'page':
                $identifier = 'page';
                break;

            default:
                $identifier = 'product';
                break;
        }

        redq_se_clear_cache_keys($identifier);
    }

    public function delete_cache_from_elementor($post_id, $data)
    {
        if (wp_is_post_revision($post_id)) {
            return;
        }
        redq_se_clear_cache_keys('product');
        redq_se_clear_cache_keys('post');
        redq_se_clear_cache_keys('page');
    }

    public function woocommerce_setting_saved()
    {
        redq_se_clear_cache_keys('product');
    }
}
