<?php
/*
 * Plugin Name: Plugin Starter Template
 * Plugin URI: https://www.el-pato.de/presse/
 * Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
 * Version: 0.1.0
 * Author: EL PATO
 * Author URI: https://el-pato.de
 * Text Domain: pstarter-plugin
 * Domain Path: /languages
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Get plugin data
 */
if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
$plugin_data = get_plugin_data( __FILE__ );

// Plugin name
define( 'PSTARTER_NAME', $plugin_data['Name'] );

// Plugin version
define( 'PSTARTER_VERSION', $plugin_data['Version'] );

// Plugin TextDomain
define( 'PSTARTER_TEXTDOMAIN', $plugin_data['TextDomain'] );

// Plugin Root File
define( 'PSTARTER_FILE', __FILE__ );

// Plugin base
define( 'PSTARTER_BASE', plugin_basename( PSTARTER_FILE ) );

// Plugin Folder Path
define( 'PSTARTER_DIR',	plugin_dir_path( PSTARTER_FILE ) );

// Plugin Folder URL
define( 'PSTARTER_URL',	plugin_dir_url( PSTARTER_FILE ) );


/**
 * Load the main class for the core functionality
 */
require_once PSTARTER_DIR . 'classes/class-pstarter-plugin.php';