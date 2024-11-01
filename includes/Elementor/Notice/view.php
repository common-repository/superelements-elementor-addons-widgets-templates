<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( \Elementor\Plugin::$instance->editor->is_edit_mode() || \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
    ?>
    <div class="woocommerce-info e-notices-demo-notice">
        <?php echo esc_html__( 'This is an example of a WooCommerce notice. (You won\'t see this while previewing your site.)', 'superelements-elementor-addons-widgets-templates' ); ?>
    </div>
    <?php
} else { ?>
    <div class="e-woocommerce-notices-wrapper e-woocommerce-notices-wrapper-loading">
        <?php woocommerce_output_all_notices(); ?>
    </div>
    <?php
}