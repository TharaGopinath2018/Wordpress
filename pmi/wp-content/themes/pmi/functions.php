<?php
define('HOME', site_url().'/');
define('TEMPLATE_URL', get_bloginfo('template_url').'/');
define('ADMIN_URL', get_bloginfo('template_url').'/admin/');
define('ADMIN_CSS', get_bloginfo('template_url').'/css/admin/');
define('ADMIN_JS', get_bloginfo('template_url').'/js/admin/');
define('ADMIN_IMAGE', get_bloginfo('template_url').'/images/admin/');
define('CSS', get_bloginfo('template_url').'/css/');
define('JS', get_bloginfo('template_url').'/js/');
define('FIMAGE', get_bloginfo('template_url').'/image/');
add_filter('show_admin_bar', '__return_false');//hide the admin bar

if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/media.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
}
require( get_template_directory() . '/admin/volunteeropps.php');
//require( get_template_directory() . '/admin/eventsfeilds.php');
require( get_template_directory() . '/admin/trainingfeilds.php');
require( get_template_directory() . '/admin/volunteerfeilds.php');
require( get_template_directory() . '/admin/chapter_executives.php');
require( get_template_directory() . '/admin/addtinal_chapter_executives.php');
require( get_template_directory() . '/admin/pendinguser.php');
require( get_template_directory() . '/admin/approveduser.php');
require( get_template_directory() . '/admin/userimport.php');
require( get_template_directory() . '/myfunction/function.php');
require( get_template_directory() . '/myfunction/widge.php');
require( get_template_directory() . '/jeventajax.php');
require( get_template_directory() . '/jaffairajax.php');
require( get_template_directory() . '/jarchiveajax.php');
require( get_template_directory() . '/jregionalajax.php');
require( get_template_directory() . '/jglobalajax.php');
require( get_template_directory() . '/jneventajax.php');
require( get_template_directory() . '/jnnewsajax.php');
require( get_template_directory() . '/jfaqajax.php');
require( get_template_directory() . '/jnewseventsajax.php');
require( get_template_directory() . '/esearch.php');

add_role('user', 'User');
add_role('public', 'Public');

/*function edit_admin_menus() {
    global $menu;
     
    $menu[5][0] = 'Anbu'; // Change Posts to Recipes
}
add_action( 'admin_menu', 'edit_admin_menus' ); 

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
     
    return array(
        'index.php', // Dashboard
        'edit.php?post_type=current',  // First separator
		'users.php', // Users
        'edit.php', // Posts
        'upload.php', // Media
        'link-manager.php', // Links
        'edit.php?post_type=page', // Pages
        'edit-comments.php', // Comments
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');	*/
/*----------------------------------------------------------------------*/
//Current Affairs 
add_action( 'init', 'current_affairs' );

function current_affairs() {
	$labels = array(
		'name'               => _x( 'Current', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Current', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Current Affairs', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Current Affairs', 'current', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Current Affairs', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Current Affairs:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Current Affairs found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Current Affairs found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-book',
		'rewrite'            => array( 'slug' => 'current' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'current', $args );
}

/*----------------------------------------------------------------------*/
//Regional Chapter News 
add_action( 'init', 'regional_chapter' );

function regional_chapter() {
	$labels = array(
		'name'               => _x( 'Regional', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Regional', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Regional Chapter News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Regional', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Regional Chapter News', 'regional', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Regional Chapter News','regional', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Regional Chapter News', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Regional Chapter News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Regional Chapter News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Regional Chapter News ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Regional Chapter News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Regional Chapter News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Regional Chapter News found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Regional Chapter News found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-welcome-write-blog',
		'rewrite'            => array( 'slug' => 'regional' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'regional', $args );
}

/*----------------------------------------------------------------------*/
//Global Chapter News  
add_action( 'init', 'global_chapter' );

function global_chapter() {
	$labels = array(
		'name'               => _x( 'Global', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Global', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Global Chapter News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Global', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Global Chapter News', 'global', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Global Chapter News','global', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Global Chapter News', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Global Chapter News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Global Chapter News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Global Chapter News ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Global Chapter News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Global Chapter News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Global Chapter News found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Global Chapter News found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-welcome-add-page',
		'rewrite'            => array( 'slug' => 'global' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'global', $args );
}


/*----------------------------------------------------------------------*/
//Archives  
add_action( 'init', 'archives' );

function archives() {
	$labels = array(
		'name'               => _x( 'Archives', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Archives', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Archives', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Archives', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Archives', 'archive', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Archives','archive', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Archives', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Archives', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Archives', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Archives ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Archives', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Archives:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Archives found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Archives found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-welcome-view-site',
		'rewrite'            => array( 'slug' => 'archive' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'archive', $args );
}
/*----------------------------------------------------------------------*/
//Notices  
add_action( 'init', 'notices' );

function notices() {
	$labels = array(
		'name'               => _x( 'Notices', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Notices', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Notices', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Notices', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Notices', 'notices', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Notices','notices', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Notices', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Notices', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Notices', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Notices ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Notices', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Notices:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Notices found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Notices found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-welcome-widgets-menus',
		'rewrite'            => array( 'slug' => 'notices' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'notices', $args );
}
/*----------------------------------------------------------------------*/

//Case Studies
add_action( 'init', 'case_studies' );

function case_studies() {
	$labels = array(
		'name'               => _x( 'Case Studies', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Case Studies', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Case Studies', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Case Studies', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Case Studies', 'case_studies', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Case Studies','case_studies', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Case Studies', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Case Studies', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Case Studies', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Case Studies ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Case Studies', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Case Studies:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Case Studies found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Case Studies found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-welcome-learn-more',
		'rewrite'            => array( 'slug' => 'case_studies' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'case_studies', $args );
}
/*----------------------------------------------------------------------*/


//Whitepaper
add_action( 'init', 'whitepaper' );

function whitepaper() {
	$labels = array(
		'name'               => _x( 'Whitepaper', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Whitepaper', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Whitepaper', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Whitepaper', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Whitepaper', 'whitepaper', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Whitepaper','whitepaper', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Whitepaper', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Whitepaper', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Whitepaper', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Whitepaper', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Whitepaper', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Whitepaper:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Whitepaper found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Whitepaper found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-format-aside',
		'rewrite'            => array( 'slug' => 'whitepaper' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_post_type( 'whitepaper', $args );
}

/*----------------------------------------------------------------------*/
//Events
/*add_action( 'init', 'events' );

function events() {
	$labels = array(
		'name'               => _x( 'Events', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Events', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Events', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Events', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Events', 'events', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Events','events', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Events', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Events', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Events', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Events', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Events', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Events:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Events found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Events found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-calendar-alt',
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'events', $args );
	new events_metaboxes();
}*/
/*----------------------------------------------------------------------*/
//Training Event Details
add_action( 'init', 'training' );

function training() {
	$labels = array(
		'name'               => _x( 'Training Event', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Training Event', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Training Event', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Training Event', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Training Event', 'training', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Training Event','training', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Training Event', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Training Event', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Training Event', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Training Event', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Training Event', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Training Event:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Training Event found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Training Event found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-calendar',
		'rewrite'            => array( 'slug' => 'training' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'training', $args );
	new training_metaboxes();
}

/*----------------------------------------------------------------------*/
//Volunteer  Details
add_action( 'init', 'volunteer' );
function volunteer() {
	$labels = array(
		'name'               => _x( 'Volunteer', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Volunteer', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Volunteer', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Volunteer', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Volunteer', 'volunteer', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Volunteer','volunteer', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Volunteer', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Volunteer', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Volunteer', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Volunteer', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Volunteer', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Volunteer:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Volunteer found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Volunteer found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-groups',
		'rewrite'            => array( 'slug' => 'volunteer' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'volunteer', $args );
	new volunteer_metaboxes();
	
}
/*----------------------------------------------------------------------*/
//Chapter Executives
add_action( 'init', 'chapter_executives' );
add_theme_support( 'post-thumbnails' ); 
function chapter_executives() {
	$labels = array(
		'name'               => _x( 'Chapter Executives', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Chapter Executives', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Chapter Executives', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Chapter Executives', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Chapter Executives', 'chapter_executives', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Chapter Executives','chapter_executives', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Chapter Executives', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Chapter Executives', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Chapter Executives', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Chapter Executives', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Chapter Executives', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Chapter Executives:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Chapter Executives found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Chapter Executives found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-universal-access',
		'rewrite'            => array( 'slug' => 'chapter_executives' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'chapter_executives', $args );
	new c_executives_metaboxes();
	
}
/*----------------------------------------------------------------------*/
//Additional Chapter Executives
add_action( 'init', 'a_chapter_executives' );
//add_theme_support( 'post-thumbnails' ); 

function a_chapter_executives() {
	$labels = array(
		'name'               => _x( 'Additional Chapter Executives', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Additional Chapter Executives', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Additional Chapter Executives', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Additional Chapter Executives', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Additional Chapter Executives', 'a_chapter_executives', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Additional Chapter Executives','a_chapter_executives', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Additional Chapter Executives', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Additional Chapter Executives', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Additional Chapter Executives', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Additional Chapter Executives', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Additional Chapter Executives', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Additional Chapter Executives:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Additional Chapter Executives found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Additional Chapter Executives found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-universal-access-alt',
		'rewrite'            => array( 'slug' => 'a_chapter_executives' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'a_chapter_executives', $args );
	new a_executives_metaboxes();
}

/*----------------------------------------------------------------------*/
//Adds
/*add_action( 'init', 'adds' );
add_theme_support( 'post-thumbnails' ); 

function adds() {
	$labels = array(
		'name'               => _x( 'Adds', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Adds', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Adds', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Adds', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Adds', 'adds', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Adds','adds', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Adds', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Adds', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Adds', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Adds', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Adds', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Adds:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Adds found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Adds found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'adds' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'adds', $args );
	new adds_metaboxes();
}*/

/*----------------------------------------------------------------------*/
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
		'labels'			    => $labels,
		'has_archive'		    => true,
 		'public' 			    => true,
		'menu_icon'  		    => 'dashicons-admin-home',
		'supports' 			    => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'exclude_from_search'   => false,
		'capability_type'       => 'post',
		'rewrite'               => array( 'slug' => 'banners' ),
		)
	);
}
add_action( 'init', 'banner_create_post_type' );

/*----------------------------------------------------------------------*/
//News
add_action( 'init', 'news' );
//add_theme_support( 'post-thumbnails' ); 

function news() {
	$labels = array(
		'name'               => _x( 'News', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'News', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add News', 'news', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add News','news', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New News', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All News', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No News found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No News found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-media-interactive',
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'news', $args );
	//new adds_metaboxes();
}
/*----------------------------------------------------------------------*/
//Volunteer Spotlight
add_action( 'init', 'volunteer_spotlight' );
//add_theme_support( 'post-thumbnails' ); 

function volunteer_spotlight() {
	$labels = array(
		'name'               => _x( 'Volunteer Spotlight', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Volunteer Spotlight', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Volunteer Spotlight', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Volunteer Spotlight', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Volunteer Spotlight', 'volunteerspotlight', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Volunteer Spotlight','volunteerspotlight', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Volunteer Spotlight', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Volunteer Spotlight', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Volunteer Spotlight', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Volunteer Spotlight', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Volunteer Spotlight', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Volunteer Spotlight:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Volunteer Spotlight found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Volunteer Spotlight found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-businessman',
		'rewrite'            => array( 'slug' => 'volunteerspotlight' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'volunteerspotlight', $args );
	//new adds_metaboxes();
}

/*----------------------------------------------------------------------*/
//Recent News
add_action( 'init', 'recent_news' );
//add_theme_support( 'post-thumbnails' ); 

function recent_news() {
	$labels = array(
		'name'               => _x( 'Recent News', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Recent News', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Recent News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Recent News', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Recent News', 'recent_news', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Recent News','recent_news', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Recent News', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Recent News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Recent News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Recent News', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Recent News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Recent News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Recent News found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Recent News found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-email',
		'rewrite'            => array( 'slug' => 'recent_news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'recent_news', $args );
	
}
/*----------------------------------------------------------------------*/
//Recent News
add_action( 'init', 'newsletter' );
//add_theme_support( 'post-thumbnails' ); 

function newsletter() {
	$labels = array(
		'name'               => _x( 'Newsletters ', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Newsletters', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Newsletters', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Newsletters', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Newsletters', 'newsletter', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Newsletters','newsletter', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Newsletters', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Newsletters', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Newsletters', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Recent News', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Newsletters', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Newsletters:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Newsletters found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Newsletters found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-page',
		'rewrite'            => array( 'slug' => 'newsletter' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
		//'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'newsletter', $args );
	
}
/*----------------------------------------------------------------------*/
// 	Volunteer Opportunities
add_action( 'init', 'vol_opps' );


function vol_opps() {
	$labels = array(
		'name'               => _x( 'Volunteer Opportunities', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Volunteer Opportunities', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Volunteer Opportunities', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Volunteer Opportunities', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add Volunteer Opportunities', 'vol_opps', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add Volunteer Opportunities','vol_opps', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Volunteer Opportunities', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Volunteer Opportunities', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Volunteer Opportunities', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Volunteer Opportunities', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Volunteer Opportunities', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Volunteer Opportunities:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Volunteer Opportunities found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Volunteer Opportunities found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-id-alt',
		'rewrite'            => array( 'slug' => 'vol_opps' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies' => array( 'post_tag', 'category' )	
	);
	register_post_type( 'vol_opps', $args );
	new vol_opps_metaboxes();
}

/*----------------------------------------------------------------------*/
//About 
add_action( 'init', 'about' );

function about() {
	$labels = array(
		'name'               => _x( 'About', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'About', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search About ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent About :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No About  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No About  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-book',
		'rewrite'            => array( 'slug' => 'about' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'about', $args );
}

/*----------------------------------------------------------------------*/
//Join 
add_action( 'init', 'pmijoin' );

function pmijoin() {
	$labels = array(
		'name'               => _x( 'Join', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Join', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Join ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Join :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Join  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Join  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-links',
		'rewrite'            => array( 'slug' => 'pmijoin' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'pmijoin', $args );
}

/*----------------------------------------------------------------------*/
//Contact 
add_action( 'init', 'pmicontact' );

function pmicontact() {
	$labels = array(
		'name'               => _x( 'Contact', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Contact', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Contact ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Contact :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Contact  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Contact  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-phone',
		'rewrite'            => array( 'slug' => 'pmicontact' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'pmicontact', $args );
}
/*----------------------------------------------------------------------*/
//Help 
add_action( 'init', 'pmihelp' );

function pmihelp() {
	$labels = array(
		'name'               => _x( 'Help', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Help', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Help ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Help :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Help  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Help  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'pmihelp' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'pmihelp', $args );
}
/*----------------------------------------------------------------------*/
//History 
add_action( 'init', 'history' );

function history() {
	$labels = array(
		'name'               => _x( 'History', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'History', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search History ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent History :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No History  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No History  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'history' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'history', $args );
}
/*----------------------------------------------------------------------*/
//Vision & Mission

add_action( 'init', 'vs' );

function vs() {
	$labels = array(
		'name'               => _x( 'Vision & Mission', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Vision & Mission', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Vision & Mission ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Vision & Mission :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Vision & Mission  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Vision & Mission  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'vs' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'vs', $args );
}
/*----------------------------------------------------------------------*/
//Services

add_action( 'init', 'service' );

function service() {
	$labels = array(
		'name'               => _x( 'Services', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Services', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Services ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Services :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Services  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Services  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'service', $args );
}

/*----------------------------------------------------------------------*/
//VP Registration

add_action( 'init', 'vpmember' );

function vpmember() {
	$labels = array(
		'name'               => _x( 'VP Member', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'VP Member', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search VP Member ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent VP Member :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No VP Member  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No VP Member  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'vpmember' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'vpmember', $args );
}
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		//'before_title' => '<h3 class="widget-title">',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		//'before_title' => '<h3 class="widget-title">',
		//'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		//'before_title' => '<h3 class="widget-title">',
		//'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );
//Home Popup
add_action( 'init', 'popup' );
function popup() {
    $labels = array(
		'name'               => _x( 'Home', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Home', 'post type singular name', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Home', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Home:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Home found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Home found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'popup' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'popup', $args );
}
/*----------------------------------------------------------------------*/
//Ins Directory
add_action( 'init', 'ins_directory' );

function ins_directory() {
	$labels = array(
		'name'               => _x( 'Institute Directory', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Institute Directory', 'post type singular name', 'your-plugin-textdomain' ),
		//'menu_name'          => _x( 'About ', 'admin menu', 'your-plugin-textdomain' ),
		//'name_admin_bar'     => _x( 'Current', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add About ', 'current', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add Current Affairs','current', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New Current Affairs', 'your-plugin-textdomain' ),
		//'edit_item'          => __( 'Edit Current Affairs', 'your-plugin-textdomain' ),
		//'view_item'          => __( 'View Current Affairs', 'your-plugin-textdomain' ),
		//'all_items'          => __( 'All Current Affairs ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Institute Directory ', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Institute Directory :', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Institute Directory  found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Institute Directory  found in Trash.', 'your-plugin-textdomain' )
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'menu_icon'  		 => 'dashicons-admin-generic',
		'rewrite'            => array( 'slug' => 'ins_directory' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
	);
	register_post_type( 'ins_directory', $args );
}
?>