<?php

namespace Proshots;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Admin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
    }

    public static function init() {
        $self = new self();
    }

    public function add_admin_menu(){
        add_menu_page( 
            __( 'WP Proshots', 'wp-proshots' ),
            'WP Proshots',
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
}