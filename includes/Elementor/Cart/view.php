<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="se-cart-wrapper">
    <?php //wc_get_template('cart/cart.php'); 
    if(is_object( WC()->cart)){
        if ( WC()->cart->is_empty() ) {
            wc_get_template( 'cart/cart-empty.php' );
        } else {
            wc_get_template( 'cart/cart.php' );
        }
    }else{
        wc_get_template( 'cart/cart-empty.php' );
    }
    ?>
</div>