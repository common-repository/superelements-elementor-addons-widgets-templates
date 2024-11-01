<?php
/*
* Plugin Name: Superelements - Elementor addons, widgets & templates
* Requires Plugins: elementor
* Plugin URI: https://www.superelements.io/
* Description: Super Element is a feature-rich Elementor widget plugin for WordPress, offering a seamless drag-and-drop interface for effortless page customization. Elevate your website design with a diverse set of highly customizable widgets, making it easy for both beginners and experienced users to create visually stunning layouts
* Version: 1.0.8
* Author: RedQTeam
* Author URI: https://redq.io
* Requires at least: 5.0
* Tested up to: 6.6
*
* Text Domain: superelements-elementor-addons-widgets-templates
* Domain Path: /languages/
*
* Copyright: © 2012-2024 RedQTeam.
* License: GNU General Public License v3.0
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*
*/

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Main plugin class
 */
final class SuperElements
{
    /**
     * Plugin version
     * 
     * @var string
     */
    const version = '1.0.4';

    /**
     * contractor
     */
    private function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);
        add_action('plugins_loaded', [$this, 'text_domain']);
        if ( $this->is_compatible() ) {
            add_action('plugins_loaded', [$this, 'init_plugin']);
		}
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'action_links'], 1);
        add_filter('plugin_row_meta',  [$this, 'row_meta'], 10, 2);
    }

    /**
     * action_links
     *
     * @param array $links
     *
     * @return array
     */
    public function action_links($links)
    {
        $links[] = '<a href="' . admin_url('admin.php?page=superelements-elementor-addons-widgets-templates-dashboard') . '">' . esc_html__('Settings', 'superelements-elementor-addons-widgets-templates') . '</a>';
        $links[] = '<a href="https://redq.io" target="_blank">' . __('Portfolio', 'superelements-elementor-addons-widgets-templates') . '</a>';

        return $links;
    }

    /**
     * Row meta
     *
     * @param array $links
     * @param string $file
     * @return array
     */
    public function row_meta($links, $file)
    {
        if ('super-element/super-element.php' !== $file) {
            return $links;
        }

        $row_meta[] = '<a href="https://redqsupport.ticksy.com/" target="_blank">' . __('Support', 'superelements-elementor-addons-widgets-templates') . '</a>';

        return array_merge($links, $row_meta);
    }

    /**
     * Initialize singleton instance
     *
     * @return \SuperElement
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('REDQ_SE_VERSION', self::version);
        define('REDQ_SE_FILE', __FILE__);
        define('REDQ_SE_PATH', __DIR__);
        define('REDQ_SE_URL', plugins_url('', REDQ_SE_FILE));
        define('REDQ_SE_ASSETS', REDQ_SE_URL . '/assets');
        define('REDQ_SE_IMAGE', REDQ_SE_URL . '/assets/images/');
        define('REDQ_SE_ELEMENTOR_ASSETS', REDQ_SE_URL . '/includes/Elementor/');
        define('REDQ_SE_INC_ASSETS', REDQ_SE_URL . '/includes/');
        define('REDQ_SE_DIR_PATH', plugin_dir_path(__FILE__));
        define('REDQ_SE_ELEMENTOR', REDQ_SE_DIR_PATH . 'includes/Elementor/');
        define('REDQ_SE_INC', REDQ_SE_DIR_PATH . 'includes/');
        define('REDQ_SE_DIST', REDQ_SE_URL . '/dist');
    }

    /**
     * Plugin information
     *
     * @return void
     */
    public function activate()
    {
        $installer = new SuperElement\Installer();
        $installer->run();
    }

    /**
     * Load plugin files
     *
     * @return void
     */
    public function init_plugin()
    {
        new SuperElement\Assets();
        // Modules / Animation
        new SuperElement\Modules\AnimatedImage();
        new SuperElement\SuperElement_Ajax();
        new SuperElement\Load_Elementor();
        new SuperElement\Generator();
        new SuperElement\Modules\Controls_Ajax_Select2_Api();
        new SuperElement\Modules\Init();

        if (is_admin()) {
            new SuperElement\Admin();
           \SuperElement\Templates\TemplateImport::instance()->load();
            \SuperElement\Templates\Load::instance()->load();
            \SuperElement\Templates\TemplatesInit::instance()->init();
        }
    }

    /**
     * Plugin text-domain
     *
     * @return null
     */
    public function text_domain()
    {
        load_plugin_textdomain('superelements-elementor-addons-widgets-templates', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }
    /**
	 * Compatibility Checks
	 *
	 * Checks whether the site meets the addon requirement.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function is_compatible() {

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}
		return true;
	}
    /**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'superelements-elementor-addons-widgets-templates' ),
			'<strong>' . esc_html__( 'Superelements', 'superelements-elementor-addons-widgets-templates' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'superelements-elementor-addons-widgets-templates' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', wp_kses_post($message) );

	}

}

/**
 * Initialize main plugin
 *
 * @return \SuperElement
 */
function redq_se_super_elements()
{
    return SuperElements::init();
}

redq_se_super_elements();