<?php

/*!-----------------------------------------------------------------------------------

  Plugin Name: WordPress SEO
  Version: 1.0.0
  Plugin URI: https://github.com/bhubbard/wp-lawyer
  Description: A custom WordPress plugin for lawyers and Law Firms.
  Author: Brandon Hubbard
  Author URI: https://wp-lawyer.com/
  Text Domain: wp-lawyer
  Domain Path: /languages/
  License: GPL v3

-----------------------------------------------------------------------------------*/


###########################################################
// Register Attorneys Custom Post Type
###########################################################
if ( ! function_exists('wp_lawyer_attorneys_cpt') ) {

// Register Custom Post Type
function wp_lawyer_attorneys_cpt() {

	$labels = array(
		'name'                => _x( 'Attorneys', 'Post Type General Name', 'wp-lawyer' ),
		'singular_name'       => _x( 'attorney', 'Post Type Singular Name', 'wp-lawyer' ),
		'menu_name'           => __( 'Attorney', 'wp-lawyer' ),
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
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'attorney', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_attorneys_cpt', 0 );

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
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'cases', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_cases_cpt', 0 );

}
