<?php

    /**
     *
     * @link              https://nervythemes.com/
     * @since             1.5
     * @package           Showcase your WooCommerce products beautifully.
     *
     * @wordpress-plugin
     * Plugin Name:       Product Showcase For WooCommerce
     * Plugin URI:        https://nervythemes.com/proshots-for-woocommerce
     * Description:       Showcase your WooCommerce products beautifully.
     * Version:           1.5
     * Author:            NervyThemes
     * Author URI:        https://nervythemes.com/
     * License:           GPL-2.0+
     * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain:       wp-proshots
     * Tested up to:      5.5.3
     * WC requires at least: 2.2
     * WC tested up to: 4.6.2

    */

    if ( ! defined( 'ABSPATH' ) ) {
      exit;
   }
   
   final class Proshots {
   
      private function __construct() {
         $this->define_constants();
         $this->load_dependency();
         register_activation_hook( __FILE__, [ $this, 'activate' ] );
         register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
         add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
      }
   
      public static function init() {
         static $instance = false;
   
         if ( ! $instance ) {
            $instance = new self();
         }
   
         return $instance;
      }

      public function define_constants() {
         define( 'PROSHOTS_VERSION', '1.5' );
         define( 'PROSHOT_PLUGIN_FILE', __FILE__ );
         define( 'PROSHOT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
         define( 'PROSHOT_ROOT_DIR_PATH', plugin_dir_path( __FILE__ ) );
         define( 'PROSHOT_ROOT_DIR_URL', plugin_dir_url( __FILE__ ) );
         define( 'PROSHOT_INCLUDES_DIR_PATH', PROSHOT_ROOT_DIR_PATH . 'includes/' );
         define( 'PROSHOT_PLUGIN_SLUG', 'wp-proshots' );
      }

      public function on_plugins_loaded() {
         do_action( 'proshots_loaded' );
      }

      public function init_plugin() {
         $this->load_textdomain();
         $this->dispatch_hooks();
      }
   
      public function dispatch_hooks() {
         Proshots\Autoload::init();
         Proshots\Admin::init();
         Proshots\Shortcode::init();
         // Proshots\API::init();
         Proshots\Assets::init();
      }
   
      public function load_textdomain() {
         load_plugin_textdomain(
            'wp-proshots',
            false,
            dirname( plugin_basename( __FILE__ ) ) . '/languages/'
         );
      }
   
      public function load_dependency() {
         require_once PROSHOT_ROOT_DIR_PATH . 'library/vendor/autoload.php';
         require_once PROSHOT_INCLUDES_DIR_PATH . 'autoload.php';
      }
   
      public function activate() {

      }
   
      public function deactivate() {
   
      }
   }
   
   function proshots_start() {
      return Proshots::init();
   }


   proshots_start();   
