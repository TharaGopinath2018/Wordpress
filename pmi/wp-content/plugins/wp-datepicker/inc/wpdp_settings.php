<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	if ( !current_user_can( 'update_core' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-dp' ) );
	}
// Save the field values
	if ( isset( $_POST['wpdp_fields_submitted'] ) && $_POST['wpdp_fields_submitted'] == 'submitted' ) {
			
			if($wpdp_pro){
				foreach ( $_POST as $key => $value ) {		
				if ( get_option( $key ) != $value ) {
					update_option( sanitize_text_field($key), sanitize_text_field($value) );
				} else {
					add_option( sanitize_text_field($key), sanitize_text_field($value), '', 'no' );
				}}
			}else{
			
				update_option( 'wp_datepicker', sanitize_text_field($_POST['wp_datepicker']));
			}
			
		
		
		
	}
	$wpdp_selectors = get_option( 'wp_datepicker');
	
	
	
?>	
<div class="wrap wpdp">
	
  <div class="head_area">
	<h2><?php _e( '<span class="dashicons dashicons-welcome-widgets-menus"></span>WP Datepicker '.'('.$wpdp_data['Version'].($wpdp_pro?') Pro':')'), 'wp-dp' ); ?></h2>
    
    
    </div>
<form method="post" action="">  
<input type="hidden" name="wpdp_fields_submitted" value="submitted" />
<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes', 'wp-dp' ); ?>" /></p> 
<div class="wpdp_settings">



<input type="text" width="100%" value="<?php echo $wpdp_selectors; ?>" class="wpdp_selectors" name="wp_datepicker" /><br />
<small>
You can enter multiple selectors as CSV (Comma Separated Values).<br />

e.g. <br />
<span class="wpdp_1">#datepicker</span><br />
or<br />
<span class="wpdp_2">#datepicker, .hasDatepicker, .date-field</span><br />
and<br />
<span class="wpdp_3">Sample HTML: &lt;input type=&quot;text&quot; id=&quot;datepicker&quot; /&gt;</span>
</small>


<?php if($wpdp_pro){ wpdp_pro_settings(); } ?>


<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes', 'wp-dp' ); ?>" /></p>
</div>
</form>
</div>