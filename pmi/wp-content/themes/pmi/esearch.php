<?php
add_action( 'wp_ajax_nopriv_jexusersearch', 'jexusersearch' );  
add_action( 'wp_ajax_jexusersearch', 'jexusersearch' ); 
function jexusersearch(){
		if(isset($_POST['searchvalue']))
		{
			$pmiid = $_POST['searchvalue'];
			if(is_numeric($pmiid)){
			global $wpdb;
			$newuser  = $wpdb->get_results("select * from newdata where  pmiid = '".$pmiid."'");
			//echo "<pre>";print_r($newuser);
			}?>
 	              <?php  if($newuser[0]>0)
					{
					?>
            <div class="modal-body">
    <form _uid="1891"   name="signupform" class="newform " method="POST" action="" enctype="#">
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
                    <label>PMI Member ID<span>*</span> : </label>
                    <input type="text"  placeholder="PMI Number" _uid="1907" name="reg_pmino" value="<?php  echo $newuser[0]->pmiid;?>" readonly="readonly" class="visible_someting">
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Email Address<span>*</span> : </label>
                    <input type="email" required="required" placeholder="Email Address" _uid="1907" name="reg_emailaddress" value="<?php  echo $newuser[0]->primaryemail;?>"  readonly="readonly">
                   <!-- <span class="notific">Recommend using Personal email ID's instead of Corporate emails</span>-->
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Mobile <span>*</span>: </label>
                    <input type="text"  placeholder="Mobile" _uid="1907" name="reg_mobile"  required="required" value="<?php  echo $newuser[0]->mobileno;?>" onKeyPress="return isNumberKey(event)"><!--<span class="notific">Enter mobile numbers only</span>-->
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Date Of Birth <span>*</span>: </label>
                    <input type="text"  placeholder="DD-MM-YYYY"  name="reg_dob" id="datepicker-13"  required="required" value="<?php  echo $newuser[0]->reg_dob;?>">
                     <!--<span class="notific">Minimum 8 characters with at least one Digit</span>-->
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                  <div class="value">
                    <label>Password<span>*</span> : </label>
                    <input type="password" required="required" id="pass" placeholder="Password" _uid="1907" name="reg_password"  >
                    <div id="msg"></div>
                 <span class="notific">Minimum 8 characters with at least one Digit</span>
                  </div>
                </div>
                <div id="js_register_dialog_row22" class="input type_password  required_input">
                          <div class="value">
                            <label>Confirm Password<span>*</span> : </label>
                            <input type="password" required="required" id="c_pass" placeholder="Confirm Password" _uid="1907" name="creg_password" >
                             <div id="msg1"></div>
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
                
                <div id="js_register_dialog_row36" class="input type_buttons ">
                  <div class="value">
                    <ul class="actions horizontal">
                      <li>
                        <input type="submit" name="extreg_submit" value="Sign up" class="btn btn_action" id="registerButton" />
                      </li>
                    </ul>
                  </div>
                </div>
              </form> </div>
 <?php }
			  else
			  {
				echo '1';
				 //echo "Sorry, we are unable to retrieve your PMI Chennai Chapter registration records. Please contact VP Membership for further assistance.";
			  }?>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script>
	$("#pass").keyup(function(e) {
	 var pass = this.value;
	 // if(pass.length > 7){
		   if (pass.match(/^(?=.*\d)(?=.*[a-z])[0-9a-z]{8,}$/))
		  	{
			  $("#msg").html('<h6>Password Correct</h6>');
		    }
		    else{
		     $("#msg").html('<h6>Password Wrong</h6>');
		  }
	 // }
	});
	$("#c_pass").keyup(function(e){
		var password = document.getElementById("pass").value;
		var confirmPassword = document.getElementById("c_pass").value;
	    if (password == confirmPassword) {
          $("#msg1").html('<h6>Password Matched</h6>');
        }
        else
		{
		$("#msg1").html('<h6>Enter Confirm Password Same as Password </h6>');
		}
	});
</script>
 <?php	}
exit;}
?>