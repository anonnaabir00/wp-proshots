<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Shortcode {

    public static function init() {
        $self = new self();
        add_shortcode('custom_wc_products', array( $self, 'custom_wc_product_shortcode' ));
    }

    public function custom_wc_product_shortcode() {
        ob_start();
        $this->custom_wc_product_display();
        return ob_get_clean();
    }

    public function custom_wc_product_display() {
        echo '<div id="proshost-products"></div>';
    }
}