<?php

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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'publicize', 'wpcom-markdown'  ),
		'taxonomies'          => array( 'practice-type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => plugins_url( '../assets/images/attorney-icon.png' , __FILE__ ),
		'register_meta_box_cb' => 'wplawyer_add_attorney_metaboxes',
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
	
	wp_insert_term('Car Accidents', 'wplawyer-practice-area');
	wp_insert_term('Burn Injury', 'wplawyer-practice-area');
	wp_insert_term('Workers\' Compensation Law', 'wplawyer-practice-area');

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_attorneys_practicearea', 0 );

}


################################################################################
// Setup Meta Boxes
################################################################################

$wplawyer_attorney_prefix = 'wplawyer_';
/* Sets up all of custom data fields in the admin edit page. If you need new fields, here would be the place to add it, in the form of an array. */
$wplawyer_attorney_meta_box = array(
    'id' => 'attorney-details',
    'title' => 'Attorney Details',
    'page' => 'wplawyer-attorney',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
    	array(
            'name' => 'Address',
            'id' => $wplawyer_attorney_prefix . 'attorney_address',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Email',
            'id' => $wplawyer_attorney_prefix . 'attorney_email',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Mobile',
            'id' => $wplawyer_attorney_prefix . 'attorney_mobile_number',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Fax Number',
            'id' => $wplawyer_attorney_prefix . 'attorney_fax_number',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Website',
            'id' => $wplawyer_attorney_prefix . 'attorney_website',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Facebook',
            'id' => $wplawyer_attorney_prefix . 'attorney_facebook',
            'type' => 'social_one',
            'std' => ''
        ),
        array(
            'name' => 'Twitter',
            'id' => $wplawyer_attorney_prefix . 'attorney_twitter',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'LinkedIn',
            'id' => $wplawyer_attorney_prefix . 'attorney_linkedin',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'YouTube',
            'id' => $wplawyer_attorney_prefix . 'attorney_youtube',
            'type' => 'text',
            'std' => ''
        )
    )
);
add_action('admin_menu', 'wplawyer_add_attorney_metaboxes');


################################################################################
// Add Meta Box
################################################################################
function wplawyer_add_attorney_metaboxes() {
    global $wplawyer_attorney_meta_box;
    add_meta_box($wplawyer_attorney_meta_box['id'], $wplawyer_attorney_meta_box['title'], 'wplawyer_attorney_show_box', $wplawyer_attorney_meta_box['page'], $wplawyer_attorney_meta_box['context'], $wplawyer_attorney_meta_box['priority']);
}

// Callback function to show fields in meta box
function wplawyer_attorney_show_box() {
    global $wplawyer_attorney_meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="wplawyer_attorney_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table" style="overflow:hidden;">';

	foreach ($wplawyer_attorney_meta_box['fields'] as $field) {
		// get current post meta data
		$wplawyer_attorney_meta = get_post_meta($post->ID, $field['id'], true);


		switch ($field['type']) {

			case 'text':
				echo '<tr>',
				'<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_attorney_meta ? $wplawyer_attorney_meta : $field['std'], '" size="20" style="width:20%; min-width:150px;" />', '<br />', isset($field['desc']);
				echo     '</td>','</tr>';
			break;
			case 'social_one':
				echo '<tr><td colspan="2"><hr style="background:#ddd; border:0px; height:1px; position:relative; width:100%;" /><h4>Social Media Profiles</h4></td></tr>', '<tr>', '<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_attorney_meta ? $wplawyer_attorney_meta : $field['std'], '" size="20" style="width:20%; min-width:150px;" />', '<br />', isset($field['desc']);
				echo     '</td>','</tr>';
			break;

		}

	}
	echo '</table>';
	}


################################################################################
// Save MetaBox Data
################################################################################
add_action('save_post', 'wplawyer_attorney_save_data');
// Save data from meta box
function wplawyer_attorney_save_data($post_id) {
    global $wplawyer_attorney_meta_box;
    // verify nonce
    if (!wp_verify_nonce( $_POST['wplawyer_attorney_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($wplawyer_attorney_meta_box['fields'] as $field) {
        $wplawyer_attorney_old = get_post_meta($post_id, $field['id'], true);
        $wplawyer_attorney_new = $_POST[$field['id']];
        if ($wplawyer_attorney_new && $wplawyer_attorney_new != $wplawyer_attorney_old) {
            update_post_meta($post_id, $field['id'], $wplawyer_attorney_new);
        } elseif ('' == $wplawyer_attorney_new && $wplawyer_attorney_old) {
            delete_post_meta($post_id, $field['id'], $wplawyer_attorney_old);
        }
    }
}