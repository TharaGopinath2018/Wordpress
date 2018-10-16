<?php
function banner_create_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Home Banner', //Products
    	'singular_name' => 'Home Banner', //
    	'add_new' => 'Add New Home Banner', //Add New Product
    	'add_new_item' => 'Add New Home Banner', //Add New Product
    	'edit_item' => 'Edit Home Banner', //Edit Product
    	'new_item' => 'New Home Banner',  // New Product
    	'all_items' => 'All Home Banner', //
    	'view_item' => 'View Home Banner', //
    	'search_items' => 'Search Home Banner', //
    	'not_found' =>  'No Home Banner Found', //
    	'not_found_in_trash' => 'No Home Banner found in Trash', // 
    	'parent_item_colon' => '',
    	'menu_name' => 'Home Banner', //
    );
    //register post type
	register_post_type( 'banners', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		//'taxonomies' => array( 'post_tag', 'category' ),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'banners' ),
		)
	);
}
add_action( 'init', 'banner_create_post_type' );
?>