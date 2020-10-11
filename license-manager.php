<?php

/**
 * Register a custom post type called "License".
 *
 * @see get_post_type_labels() for label keys.
 * 
 */


        class WP_Proshots_License_Post_Type {
            
            public function __construct(){

                // Create License Post Type
                add_action( 'init', array($this,'wp_proshots_license_manager'));
                
                // Load License To Frontend
                add_action( 'woocommerce_single_product_summary', array($this,'wp_proshots_lisence_terms'), 30 );

            }
            
            
            public function wp_proshots_license_manager() {
                $labels = array(
                    'name'                  => _x( 'Licenses', 'Proshots Licenses', 'wp_proshots' ),
                    'singular_name'         => _x( 'Licenses', 'Proshots License', 'wp_proshots' ),
                    'menu_name'             => _x( 'License Manager', 'Admin Menu text', 'wp_proshots' ),
                    'name_admin_bar'        => _x( 'License Manager', 'Add New on Toolbar', 'wp_proshots' ),
                    'add_new'               => __( 'Add New', 'wp_proshots' ),
                    'add_new_item'          => __( 'Add New License', 'wp_proshots' ),
                    'new_item'              => __( 'New License', 'wp_proshots' ),
                    'edit_item'             => __( 'Edit License', 'wp_proshots' ),
                    'view_item'             => __( 'View Book', 'wp_proshots' ),
                    'all_items'             => __( 'All License', 'wp_proshots' ),
                    'search_items'          => __( 'Search License', 'wp_proshots' ),
                    'parent_item_colon'     => __( 'Parent Books:', 'wp_proshots' ),
                    'not_found'             => __( 'No License found.', 'wp_proshots' ),
                    'not_found_in_trash'    => __( 'No License found in Trash.', 'wp_proshots' ),
                    'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
                    'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
                    'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
                    'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
                    'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
                    'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
                );
             
                $args = array(
                    'labels'             => $labels,
                    'public'             => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'rewrite'            => array( 'slug' => 'license_manager' ),
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'hierarchical'       => false,
                    'menu_position'      => null,
                    'menu_icon'          => 'dashicons-admin-network',
                    'supports'           => array('title'),
                );
             
                register_post_type( 'license_manager', $args );
            }



            public function wp_proshots_lisence_terms(){

                $license = get_field('select_license_type');
                $license_type = get_field('wp_proshots_license_details', $license->ID);
                $license_description = get_field('wp_proshots_license_description', $license->ID);

                echo "
                <div class=\"license-info\">
                <p class=\"price\">".esc_html($license->post_title)."</p>
                <p>".esc_html($license_type)."</p>
                <p><a data-fancybox data-src=\"#license-description\" href=\"javascript:;\">More Details</a></p>
                </div>
                <div id=\"license-description\">
                <h2>".esc_html($license->post_title)."</h2>
                ".$license_description."
                </div>
                ";

            }


        }
 

        new WP_Proshots_License_Post_Type();






