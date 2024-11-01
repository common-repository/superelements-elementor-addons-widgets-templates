<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$posts = $this->get_blog_posts($args);
if (empty($posts) || !is_array($posts)) {
    printf("<h2 class='se-mb-2 se-text-center se-text-xl se-font-semibold se-uppercase se-text-brand md:se-text-2xl'>%s</h2>",  esc_html__('No posts found', 'superelements-elementor-addons-widgets-templates'));
    return;
}
?>
<?php foreach ($posts as $post) :?>
    <div class="post_card">
        <div>
            <a href="<?php echo esc_url($post['permalink']); ?>" aria-label='post view' class='post-image-link'>
                <?php echo get_the_post_thumbnail($post['id'], array(507,300))?>
             </a>
        </div>
        <div>
           
            <h2 class="post_title">
                <a href="<?php echo esc_url($post['permalink']); ?>"><?php echo esc_attr($post['title']); ?></a>
            </h2>
            <div>
                <div class="post_author"><?php echo get_the_author(); ?></div>
                <div class="post_date"><?php echo esc_html($post['date']); ?></div>
            </div>
           
        </div>
    </div>
<?php endforeach; ?>
<?php if(isset($settings['show_button'])&& $settings['show_button']==='true'):?>
    <div>
        <a <?php echo esc_attr($this->get_render_attribute_string('button_link')); ?> class='list_all_post'><?php echo esc_html($settings['text_all_post']); ?></a>
    </div>
<?php endif?>
