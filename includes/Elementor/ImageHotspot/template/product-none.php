<?php 
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 $class = ['pointer se-peer se-absolute se-z-10'];
 $class[] = 'elementor-repeater-item-'.$pointer_id;
?>
<div class="<?php echo esc_attr(join(" ", $class)); ?>" >
    <?php include __DIR__.'/ping.php'; ?>
    <div class="se-z-10 pointer-content se-invisible se-opacity-0 se-transition-all se-duration-300 se-absolute se-w-[250px] se-bg-white se-p-[15px] se-rounded se-left-[calc(100%_+_10px)] se-top-[-20px]">
        <?php echo esc_html__('Please Select A Product', 'superelements-elementor-addons-widgets-templates');  ?>
    </div>
</div>