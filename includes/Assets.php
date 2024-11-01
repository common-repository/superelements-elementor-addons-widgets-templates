<?php

namespace SuperElement;

use SuperElement\Traits\AssetsTrait;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Assets class handler
 */
class Assets
{
    use AssetsTrait;

    /**
     * Initialize assets
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
    }

    /**
     * Register assets
     */
    public function register_assets($hook)
    {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        // register & enqueue scripts
        foreach ($scripts as $handle => $script) {
            $deps    = isset($script['deps']) ? $script['deps'] : false;
            $version = isset($script['version']) ? $script['version'] : REDQ_SE_VERSION;
            wp_register_script($handle, $script['src'], $deps, $version, true);
        }

        // register & enqueue styles
        foreach ($styles as $handle => $style) {
            $deps    = isset($style['deps']) ? $style['deps'] : false;
            $version = isset($style['version']) ? $style['version'] : REDQ_SE_VERSION;

            wp_register_style($handle, $style['src'], $deps, $version);
        }

        if(is_admin()) {
            if (str_contains($hook, 'superelements-elementor-addons-widgets-templates')) {
                wp_enqueue_style('redq-se-global');
                wp_enqueue_style('redq-se-tailwind'); 
                wp_enqueue_script('redq-se-admin');
                wp_localize_script( 'redq-se-admin', 'se_object', [
                    'ajax_url' => admin_url( 'admin-ajax.php' ),
                    'nonce'    => wp_create_nonce('redq-se-nonce')
                ]); 
            }
        } else {
            wp_enqueue_style('redq-se-global');
            wp_enqueue_style('redq-se-tailwind'); 
            wp_localize_script( 'redq-se-global', 'se_object', [
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce'    => wp_create_nonce('redq-se-nonce')
                ] );  
        } 
    }
}
