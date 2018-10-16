<?php 
class training_metaboxes {

	const NONCE = 'training_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_training_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_training_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Training Details', ET_DOMAIN), array($this, 'training_meta_details'), 'training', 'advanced', 'low');
		//	add_meta_box("partners_meta_logo", "Training Details ", "training_meta_details", "training", "advanced", "low");
      		}

function training_meta_details($post) {

		global $wpdb;
        $training_formate_type = get_post_meta( $post->ID, 'training_formate_type', true );
		$training_venue = get_post_meta( $post->ID, 'training_venue', true );
		$training_start_date1 = get_post_meta( $post->ID, 'training_start_date1', true );
		$training_start_time11 = get_post_meta( $post->ID, 'training_start_time1', true );
		$training_end_time12 = get_post_meta( $post->ID, 'training_end_time1', true );
		$training_start_date2 = get_post_meta( $post->ID, 'training_start_date2', true );
		$training_start_time13 = get_post_meta( $post->ID, 'training_start_time2', true );
		$training_end_time14 = get_post_meta( $post->ID, 'training_end_time2', true );
		$training_start_date3 = get_post_meta( $post->ID, 'training_start_date3', true );
		$training_start_time15 = get_post_meta( $post->ID, 'training_start_time3', true );
		$training_end_time16 = get_post_meta( $post->ID, 'training_end_time3', true );
		$training_start_date4 = get_post_meta( $post->ID, 'training_start_date4', true );
		$training_start_time17 = get_post_meta( $post->ID, 'training_start_time4', true );
		$training_end_time18 = get_post_meta( $post->ID, 'training_end_time4', true );
		$training_member_price = get_post_meta( $post->ID, 'training_member_price', true );
		$training_non_member_price = get_post_meta( $post->ID, 'training_non_member_price', true );
		$training_pdu_awarded = get_post_meta( $post->ID, 'training_pdu_awarded', true );
		$training_language = get_post_meta( $post->ID, 'training_language', true );
		$training_seats_allocated = get_post_meta( $post->ID, 'training_seats_allocated', true );
		//$partners = jp_partners_details($post);
?>
<style>
.edit_profile_admin label{
    width:230px;
	float:left;
}
</style>
<link href="<?php echo get_template_directory_uri(); ?>/admin/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script>
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
			<label for=""><strong>Formate Type</strong></label> 
			<input type="text" name="training_formate_type" size="28" class="et-field" value="<?php echo $training_formate_type;?>">
	 </p>
     <p>
			<label for=""><strong>Venue</strong></label> 
		    <input type="text" name="training_venue" size="28" class="et-field" value="<?php echo $training_venue;?>">
            
     </p>
     <p>
			<label for=""><strong>Start Date1</strong></label> 
			<input type="text" name="training_start_date1" id="cookie_date1" size="28" class="et-field" value="<?php echo $training_start_date1;?>">
	 </p>
     <p>
			<label for=""><strong>Start Time</strong></label> 
			<input type="text" name="training_start_time1" size="28" class="et-field" value="<?php echo $training_start_time11;?>">
     </p>
      <p>
			<label for=""><strong>End Time</strong></label> 
			<input type="text" name="training_end_time1" size="28" class="et-field" value="<?php echo $training_end_time12;?>">
	 </p>
      
       <p>
			<label for=""><strong>Start Date2</strong></label> 
			<input type="text" name="training_start_date2" id="cookie_date2" size="28" class="et-field" value="<?php echo $training_start_date2;?>">
	 </p>
     <p>
			<label for=""><strong>Start Time</strong></label> 
			<input type="text" name="training_start_time2" size="28" class="et-field" value="<?php echo $training_start_time13;?>">
     </p>
      <p>
			<label for=""><strong>End Time</strong></label> 
			<input type="text" name="training_end_time2" size="28" class="et-field" value="<?php echo $training_end_time14;?>">
	 </p>
       <p>
			<label for=""><strong>Start Date3</strong></label> 
			<input type="text" name="training_start_date3" id="cookie_date3" size="28" class="et-field" value="<?php echo $training_start_date3;?>">
	 </p>
     <p>
			<label for=""><strong>Start Time</strong></label> 
			<input type="text" name="training_start_time3" size="28" class="et-field" value="<?php echo $training_start_time15;?>">
     </p>
      <p>
			<label for=""><strong>End Time</strong></label> 
			<input type="text" name="training_end_time3" size="28" class="et-field" value="<?php echo $training_end_time16;?>">
	 </p>
      <p>
        <p>
			<label for=""><strong>Start Date4</strong></label> 
			<input type="text" name="training_start_date4" id="cookie_date4" size="28" class="et-field" value="<?php echo $training_start_date4;?>">
	 </p>
     <p>
			<label for=""><strong>Start Time</strong></label> 
			<input type="text" name="training_start_time4" size="28" class="et-field" value="<?php echo $training_start_time17;?>">
     </p>
      <p>
			<label for=""><strong>End Time</strong></label> 
			<input type="text" name="training_end_time4" size="28" class="et-field" value="<?php echo $training_end_time18;?>">
	 </p>
			<label for=""><strong>Member Price</strong></label> 
			<input type="text" name="training_member_price" size="28" class="et-field" value="<?php echo $training_member_price;?>">
	 </p>
     <p>
			<label for=""><strong>Non Member</strong></label> 
			<input type="text" name="training_non_member_price" size="28" class="et-field" value="<?php echo $training_non_member_price;?>">
     </p>
       <p>
			<label for=""><strong>PDU awarded</strong></label> 
			<input type="text" name="training_pdu_awarded" size="28" class="et-field" value="<?php echo $training_pdu_awarded;?>">
     </p>
       <p>
			<label for=""><strong>Language</strong></label> 
			<input type="text" name="training_language" size="28" class="et-field" value="<?php echo $training_language;?>">
     </p>
       <p>
			<label for=""><strong>Seats Allocated</strong></label> 
			<input type="text" name="training_seats_allocated" size="28" class="et-field" value="<?php echo $training_seats_allocated;?>">
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
         $this->update_training_meta($post_id, 'training_formate_type',  $_POST['training_formate_type']);
		 $this->update_training_meta($post_id, 'training_venue', $_POST['training_venue']);
		 
		 $this->update_training_meta($post_id, 'training_start_date1', $_POST['training_start_date1']);
		 $this->update_training_meta($post_id, 'training_start_time1', $_POST['training_start_time1']);
		 $this->update_training_meta($post_id, 'training_end_time1', $_POST['training_end_time1']);
		 $this->update_training_meta($post_id, 'training_start_date2', $_POST['training_start_date2']);
		 $this->update_training_meta($post_id, 'training_start_time2', $_POST['training_start_time2']);
		 $this->update_training_meta($post_id, 'training_end_time2', $_POST['training_end_time2']);
		 $this->update_training_meta($post_id, 'training_start_date3', $_POST['training_start_date3']);
		 $this->update_training_meta($post_id, 'training_start_time3', $_POST['training_start_time3']);
		 $this->update_training_meta($post_id, 'training_end_time3', $_POST['training_end_time3']);
		 $this->update_training_meta($post_id, 'training_start_date4', $_POST['training_start_date4']);
		 $this->update_training_meta($post_id, 'training_start_time4', $_POST['training_start_time4']);
		 $this->update_training_meta($post_id, 'training_end_time4', $_POST['training_end_time4']);
		   
		 $this->update_training_meta($post_id, 'training_member_price', $_POST['training_member_price']);
		 $this->update_training_meta($post_id, 'training_non_member_price', $_POST['training_non_member_price']);
		 $this->update_training_meta($post_id, 'training_pdu_awarded', $_POST['training_pdu_awarded']);
		 $this->update_training_meta($post_id, 'training_language', $_POST['training_language']);
		 $this->update_training_meta($post_id, 'training_seats_allocated', $_POST['training_seats_allocated']);
	}
	protected function update_training_meta($id, $meta_key, $meta_value){
		return update_post_meta( $id, $meta_key, $meta_value );
	}
}
?>