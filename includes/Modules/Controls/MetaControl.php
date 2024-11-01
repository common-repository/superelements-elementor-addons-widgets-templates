<?php 
namespace SuperElement\Modules\Controls;

defined( 'ABSPATH' ) || exit;

class MetControl extends \Elementor\Base_Data_Control {

	public function get_api_url() {
		return get_rest_url() . 'superelement/v1';
	}

	/**
	 * Get select2 control type.
	 *
	 * Retrieve the control type, in this case `select2`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'superMeta';
	}

	/**
	 * Enqueue ontrol scripts and styles.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
	
		// Register the script with version and set it to load in the footer.
		wp_register_script('superelements-elementor-addons-widgets-templates-js-ajaxchoose-control', REDQ_SE_ASSETS . '/js/ajaxchoose.js', ['jquery'], '1.0.0', true);
	
		// Enqueue the script.
		wp_enqueue_script('superelements-elementor-addons-widgets-templates-js-ajaxchoose-control');
	}	

	/**
	 * Get select2 control default settings.
	 *
	 * Retrieve the default settings of the select2 control. Used to return the
	 * default settings while initializing the select2 control.
	 *
	 * @since 1.8.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return array(
			'options'        => array(),
			'multiple'       => false,
			'select2options' => array(),
		);
	}


	/**
	 * Render select2 control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
	}
}
