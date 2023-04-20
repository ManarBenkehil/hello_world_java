<?php
/*
 * Plugin Name:       Employee Profile Creation
 * Description:       Create customizable employee profile
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            S1-G7
 */
 
// Define ABSPATH
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}
if ( ! function_exists( 'plugin_dir_path' ) ) {
    require_once ABSPATH . '/wp-admin/includes/plugin.php';
}

// Include database file
require_once(plugin_dir_path(__FILE__) . 'includes/db.php');
register_activation_hook(__FILE__, 'create_wpdb');
// Include additional files
require_once(plugin_dir_path(__FILE__) . 'includes/signup.php');
require_once(plugin_dir_path(__FILE__) . 'includes/profile.php');
require_once(plugin_dir_path(__FILE__) . 'includes/fields.php');
require_once(plugin_dir_path(__FILE__) . 'includes/additional.php');
// Enqueue stylesheets
function employee_profile_enqueues() {
    wp_enqueue_style( 'employee-style', plugin_dir_url( __FILE__ ) . 'css/employee_style.css' );
    wp_enqueue_style( 'styles', plugin_dir_url( __FILE__ ) . 'css/styles.css' );
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'employee_profile_enqueues' );
?>
