<?php
/*
Template Name: Open Cases Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome"> <h4>Open Cases </h4>
        <div class="help_disk">

		<?php 
		  global $current_user;
		  $user_id = $current_user->ID;
		  $key = 'reg_lastname';
		  $single = true;
		  $user_last = get_user_meta( $user_id, $key, $single );
		  $username = $current_user->user_email;
			 $user_query =  "SELECT * FROM helpdisk WHERE help_mail = '".$username."' AND  status= 'open' ";
			 $result = $wpdb->get_results($user_query);
			//echo "<pre>"; print_r($result); exit;
			//echo $username = $current_user->user_email;
			if($result){
			foreach($result as $user)
			{
			
		  ?>
          
              	<form method="post" action="" name="hiring_form" enctype="multipart/form-data">
               		<p><label> </label><input type="hidden"   name="status" value="open" /></p>
                    <p><label>Ticket ID </label><?php  echo $user->id; ?></p>
                    <p><label>Category </label><?php  echo $user->help_category; ?></p>
                    <p><label>Subject </label><?php  echo $user->help_subject; ?></p>
                                     
              </form><?php } }
			  else
			  {
				  echo "Sorry, You don't have any open Help Desk ticket";
			  }?>
              <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog"> 
         <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff; margin-top:-15px;">&times;</button>
          <h4 class="modal-title success-msg"></h4>
        </div>
     </div>
    </div>
  </div>
      
 
   </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
