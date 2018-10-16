<?php
/*
Template Name: HelpDisk Template
*/
?>
<?php get_header();?>
<?php
if(isset($_POST['submit_help']))
{  
	$help = helpdisk($_POST);
}
?>
 <script>
$(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($help) && !empty($help)){?>
		$(".success-msg").text("<?php echo $help; ?>");
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
<div class="pmi_welcome">
<div class="help_disk">

<h4 class="pmi_title">Submit a HelpDesk Ticket</h4>
<p>The Help Desk is managed by a set of dedicated Volunteers with day jobs. They will get back to you as soon as possible..
</p>        <?php 
				  global $current_user;
				  $user_id = $current_user->ID;
				  $key = 'reg_lastname';
				  $single = true;
				  $user_last = get_user_meta( $user_id, $key, $single );?>
          
              <form method="post" action="" name="hiring_form" enctype="multipart/form-data">
               		<p><label> </label><input type="hidden"   name="status" value="open" /></p>
                    <p><label>First Name</label><input type="text"   name="help_name" value="<?php  echo $current_user->display_name; ?>" /></p>
                    <p><label>Last Name</label><input type="text" name="last_name" value="<?php  echo $user_last ?>" ></p>
                    <p><label>Email Address</label><input type="text"   name="help_mail"   value="<?php echo $current_user->user_email; ?>"     /></p>
                    <p><label>Contact Phone</label><input type="text"   name="help_contact"        /></p>
                    <p><label>Ticket Category</label><select name="help_category">
                    							<option selected="selected" value="">Choose the Category</option>
												<option value="Access Request">Access Request</option>
												<option value="Billing">Billing</option>
												<option value="Comments">Comments</option>
												<option value="Membership">Membership</option>
												<option value="Not receiving event communications">Not receiving event communications</option>
												<option value="Sponsorship">Sponsorship</option>
												<option value="Technical">Technical</option>
												<option value="Training &amp; Education">Training &amp; Education</option>
                                                <option value="Volunteers">Volunteers</option>
                    							</select></p>
                    <!--<p><label>What would you like to report?</label><select name="help_report">
                    							<option selected="selected" value="-1">Choose the Category</option>
                    							</select></p>-->
                    <p><label>Subject</label><input type="text"   name="help_subject"  /></p>
                    <p><label>Description of the Issue or problem</label><textarea rows="5" cols="40" name="help_desc"></textarea></p>
                  <p><span><input type="submit" name="submit_help"  value="Submit"  class="btn_search_carrer"/></span><span><input type="reset" name="reset" value="Clear"></span></p>
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
      <!-- Contact section Starts here -->
<?php get_footer();?>