<?php 

class volunteer_metaboxes {

	const NONCE = 'volunteer_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_volunteer_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_volunteer_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Volunteer Details', ET_DOMAIN), array($this, 'volunteer_meta_details'), 'volunteer', 'advanced', 'low');
      		}

function volunteer_meta_details($post) {

		global $wpdb;
        $volunteer_formate_type = get_post_meta( $post->ID, 'volunteer_formate_type', true );
		$volunteer_duration = get_post_meta( $post->ID, 'volunteer_duration', true );
		
		
		
		//$partners = jp_partners_details($post);
?>
<style>
.edit_profile_admin label{
	width:230px;
	float:left;
}
</style>
 <div class="edit_profile_admin">

<input type="hidden" name="_et_nonce" value="<?php echo wp_create_nonce( self::NONCE ) ?>">

     <p>
			<label for=""><strong>Type</strong></label> 
			<input type="text" name="volunteer_formate_type" size="28" class="et-field" value="<?php echo $volunteer_formate_type;?>">
	 </p>
     <p>
			<label for=""><strong>Duration</strong></label> 
		    <input type="text" name="volunteer_duration" size="28" class="et-field" value="<?php echo $volunteer_duration;?>">
            
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


         $this->update_volunteer_meta($post_id, 'volunteer_formate_type',  $_POST['volunteer_formate_type']);
		 $this->update_volunteer_meta($post_id, 'volunteer_duration', $_POST['volunteer_duration']);
		 
	}

	protected function update_volunteer_meta($id, $meta_key, $meta_value){

		return update_post_meta( $id, $meta_key, $meta_value );
	}

	

	

	

}



?>