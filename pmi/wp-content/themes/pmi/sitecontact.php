<?php
/*
Template Name: Site Contact  Template
*/
?>
<?php get_header();?>
<?php
if(isset($_POST['sitecontact']))
{
	$contact = sitecontact($_POST);
}
?>
<script>
   		$(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($contact) && !empty($contact)){?>
		$(".success-msg").text("<?php echo $contact; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
		<?php } ?>
		});
		</script>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome"> <h4>Contact Us </h4>
      
        <?php 
global $current_user;
    
	  $user_id = $current_user->ID;
	  $key = 'reg_lastname';
	  $single = true;
	  $user_last = get_user_meta( $user_id, $key, $single ); 
	
?>

        <div class="edit_profile">
         
         
          <form method="post" action="" class="sitecontact">
            <p><label>First Name:</label>
            <span>
            <input type="text" name="f_name" value="<?php  echo $current_user->display_name; ?>" placeholder="First Name">
            </span>
            </p>
            <p>
              <label>Last Name:</label>
            <span>
            <input type="text" name="l_name" value="<?php  echo $user_last ?>" placeholder="Last Name">
            </span>
            </p>
            <p>
              <label>Email Address:</label>
            <span>
            <input type="text" name="user_email" value="<?php echo $current_user->user_email; ?>" placeholder="Email Address">
            </span>
            </p>
            <p>
              <label>Choose the Appropriate Topic:</label>
            <span>
            <select name="contact_topic">
            <option value="-1">Select a Topic</option>
            <option value="Alliances">Alliances</option>
            <option value="Help">Help</option>
            <option value="Others">Others</option>
            <option value="Press/Public Relations">Press/Public Relations</option>
            <option value="Suggestions">Suggestions</option>
            </select>
            </span>
            </p>
            <p>
              <label>Tell us how we may help you.</label>
              </p>
              <p>
            <span>
            <textarea name="contact_help"></textarea>
            </span>
            </p>
            <p>
            
            <input class="btn btn_action" type="submit" name="sitecontact" value="send">
            </p>
          </form>
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
