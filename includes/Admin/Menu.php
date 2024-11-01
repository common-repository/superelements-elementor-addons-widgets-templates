<?php

namespace SuperElement\Admin;

use SuperElement\Traits\WidgetsList;
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Admin menu class
 */
class Menu
{
    use WidgetsList;

    /**
     * Initialize menu
     */
    function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Handle plugin menu
     *
     * @return void
     */
    public function admin_menu()
    {
        $slug_prefix = 'superelements-elementor-addons-widgets-templates';
        $parent_slug = $slug_prefix. '-dashboard';
        $capability  = 'manage_options';

        add_menu_page(__('Super Element Dashboard', 'superelements-elementor-addons-widgets-templates'), __('Super Element', 'superelements-elementor-addons-widgets-templates'), $capability, $parent_slug, [$this, 'dashboard_page'], 'dashicons-buddicons-groups');
        add_submenu_page($parent_slug, __('Dashboard', 'superelements-elementor-addons-widgets-templates'), __('Dashboard', 'superelements-elementor-addons-widgets-templates'), $capability, $parent_slug, [$this, 'dashboard_page']);
        add_submenu_page($parent_slug, __('Widgets', 'superelements-elementor-addons-widgets-templates'), __('Widgets', 'superelements-elementor-addons-widgets-templates'), $capability, $slug_prefix . '-widgets', [$this, 'widgets_page']);

    }

    /**
     * Dashboard page
     *
     * @return void
     */
    public function dashboard_page()
    {
        $file = __DIR__ . '/views/dashboard.php';
        include_once($file);
    }

    /**
     * Widgets page
     *
     * @return void
     */
    public function widgets_page()
    {
        $file             = __DIR__ . '/views/widgets.php';
        $widgets_list     = $this->get_widgets();
        $woo_widgets_list = $this->get_woo_widgets();
        $widget_settings  =get_option('redq_se_elementor_widgets_settings', []);
        $enable_all       = false;

        if (count(array_unique($widget_settings)) === 1 && end($widget_settings) === 1) {
            $enable_all = true;
        }

        include_once($file);
    }

}