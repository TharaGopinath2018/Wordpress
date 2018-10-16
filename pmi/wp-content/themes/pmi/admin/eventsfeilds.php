<?php 
class events_metaboxes {

	const NONCE = 'events_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_events_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_events_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Events Details', ET_DOMAIN), array($this, 'events_meta_details'), 'events', 'advanced', 'low');
			// add_meta_box("partners_meta_logo", "Events Details", "events_meta_details", "events", "advanced", "high", null);
      		}

function events_meta_details($post) {

		global $wpdb;
        $events_type = get_post_meta( $post->ID, 'events_type', true );
		$events_venue = get_post_meta( $post->ID, 'events_venue', true );
		$events_link_video = get_post_meta( $post->ID, 'events_link_video', true );
		$events_highlights = get_post_meta( $post->ID, 'events_highlights', true );
		$events_start_date = get_post_meta( $post->ID, 'events_start_date', true );
		$events_end_date = get_post_meta( $post->ID, 'events_end_date', true );
		$events_start_time = get_post_meta( $post->ID, 'events_start_time', true );
		$events_end_time = get_post_meta( $post->ID, 'events_end_time', true );
		
		//$partners = jp_partners_details($post);
?>
<style>
.edit_profile_admin label{
	width:230px;
	float:left;
}
</style>
<script>
jQuery(document).ready(function(){
jQuery('#cookie_date').datepicker({
dateFormat : 'dd/mm/yy'
});
});
jQuery(document).ready(function(){
jQuery('#cookie_date1').datepicker({
dateFormat : 'dd/mm/yy'
});
});
jQuery(document).ready(function(){
jQuery('#cookie_date2').datepicker({
dateFormat : 'dd/mm/yy'
});
});
jQuery(document).ready(function(){
jQuery('#cookie_date3').datepicker({
dateFormat : 'dd/mm/yy'
});
});
jQuery(document).ready(function(){
jQuery('#cookie_date4').datepicker({
dateFormat : 'dd/mm/yy'
});
});
</script>
 <div class="edit_profile_admin">
<input type="hidden" name="_et_nonce" value="<?php echo wp_create_nonce( self::NONCE ) ?>">

     <p>
			<label for=""><strong> Type</strong></label> 
			<input type="text" name="events_type" size="28" class="et-field" value="<?php echo $events_type;?>">
	 </p>
     <p>
			<label for=""><strong>Venue </strong></label> 
		    <input type="text" name="events_venue" size="28" class="et-field" value="<?php echo $events_venue;?>">
            
     </p>
      <p>
			<label for=""><strong>Youtube Video</strong></label> 
			<input type="text" name="events_link_video" size="28" class="et-field" value="<?php echo $events_link_video;?>">
	 </p>
     <p>
			<label for=""><strong>Session Highlights</strong></label> 
			<input type="text" name="events_highlights" size="28" class="et-field" value="<?php echo $events_highlights;?>">
     </p>
      <p>
			<label for=""><strong> Start Date</strong></label> 
			<input type="date"  name="events_start_date" size="28" class="et-field" value="<?php echo $events_start_date;?>">
	 </p>
     <p>
			<label for=""><strong> End Date</strong></label> 
			<input type="date"   name="events_end_date" size="28" class="et-field" value="<?php echo $events_end_date;?>">
     </p>
      <p>
			<label for=""><strong>Start Time</strong></label> 
			<input type="time" name="events_start_time" size="28" class="et-field" value="<?php echo $events_start_time;?>">
	 </p>
     <p>
			<label for=""><strong>End Time</strong></label> 
			<input type="time" name="events_end_time" size="28" class="et-field" value="<?php echo $events_end_time;?>">
     </p>
</div>
<?php

}

	// handle save job action



	public function save_job($post_id){

		global $wpdb;
		if (!isset($_POST['_et_nonce']) || !wp_verify_nonce( $_POST['_et_nonce'], self::NONCE )) return;
        unset($_POST['_et_nonce']);

		if (!current_user_can( 'manage_options' ) ) return;


         $this->update_events_meta($post_id, 'events_type', 	$_POST['events_type']);
		 $this->update_events_meta($post_id, 'events_venue', $_POST['events_venue']);
		 $this->update_events_meta($post_id, 'events_link_video', 	$_POST['events_link_video']);
		 $this->update_events_meta($post_id, 'events_highlights', $_POST['events_highlights']);
		 $this->update_events_meta($post_id, 'events_start_date', 	$_POST['events_start_date']);
		 $this->update_events_meta($post_id, 'events_end_date', $_POST['events_end_date']);
		 $this->update_events_meta($post_id, 'events_start_time', 	$_POST['events_start_time']);
		 $this->update_events_meta($post_id, 'events_end_time', $_POST['events_end_time']);
	}

	protected function update_events_meta($id, $meta_key, $meta_value){

		return update_post_meta( $id, $meta_key, $meta_value );
	}

}?>