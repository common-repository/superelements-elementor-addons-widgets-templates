<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="menu-cart-widget">
<?php 
// Render Mini Cart
if (!empty($settings['mini_cart_content'])) { ?>
   <div class="mini-cart">
        <?php  echo wp_kses_post( do_shortcode( $settings['side_cart_content'] ) ); ?>
   </div>
<?php }

// Render Side Cart
if (!empty($settings['side_cart_content'])) { ?>
    <div class="side-cart">
        <?php  echo  wp_kses_post(do_shortcode($settings['side_cart_content'])); ?>
    </div>
<?php }

?>
</div>
