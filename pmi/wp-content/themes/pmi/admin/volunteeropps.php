<?php 

class vol_opps_metaboxes {

	const NONCE = 'vol_opps_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_vol_opps_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_vol_opps_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Opportunities', ET_DOMAIN), array($this, 'add_vol_meta_details'), 'vol_opps', 'advanced', 'low');
      		}

function add_vol_meta_details($post) {

		global $wpdb;
        $opportunity_title = get_post_meta( $post->ID, 'opportunity_title', true );
		$earnings = get_post_meta( $post->ID, 'earnings', true );
		$commitment_hrs = get_post_meta( $post->ID, 'commitment_hrs', true );
		$contact_name = get_post_meta( $post->ID, 'contact_name', true );
		$skills = get_post_meta( $post->ID, 'skills', true );
		
		
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
			<label for=""><strong>Opportunity Title </strong></label> 
			<input type="text" name="opportunity_title" size="28" class="et-field" value="<?php echo $opportunity_title;?>">
	 </p>
     <p>
			<label for=""><strong>PDU Earnings</strong></label> 
		    <input type="text" name="earnings" size="28" class="et-field" value="<?php echo $earnings;?>">
            
     </p>
      <p>
			<label for=""><strong>Commitment Hours</strong></label> 
			<input type="text" name="commitment_hrs" size="28" class="et-field" value="<?php echo $commitment_hrs;?>">
	 </p>
     <p>
			<label for=""><strong>Contact Name</strong></label> 
			<input type="text" name="contact_name" size="28" class="et-field" value="<?php echo $contact_name;?>">
     </p>
      <p>
			<label for=""><strong>Skills</strong></label> 
			<input type="text" name="skills" size="28" class="et-field" value="<?php echo $skills;?>">
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


         $this->update_opps_meta($post_id, 'opportunity_title', 	$_POST['opportunity_title']);
		 $this->update_opps_meta($post_id, 'earnings', $_POST['earnings']);
		 $this->update_opps_meta($post_id, 'commitment_hrs', 	$_POST['commitment_hrs']);
		 $this->update_opps_meta($post_id, 'contact_name', $_POST['contact_name']);
		 $this->update_opps_meta($post_id, 'skills', 	$_POST['skills']);
		
	}

	protected function update_opps_meta($id, $meta_key, $meta_value){

		return update_post_meta( $id, $meta_key, $meta_value );
	}

	

	

	

}



?>