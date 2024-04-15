<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Helper {  

    public static function get_products($products = -1) {
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $products,
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

            // Get product price
            $price = $_product->get_price_html();

            // Get product category
            $categories = wp_get_post_terms($product->ID, 'product_cat');
            $category = !empty($categories) ? $categories[0]->name : '';

            // Get product reviews count and average rating
            $reviews_count = $_product->get_review_count();
            $average_rating = $_product->get_average_rating();

            $data[] = array(
                'id'          => $product->ID,
                'name'        => $product->post_title,
                'permalink'   => get_permalink($product->ID),
                'description' => $product->post_excerpt,
                'image'       => $image_url,
                'price'         => $price,
                'reviews_count' => $reviews_count,
                'average_rating'=> $average_rating,
            );
        }

        return $data;
    }

    
    
}