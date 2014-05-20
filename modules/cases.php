<?php

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
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'publicize', 'wpcom-markdown'  ),
		'taxonomies'          => array( 'case-type' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => plugins_url( '../assets/images/cases-icon.png' , __FILE__ ),
		'register_meta_box_cb' => 'wplawyer_add_cases_metaboxes',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array('slug'=>'case', 'with_front' => false)
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
		'rewrite' => array('slug'=>'case/case-type', 'with_front' => false)
	);
	register_taxonomy( 'wplawyer-case-type', array( 'wplawyer-cases' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_cases_casetype', 0 );

}







################################################################################
// Setup Meta Boxes
################################################################################

$wplawyer_case_prefix = 'wplawyer_';
/* Sets up all of custom data fields in the admin edit page. If you need new fields, here would be the place to add it, in the form of an array. */
$wplawyer_case_meta_box = array(
    'id' => 'case-details',
    'title' => 'Case Details',
    'page' => 'wplawyer-cases',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
        array(
            'name' => 'Verdict Price',
            'id' => $wplawyer_case_prefix . 'case_verdict_price',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Plantiff',
            'id' => $wplawyer_case_prefix . 'case_plantiff',
            'type' => 'text',
            'std' => ''
        ),
    	array(
            'name' => 'Defendent',
            'id' => $wplawyer_case_prefix . 'case_defendent',
            'type' => 'text',
            'std' => ''
        ),
    )
);
add_action('admin_menu', 'wplawyer_add_case_metaboxes');


################################################################################
// Add Meta Box
################################################################################
function wplawyer_add_case_metaboxes() {
    global $wplawyer_case_meta_box;
    add_meta_box($wplawyer_case_meta_box['id'], $wplawyer_case_meta_box['title'], 'wplawyer_case_show_box', $wplawyer_case_meta_box['page'], $wplawyer_case_meta_box['context'], $wplawyer_case_meta_box['priority']);
}

// Callback function to show fields in meta box
function wplawyer_case_show_box() {
    global $wplawyer_case_meta_box, $post;

    // Use nonce for verification
    echo '<input type="hidden" name="wplawyer_case_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

    echo '<table class="form-table" style="overflow:hidden;">';

	foreach ($wplawyer_case_meta_box['fields'] as $field) {
		// get current post meta data
		$wplawyer_case_meta = get_post_meta($post->ID, $field['id'], true);


		switch ($field['type']) {

			case 'text':
				echo '<tr>',
				'<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
				'<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_case_meta ? $wplawyer_case_meta : $field['std'], '" size="20" style="width:50%; min-width:150px;" />', '<br />', isset($field['desc']);
				echo     '</td>','</tr>';
			break;
			case 'social_one':
				echo '<tr><td colspan="2"><hr style="background:#ddd; border:0px; height:1px; position:relative; width:100%;" /><h4>Social Media Profiles</h4></td></tr>', '<tr>', '<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_case_meta ? $wplawyer_case_meta : $field['std'], '" size="20" style="width:50%; min-width:150px;" />', '<br />', isset($field['desc']);
				echo     '</td>','</tr>';
			break;

		}

	}
	echo '</table>';
	}


################################################################################
// Save MetaBox Data
################################################################################
add_action('save_post', 'wplawyer_case_save_data');
// Save data from meta box
function wplawyer_case_save_data($post_id) {
    global $wplawyer_case_meta_box;
    // verify nonce
    if (!wp_verify_nonce( $_POST['wplawyer_case_meta_box_nonce'], basename(__FILE__))) {
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
    foreach ($wplawyer_case_meta_box['fields'] as $field) {
        $wplawyer_case_old = get_post_meta($post_id, $field['id'], true);
        $wplawyer_case_new = $_POST[$field['id']];
        if ($wplawyer_case_new && $wplawyer_case_new != $wplawyer_case_old) {
            update_post_meta($post_id, $field['id'], $wplawyer_case_new);
        } elseif ('' == $wplawyer_case_new && $wplawyer_case_old) {
            delete_post_meta($post_id, $field['id'], $wplawyer_case_old);
        }
    }
}