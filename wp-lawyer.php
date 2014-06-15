<?php

/*!-----------------------------------------------------------------------------------

  Plugin Name: WP Lawyer
  Version: 1.0.1
  Plugin URI: //wp-lawyer.com
  Description: A custom WordPress plugin for Lawyers and Law Firms.
  Author: imFORZA
  Author URI: //www.imforza.com
  Text Domain: wp-lawyer
  Domain Path: /languages/
  License: GPL v3

-----------------------------------------------------------------------------------*/



// Load Attorney Module
require_once('modules/attorneys.php');

// Load Cases Module
require_once('modules/cases.php');


// Language Support
load_plugin_textdomain( 'wp-lawyer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );


################################################################################
// Plugin Activation
################################################################################

register_activation_hook( __FILE__, 'wplawyer_activate' );

function wplawyer_activate() {
    global $wpdb;



}

################################################################################
// Plugin Styles
################################################################################

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'wplawyer_styles' );

function wplawyer_styles() {

		if ( !is_admin() ) {

			wp_register_style('wplawyer', plugins_url ( 'wp-lawyer/assets/css/main.css' ), false, null, 'all');
			wp_enqueue_style('wplawyer');
		}
	}
