<?php
  
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function redq_se_generate_cache_key($args, $identifier, $option_key = 'redq_se_cache_keys')
{
    $key = md5(serialize($args));
    $cache_key = "$identifier:$key";

    $all_keys = get_option($option_key, []);
    if (!in_array($cache_key, $all_keys)) {
        $all_keys[] = $cache_key;
    }

    update_option($option_key, array_unique($all_keys));

    return $cache_key;
}
function redq_se_clear_cache_keys($identifier)
{
    $cache_keys = get_option('redq_se_cache_keys', []);
    foreach ($cache_keys as $cache_key) {
        if (in_array($identifier, explode(':', $cache_key))) {
            delete_transient($cache_key);
        }
    }
}
function redq_se_format_key_value_array($payloads)
{
    $result = [];

    if (empty($payloads)) {
        return $result;
    }

    foreach ($payloads as $key => $payload) {
        $result[$payload->meta_key] = $payload->meta_value;
    }

    return $result;
}

function redq_se_prepare_blog_grid($ids)
{
    $results = [];

    foreach ($ids as $key => $id) {

        $date_format = get_option('date_format');
        $post_date = get_post_time($date_format, false, $id, true);

        $results[] = [
            'id'        => $id,
            'title'     => get_the_title($id),
            'permalink' => get_the_permalink($id),
            'image'     => get_the_post_thumbnail_url($id, 'full'),
            'date'      => $post_date
        ];
    }

    return $results;
}
if(!function_exists('redq_se_get_product_id')){
    function redq_se_get_product_id () {
        $args = array(
            'fields'      => 'ids',
            'numberposts' => 1,
            'post_type'   => 'product'
        );
        $posts = get_posts($args);
        $post_id = isset($posts[0]) ? $posts[0] : '';
        return $post_id;
    }
}

function redq_se_kses_allowed_html() {
    $allowed_tags = array(
        'a' => array(
            'href' => true,
            'title' => true,
            'target' => true,
            'rel' => true,
        ),
        'img' => array(
            'src' => true,
            'alt' => true,
            'width' => true,
            'height' => true,
            'class' => true,
            'id' => true,
        ),
        'p' => array(
            'class' => true,
            'id' => true,
        ),
        'br' => array(),
        'strong' => array(),
        'em' => array(),
        'ul' => array(
            'class' => true,
            'id' => true,
        ),
        'ol' => array(
            'class' => true,
            'id' => true,
        ),
        'li' => array(
            'class' => true,
            'id' => true,
        ),
        'h1' => array(
            'class' => true,
            'id' => true,
        ),
        'h2' => array(
            'class' => true,
            'id' => true,
        ),
        'h3' => array(
            'class' => true,
            'id' => true,
        ),
        'h4' => array(
            'class' => true,
            'id' => true,
        ),
        'h5' => array(
            'class' => true,
            'id' => true,
        ),
        'h6' => array(
            'class' => true,
            'id' => true,
        ),
        'blockquote' => array(
            'cite' => true,
        ),
        'code' => array(
            'class' => true,
            'id' => true,
        ),
        'pre' => array(
            'class' => true,
            'id' => true,
        ),
        'input' => array(
            'type' => true,
            'name' => true,
            'value' => true,
            'placeholder' => true,
            'id' => true,
            'class' => true,
            'checked' => true,
            'disabled' => true,
            'readonly' => true,
            'size' => true,
            'maxlength' => true,
            'min' => true,
            'max' => true,
            'pattern' => true,
            'step' => true,
            'required' => true,
            'autocomplete' => true,
        ),
        'select' => array(
            'name' => true,
            'id' => true,
            'class' => true,
            'disabled' => true,
            'required' => true,
        ),
        'option' => array(
            'value' => true,
            'selected' => true,
        ),
        'textarea' => array(
            'name' => true,
            'id' => true,
            'class' => true,
            'rows' => true,
            'cols' => true,
            'disabled' => true,
            'readonly' => true,
            'placeholder' => true,
            'maxlength' => true,
            'required' => true,
        ),
        'form' => array(
            'action' => true,
            'method' => true,
            'id' => true,
            'class' => true,
            'enctype' => true,
        ),
        'label' => array(
            'for' => true,
            'class' => true,
        ),
        'button' => array(
            'type' => true,
            'name' => true,
            'value' => true,
            'class' => true,
            'disabled' => true,
        ),
        'table' => array(
            'class' => true,
            'id' => true,
            'border' => true,
            'cellspacing' => true,
            'cellpadding' => true,
        ),
        'thead' => array(),
        'tbody' => array(),
        'tfoot' => array(),
        'tr' => array(
            'class' => true,
            'id' => true,
        ),
        'th' => array(
            'class' => true,
            'id' => true,
            'scope' => true,
            'colspan' => true,
            'rowspan' => true,
        ),
        'td' => array(
            'class' => true,
            'id' => true,
            'colspan' => true,
            'rowspan' => true,
            'headers' => true,
        ),
        'div' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'span' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'section' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'article' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'header' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'footer' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'nav' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'aside' => array(
            'class' => true,
            'id' => true,
            'style' => true,
        ),
        'noscript' => array(
            'class' => true,
            'id' => true,
        ),
    );

    return $allowed_tags;
}
/**
 * Sanitize an array of data.
 *
 * This function recursively sanitizes each element in the array.
 * It applies specific sanitization functions based on the data type.
 *
 * @param array $data The data to sanitize.
 * @return array The sanitized data.
 */
function redq_se_sanitize_data_array($data) {
    // Ensure it's an array
    if (!is_array($data)) {
        return array();
    }

    // Iterate through the array and sanitize each element
    foreach ($data as $key => &$value) {
        if (is_array($value)) {
            // Recursively sanitize array elements
            $value = redq_se_sanitize_data_array($value);
        } else {
            // Apply appropriate sanitization based on expected data type
            switch ($key) {
                case 'name':
                    $value = sanitize_text_field($value);
                    break;
                case 'email':
                    $value = sanitize_email($value);
                    break;
                case 'url':
                    $value = esc_url_raw($value);
                    break;
                default:
                    $value = sanitize_text_field($value);
                    break;
            }
        }
    }

    return $data;
}