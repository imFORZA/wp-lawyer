<?php
/**
 * @package Internals
 *
 * Code used when the plugin is removed (not just deactivated but actively deleted through the WordPress Admin).
 */

if( !defined( 'ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
    exit();


	global $wpdb;

    // Delete our Options
    delete_option( 'wplawyer_version' );

    // Delete our Transients
   

    // DROP Attorneys Posts
    $args = array (
    	'post_type' => array('wplawyer-attorney'),
		'nopaging' => true
	);
	$query = new WP_Query ($args);
		while ($query->have_posts ()) {
			$query->the_post ();
			$id = get_the_ID ();
			wp_delete_post ($id, true);
			delete_post_meta_by_key($id->ID);
		}
	wp_reset_postdata ();
