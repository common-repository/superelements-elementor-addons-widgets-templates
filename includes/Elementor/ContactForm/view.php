<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 ?>
<div class="cf7_form_container se-contact-form se-overflow-hidden">
    <div class="cf7_form">
        <?php echo wp_kses(do_shortcode('[contact-form-7 id="' . $settings['form_shortcode'] . '"]'), redq_se_kses_allowed_html()); ?>
    </div>
</div>