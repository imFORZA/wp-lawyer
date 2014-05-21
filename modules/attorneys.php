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
		//'register_meta_box_cb' => 'wplawyer_add_attorney_metaboxes',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array('slug'=>'attorney', 'with_front' => false)
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
		'rewrite' => array('slug'=>'attorneys/area-of-practice', 'with_front' => false)
	);
	register_taxonomy( 'wplawyer-practice-area', array( 'wplawyer-attorney' ), $args );
	
	wp_insert_term('Car Accidents', 'wplawyer-practice-area');
	wp_insert_term('Burn Injury', 'wplawyer-practice-area');
	wp_insert_term('Workers\' Compensation Law', 'wplawyer-practice-area');

}

// Hook into the 'init' action
add_action( 'init', 'wp_lawyer_attorneys_practicearea', 0 );

}


###########################################################
// Cities of Practice - Taxonomy
###########################################################
if ( ! function_exists( 'wplawyer_attorney_city' ) ) {

// Register Custom Taxonomy
function wplawyer_attorney_city() {

	$labels = array(
		'name'                       => _x( 'Cities of Practice', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Cities of Practice', 'wp-lawyer' ),
		'all_items'                  => __( 'All Cities', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent City', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent City:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New City', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New City', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit City', 'wp-lawyer' ),
		'update_item'                => __( 'Update City', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Cities with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Cities', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Cities', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Cities', 'wp-lawyer' ),
		'not_found'                  => __( 'No City Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-attorney-city', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wplawyer_attorney_city', 0 );

}


###########################################################
// Counties of Practice - Taxonomy
###########################################################
if ( ! function_exists( 'wplawyer_attorney_county' ) ) {

// Register Custom Taxonomy
function wplawyer_attorney_county() {

	$labels = array(
		'name'                       => _x( 'Counties of Practice', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'County', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Counties of Practice', 'wp-lawyer' ),
		'all_items'                  => __( 'All Counties', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent County', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent County:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New County Name', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New County', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit County', 'wp-lawyer' ),
		'update_item'                => __( 'Update County', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Counties with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Counties', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Counties', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Counties', 'wp-lawyer' ),
		'not_found'                  => __( 'No County Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-attorney-county', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wplawyer_attorney_county', 0 );

}



###########################################################
// Attorney District - Taxonomy
###########################################################
if ( ! function_exists( 'wplawyer_attorney_district' ) ) {

// Register Custom Taxonomy
function wplawyer_attorney_district() {

	$labels = array(
		'name'                       => _x( 'Districts', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'district', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Districts', 'wp-lawyer' ),
		'all_items'                  => __( 'All Districts', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent district', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent district:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New district Name', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New district', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit district', 'wp-lawyer' ),
		'update_item'                => __( 'Update district', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Districts with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Districts', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Districts', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Districts', 'wp-lawyer' ),
		'not_found'                  => __( 'No District Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-attorney-district', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wplawyer_attorney_district', 0 );

}


################################################################################
// Law School - Taxonomy
################################################################################
if ( ! function_exists( 'wplawyer_attorney_lawschool' ) ) {

// Register Custom Taxonomy
function wplawyer_attorney_lawschool() {

	$labels = array(
		'name'                       => _x( 'Law Schools', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'Law School', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Law Schools', 'wp-lawyer' ),
		'all_items'                  => __( 'All Law Schools', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent Law School', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent Law School:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New Law School', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New Law School', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit Law School', 'wp-lawyer' ),
		'update_item'                => __( 'Update Law School', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Law Schools with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Law School', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Law Schools', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Law Schools', 'wp-lawyer' ),
		'not_found'                  => __( 'No Law Schools Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-attorney-lawschool', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wplawyer_attorney_lawschool', 0 );

}


################################################################################
// Undergraduate Schools - Taxonomy
################################################################################
if ( ! function_exists( 'wplawyer_attorney_undergraduateschool' ) ) {

// Register Custom Taxonomy
function wplawyer_attorney_undergraduateschool() {

	$labels = array(
		'name'                       => _x( 'Undergraduate Schools', 'Taxonomy General Name', 'wp-lawyer' ),
		'singular_name'              => _x( 'Undergraduate School', 'Taxonomy Singular Name', 'wp-lawyer' ),
		'menu_name'                  => __( 'Undergraduate Schools', 'wp-lawyer' ),
		'all_items'                  => __( 'All Undergraduate Schools', 'wp-lawyer' ),
		'parent_item'                => __( 'Parent Undergraduate School', 'wp-lawyer' ),
		'parent_item_colon'          => __( 'Parent Undergraduate School:', 'wp-lawyer' ),
		'new_item_name'              => __( 'New Undergraduate School', 'wp-lawyer' ),
		'add_new_item'               => __( 'Add New Undergraduate School', 'wp-lawyer' ),
		'edit_item'                  => __( 'Edit Undergraduate School', 'wp-lawyer' ),
		'update_item'                => __( 'Update Undergraduate School', 'wp-lawyer' ),
		'separate_items_with_commas' => __( 'Separate Undergraduate Schools with commas', 'wp-lawyer' ),
		'search_items'               => __( 'Search Undergraduate School', 'wp-lawyer' ),
		'add_or_remove_items'        => __( 'Add or remove Undergraduate Schools', 'wp-lawyer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Undergraduate Schools', 'wp-lawyer' ),
		'not_found'                  => __( 'No Undergraduate Schools Found', 'wp-lawyer' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'wplawyer-attorney-undergrad', array( 'wplawyer-attorney' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wplawyer_attorney_undergraduateschool', 0 );

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
            'name' => 'Title',
            'id' => $wplawyer_attorney_prefix . 'attorney_title',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Bar Number',
            'id' => $wplawyer_attorney_prefix . 'attorney_bar_number',
            'type' => 'text',
            'std' => ''
        ),
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
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_attorney_meta ? $wplawyer_attorney_meta : $field['std'], '" size="20" style="width:50%; min-width:150px;" />', '<br />', isset($field['desc']);
				echo     '</td>','</tr>';
			break;
			case 'social_one':
				echo '<tr><td colspan="2"><hr style="background:#ddd; border:0px; height:1px; position:relative; width:100%;" /><h4>Social Media Profiles</h4></td></tr>', '<tr>', '<th style="width:15%"><label for="', $field['id'], '">', $field['name'], '</label></th>', '<td>';
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wplawyer_attorney_meta ? $wplawyer_attorney_meta : $field['std'], '" size="20" style="width:50%; min-width:150px;" />', '<br />', isset($field['desc']);
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
    
    // Verify Nonce
    if ( isset($_POST['wplawyer_attorney_meta_box_nonce']) && !wp_verify_nonce( $_POST['wplawyer_attorney_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
    
    // check permissions
    if (!current_user_can('edit_post', $post_id))
    return;
    
    foreach ($wplawyer_attorney_meta_box['fields'] as $field) {
        $wplawyer_attorney_old = get_post_meta($post_id, $field['id'], true);
        
        if (!empty($_POST[$field['id']])) {
		$wplawyer_attorney_new = $_POST[$field['id']];   
		} else {
			$wplawyer_attorney_new = '';
		}
		
        if ( $wplawyer_attorney_new && $wplawyer_attorney_new != $wplawyer_attorney_old) {
            update_post_meta($post_id, $field['id'], $wplawyer_attorney_new);
        } elseif ('' == $wplawyer_attorney_new && $wplawyer_attorney_old) {
            delete_post_meta($post_id, $field['id'], $wplawyer_attorney_old);
        }
    }
}



################################################################################
// Template Functions
################################################################################

// Attorney Title
function wplawyer_attorney_title() {
	$wplawyer_attorney_title = get_post_meta(get_the_ID(), 'wplawyer_attorney_title', true);
	if ($plawyer_attorney_title == '') { } else {
		echo '<span id="attorney-title">' . $wplawyer_attorney_title . '</span>';
	}
}

// Attorney Bar Number
function wplawyer_attorney_bar_number() {
	$wplawyer_attorney_barnumber = get_post_meta(get_the_ID(), 'wplawyer_attorney_barnumber', true);
	if (wplawyer_attorney_barnumber == '') { } else {
		echo '<span id="attorney-bar-number">' . $wplawyer_attorney_barnumber . '</span>';	 }
}

// Attorney Address
function wplawyer_attorney_address() {
	$wplawyer_attorney_address = get_post_meta(get_the_ID(), 'wplawyer_attorney_address', true);
	if (wplawyer_attorney_address == '') { } else {
		echo '<span id="attorney-address">' . $wplawyer_attorney_address . '</span>';	 }
}

// Attorney Email
function wplawyer_attorney_email() {
	$wplawyer_attorney_email = get_post_meta(get_the_ID(), 'wplawyer_attorney_email', true);
	if ($wplawyer_attorney_email == '') { } else {
		echo '<a id="attorney-email" href="mailto:'. antispambot($wplawyer_attorney_email) .'">'. antispambot($wplawyer_attorney_email) .'</a>';
	 }
}

// Attorney Mobile Phone
function wplawyer_attorney_mobile() {
	$wplawyer_attorney_mobile = get_post_meta(get_the_ID(), 'wplawyer_attorney_mobile', true);
	if ($wplawyer_attorney_mobile == '') { } else {
		echo '<a id="attorney-mobile" href="tel:' . $wplawyer_attorney_mobile . '">' . $wplawyer_attorney_mobile . '</a>';	 }
}

// Attorney Fax
function wplawyer_attorney_fax() {
	$wplawyer_attorney_fax = get_post_meta(get_the_ID(), 'wplawyer_attorney_fax', true);
	if ($wplawyer_attorney_mobile == '') { } else {
		echo '<a id="attorney-fax" href="tel:' . $wplawyer_attorney_fax . '">' . $wplawyer_attorney_fax . '</a>';	 }
}

// Attorney Website
function wplawyer_attorney_website() {
	$wplawyer_attorney_website = get_post_meta(get_the_ID(), 'wplawyer_attorney_website', true);
	if ($wplawyer_attorney_website == '') { } else {
		echo '<a id="attorney-website" href="' . $wplawyer_attorney_website . '">' . $wplawyer_attorney_website . '</a>';	 }
}

// Attorney Facebook
function wplawyer_attorney_facebook() {
	$wplawyer_attorney_facebook = get_post_meta(get_the_ID(), 'wplawyer_attorney_facebook', true);
	if ($wplawyer_attorney_facebook == '') { } else {
		echo '<a id="attorney-facebook" class="attorney-social" href="' . $wplawyer_attorney_facebook . '">' . $wplawyer_attorney_facebook . '</a>';	 }
}

// Attorney Twitter
function wplawyer_attorney_twitter() {
	$wplawyer_attorney_twitter = get_post_meta(get_the_ID(), 'wplawyer_attorney_twitter', true);
	if ($wplawyer_attorney_twitter == '') { } else {
		echo '<a id="attorney-twitter" class="attorney-social" href="' . $wplawyer_attorney_twitter . '">' . $wplawyer_attorney_twitter . '</a>';	 }
}

// Attorney LinkedIn
function wplawyer_attorney_linkedin() {
	$wplawyer_attorney_linkedin = get_post_meta(get_the_ID(), 'wplawyer_attorney_linkedin', true);
	if ($wplawyer_attorney_twitter == '') { } else {
		echo '<a id="attorney-linkedin" class="attorney-social" href="' . $wplawyer_attorney_linkedin . '">' . $wplawyer_attorney_linkedin . '</a>';	 }
}

// Attorney YouTube
function wplawyer_attorney_youtube() {
	$wplawyer_attorney_youtube = get_post_meta(get_the_ID(), 'wplawyer_attorney_youtube', true);
	if ($wplawyer_attorney_youtube == '') { } else {
		echo '<a id="attorney-youtube" class="attorney-social" href="' . $wplawyer_attorney_youtube . '">' . $wplawyer_attorney_youtube . '</a>';	 }
}