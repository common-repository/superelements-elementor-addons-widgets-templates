<?php 
namespace SuperElement\ElementorControl\Traits;
use Elementor\Controls_Manager;
/**
 * Icon Upload Control trait
 */
if (!defined('ABSPATH')) {
    exit;
}
trait IconUploadTraits {

 protected function se_icon_upload_controls()
    {
      
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Upload Icon', 'superelements-elementor-addons-widgets-templates' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-angle-right',
					'library' => 'fa-solid',
				]
			]
		);
    }
}