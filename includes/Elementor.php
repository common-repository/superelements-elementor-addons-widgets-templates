<?php

namespace SuperElement;

use SuperElement\Traits\WidgetsList;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Load elementor class.
 */
class Load_Elementor
{
    use WidgetsList;

    private $prefix = 'se';

    /**
     * Init elementor class.
     *
     * @since 1.0.0
     *
     * @return null
     */
    public function __construct()
    {
        add_action('elementor/elements/categories_registered', [$this, 'register_category']);
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/frontend/after_register_styles', [$this, 'register_frontend_styles']);
        add_action('elementor/backend/after_register_styles', [$this, 'register_frontend_styles']);
        add_action('elementor/frontend/after_register_scripts', [$this, 'register_frontend_scripts']);
        add_action('elementor/editor/before_enqueue_scripts', [$this, 'my_plugin_editor_scripts']);
        if ($this->is_woocommerce_active()) {
            add_action('elementor/editor/before_enqueue_scripts', [$this, 'super_init_cart']);
            add_filter('woocommerce_add_to_cart_fragments', [$this, 'super_mini_cart_fragments'], 30, 1);
        }
    }

    /**
     * Register elementor category.
     *
     * @param object $elementor
     *
     * @since 1.0.0
     *
     * @return object
     */
    public function register_category($elementor)
    {
        $elementor->add_category(
            'se-widgets',
            [
                'title' => esc_html__('Super Element Widgets', 'superelements-elementor-addons-widgets-templates'),
                'icon' => 'eicon-font',
            ]
        );
        $elementor->add_category(
            'se-widgets-woocommerce',
            [
                'title' => esc_html__('Super Element WooCommerce', 'superelements-elementor-addons-widgets-templates'),
                'icon' => 'eicon-woocommerce',
            ]
        );

        return $elementor;
    }

    /**
     * Register elementor widgets.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function register_widgets($widgets_manager)
    {
        $this->includeWidgetsFiles();

        $widget_settings = get_option('redq_se_elementor_widgets_settings', []);

        $widgets = $this->getWidgetList();
        if (!count($widgets)) {
            return;
        }

        foreach ($widgets as $handle => $widget) {
            if (!isset($widget['class']) || empty($widget['class'])) {
                continue;
            }

            $key = strtolower($handle);
            if (isset($widget_settings[$key]) && empty($widget_settings[$key])) {
                continue;
            }

            $widgets_manager->register($widget['class']);
        }
    }

    /**
     * register_frontend_scripts.
     *
     * @since 1.0.0
     */
    public function register_frontend_scripts()
    {
        $widgets = $this->getWidgetList();

        if (!count($widgets)) {
            return;
        }

        foreach ($widgets as $handle => $widget) {
            if (empty($widget['js'])) {
                continue;
            }

            $handler = $widget['js'];
            $src = REDQ_SE_ELEMENTOR_ASSETS.$handle.'/'.$widget['js'].'.js';
            $version = filemtime(REDQ_SE_ELEMENTOR.$handle.'/'.$widget['js'].'.js');
            $deps = isset($widget['js_deps']) ? $widget['js_deps'] : false;
            $version = !empty($version) ? $version : REDQ_SE_VERSION;
            wp_register_script($handler, $src, $deps, $version, true);

            $js_libs = isset($widget['js_libs']) ? $widget['js_libs'] : [];
            if (count($js_libs)) {
                foreach ($js_libs as $lib) {
                    $lib_src = REDQ_SE_ELEMENTOR_ASSETS.$handle.'/'.$lib.'.js';
                    $lib_version = filemtime(REDQ_SE_ELEMENTOR.$handle.'/'.$lib.'.js');
                    wp_register_script($lib, $lib_src, $deps, $lib_version, true);
                }
            }
        }
        // localize Subscribe form data
    }

    /**
     * register_frontend_scripts.
     *
     * @since 1.0.0
     */
    public function register_frontend_styles()
    {
        $widgets = $this->getWidgetList();

        if (!count($widgets)) {
            return;
        }

        foreach ($widgets as $handle => $widget) {
            if (empty($widget['css'])) {
                continue;
            }

            $handler = $widget['css'];
            $src = REDQ_SE_ELEMENTOR_ASSETS.$handle.'/'.$widget['css'].'.css';
            $version = filemtime(REDQ_SE_ELEMENTOR.$handle.'/'.$widget['css'].'.css');
            $deps = [];
            $version = !empty($version) ? $version : REDQ_SE_VERSION;

            wp_register_style($handler, $src, $deps, $version);

            $css_libs = isset($widget['css_libs']) ? $widget['css_libs'] : [];
            if (count($css_libs)) {
                foreach ($css_libs as $lib) {
                    $lib_src = REDQ_SE_ELEMENTOR_ASSETS.$handle.'/'.$lib.'.css';
                    $lib_version = filemtime(REDQ_SE_ELEMENTOR.$handle.'/'.$lib.'.css');
                    wp_register_style($lib, $lib_src, $deps, $lib_version);
                }
            }
        }
    }

    /**
     * Widget files.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function includeWidgetsFiles()
    {
        $widget_list = $this->getWidgetList();

        if (!count($widget_list)) {
            return;
        }

        foreach ($widget_list as $handle => $widget) {
            if (empty($widget['php'])) {
                continue;
            }
            $file = REDQ_SE_ELEMENTOR.$handle.'/'.$widget['php'].'.php';
            if (file_exists($file)) {
                continue;
            }
            require_once $file;
        }
    }

    /**
     * Register editor style.
     *
     * @since 1.0.0
     */
    public function my_plugin_editor_scripts()
    {
        wp_register_style('redq-se-editor-style', REDQ_SE_ASSETS.'/css/elementor-editor.css', [], REDQ_SE_VERSION, 'all');
        wp_enqueue_style('redq-se-editor-style');
    }

    /**
     * Widget list.
     *
     * @name array key = folder name
     * @name php key = file name
     *
     * @since 1.0.0
     *
     * @return array
     */
    public function getWidgetList()
    {
        $default = $this->get_widgets();
        if ($this->is_woocommerce_active()) {
            $woo = $this->get_woo_widgets();

            return array_merge($default, $woo);
        }

        return $default;
    }

    public function is_woocommerce_active()
    {
        return class_exists('WooCommerce');
    }

    public function super_init_cart()
    {
        $has_cart = is_a(WC()->cart, 'WC_Cart');

        if (!$has_cart) {
            $session_class = apply_filters('woocommerce_session_handler', 'WC_Session_Handler');
            WC()->session = new $session_class();
            WC()->session->init();
            WC()->cart = new \WC_Cart();
            WC()->customer = new \WC_Customer(get_current_user_id(), true);
        }
    }

    // update cart contents
    public function super_mini_cart_fragments($fragments)
    {
        $fragments['.se-counter'] = '<span class="se-counter">'.WC()->cart->get_cart_contents_count().'</span>';
	    return $fragments;
    }

}
