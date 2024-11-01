<?php 
     if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-additional-info">
<?php 
// Get Product Id 
$product_id = $product_post_id;
$product = wc_get_product($product_id);

if ($product) {
    $heading = apply_filters( 'woocommerce_product_additional_information_heading', esc_html__( 'Additional information', 'superelements-elementor-addons-widgets-templates' ) );
    if ( $heading ) : ?>
        <h2><?php echo esc_html( $heading ); ?></h2>
    <?php endif;
    do_action( 'woocommerce_product_additional_information', $product );
} else {
   while(have_posts()) : the_post();
        if($product) :
            $heading = apply_filters( 'woocommerce_product_additional_information_heading', esc_html__( 'Additional information', 'superelements-elementor-addons-widgets-templates' ) );
            if ( $heading ) : ?>
                <h2><?php echo esc_html( $heading ); ?></h2>
            <?php endif;
            do_action( 'woocommerce_product_additional_information', $product );        
        endif;
   endwhile;
    wp_reset_postdata();
}

?>

</div>