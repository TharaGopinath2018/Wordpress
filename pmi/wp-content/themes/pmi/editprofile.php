<?php
/*
Template Name: Edit Profile Template
*/
?>
<?php get_header();?>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <?php
error_reporting(0);
if(isset($_POST['updatepass']))
{
	$update = emailpassword($_POST);
    wp_redirect(HOME.'edit-profile?msg='.$update);
}
if(isset($_GET['msg']) && $_GET['msg'] == 1)
{
	$msg ='Password has been updated successfully.';
}elseif(isset($_GET['msg']) && $_GET['msg'] == 2)
{
	$msg = 'Sorry! Your current password is incorrect. Please try again.';
}elseif(isset($_GET['msg']) && $_GET['msg'] == 3)

{
	$msg = 'Password Mismatch';
}
else
{
}
?>
<script>
   $(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($msg) && !empty($msg)){?>
		$(".success-msg").text("<?php echo $msg; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
	<?php } ?>
});
</script>
        <?php 
	global $current_user;
   $detail =get_currentuserinfo();
   //echo "<pre>"; print_r($detail);exit;
	   //echo 'Welcome '.$current_user->user_email . "\n";
?>
       <div class="edit_profile">
          <h4>Change Password </h4>
          <p>If you wish to change your password, you may do so below:</p>
		  <p class="changepass">(If you had forgotten your password and have signed-in using a system generated password, please enter the system generated password as the Old Password)</p>
          <form method="post" action="" class="editprofile">
          <p>
            <label>Old Password:</label>
            <span>
            <input type="hidden" name="user_id"  value="<?php echo $current_user->user_email;?>">
            <input type="password" name="old_pass" ">
            </span>
            </p>
            <p>Passwords allow you fast and secure access to your account. The security of your account is important and hence we recommend your password contain at least one letter and one number.</p>
            <p><label>Password:</label>
            <span>
            <input type="password" name="update_pass" >
            </span>
            </p>
            <p><label>Confirm Password:</label>
            <span>
            <input type="password" name="update_confirm_pass" >
            </span>
            </p>
            <input class="btn btn_action" type="submit" name="updatepass" value="Update">
          </form>
        </div>
      </div>
      
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
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
