<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$posts = $this->get_blog_posts($args);
if (empty($posts) || !is_array($posts)) {
    printf("<h2 class='se-mb-2 se-text-center  se-text-red-400 se-text-xl se-font-semibold se-uppercase md:se-text-2xl'>%s</h2>", 
    esc_html__('No posts found', 'superelements-elementor-addons-widgets-templates'));
    return;
}
$post_indexs = array_keys($posts);
shuffle($post_indexs);
if(count($post_indexs)<5){
    printf("<h2 class='se-mb-2 se-text-center se-text-red-400 se-text-xl se-font-semibold se-uppercase md:se-text-2xl'>%s</h2>", 
    esc_html__('Insert More Than Five Posts In Your Site', 'superelements-elementor-addons-widgets-templates'));
 return;
}
$random_posts = [];
for ($i = 0; $i < 5; $i++) {
    $index = $post_indexs[$i];
    $random_posts[$i]= $posts[$index];
}
?>

<!-- masonry grid start  -->
<div class="se-grid se-grid-cols-1 sm:se-grid-cols-2 lg:se-grid-cols-3 se-gap-y-6 se-gap-x-6 xl:se-gap-x-8 se-items-start">
    <?php $post=$random_posts[0];?>
    <!-- classic post structure  -->
    <div class="se-masonry-post-classic se-w-full se-group">
        <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-masonry-post-classic-image se-block se-rounded-md se-overflow-hidden se-aspect-[4/3]">
            <figure class="se-w-full se-h-full [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover">
                <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
            </figure>
        </a>
        <div class="se-masonry-post-classic-footer">
            <h3 class="se-masonry-post-classic-title se-line-clamp-2 se-text-lg"><a href="<?php  echo esc_url($post['permalink']); ?>" class="!se-text-inherit"><?php  echo esc_html($post['title']); ?></a></h3>
            <p class="se-masonry-post-classic-desc se-line-clamp-4"><?php  echo esc_html(get_post_field('post_excerpt',$post['id']));?></p>
            <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-masonry-post-classic-link se-inline-flex se-items-center se-gap-2">
                <?php echo esc_html__('Learn More', 'superelements-elementor-addons-widgets-templates'); ?>
                <span class="se-inline-block group-hover:se-translate-x-2 se-transition-transform se-duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="se-w-4 se-h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
            </a>
        </div>
    </div>

    
    <div class="se-w-full se-grid se-grid-cols-1 se-gap-y-6 xl:se-gap-y-8 se-gap-x-6">
        <!-- only text structure  -->
        <?php $post=$random_posts[1];?>
        <div class="se-masonry-post-text se-bg-[#F0F0F4] se-p-6 se-rounded-md hover:se-shadow-md se-transition-shadow se-duration-300">
            <h3 class="se-masonry-post-text-title se-text-lg se-text-[#0f2137] se-m-0 se-line-clamp-3">
                <a href="<?php  echo esc_url($post['permalink']); ?>" class="!se-text-inherit">
                   <?php  echo esc_html($post['title']); ?>
                </a>
            </h3>
        </div>

        <!-- classic post structure  -->
        <?php $post=$random_posts[2];?>
        <div class="se-masonry-post-classic se-group">
            <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-masonry-post-classic-image se-block se-rounded-md se-overflow-hidden se-aspect-[4/3]">
                <figure class="se-w-full se-h-full [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover"> 
                   <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
                </figure>
            </a>
            <div class="se-masonry-post-classic-footer">
                <h3 class="se-masonry-post-classic-title se-line-clamp-2 se-text-lg"><a href="<?php  echo esc_url($post['permalink']); ?>" class="!se-text-inherit"> <?php  echo esc_html($post['title']); ?></a></h3>
                <p class="se-masonry-post-classic-desc se-line-clamp-2"><?php  echo esc_html(get_post_field('post_excerpt',$post['id']));?></p>
                <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-masonry-post-classic-link se-inline-flex se-items-center se-gap-2">
                    <?php echo esc_html__('Learn More', 'superelements-elementor-addons-widgets-templates') ?>
                    <span class="se-inline-block group-hover:se-translate-x-2 se-transition-transform se-duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="se-w-4 se-h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- text on image posts  -->
    <div class="se-w-full se-grid se-grid-cols-1 sm:se-col-span-2 sm:se-grid-cols-2 lg:se-col-span-1 lg:se-grid-cols-1 se-gap-y-6 xl:se-gap-y-8 se-gap-x-6">
        <?php $post=$random_posts[3];?>
        <div class="se-masonry-post-modern se-relative se-group se-overflow-hidden [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover">
            <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
            <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-absolute se-inset-0 se-w-full se-h-full se-rounded-md se-overflow-hidden se-flex se-items-end">
                <span class="se-masonry-post-modern-title se-line-clamp-2 se-text-lg se-text-white"><?php  echo esc_html($post['title']); ?></span>
            </a>
        </div>
        <?php $post=$random_posts[4];?>
        <div class="se-masonry-post-modern se-relative se-group se-overflow-hidden [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover">
            <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
            <a href="<?php  echo esc_url($post['permalink']); ?>" class="se-absolute se-inset-0 se-w-full se-h-full se-rounded-md se-overflow-hidden se-flex se-items-end">
                <span class="se-masonry-post-modern-title se-line-clamp-2 se-text-lg se-text-white"><?php  echo esc_html($post['title']); ?></span>
            </a>
        </div>
    </div>
</div> 
<!-- masonry grid end  -->


<?php if(isset($settings['show_button'])&& $settings['show_button']==='true'):?>
    <div>
        <a <?php echo esc_attr($this->get_render_attribute_string('button_link')); ?> class='se-list-all-button'><?php echo esc_html($settings['text_all_post']); ?></a>
    </div>
<?php endif?>
