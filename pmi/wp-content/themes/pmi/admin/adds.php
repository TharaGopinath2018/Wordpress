<?php 

class adds_metaboxes {

	const NONCE = 'adds_metaboxes';

	public function __construct(){

		$this->add_action( 'add_meta_boxes', 'add_adds_meta_boxes' );

		$this->add_action( 'save_post', 'save_job' );

	}

	    public function add_action($hook, $callback){

			add_action($hook, array($this, $callback) );
			}
	   public function add_adds_meta_boxes(){
		
			add_meta_box('partners_meta_logo', __('Chapter Executives Details', ET_DOMAIN), array($this, 'c_executives_meta_details'), 'adds', 'side', 'low');
      		}

function c_executives_meta_details($post) {

		global $wpdb;
        $adds_site_title = get_post_meta( $post->ID, 'adds_site_title', true );
		$adds_site_url = get_post_meta( $post->ID, 'adds_site_url', true );
	
		
		
		//$partners = jp_partners_details($post);
?>

<input type="hidden" name="_et_nonce" value="<?php echo wp_create_nonce( self::NONCE ) ?>">

     <p>
			<label for=""><strong>Site Title</strong></label> 
			<input type="text" name="adds_site_title" size="28" class="et-field" value="<?php echo $adds_site_title;?>">
	 </p>
     <p>
			<label for=""><strong>URL</strong></label> 
		    <input type="text" name="adds_site_url" size="28" class="et-field" value="<?php echo $adds_site_url;?>">
            
     </p>
    
    

<?php

}

	// handle save job action



	public function save_job($post_id){

		global $wpdb;
		if (!isset($_POST['_et_nonce']) || !wp_verify_nonce( $_POST['_et_nonce'], self::NONCE )) return;
        unset($_POST['_et_nonce']);

		if (!current_user_can( 'manage_options' ) ) return;


         $this->update_c_executives_meta($post_id, 'adds_site_title',  $_POST['adds_site_title']);
		 $this->update_c_executives_meta($post_id, 'adds_site_url', $_POST['adds_site_url']);
		
		 
	}

	protected function update_c_executives_meta($id, $meta_key, $meta_value){

		return update_post_meta( $id, $meta_key, $meta_value );
	}

	

	

	

}



?>