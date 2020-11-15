<?php
/**
 * Plugin Name:       Merchi Plugin
 * Plugin URI:        https://merchi.co
 * Description:       Fetch your products from Merchi. This plugin requires Woocommerce.
 * Version:           1.0
 * Author:            Charlie Campton
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * @package MerchiPlugin
 **/
  
// Check if WooCommerce is active
// if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

  // include( 'merchi_add_admin_menu.php' );
  
  // register_activation_hook( __FILE__, 'merchi_add_admin_menu' );

// }

// If this file is called directly, exit.
if ( ! defined( 'ABSPATH')) {
  exit;
}

// Require Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
  require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Code that runs on activation
function activate_merchi_plugin() {
  Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_merchi_plugin');

// Code that runs on deactivation
function deactivate_merchi_plugin() {
  Inc\Base\Deactivate::deactivate();
}
register_activation_hook(__FILE__, 'deactivate_merchi_plugin');

// Initialise all core classes of the plugin
if ( class_exists( 'Inc\\Init' ) ) {
  Inc\Init::register_services();
}

// Deactivate purchasing on woocommerce
add_filter( 'woocommerce_widget_cart_is_hidden', '__return_true' );
add_filter( 'woocommerce_is_purchasable', '__return_false'); // DISABLING PURCHASE FUNCTIONALITY AND REMOVING ADD TO CART BUTTON FROM NORMAL PRODUCTS
