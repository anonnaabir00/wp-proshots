<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Assets {

    public static function init() {
        $self = new self();
        add_action('wp_enqueue_scripts', array( $self,'proshots_assets'));
    }
    
    public function proshots_assets(){
        wp_enqueue_style( 'proshots_style', PROSHOT_ROOT_DIR_URL . 'includes/assets/style.css' );
        wp_enqueue_script( 'proshots_script', PROSHOT_ROOT_DIR_URL . 'includes/assets/main.js',[], true, '1.0' );
    }
}