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


// Language Support
load_plugin_textdomain( 'wp-lawyer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );




###########################################################
// Register Attorneys Custom Post Type
###########################################################
if ( ! function_exists('wp_lawyer_attorneys_cpt') ) {

// Register Custom Post Type
function wp_lawyer_attorneys_cpt() {

	$labels = array(
		'name'                => _x( 'Attorneys', 'Post Type General Name', 'wp-lawyer' ),
		'singular_name'       => _x( 'attorney', 'Post Type Singular Name', 'wp-lawyer' ),
		'menu_name'           => __( 'Attorneys', 'wp-lawyer' ),
		'parent_item_colon'   => __( 'Parent Attorney:', 'wp-lawyer' ),
		'all_items'           => __( 'All Attorneys', 'wp-lawyer' ),
		'view_item'           => __( 'View Attorney', 'wp-lawyer' ),
		'add_new_item'        => __( 'Add New Attorney', 'wp-lawyer' ),
		'add_new'             => __( 'Add Attorney', 'wp-lawyer' ),
		'edit_item'           => __( 'Edit Attorney', 'wp-lawyer' ),
		'update_item'         => __( 'Update Attorney', 'wp-lawyer' ),
		'search_items'        => __( 'Search Attorneys', 'wp-lawyer' ),
		'not_found'           => __( 'No Attorney Found', 'wp-lawyer' ),
		'not_found_in_trash'  => __( 'No Attorney Found in Trash', 'wp-lawyer' ),
	);
	$args = array(
		'label'               => __( 'attorney', 'wp-lawyer' ),
		'description'         => __( 'Attorney', 'wp-lawyer' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'practice-type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => plugins_url( 'assets/images/attorney-icon.png' , __FILE__ ),
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'wplawyer-attorney', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_attorneys_cpt', 0 );

}



###########################################################
// Areas of Practice - Taxonomy
###########################################################
if ( ! function_exists( 'wp_lawyer_attorneys_practicearea' ) ) {

// Register Custom Taxonomy
function wp_lawyer_attorneys_practicearea() {

	$labels = array(
		'name'                       => _x( 'Areas of Practice', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'Area of Practice', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Areas of Practice', 'wp-lawyer' ),
		'all_items'                  => __( 'All Practices', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent Practice', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent Practice:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New Practice', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New Practice', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit Practice', 'wp-lawyer' ),
		'update_item'                => __( 'Update Practice', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Practices with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Practices', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Practices', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Practice', 'wp-lawyer' ),
		'not_found'                  => __( 'No Practice Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-practice-area', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_attorneys_practicearea', 0 );

}


################################################################################
// Plugin Activation
################################################################################

register_activation_hook( __FILE__, 'wplawyer_activate' );

function wplawyer_activate() {
    global $wpdb;

wp_insert_term('Car Accidents', 'wplawyer-practice-area');
wp_insert_term('Burn Injury', 'wplawyer-practice-area');
wp_insert_term('Workers\' Compensation Law', 'wplawyer-practice-area');

}

###########################################################
// Register Cases Custom Post Type
###########################################################
if ( ! function_exists('wp_lawyer_cases_cpt') ) {

// Register Custom Post Type
function wp_lawyer_cases_cpt() {

	$labels = array(
		'name'                => _x( 'Cases', 'Post Type General Name', 'wp-lawyer' ),
		'singular_name'       => _x( 'Case', 'Post Type Singular Name', 'wp-lawyer' ),
		'menu_name'           => __( 'Cases', 'wp-lawyer' ),
		'parent_item_colon'   => __( 'Parent Case:', 'wp-lawyer' ),
		'all_items'           => __( 'All Cases', 'wp-lawyer' ),
		'view_item'           => __( 'View Case', 'wp-lawyer' ),
		'add_new_item'        => __( 'Add New Case', 'wp-lawyer' ),
		'add_new'             => __( 'Add Case', 'wp-lawyer' ),
		'edit_item'           => __( 'Edit Case', 'wp-lawyer' ),
		'update_item'         => __( 'Update Case', 'wp-lawyer' ),
		'search_items'        => __( 'Search Cases', 'wp-lawyer' ),
		'not_found'           => __( 'No Cases Found', 'wp-lawyer' ),
		'not_found_in_trash'  => __( 'No Cases Found in Trash', 'wp-lawyer' ),
	);
	$args = array(
		'label'               => __( 'cases', 'wp-lawyer' ),
		'description'         => __( 'Cases', 'wp-lawyer' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'case-type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => plugins_url( 'assets/images/cases-icon.png' , __FILE__ ),
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'wplawyer-cases', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_cases_cpt', 0 );

}



###########################################################
// Register Cases Type - Taxonomy
###########################################################
if ( ! function_exists( 'wp_lawyer_cases_casetype' ) ) {

// Register Custom Taxonomy
function wp_lawyer_cases_casetype() {

	$labels = array(
		'name'                       => _x( 'Case Types', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'Case Type', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Case Types', 'wp-lawyer' ),
		'all_items'                  => __( 'All Case Types', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent Case Type', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent Case Types:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New Case Types', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New Case Type', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit Case Type', 'wp-lawyer' ),
		'update_item'                => __( 'Update Case Type', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Case Type with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Case Type', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Case Type', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Case Type', 'wp-lawyer' ),
		'not_found'                  => __( 'No Case Type Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-case-type', array( 'wplawyer-cases' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_cases_casetype', 0 );

}