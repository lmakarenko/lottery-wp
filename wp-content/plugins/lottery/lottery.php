<?php
/**
 * @package lottery
 */
/*
Plugin Name: lottery
Description: Used to preload lottery data
Version: 1.0
License: GPLv2 or later
Text Domain: lottery
*/

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define( 'LOTTERY_VERSION', '1.0' );
define( 'LOTTERY__MINIMUM_WP_VERSION', '3.2' );
define( 'LOTTERY__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

//define( 'AKISMET_DELETE_LIMIT', 100000 );

//register_activation_hook( __FILE__, array( 'lottery', 'plugin_activation' ) );
//register_deactivation_hook( __FILE__, array( 'lottery', 'plugin_deactivation' ) );

require_once( LOTTERY__PLUGIN_DIR . 'class.lottery.php' );

/*
if ( is_admin() ) {
	require_once( AKISMET__PLUGIN_DIR . 'class.akismet-admin.php' );
	add_action( 'init', array( 'Akismet_Admin', 'init' ) );
}

//add wrapper class around deprecated akismet functions that are referenced elsewhere
require_once( AKISMET__PLUGIN_DIR . 'wrapper.php' );
*/