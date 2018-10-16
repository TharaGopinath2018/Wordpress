<?php 
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*



Plugin Name: WP Datepicker



Plugin URI: http://www.websitedesignwebsitedevelopment.com/wordpress/plugins/wp-datepicker



Description: WP Datepicker is a great plugin to implement custom styled jQuery UI datepicker site-wide. You can set background images and manage CSS from your theme.



Version: 1.0



Author: Fahad Mahmood 



Author URI: http://www.androidbubbles.com



License: GPL3



*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        

	global $wpdp_premium_link, $wpdp_dir, $wpdp_pro, $wpdp_data;
	$wpdp_dir = plugin_dir_path( __FILE__ );
	$rendered = FALSE;
	$wpdp_pro = file_exists($wpdp_dir.'inc/functions_extended.php');
	$wpdp_data = get_plugin_data(__FILE__);
	$wpdp_premium_link = 'http://shop.androidbubbles.com/product/wp-datepicker-pro';
	

	
	$wpdp_data = get_plugin_data(__FILE__);
	
	
	
	include('inc/functions.php');
        
	

	add_action( 'admin_enqueue_scripts', 'register_wpdp_scripts' );
	add_action( 'wp_enqueue_scripts', 'register_wpdp_scripts' );
	

	
	if(is_admin()){
		add_action( 'admin_menu', 'wpdp_menu' );		
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'wpdp_plugin_links' );	
		
		add_action('admin_footer', 'wpdp_footer_scripts');
		
	}else{
		
	
		add_action('wp_footer', 'wpdp_footer_scripts');
		
	}


	