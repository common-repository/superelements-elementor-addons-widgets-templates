<?php 
namespace SuperElement\Modules;

defined( 'ABSPATH' ) || exit;

class Init {

	public function __construct() {
		
		// Initilizating control hooks
		add_action( 'elementor/controls/register', array( $this, 'ajax_select2' ), 11 );
	}

	public function ajax_select2( $controls_manager ) {
		$controls_manager->register( new \SuperElement\Modules\Controls\Ajax_Select2() );
		$controls_manager->register( new \SuperElement\Modules\Controls\MetControl() );
	}
}
