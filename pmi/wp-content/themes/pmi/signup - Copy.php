<?php
/*
Template Name: Singup Template
*/
?>
<?php
if(isset($_POST['login_submit']))
{
    $msg = login_user($_POST);
		if(is_user_logged_in()){
			wp_redirect(HOME.'user-profile'); exit;
}
}
?>
<?php
if(isset($_POST['forget_email']))
{
	//echo $forget = $_POST['forget_password'];
	//exit;
	$forget = forget_password($_POST); 
}
if(isset($_POST['reg_submit']))
{
$res = sing_up($_POST);
}
?>

<?php get_header(); ?>
<script>
   $(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($res) && !empty($res)){?>
		$(".success-msg").text("<?php echo $res; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
	<?php } ?>
		<?php if(isset($forget) && !empty($forget)){?>
		$(".success-msg").text("<?php echo $forget; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
	<?php } ?>
	
	<?php if(isset($msg) && !empty($msg)){?>
		$(".success-msg").text("<?php echo $msg; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 5000);
	<?php } ?>
	
		});
</script>
<script type="text/javascript">
	function isNumberKey(evt)
          {
             var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
 
             return true;
          }
</script>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
       
       <!--form start-->
       
              <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a id="for_login" data-toggle="tab" href="#home">Login</a> </li>
                <li><a class="list_padding">|</a></li>
                <li><a id="for_signup" data-toggle="tab" href="#ios">Sign up</a></li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div id="home" class="tab-pane fade in active">
                  <div class="modal-body">
                  <?php
				  if($res)
					{
						//echo '<font color="#3300FF">' .$res.'</font>';
					}
				  ?>
                    <p class="">If you're already assigned access to your PMI Chennai Chapter , please Sign In.</p>
                    
                    <form _uid="1891" class="newform " method="POST" action="" enctype="#">
                      <div id="js_register_dialog_row19" class="input type_text  required_input">
                        <div class="value">
                       
                          <label>Username : </label>
                          <span>
                          <input type="text" required="required" placeholder="Enter your email" _uid="1902" name="user_email" >
                          </span>   </div>
                      </div>
                      <div id="js_register_dialog_row22" class="input type_password  required_input">
                        <div class="value">
                          <label>Password : </label>
                          <input type="password" required="required" placeholder="Password" _uid="1907" name="user_password" >
                          <!--<input type="text"  onkeypress="return isNumberKey(event)" name="textboxonlynumber" />-->

                        </div>
                      </div>
                      <ul>
                       <!-- <li>Password is case sensitive.</li>-->
                        <li><a href="#forget"  data-toggle="tab">Forgot your Password?</a></li>
                      </ul> <ul>
                    <!--    <li>Password is case sensitive.</li>-->
                        <li><a href="#"   data-toggle="modal" data-target="#myModal">Forgot your User ID and Password?</a></li> 
                        <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog"> 
                        <div class="modal-content">
                        <div class="value">
                <div id="terms_privacy" class="meta">If you have forgotten your User ID and Password, please contact VP Membership for your credentials. Thank you. PMI Chennai Chapter </div>
              </div><div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
                        </div>
                        </div>
                        </div>
                      </ul>
                     
                      <div id="js_register_dialog_row36" class="input type_buttons ">
                        <div class="value">
                          <ul class="actions horizontal">
                            <li>
                              <input type="submit" name="login_submit" value="Log in" class="btn btn_action" id="registerButton">
                            </li>
                            <!-- <li><a href=""><span class="clickable cancel-fun" _uid="1889">I forgot my password</span></a></li>-->
                          </ul>
                        </div>
                      </div>
                    </form>
                    
                  </div>
                </div>
                <div id="ios" class="tab-pane fade">
                  <div id="home" class="tab-pane fade in active">
                    <div class="modal-body">
                      <p class="">If you're already enrolled as a member of PMI Chennai Chapter , please submit request to access PMI Chennai Chapter.</p>
                      <form _uid="1891"   name="signupform" class="newform " method="POST" action="" enctype="#">
                        <div id="js_register_dialog_row19" class="input type_text  required_input">
                          <div class="value">
                            <label>First Name <span>*</span> : </label>
                            <input type="text" required="required" placeholder="Enter First Name" _uid="1902" name="reg_fistname" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row19" class="input type_text  required_input">
                          <div class="value">
                            <label>Last Name <span>*</span> : </label>
                            <input type="text" required="required" placeholder="Enter Last Name" _uid="1902" name="reg_lastname" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>PMI Member ID<span>*</span> : </label>
                            <input type="text"  placeholder="PMI Member ID" _uid="1907" name="reg_pmino">
                          </div>
                        </div>
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Email Address<span>*</span> : </label>
                            <input type="email" required="required" placeholder="Email Address" _uid="1907" name="reg_emailaddress" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Password<span>*</span> : </label>
                            <input type="password" required="required" id="pass" placeholder="Password" _uid="1907" name="reg_password" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Confirm Password<span>*</span> : </label>
                            <input type="password" required="required" id="c_pass" placeholder="Confirm Password" _uid="1907" name="creg_password" onblur="confirmPass()" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Designation : </label>
                            <input type="text"  placeholder="Designation" _uid="1907" name="reg_desgination" >
                          </div>
                        </div>
                        <!--<div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Contact Phone : </label>
                            <input type="text"  placeholder="Contact Phone" _uid="1907" name="reg_conphone" >
                          </div>
                        </div>-->
                        <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Mobile <span>*</span> : </label>
                            <input type="text"  placeholder="Mobile" _uid="1907" name="reg_mobile" required="required" onkeypress="return isNumberKey(event)" >
                          </div>
                        </div>
                        <div id="js_register_dialog_row36" class="input type_buttons ">
                          <div class="value">
                            <ul class="actions horizontal">
                              <li>
                                <input type="submit" name="reg_submit" value="Sign up" class="btn btn_action" id="registerButton" onblur="confirmPass()">
                              </li>
                            </ul>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div id="forget" class="tab-pane fade">
                  <div id="home" class="tab-pane fade in active">
                    <div class="modal-body">
                    
                      <form _uid="1891"   name="signupform" class="newform " method="POST" action="" enctype="#">
                        <div id="js_register_dialog_row19" class="input type_text  required_input">
                          <div class="value">
                            <label>Email <span>*</span> : </label>
                            <input type="text" required="required" placeholder="Enter Email Address" _uid="1902" name="forget_password" >
                          </div>
                          <ul class="actions horizontal">
                              <li>
                                <input type="submit" name="forget_email"  class="btn btn_action" id="registerButton">
                              </li>
                            </ul>
                        </div>
                      </form>
                    </div>
                  </div>
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
   
       <!--form end-->
       
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>