<?php

namespace SuperElement;

namespace SuperElement;

use SuperElement\Traits\WidgetsList;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class SuperElement_Ajax
 *
 * Handles AJAX requests for the Super Elements plugin.
 */
class SuperElement_Ajax
{
    use WidgetsList;

    /**
     * Constructor to initialize AJAX actions.
     */
    public function __construct()
    {
        /**
         * Super Elements subscription form AJAX.
         */
        add_action('wp_ajax_se_subscription_form', [$this, 'se_subscription_form']);
        add_action('wp_ajax_nopriv_se_subscription_form', [$this, 'se_subscription_form']);
        
        /**
         * Save widgets settings AJAX.
         */
        add_action('wp_ajax_se_save_widgets_settings', [$this, 'se_save_widgets_settings']);
        
        /**
         * Get mini cart content AJAX.
         */
        add_action('wp_ajax_get_mini_cart_content', [$this,'get_mini_cart_content']);
        add_action('wp_ajax_nopriv_get_mini_cart_content', [$this,'get_mini_cart_content']);
    }

    /**
     * Save the active widget settings.
     *
     * @return void
     */
    public function se_save_widgets_settings()
    {
        check_ajax_referer('redq-se-nonce', 'security');

        if (isset($_POST['values'])) {
            parse_str(sanitize_text_field(wp_unslash($_POST['values'])), $data);
        } else {
            wp_send_json_error([
                'message' => esc_html__('Something went wrong.', 'superelements-elementor-addons-widgets-templates'),
            ]);
        }

        $settings_value = [];
        $widgets_list = array_merge(array_keys($this->get_widgets()), array_keys($this->get_woo_widgets()));

        foreach ($widgets_list as $widget) {
            $name = strtolower($widget);
            $settings_value[$name] = isset($data[$name]) ? 1 : 0;
        }

        update_option('redq_se_elementor_widgets_settings', $settings_value);

        wp_send_json_success([
            'message' => esc_html__('Successfully Saved.', 'superelements-elementor-addons-widgets-templates'),
        ]);
    }

    /**
     * Handle the subscription form submission.
     *
     * @return void
     */
    public function se_subscription_form()
    {
        check_ajax_referer('redq-se-nonce', 'security');
        
        if (!empty($_REQUEST['data'])) {
            parse_str(sanitize_text_field(wp_unslash($_POST['data'])), $subscription_data);
            $this->subscription_form_data($subscription_data);
        }
        
        wp_die();
    }

    /**
     * Process the subscription form data and communicate with Mailchimp API.
     *
     * @param array $data Subscription form data.
     * @return void
     */
    public function subscription_form_data($data)
    {
        $apiKey = $data['api'];
        $audienceId = $data['audienceid'];
        $dc = $data['dc'];
        $email = $data['email'];
        
        $url = "https://$dc.api.mailchimp.com/3.0/lists/$audienceId/members";
        // Post data to Mailchimp API
        $json_data = wp_json_encode([
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    
        $args = [
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode("user:$apiKey"),
                'Content-Type' => 'application/json',
            ],
            'body' => $json_data,
            'method' => 'POST',
            'data_format' => 'body',
        ];
        // Post data to Mailchimp API
        $response = wp_remote_post($url, $args);
    
        if (is_wp_error($response)) {
            wp_send_json_success([
                'message' => $response->get_error_message(),
                'error' => 'wp-error',
            ]);
        } else {
            $response_code = wp_remote_retrieve_response_code($response);
            $response_body = wp_remote_retrieve_body($response);
    
            if ($response_code == 200) {
                $response_data = json_decode($response_body, true);
                if (!empty($response_data['id'])) {
                    wp_send_json_success([
                        'message' => esc_html__('Subscription successful', 'superelements-elementor-addons-widgets-templates'),
                        'error' => 'success',
                    ]);
                } else {
                    wp_send_json_success([
                        'message' => esc_html__('The subscription has not been successful. Kindly verify your email and attempt the process once more', 'superelements-elementor-addons-widgets-templates'),
                        'error' => 'failed',
                    ]);
                }
            } else {
                wp_send_json_success([
                    'message' => $response_body,
                    'error' => 'non-200-response',
                ]);
            }
        }
    }    

    /**
     * Get the mini cart content using WooCommerce functions.
     *
     * @return void
     */
    public function get_mini_cart_content()
    {
        woocommerce_mini_cart();
        wp_die();
    }
}
