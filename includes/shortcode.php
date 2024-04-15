<?php

namespace Proshots;

use Proshots\Helper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Shortcode {

    public static function init() {
        $self = new self();
        add_shortcode('proshots_product_grid', array( $self, 'product_grid_shortcode' ));
    }

    // public function product_grid_shortcode() {
    //     ob_start();
    //     $this->custom_wc_product_display($atts);
    //     return ob_get_clean();
    // }

    public function product_grid_shortcode($atts) {
        ob_start();
        $atts = shortcode_atts(
            array(
                'products' => -1,
            ),
            $atts
        );

        $products = Helper::get_products($atts['products']);
        require_once PROSHOT_INCLUDES_DIR_PATH . 'templates/product-card.php';
        return ob_get_clean();
    }
    
}