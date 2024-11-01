<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$layout = $settings['layout'];
$testimonials = $this->get_testimonials();
if (empty($testimonials) || !is_array($testimonials)) {
    printf("<h2 class='se-mb-6 se-text-center se-text-xl se-font-semibold se-uppercase se-text-brand md:se-text-2xl'>%s<h2>", 
    esc_html__('NO TESTIMONIALS FOUND IN YOUR SITE', 'superelements-elementor-addons-widgets-templates'));
    return;
}

$counter = 0;
$groupSize = 2;
?>

<div class="testimonial-slider <?php echo esc_attr($layout)?>" data-slick="<?php echo esc_attr(wp_json_encode($data_slick)); ?>">
    <?php foreach ($testimonials as $testimonial) : ?>
        <?php
        $post_id = $testimonial->ID;
        $author_name = get_post_meta($post_id, '_se_author_name', true);
        $author_meta = get_post_meta($post_id, '_se_author_meta', true);
        $rating = get_post_meta($post_id, '_se_rating', true);
        $rating_full = $rating;
        $rating_offset = 5 - $rating;
        ?>

        <?php if ($counter % $groupSize === 0) : ?>
            <div class="slide-container se-transition-all se-duration-300">
        <?php endif; ?>

            <div class="slide-box se-mb-6 se-bg-white se-border se-border-brand/20 se-rounded-lg se-p-5">
                <?php if (isset($settings['rating_switch']) && $settings['rating_switch'] === 'true') : ?>
                    <div class="rating_star se-flex se-items-center se-gap-0">
                        <?php for ($i = 0; $i < $rating_full; $i++) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-5 se-h-5 active">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < $rating_offset; $i++) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="se-w-5 se-h-5">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        <?php endfor; ?>
                    </div>
                <?php endif ?>

                <?php if (isset($settings['title_switch']) && $settings['title_switch'] === 'true') : ?>
                    <h3 class="testimonial-title se-text-xl"><?php echo esc_html(get_the_title($testimonial)); ?></h3>
                <?php endif ?>

                <p class="testimonial-desc se-text-base se-pb-6 se-leading-6"><?php echo esc_html($testimonial->post_excerpt); ?></p>

                <div class="se-flex se-items-center se-gap-4">
                    <figure class="author-image se-w-10 se-h-10 se-overflow-hidden [&>img]:se-w-full [&>img]:!se-h-full [&>img]:se-object-cover se-rounded-full">
                        <?php echo get_the_post_thumbnail($testimonial->ID, [56, 55, true]); ?>
                    </figure>
                    <div>
                        <h4 class="author-name se-text-xl se-m-0"><?php echo esc_html($author_name); ?></h4>
                        <span class="author-meta se-block"><?php echo esc_html($author_meta); ?></span>
                    </div>
                </div>
            </div>

        <?php if ($counter % $groupSize === $groupSize - 1) : ?>
            </div> <!-- Close the slide-container after every group of two -->
        <?php endif; ?>

        <?php $counter++; ?>
    <?php endforeach; ?>

    <?php
    // Close the slide-container if it's not closed properly
    if ($counter % $groupSize !== 0) {
        echo '</div>';
    }
    ?>
</div>
