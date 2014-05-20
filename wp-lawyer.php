<?php

/*!-----------------------------------------------------------------------------------

  Plugin Name: WP Lawyer
  Version: 1.0.0
  Plugin URI: https://github.com/bhubbard/wp-lawyer
  Description: A custom WordPress plugin for Lawyers and Law Firms.
  Author: Brandon Hubbard
  Author URI: https://wp-lawyer.com/
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


