<?php

    // All Core Files And Functions Loaded Here

    // else {
        // require_once plugin_dir_path( __FILE__ ) .'admin.php'; // Plugin Options Panel
    // }

    require_once plugin_dir_path( __FILE__ ) .'enqueue.php'; // All Enqueued Scripts
    require_once plugin_dir_path( __FILE__ ) .'load-templates.php'; // All WooCommerce Custom Templates
    require_once plugin_dir_path( __FILE__ ) .'custom-product.php'; // Stock Photo Custom Product Type Load Here
    require_once plugin_dir_path( __FILE__ ) .'admin.php'; // Plugin Options Panel
    require_once plugin_dir_path( __FILE__ ) .'custom-fields.php'; // All Custom Meta
    require_once plugin_dir_path( __FILE__ ) .'override.php'; // All WooComerce Override Functionality
    
    if ( in_array( 'wp-proshots-pro/proshots-pro.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        require_once ( ABSPATH . 'wp-content/plugins/wp-proshots-pro/admin.php');
        require_once ( ABSPATH . 'wp-content/plugins/wp-proshots-pro/license-manager.php');
        require_once ( ABSPATH . 'wp-content/plugins/wp-proshots-pro/intregation.php');
    }



  


        // Get Watermark Image Data From jQuery    
        function wp_proshots_get_ajax_data(){
            $wp_proshots_ajax_image_data = $_POST['data'];
            echo $wp_proshots_ajax_image_data;  
            die();
        }

        add_action('wp_ajax_nopriv_wp_proshots_get_image_data','wp_proshots_get_ajax_data');
        add_action('wp_ajax_wp_proshots_get_image_data','wp_proshots_get_ajax_data');