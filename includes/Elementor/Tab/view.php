<?php
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $cards = $settings['cards'];
    if (empty($cards)) {
        return;
    }
    $first_tab = true;
    $first_content=true;
?>
<!-- tabs  -->
<div class='se-tab-container se-w-full se-overflow-x-auto se-overflow-y-hidden se-pb-1'>
    <div class="se-tab-wrapper se-flex se-items-center se-justify-center se-gap-5 se-border-b se-border-gray-300 se-mx-auto">
    <?php foreach ($cards as $tab) : ?> 
        <?php $active_tab = $first_tab ? 'se-tab-item-active' : ''; ?>
        <?php $first_tab = false; ?>
        <button id="unique-<?php echo esc_attr($tab['_id']); ?>" class="se-tab-item se-group se-relative se-flex se-items-center se-gap-2 lg:se-gap-3 2xl:se-gap-4 se-border-none se-outline-none focus:se-border-none focus:se-outline-none focus:se-bg-brand/50 focus:se-text-brand hover:se-bg-brand/50 hover:se-text-white se-text-brand se-px-4 se-py-3 <?php echo esc_attr( $active_tab )?>">
            <span class="se-tab-item-icon se-relative se-z-10 se-transition-colors se-duration-200 [&>img]:!se-w-5 [&>img]:!se-h-5 md:[&>img]:!se-w-6 md:[&>img]:!se-h-6 2xl:[&>img]:!se-w-7 2xl:[&>img]:!se-h-7 [&>svg]:se-w-5 [&>svg]:se-h-5 md:[&>svg]:se-w-6 md:[&>svg]:se-h-6 2xl:[&>svg]:se-w-7 2xl:[&>svg]:se-h-7 [&>img]:se-object-cover [&>img]:!se-rounded-full [&>svg]:se-rounded-full se-overflow-hidden">
               <?php if (isset($tab['image']['url']) && !empty($tab['image']['url'])) : ?>
                  <?php echo wp_get_attachment_image($tab['image']['id'], 'full'); ?>
                <?php else:?>
                  <?php \Elementor\Icons_Manager::render_icon( $tab['icon'], [ 'aria-hidden' => 'true' ] ); ?>
               <?php endif?>
            </span>
            <span class="se-relative se-z-10"><?php echo esc_html($tab['title']); ?></span>
            <span class="se-tab-item-active-state se-inline-block se-absolute se-transition-all se-duration-500 se-ease-in-out se-w-0 se-h-1 se-bottom-0 se-left-1/2 se-bg-brand -se-translate-x-1/2 group-hover:se-w-full group-[.se-tab-item-active]:se-w-full group-[.se-tab-item-active]:se-h-1  group-[.se-tab-item-active]:se-bg-brand"></span>
        </button>
    <?php endforeach?>
    </div>
</div>

<!-- tab panels  -->
<div class="se-tab-content-container">
    <div class="se-tab-content-wrapper">
    <?php foreach ($cards as $tab) : ?> 
        <?php $active_content = $first_content ? 'se-tab-content-active' : ''; ?>
        <?php $first_content = false; ?>
        <div class="se-tab-content unique-<?php echo esc_attr($tab['_id']); ?> se-hidden [&.se-tab-content-active]:se-block se-justify-center se-mt-6 lg:se-mt-10 [&>p]:se-opacity-0 [&.se-tab-content-active>p]:se-opacity-100 [&>p]:se-transition-all [&>p]:se-flex [&>p]:se-flex-wrap [&>p]:se-duration-500 [&>p>img]:se-my-10 <?php echo esc_attr($active_content)?>">
           <?php echo do_shortcode($tab['content']) ?>
        </div>
    <?php endforeach?> 
    </div>
</div>

