<?php
/**
 * Plugin Name: WooCommerce Peakerr Integration (Fixed)
 * Description: Sends WooCommerce orders to Peakerr using variation quantity as API quantity.
 * Version: 1.8
 * Author: JM
 */

if (!defined('ABSPATH')) exit;

// 1. Add custom field to checkout
add_action('woocommerce_after_order_notes', 'peakerr_custom_checkout_field');
function peakerr_custom_checkout_field($checkout) {
    echo '<div id="peakerr_custom_checkout_field"><h2>' . __('Peakerr Info') . '</h2>';
    woocommerce_form_field('peakerr_profile_url', array(
        'type' => 'url',
        'class' => array('form-row-wide'),
        'label' => __('Profile/Post URL'),
        'required' => true,
        'placeholder' => 'https://instagram.com/customerprofile'
    ), $checkout->get_value('peakerr_profile_url'));
    echo '</div>';
}

add_action('woocommerce_checkout_update_order_meta', 'peakerr_save_checkout_field');
function peakerr_save_checkout_field($order_id) {
    if (!empty($_POST['peakerr_profile_url'])) {
        update_post_meta($order_id, 'peakerr_profile_url', esc_url_raw($_POST['peakerr_profile_url']));
    }
}

// 2. Add Peakerr service ID to product
add_action('woocommerce_product_options_general_product_data', 'add_peakerr_service_id_field');
function add_peakerr_service_id_field() {
    echo '<div class="options_group show_if_simple show_if_variable show_if_external">';
    woocommerce_wp_text_input(array(
        'id' => '_peakerr_service_id',
        'label' => __('Peakerr Service ID', 'woocommerce'),
        'desc_tip' => true,
        'description' => __('Enter the Peakerr Service ID.'),
        'type' => 'text',
    ));
    echo '</div>';
}

add_action('woocommerce_process_product_meta', 'save_peakerr_service_id_field');
function save_peakerr_service_id_field($post_id) {
    if (isset($_POST['_peakerr_service_id'])) {
        update_post_meta($post_id, '_peakerr_service_id', sanitize_text_field($_POST['_peakerr_service_id']));
    }
}

// 3. Hide default WooCommerce quantity field
add_filter('woocommerce_is_sold_individually', 'peakerr_hide_quantity_input', 10, 2);
function peakerr_hide_quantity_input($return, $product) {
    if ($product->is_type('variable')) {
        $peakerr_id = get_post_meta($product->get_id(), '_peakerr_service_id', true);
        if (!empty($peakerr_id)) return true;
    }
    return $return;
}

// 4. Send API request on order status change
add_action('woocommerce_order_status_changed', 'send_peakerr_order_on_status_change', 10, 4);
function send_peakerr_order_on_status_change($order_id, $old_status, $new_status, $order) {
    if ($new_status === 'processing' || $new_status === 'completed') {
        if (get_post_meta($order_id, '_peakerr_order_id', true)) return;

        $apiKey = defined('PEAKERR_API_KEY') ? PEAKERR_API_KEY : 'your_api_key_here';
        $link = get_post_meta($order_id, 'peakerr_profile_url', true);
        if (!$link) return;

        $items = $order->get_items();
        $peakerr_order_ids = [];

        foreach ($items as $item) {
            $product = $item->get_product();
            if (!$product) continue;

            $product_id = $product->get_id();
            if ($product->is_type('variation')) {
                $product_id = $product->get_parent_id();
            }

            $serviceID = get_post_meta($product_id, '_peakerr_service_id', true);
            $product_name = $item->get_name();

            $quantity = 0;
            if ($product->is_type('variation')) {
                $variation_data = $product->get_variation_attributes();
                foreach ($variation_data as $key => $value) {
                    if (strpos($key, 'quantity') !== false) {
                        $quantity = (int) preg_replace('/\D/', '', $value);
                        break;
                    }
                }
            }

            if (!$serviceID) {
                $order->add_order_note("❌ Skipped $product_name: No Peakerr Service ID set.");
                continue;
            }

            // Check if quantity is below the minimum threshold (10 in this case)
            if ($quantity < 10) {  
                $order->add_order_note("❌ Skipped $product_name: Quantity $quantity is below minimum 10.");
                continue;
            }

            // Send order to Peakerr
            $response = sendOrderToPeakerr($apiKey, $serviceID, $link, $quantity);
            if (!empty($response['order'])) {
                $peakerr_order_ids[] = $response['order'];
                $order->add_order_note("✅ Sent to Peakerr: $product_name | Order ID: {$response['order']} | Quantity: $quantity");
            } else {
                $order->add_order_note("❌ Failed to send $product_name to Peakerr. Response: " . json_encode($response));
            }
        }

        if (!empty($peakerr_order_ids)) {
            update_post_meta($order_id, '_peakerr_order_id', implode(',', $peakerr_order_ids));
        }
    }
}

// 5. Send API request to Peakerr
function sendOrderToPeakerr($apiKey, $serviceID, $link, $quantity) {
    $url = 'https://peakerr.com/api/v2';
    $response = wp_remote_post($url, array(
        'body' => array(
            'key'      => $apiKey,
            'action'   => 'add',
            'service'  => $serviceID,
            'link'     => $link,
            'quantity' => $quantity,
        ),
        'timeout' => 15,
    ));
    if (is_wp_error($response)) {
        return array('error' => $response->get_error_message());
    }
    return json_decode(wp_remote_retrieve_body($response), true);
}
