<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $shortcode = do_shortcode( shortcode_unautop( '[woocommerce_checkout]' ) );
?>

<div class="se-checkout-wrapper">
<?php echo wp_kses($shortcode, redq_se_kses_allowed_html());?>
</div>