<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Admin {

    public static function init() {
        $self = new self();
        add_action( 'admin_menu', array( $self, 'add_admin_menu' ) );
        add_action( 'admin_enqueue_scripts', array( $self, 'proshot_admin_scripts' ) );
    }

    public function add_admin_menu(){
        add_menu_page( 
            __( 'Product Showcase For WooCommerce', 'wp-proshots' ),
            'Product Showcase For WooCommerce',
            'manage_options',
            'wp-proshots-options',
            array($this,'proshots_callback'),
            plugin_dir_url( __FILE__ ) . 'assets/icon-16x16.png',
        ); 
    }
    
    public function proshots_callback(){
        ?>
        <div id="proshots-admin"></div>
        <?php
    }

    public function proshot_admin_scripts(){
        $current_screen = get_current_screen();
        $proshot_screen = 'toplevel_page_wp-proshots-options';

        if ($proshot_screen === $current_screen->base) {
            wp_enqueue_style('proshots-admin-style', PROSHOT_ROOT_DIR_URL . 'includes/assets/style.css');
            wp_enqueue_style('proshots-admin-main', PROSHOT_ROOT_DIR_URL . 'includes/assets/admin.css');
            wp_enqueue_script( 'proshots-admin-script', PROSHOT_ROOT_DIR_URL . 'includes/assets/admin.js',[], true, '1.0' );
        }
    }
}