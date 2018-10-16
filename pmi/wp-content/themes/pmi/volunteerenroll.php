<?php
/*
Template Name: VolunteerEnroll Template
*/
?>
<?php get_header();?>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <h4>Volunteer Enrollment</h4>
        <?php
		if(isset($_POST['vol_enroll_submit']))
		{
			$enroll = volenroll($_POST);
		}
		?>
        <script>
   		$(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($enroll) && !empty($enroll)){?>
		$(".success-msg").text("<?php echo $enroll; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
		<?php } ?>
		});
		</script>
        <?php
		  global $current_user;
		  $user_id = $current_user->ID;
		  $key = 'reg_lastname';
		  $single = true;
		  $user_last = get_user_meta( $user_id, $key, $single ); ?>
        <div class="edit_profile">
          <form method="post" action="" class="sitecontact profile_roll">
          <p>
            <label>First Name:</label>
            <span>
            <input type="text" name="firstname" value="<?php  echo $current_user->display_name; ?>">
            </span>
            </p>
            <p>
            <label>Last Name:</label>
            <span>
            <input type="text" name="last_name" value="<?php  echo $user_last ?>" >
            </span>
            </p>
            <p>
            <label>Mailing Address:</label>
            <span>
            <input type="text" name="email_add" value="<?php echo $current_user->user_email; ?>"  >
            </span>
            </p>
            <p>
            <label>Contact Phone Number:</label>
            <span>
            <input type="text" name="contact_no"  >
            </span>
            </p>
            <!--<p>
            <label>Cell Phone Number:</label>
            <span>
            <input type="text" name="mobile_no"  >
            </span>
            </p>-->
            <p>
            <label>Employer:</label>
            <span>
            <input type="text" name="employee"  >
            </span>
            </p>
            
         <!--   <p>
            <label>E-Mail Address:</label>
            <span>
            <input type="text" name="update_email"  >
            </span>
            </p>-->
            <p class="function_view">
            <label>Would you prefer to lead a team or work within a team:</label>
            <span>
            <input type="text" name="interest_of_work"  >
            </span>
            </p>
            <p>
            <label>Please list your areas of expertise:</label>
            <span>
            <textarea name="expertise"></textarea>
            </span>
            </p>
            <p>(Some examples: leadership, financial experience, planning, IT/Web design or coding, public speaking, organizational skills, etc.) </p>
           
            <p>
            <label>Committed Hours:</label>
            <span>
            <input type="text" name="commited_hrs"  >
            </span>
            </p>
            <p><label>
            Please let us know your time constraints and availability:</label>
            </p>
            <p>
            <textarea name="availability"></textarea>
            </p>
            <p>
            (For example: not available in November, available on Wednesday evenings, etc.)</p>
            </p>
            <p>
          <label>  What are you personally looking for from this volunteer opportunity? :</label>
            <span>
            <textarea name="from__vol_opportunity"></textarea>
            </span>
            </p>
            <p>
            <label>Is there anything you prefer not to do? :</label>
            </p>
            <p>
            <textarea name="prefer_not_to_do"></textarea>
            </p>
            
            <input type="submit" name="vol_enroll_submit" value="Update">
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
</div>
<?php get_footer(); ?>
