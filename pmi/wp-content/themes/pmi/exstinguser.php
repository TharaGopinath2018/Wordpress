<?php
/* Template Name: Existing  User Template */
?>
<?php
if(isset($_POST['forget_email']))
{
	$forget = forget_password($_POST);
}

if(isset($_POST['extreg_submit']))
{
	$resss = exstingsing_up($_POST);
}
if(isset($_POST['extreg_insert']))
{
	$insert = exstingsing_insert($_POST);
}

if(isset($_POST['search_pmi']))
{
$pmiid = $_POST['pmino'];
if(is_numeric($pmiid)){
global $wpdb;
$newuser  = $wpdb->get_results("select * from newdata where  pmiid = '".$pmiid."'");
} } ?>
<?php get_header(); ?>
<script>
   $(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($resss) && !empty($resss)){?>
		$(".success-msg").text("<?php echo $resss; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3500);
	<?php } ?>
		
		<?php if(isset($insert) && !empty($insert)){?>
		$(".success-msg").text("<?php echo $insert; ?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3500);
	<?php } ?>
});
</script>
<script type="text/javascript">
    function confirmPass() {
        var pass = document.getElementById("pass").value
        var confPass = document.getElementById("c_pass").value
        if(pass != confPass) {
            alert('Wrong Confirm Password !');
        }
		else
		{
			alert('Password Matched'); 	}
		
    }
</script>
<script type="text/javascript">
    function confirmPasss() {
        var passs = document.getElementById("passs").value
        var confPasss = document.getElementById("c_passs").value
        if(passs != confPasss) {
            alert('Wrong Confirm Password !');
        }
		else
		{
			alert('Password Matched'); 	}
		
    }
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
          <!-- <li><a class="list_padding">|</a></li>
                <li><a id="for_signup" data-toggle="tab" href="#ios">Sign up</a></li>-->
        </ul>
        <div class="tab-content" id="myTabContent">
          <div id="home" class="tab-pane fade in active">
            <div class="modal-body">
            
              <form _uid="1891"   name="pminumber" class="newform " method="POST" action="" enctype="#">
                <div id="js_register_dialog_row19" class="input type_text  required_input">
                  <p>
                  <div class="value">
                    <label>PMI Number <span>*</span> : </label>
                    <input type="text"  placeholder="Enter PMI Number" _uid="1902" name="pmino" >
                  </div>
                  </p>
                  <p> 
                 
                  <ul class="actions horizontal">
                    <li>
                      <input type="submit" name="search_pmi" value="Search" class="btn btn_action" id="registerButton">
                    </li>
                  </ul>
               </div>
              </form>
                 <?php
						if($reg)
						{
							echo $reg;
						}
				  ?>
               </div>
          </div>
        </div>
        <?php
		 /* if($resss)
		 {  echo $resss;	} 
		 else
		 {
			 echo $insert; 
		 }*/?>
                <?php
					if($newuser[0]>0)
					{ ?>
        <div class="tab-content" id="myTabContent">
          <div id="home" class="tab-pane fade in active">
            <div class="modal-body">
             
              <!--    <p class="">If you're already assigned access to your PMI Chennai Chapter , please Sign In.</p>-->
            <p>
              <?php  echo "Please check & change/confirm  Email, Password, Mobile number";?>
              </p>
              <form _uid="1891"   name="signupform" class="newform " method="POST" action="" enctype="#">
               <?php
				  
				  ?>
                <div id="js_register_dialog_row19" class="input type_text  required_input">
                  <div class="value">
                    <label>First Name <span>*</span> : </label>
                    <input type="text" required="required" placeholder="Enter First Name" _uid="1902" name="reg_fistname" value="<?php  echo $newuser[0]->firstname;?>" readonly="readonly" class="visible_someting">
                  </div>
                </div>
                <div id="js_register_dialog_row19" class="input type_text  required_input">
                  <div class="value">
                    <label>Last Name <span>*</span> : </label>
                    <input type="text" required="required" placeholder="Enter Last Name" _uid="1902" name="reg_lastname" value="<?php  echo $newuser[0]->lastname;?>" readonly="readonly" class="visible_someting" >
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>PMI Number<span>*</span> : </label>
                    <input type="text"  placeholder="PMI Number" _uid="1907" name="reg_pmino" value="<?php  echo $newuser[0]->pmiid;?>" readonly="readonly" class="visible_someting">
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Email Address<span>*</span> : </label>
                    <input type="email" required="required" placeholder="Email Address" _uid="1907" name="reg_emailaddress" value="<?php  echo $newuser[0]->primaryemail;?>" >
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Password<span>*</span> : </label>
                    <input type="password" required="required" id="pass"placeholder="Password" _uid="1907" name="reg_password"  >
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
                    <label>Mobile <span>*</span>: </label>
                    <input type="text"  placeholder="Mobile" _uid="1907" name="reg_mobile"  required="required" value="<?php  echo $newuser[0]->mobileno;?>" onkeypress="return isNumberKey(event)">
                  </div>
                </div>
                <div id="js_register_dialog_row36" class="input type_buttons ">
                  <div class="value">
                    <ul class="actions horizontal">
                      <li>
                        <input type="submit" name="extreg_submit" value="Sign up" class="btn btn_action" id="registerButton">
                      </li>
                    </ul>
                  </div>
                </div>
              </form>
            </div>
          </div>
              </div>
       
        <?php
		 }
		 else{	 $error = "Please Register";	?>
        <div class="tab-content" id="myTabContent">
          <div id="home" class="tab-pane fade in active">
            <div class="modal-body">
              
              <!--    <p class="">If you're already assigned access to your PMI Chennai Chapter , please Sign In.</p>-->
              <p>
              <?php  			   ?>
              </p>
              <form _uid="1891"   name="signupform" class="newform " method="POST" action="" enctype="#">
             
                <div id="js_register_dialog_row19" class="input type_text  required_input">
                  <div class="value">
                    <label>First Name <span>*</span> : </label>
                    <input type="text" required="required" placeholder="Enter First Name" _uid="1902" name="reg_fistname"  >
                  </div>
                </div>
                <div id="js_register_dialog_row19" class="input type_text  required_input">
                  <div class="value">
                    <label>Last Name <span>*</span> : </label>
                    <input type="text" required="required" placeholder="Enter Last Name" _uid="1902" name="reg_lastname"  >
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>PMI Number<span>*</span> : </label>
                    <input type="text"  placeholder="PMI Number" _uid="1907" name="reg_pmino" >
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
                    <input type="password" required="required" id="passs" placeholder="Password" _uid="1907" name="reg_password"  >
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Confirm Password<span>*</span> : </label>
                    <input type="password" required="required" id="c_passs" placeholder="Confirm Password" _uid="1907" name="creg_password" onblur="confirmPasss()" >
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
                    <label>Mobile <span>*</span>: </label>
                    <input type="text"  placeholder="Mobile" _uid="1907" name="reg_mobile" required="required"  onkeypress="return isNumberKey(event)">
                  </div>
                </div>
                <div id="js_register_dialog_row36" class="input type_buttons ">
                  <div class="value">
                    <ul class="actions horizontal">
                      <li>
                        <input type="submit" name="extreg_insert" value="Sign up" class="btn btn_action" id="registerButton">
                      </li>
                    </ul>
                  </div>
                </div>
              </form>
            </div>
          </div>
     
        </div>
        <?php	} ?>
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
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
