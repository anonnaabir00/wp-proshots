<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class API {

    public static function init() {
        $self = new self();
        add_action('rest_api_init', array($self,'custom_get_products_endpoint'));
    }

    public function custom_get_products_endpoint() {
        register_rest_route('proshots/v1', '/get-products', array(
            'methods'  => 'GET',
            'callback' => array($this, 'custom_get_products'),
        ));
    }    

    public function custom_get_products($request) {
        $params = $request->get_params();
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
        );

        // Add any additional query parameters
        if (!empty($params['category'])) {
            $args['category'] = $params['category'];
        }

        // Fetch products
        $products = get_posts($args);

        // Prepare response data
        $data = array();
        foreach ($products as $product) {
            // Get product object
            $_product = wc_get_product($product->ID);

            // Get product image
            $image_id = $_product->get_image_id();
            $image_url = wp_get_attachment_image_url($image_id, 'full');

            $data[] = array(
                'id'          => $product->ID,
                'name'        => $product->post_title,
                'permalink'   => get_permalink($product->ID),
                'description' => $product->post_excerpt,
                'image'       => $image_url,
            );
        }

        return rest_ensure_response($data);
    }

    
    
}