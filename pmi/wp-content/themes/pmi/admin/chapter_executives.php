<?php 

class c_executives_metaboxes {

	const NONCE = 'c_executives_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_c_executives_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_c_executives_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Chapter Executives Details', ET_DOMAIN), array($this, 'c_executives_meta_details'), 'chapter_executives', 'advanced', 'low');
      		}

function c_executives_meta_details($post) {

		global $wpdb;
        $c_executives_Designation = get_post_meta( $post->ID, 'c_executives_Designation', true );
		$c_executives_email = get_post_meta( $post->ID, 'c_executives_email', true );
		$c_executives_mobile = get_post_meta( $post->ID, 'c_executives_mobile', true );
		
		
		
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
			<label for=""><strong>Designation</strong></label> 
			<input type="text" name="c_executives_Designation" size="28" class="et-field" value="<?php echo $c_executives_Designation;?>">
	 </p>
     <p>
			<label for=""><strong>Email</strong></label> 
		    <input type="text" name="c_executives_email" size="28" class="et-field" value="<?php echo $c_executives_email;?>">
            
     </p>
     <p>
			<label for=""><strong>Mobile</strong></label> 
		    <input type="text" name="c_executives_mobile" size="28" class="et-field" value="<?php echo $c_executives_mobile;?>">
            
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


         $this->update_c_executives_meta($post_id, 'c_executives_Designation',  $_POST['c_executives_Designation']);
		 $this->update_c_executives_meta($post_id, 'c_executives_email', $_POST['c_executives_email']);
		 $this->update_c_executives_meta($post_id, 'c_executives_mobile', $_POST['c_executives_mobile']);
		 
	}

	protected function update_c_executives_meta($id, $meta_key, $meta_value){

		return update_post_meta( $id, $meta_key, $meta_value );
	}

	

	

	

}



?>