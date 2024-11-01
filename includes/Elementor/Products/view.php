<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="se-products-container">
    <?php echo wp_kses_post($products->get_content()); ?>
</div>
