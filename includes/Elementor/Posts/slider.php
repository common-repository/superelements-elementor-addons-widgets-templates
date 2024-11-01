<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$posts = $this->get_blog_posts($args, $post_cat);
if (empty($posts) || !is_array($posts)) {
    printf("<h2 class='se-mb-2 se-text-center se-text-xl se-font-semibold se-uppercase se-text-brand md:se-text-2xl'>%s</h2>", esc_html__('No posts found', 'superelements-elementor-addons-widgets-templates'));
    return;
}

?>

<div class="se-post-slider" data-slick="<?php echo esc_attr(wp_json_encode($data_slick)); ?>">
    <?php foreach ($posts as $post) : ?>
    <div class="se-post-card se-overflow-hidden se-border se-border-brand/20 se-rounded-md">
        <a href="<?php echo esc_url($post['permalink']); ?>" aria-label='post view' class='se-block se-w-full se-h-auto se-aspect-video se-overflow-hidden'>
            <figure class="se-w-full se-h-full [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover">
                <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
            </figure>
        </a>
        <div class="se-post-footer se-p-2 md:se-p-3">
            <h2 class="se-post-title se-text-lg se-m-0 se-mb-4">
                <a href="<?php echo esc_url($post['permalink']); ?>" class="se-transition !se-text-inherit se-line-clamp-2"><?php echo esc_attr($post['title']); ?></a>
            </h2>
            <div class="se-post-meta se-flex se-items-center se-justify-between">
                <span class="se-post-author se-inline-block se-truncate se-max-w-[160px]"><?php echo get_the_author(); ?></span>
                <span class="se-post-date"><?php echo esc_html($post['date']); ?></span>
            </div>        
        </div>
    </div>
    <?php endforeach; ?>
</div>
