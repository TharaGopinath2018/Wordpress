<?php
/*
Template Name: Enroll Status Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <h4>Enrollment Status </h4>
      
        <div class="">
         <?php
		  global $current_user;
		  $user_id = $current_user->ID;
		  $key = 'reg_lastname';
		  $single = true;
		  $user_last = get_user_meta( $user_id, $key, $single );
		  
		  $username = $current_user->user_email;
		  
		 $user_query =  "SELECT * FROM v_enroll WHERE email_add = '".$username."' ";
		 $result = $wpdb->get_results($user_query);
		//echo "<pre>"; print_r($result); exit;
		//echo $username = $current_user->user_email;
		 foreach($result as $user)
		 {
			 $email_add =  $user->email_add;
		 }
		// echo $email_add = $username;
		  if($email_add == $username)
		  {
			  echo "Your volunteering enrollment request is currently open";
		  }else
		  {
			  echo "Sorry, you don't have any open volunteering enrollment request";
		  }
		  
		  
		  ?>
          
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
