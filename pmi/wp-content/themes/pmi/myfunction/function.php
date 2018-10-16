<?php
function login_user($alumni_post){
global $current_user;
	if(!is_user_logged_in())
	{
	        $username = $alumni_post['user_email']; 
			
			$password = $alumni_post['user_password'];
			
			$creds['user_login'] = $username;
		
			$creds['user_password'] = $password;
		
			$creds['remember'] = true;
								
			$result = &wp_signon( $creds, $secure_cookie );
			
			global $wpdb;
			$query = "SELECT * FROM $wpdb->users WHERE user_login = '".$username."' ";
			//echo $user_query = new WP_User_Query(array('user_login' =>$username ) ); exit;
			$total_users = $wpdb->get_results($query);
			$user_id = $total_users[0]->ID; 
			$user_last = get_usermeta($user_id,'pw_user_status'); 
			
		if ( $result instanceof WP_User )
	
			$current_user = $result;
			
		if( !email_exists( $username )) {
               $msg = 'Sorry! Your login information is incorrect. Please try again with authenticated credentials.';
		}
		 //if(!wp_check_password($password, $users->user_pass, $users->ID))
		elseif($user_last=='pending')
		{
			$msg = 'Your login credentials to PMIChennai.org is yet to be approved by the Administrator. Please try again after receiving the approval for your registration.';
		}
		else
		{
			$msg = 'Sorry! Your login information is incorrect. Please try again with authenticated credentials.';			
		}
	}
	else
	{
/*		session_start();*/
		//$msg = 'Sorry! Your login information is incorrect. Please try again with authenticated credentials.';
/*		$_SESSION['class'] = 'error';*/
	}
	return $msg;
}
function sing_up($userpost)
{
	 $pmiuseremail = $userpost['reg_emailaddress'];
	 $pmiuserpass = $userpost['reg_password'];
	 $creg_password = $userpost['creg_password'];
	 $role = 'user';
	 if($pmiuserpass == $creg_password)
	 { 		
	//return $wrong;
     $user_id = username_exists( $pmiuseremail );
	if ( !$user_id and email_exists($pmiuseremail) == false ) {
	{
		$user_id = wp_insert_user(array
		(
		'user_login' => $pmiuseremail,
		'user_pass'  => $pmiuserpass,
		'user_email' => $pmiuseremail,
		'first_name' => $userpost['reg_fistname'],
		'role'       => $role
		));
	}
	update_user_meta($user_id,'reg_lastname',$userpost['reg_lastname']);
	update_user_meta($user_id,'reg_desgination',$userpost['reg_desgination']);
	//update_user_meta($user_id,'creg_password',$userpost['creg_password']);
	update_user_meta($user_id,'reg_mobile',$userpost['reg_mobile']);
	update_user_meta($user_id,'reg_pmino',$userpost['reg_pmino']);
	
			//$from_mail = get_option( 'admin_email' );
			//$admin_details = get_user_by_email( $from_mail ); 
	       // $admin_nickname = $admin_details->display_name;
			
			//	$adminname = 'PMIChennai';
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:" ."".$pmiuseremail.">\r\n";
				$email_message = "Registered Successfully, Check your email for user activation";
		      	$message = strip_tags($userpost['reg_emailaddress']). ' - ' . strip_tags($userpost['reg_fistname']) . ' Has Registered To Your Website';
   				if(wp_mail( 'membership@pmi-chennai.org', 'New User Has Registered', $message,$headers))
				{
					//echo $res = "Thanks for Register We Will send Mail zoon";
					}
				else
				{
					echo  $res = "Error";
				}

				//member mail
				
				$from_mail = 'membership@pmi-chennai.org';
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "From:" ."PMI Chennai Chapterr". "<".$from_mail.">\n";
			    //$headers .= "From:" .$admin_nickname. "<".$from_mail.">\r\n";	
				$to = $pmiuseremail;
				//$message ='Registration Confirmation' ; 
				$message1 ='<p>Dear ' .$userpost["reg_fistname"]."  " . $userpost["reg_lastname"].'</p>
				<p>Greetings from PMI Chennai Chapter! </p></br>
				<p>Thank you for registering as a member of PMI Chennai Chapter.  We welcome you to the Project Management family of over 1300 members. Your login details to the www.pmichennai.org portal is:</p></br>
				<p>Username:  "' .$pmiuseremail. '"</p>
				<p>Password:  "' .$pmiuserpass.'"</p></br>
<p>Please use the above credentials to login to the members section of the chapter website. The members section allows you to register to various chapter events that are for members only.  I would also like to personally thank you for your continued patronage and patience over the last few months as we worked thru to revamp the website.</p></br>

<p>PMI Chennai Chapter conducts the following regular events for the members:</p></br>

<p>-	<b>Knowledge Sharing Sessions</b> on various PM topics from across industries : These are 2.5 hour sessions, conducted twice a month. Experienced speakers from the industry lead these sessions. Each session can be used to claim 2 PDUs which aid towards CCRS. All these sessions are absolutely FREE for members to attend.</p></br>

<p>-	<b>PMP & Beyond</b> : The best in class 4 day preparatory program for PMP exam preparation. Conducted once a month, on the second & third weekends, with current practitioners from the industry who facilitate the training sessions. Members get a discounted rate for this session. <a href="http://pmichennai.org/pmi/chapter-excutive" target="_blank">Contact us</a> for registering for these courses or for more information on CAPM, ACP & other corporate specific training programs</p></br>

<p>-	<b>One Day Workshops</b> :  Specific skill building workshops on PM skills with batch sizes of 15-20 only. These workshops cater to developing hands on skills on very specific topics. One day sessions are also conducted once a quarter and help gain 6-8 PDUs and are available at a discount for members.</p></br>

<p>-	<b>Annual PM Conference</b> :  The flagship program of the PMI Chennai Chapter is the annual Project Management Conference, the largest of its kind in Tamilnadu. Over 300 participants attend this one day conference. Members get early bird incentives and discounts on registration fees.</p></br>

<p>Looking forward to hear from you soon and meet you in person at one of these events. Thanks for joining us. It is great to have you on board as a part of the PMI Chennai Chapter family.</p></br>

<p>Connect, Share, Learn& Grow! – Engage with us across all the social media platforms and feel free to contact us if you have any queries.</p></br>
<p><a href="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/fb.jpg" style="height:30px; width:30px;"></a><a href="https://twitter.com/pmichennai"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/twitt.jpg" style="height:30px; width:30px;"></a><a href="https://www.youtube.com/channel/UCERuZW3vspo3aE2OWOc3Oeg"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/yt.png" style="height:30px; width:30px;"></a><a href="https://www.linkedin.com/grp/home?gid=3424598"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/in.jpg" style="height:30px; width:30px;"></a></p></br></br>
<p>Best Regards,</p>
<p>Koushik Srinivasan</p>
<p>Vice President - Membership</p>
<p>PMI Chennai Chapter</p>
<p>Email: Koushik.s@pmi-chennai.org</p>
<p>Mobile: +91-90030 17127</p>
<p>Website: http://www.pmichennai.org</p>' ;

				if(wp_mail($to,  'Registration Confirmation - Welcome to PMI Chennai Chapter!', $message1, $headers))
				{
					//echo $res = "Thanks for Register We Will send Mail zoon";
					
				}else
				{
					echo  $res = "Error";
				}
			
				if ( is_wp_error( $user_id ) ) {
		
					$res ="Error in registering.";
				}
				else 
				{
					$res ="Thank you for registering at PMIChennai.org. We shall revert back to you with the confirmation.";
				}
			
		} 
	else
		{
			$res = "User Name Exist Please login using sign-in page";
			}			//admin		// wp_redirect( home_url() ); 
	}
	else{
		 $res = "Password Mismatch";
	
	}
		return $res;

}
function forget_password($forget_password)
{
 		$get_password = $forget_password['forget_password'];
            if( empty( $get_password ) ) {
                $forget = 'Enter a username or e-mail address..';
            } else if( ! is_email( $get_password )) {
                $forget = 'Invalid username or e-mail address.';
            } else if( ! email_exists( $get_password ) ) {
                $forget = 'There is no user registered with that email address.';
            } else {
               $random_password = wp_generate_password( 12, false );
               $forget = get_user_by( 'email', $get_password ); 
				
                $update_user = wp_update_user( array ( 
                        'ID' => $forget->ID, 
                        'user_pass' => $random_password
                    )
                );
				
                if( $update_user ) {
                    $to = $get_password;
                    $subject = 'Your new password';
                   // $sender = get_option('name');
                    $message = 'Your new password is: '.$random_password;
                 //	$adminname = 'PMI Chennai';
				 	$from_mail = 'website@pmi-chennai.org';
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From:" ."PMI Chennai Chapterr". "<".$from_mail.">\n";
				//	$headers .= "From:" .$adminname. "\r\n";
                    $mail = wp_mail( $to, $subject, $message, $headers );
                    if( $mail )
                     $forget = 'Thank you! A new password has been generated and sent to your mail. We recommend you to change your password once you login again.';
                        
                } else {
                    $forget = 'Oops something went wrong updating your account.';
                }
           }            
           return $forget;
        }

function emailpassword($update)
{
	 global $wpdb;
	 
	 $user_id = $update['user_id'];
	 $old_pass = $update['old_pass'];
	 $update_pass = $update['update_pass'];
	 $update_confirm_pass = $update['update_confirm_pass']; 
	 if($update_pass == $update_confirm_pass){
	 $user = get_user_by('email',$user_id );
	 include ('/wp-includes/class-phpass.php');
		 $hash = $user->user_pass;
		 $password = $old_pass; 
		$wp_hasher = new PasswordHash(12, TRUE);
				if($wp_hasher->CheckPassword($password, $hash)) {
	 				
					$update_pass = wp_update_user( array (
                        'ID' => $user->ID, 
                        'user_pass' => $update_confirm_pass
                    ));
					
					$subject = 'Your password has been updated';
					$message = 'Your updated password is: '.$update_confirm_pass;	
				  	$from_mail = 'website@pmi-chennai.org ';
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From:"."PMI Chennai Chapterr". "<".$from_mail.">\n";
					//	$headers .= "From:" .$adminname. "\r\n";
                     if(wp_mail($user_id,$subject,$message,$headers )){
					  $update = '1';}
					 }
              		 else {
                    $update = '2'; }
	 }else
	 {
		$update  = '3';
	 }
           
		   return $update;
}
function photoupload($photo)
{
global $current_user;
	$user = wp_get_current_user();
	
	$post_user_id = $user->ID;
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES["photos"]["name"]);
	$file_extension = end($temporary);
//echo "<pre>";print_r($_FILES);exit;
	if (($_FILES["photos"]["type"] == "image/png" || $_FILES["photos"]["type"] == "image/jpg" || $_FILES["photos"]["type"] == "image/jpeg") && ($_FILES["photos"]["size"] < 1000000000)) {
	
	           		$member_photo = $_FILES['photos'];
					$upload_overrides = array( 'test_form' => false );
					$upload_photo = wp_handle_upload( $member_photo, $upload_overrides );
					$photo_url = $upload_photo['url'];
					update_user_meta($post_user_id, 'photos', $upload_photo['url']);
                     
				
                   
if ($_FILES["photos"]["error"] > 0) {
//echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
} 
else {
 $message = 'Your Image Uploaded Succesfully...!!';
//echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
}
} else {
 $message = "Invalid file Size or Type";
}
return $message;
}

function feedback($fback)
{
	global $wpdb; 
	 $firstname = $fback['first_name'];
	 $lastname = $fback['last_name'];
	 $useremail = $fback['user_email'];
	 $feed_subject = $fback['feed_subject'];
	 $userhelpline = $fback['user_helpline'];
	 
	$ins =  $wpdb->insert('feedback',array
	 (
	 'first_name' 		=>$firstname,
	 'last_name' 		=> $lastname,
	 'user_email' 		=>$useremail,
	 'user_topic' 		=>$feed_subject,
	 'user_helpline'	=>$userhelpline
	 ));
	 
	 
		$from_mail = 'website@pmi-chennai.org ';
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From:" ."Site Feedbackk". "<".$useremail.">\n";
		//$message = strip_tags( $fback['first_name']). ' - ' . strip_tags($fback['user_email']) . strip_tags($fback['feed_subject']). ' - ' . strip_tags($fback['user_helpline']) ;
		 $message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($fback['first_name']).'</p>
							<p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($fback['last_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Email Address : '. strip_tags($fback['user_email']).'</p>
						  <p style="font-size: 16px; color: #666666;">Subject : '. strip_tags($fback['feed_subject']).'</p>
						  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($fback['user_helpline']).'</p>
						                  </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
     if(wp_mail( 'website@pmi-chennai.org', 'Site Feedback',$message,$headers))
	 {
		 $fback = "Your Feedback is Sent Successfully";
	 }
	 else
	 {
		  $fback = " Fail";
	 }
	 return  $fback;
}

function sitecontact($contact)
{
	 global $wpdb; 
	 $firstname = $contact['f_name'];
	 $lastname = $contact['l_name'];
	 $useremail = $contact['user_email'];
	 $usertopic = $contact['contact_topic'];
	 $userhelpline = $contact['contact_help'];
	 
	
		$from_mail = 'website@pmi-chennai.org';
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From:" ."Contact Us Queryy". "<".$useremail.">\n";
	 //$message = strip_tags($contact['f_name']). ' - ' . strip_tags($contact['user_email']) . strip_tags($contact['contact_topic']). ' - ' . strip_tags($contact['contact_help']) ;
	  $message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>

      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($contact['f_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($contact['l_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Email Address : '. strip_tags($contact['user_email']).'</p>
						  <p style="font-size: 16px; color: #666666;">Topic : '. strip_tags($contact['contact_topic']).'</p>
						  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($contact['contact_help']).'</p>
						                  </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
     if(wp_mail( 'website@pmi-chennai.org', 'Contact Us Query', $message,$headers))
	 {
		 $contact ="Thank you for contacting us. We will get in touch with you soon";
	 }
	 else
	 {
		  $contact = " Fail";
	 }
	 return  $contact;
}

function helpdisk($help)
{
	global $wpdb;  
	$help_name 		= $help['help_name'];
	$last_name 		= $help['last_name'];
	$help_mail		= $help['help_mail'];
	$help_contact 	= $help['help_contact'];
	$help_category 	= $help['help_category'];
	$help_report 	= $help['help_report'];
	$help_subject 	= $help['help_subject'];
	$help_desc 		= $help['help_desc'];
	$status 		= $help['status'];
	
	$helpdisk = $wpdb->insert('helpdisk',array(
	 'help_name'		=> $help_name,
	 'last_name'		=> $last_name,
	 'help_mail'		=> $help_mail,
	 'help_contact'		=> $help_contact,
	 'help_category'	=> $help_category,
	 'help_report'		=> $help_report,
	 'help_subject'		=> $help_subject,
	 'help_desc'		=> $help_desc,
	 'status'			=> $status
	));
	
				
	 //$headers  = "From: $help_desc <$help_mail>\n";
	 $from_mail = $help_mail;
     $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From:" ."Help Desk Ticket ". "<".$from_mail.">\n";
	 //$from = "From:" .$help_name. "<".$help_mail.">\r\n";
	// $message = strip_tags($_POST['help_name']). '- ' . strip_tags($_POST['help_mail']) . '- ' . strip_tags($_POST['help_contact']). '- ' . strip_tags($_POST['help_subject']) . '- ' .  strip_tags($_POST['help_category']) .'- '. strip_tags($_POST['help_desc']) .'';
   	$message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($_POST['help_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($_POST['last_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Mail Address : '. strip_tags($_POST['help_mail']).'</p>
						   <p style="font-size: 16px; color: #666666;">Contact Phone : '. strip_tags($_POST['help_contact']).'</p>
							 <p style="font-size: 16px; color: #666666;">Ticket Category : '. strip_tags($_POST['help_category']).'</p>
							   <p style="font-size: 16px; color: #666666;">Subject : '. strip_tags($_POST['help_subject']).'</p>
							  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($_POST['help_desc']).'</p>
                        </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
	 if(wp_mail( 'website@pmi-chennai.org', 'Help Desk Ticket',$message,$headers ))
				{
					 $help = "Your Help Desk Ticket has been generated successfully. We will get in touch with you soon.";
					}
				else
				{
					  $help = "Error";
				}
return $help;
}
function askques($ask)
{
	global $wpdb;  
	$ask_name = $ask['ask_name'];
	$ask_email = $ask['ask_email'];
	$ask_ques = $ask['ask_ques'];
	$ask_desc = $ask['ask_desc'];
	/*
	$wpdb->insert('helpdisk',array(
	 'help_name'=>$help_name,
	 'help_mail'=>$help_mail,
	 'help_desc'=>$help_desc
	));
	*/
     $headers  = "MIME-Version: 1.0\r\n";
	 $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	 $headers .= "From:".$ask_name. "<".$ask_email.">\r\n";
	 //$headers .= "CC: anbusaimca@gmail.com";	
	// $to = 'anbusaimca@gmail.com';
	 $subject  = $_POST['help_subject'];
	// $message = strip_tags($_POST['ask_name']). '</br> ' . strip_tags($_POST['ask_ques']) . strip_tags($_POST['ask_desc']). '</br> ' .'';
   	 $message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
                        <p style="font-size: 13px; color: #666666;">We have processed your request for password reset. Your account details are mentioned below: </p>
						
						 <p style="font-size: 16px; color: #666666;">Username : '. strip_tags($_POST['ask_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Question : '. strip_tags($_POST['ask_ques']).'</p>
						  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($_POST['ask_desc']).'</p>
						                  </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
	 if(wp_mail( 'membership@pmi-chennai.org', 'Question', $message,$headers))
				{
					 $ask = "Thanks You we will contact zoon";
					}
				else
				{
					  $ask = "Error";
				}
}

function public_up($pub)
{
	$pubemail 	 = $pub['pub_emailaddress'];
	$pubpassword = $pub['pub_password'];
	$user_rols = 'public';
	
	$pub = username_exists( $pubname ); 
	if (! $user and username_exists($pubpassword)== false)
	{
	$pub = wp_insert_user(array
		(
		'user_login' => $pubemail,
		'user_pass'  => $pubpassword,
		'user_email' => $pubemail,
		'first_name' => $pub['pub_fistname'],
		'role'       => $user_rols
		));
	
	update_user_meta($pub,'pub_lastname',$pub['pub_lastname']);
	update_user_meta($pub,'pub_desgination',$pub['pub_desgination']);
	update_user_meta($pub,'pub_conphone',$pub['pub_conphone']);
	update_user_meta($pub,'pub_mobile',$pub['pub_mobile']);
	update_user_meta($pub,'pub_gender',$pub['pub_gender']);
	}
	else
	{
		$pub = 'Registration Error';
	}
}

function exstingsing_up($userpost)
{
	 $pmiuseremail 		 = $userpost['reg_emailaddress'];
	 $pmiuserpass 		 = $userpost['reg_password'];
	 $role 				 = 'user'; 
	 $pw_user_status     = $userpost['approved'];

	
	$user_id = username_exists( $pmiuseremail );
	if ( !$user_id and email_exists($pmiuseremail) == false ) {
	{
		$user_id = wp_insert_user(array
		(
		'user_login' => $pmiuseremail,
		'user_pass'  => $pmiuserpass,
		'user_email' => $pmiuseremail,
		'first_name' => $userpost['reg_fistname'],
		'role'       => $role
		));
	}
	update_user_meta($user_id,'reg_lastname',$userpost['reg_lastname']);
	update_user_meta($user_id,'reg_desgination',$userpost['reg_desgination']);
	update_user_meta($user_id,'reg_dob',$userpost['reg_dob']);
	update_user_meta($user_id,'reg_mobile',$userpost['reg_mobile']);
	update_user_meta($user_id,'reg_pmino',$userpost['reg_pmino']);
	update_user_meta($user_id,'pw_user_status',$userpost['pw_user_status']);
	
	
	
	global $wpdb;
	$reg_pmino = $userpost['reg_pmino'];
	$userstatus = '1';
	$table_name = 'newdata';
	error_reporting(0);
	$wpdb->get_var( $wpdb->prepare("UPDATE $table_name SET userstatus='$userstatus' WHERE pmiid=$reg_pmino"));
	//admin
				
				$from_mail = 'website@pmi-chennai.org';
				$from_name = 'Websitee';
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:".$from_name. "<".$from_mail.">\r\n";
				$headers .= "CC: website@pmi-chennai.org";
				//$headers .= "CC: anbusaimca@gmail.com";
				//$email_message = "Registered successfully, Please check your email for user activation";
		      	//$message .= strip_tags($userpost['reg_emailaddress']). ' - ' . strip_tags($userpost['reg_fistname']) .  ' Has registered to your website';
				 $message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($userpost['reg_fistname']).'</p>
						 <p style="font-size: 16px; color: #666666;">Email : '. strip_tags($userpost['reg_emailaddress']).'</p>
						  <p style="font-size: 16px; color: #666666;">Has registered to your website </p>
						</td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
   				if(wp_mail('membership@pmi-chennai.org', 'New user has registered', $message,$headers))
				{
				$resss="Thank you for registering at PMIChennai.org. We shall revert back to you with the confirmation";
				}
				
				//member mail
				$from_mail = 'membership@pmi-chennai.org';
				$from_name = 'Vice President - Membershipp';
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:" .$from_name. "<".$from_mail.">\n";	
				$to = $pmiuseremail;
				//$message ='Registration Confirmation' ;
				$messageuser ='<p>Dear ' .$userpost['reg_fistname']."  " . $userpost['reg_lastname'].'</p>
				<p>Greetings from PMI Chennai Chapter! </p></br>
				<p>Thank you for registering as a member of PMI Chennai Chapter.  We welcome you to the Project Management family of over 1300 members. Your login details to the www.pmichennai.org portal is:</p></br>
				<p>Username:  "' .$pmiuseremail. '"</p>
				<p>Password:  "' .$pmiuserpass.'"</p></br>
<p>Please use the above credentials to login to the members section of the chapter website. The members section allows you to register to various chapter events that are for members only.  I would also like to personally thank you for your continued patronage and patience over the last few months as we worked thru to revamp the website.</p></br>

<p>PMI Chennai Chapter conducts the following regular events for the members:</p></br>

<p>-	<b>Knowledge Sharing Sessions</b> on various PM topics from across industries : These are 2.5 hour sessions, conducted twice a month. Experienced speakers from the industry lead these sessions. Each session can be used to claim 2 PDUs which aid towards CCRS. All these sessions are absolutely FREE for members to attend.</p></br>

<p>-	<b>PMP & Beyond</b> : The best in class 4 day preparatory program for PMP exam preparation. Conducted once a month, on the second & third weekends, with current practitioners from the industry who facilitate the training sessions. Members get a discounted rate for this session. <a href="http://pmichennai.org/pmi/chapter-excutive" target="_blank">Contact us</a> for registering for these courses or for more information on CAPM, ACP & other corporate specific training programs</p></br>

<p>-	<b>One Day Workshops</b> :  Specific skill building workshops on PM skills with batch sizes of 15-20 only. These workshops cater to developing hands on skills on very specific topics. One day sessions are also conducted once a quarter and help gain 6-8 PDUs and are available at a discount for members.</p></br>

<p>-	<b>Annual PM Conference</b> :  The flagship program of the PMI Chennai Chapter is the annual Project Management Conference, the largest of its kind in Tamilnadu. Over 300 participants attend this one day conference. Members get early bird incentives and discounts on registration fees.</p></br>

<p>Looking forward to hear from you soon and meet you in person at one of these events. Thanks for joining us. It is great to have you on board as a part of the PMI Chennai Chapter family.</p></br>

<p>Connect, Share, Learn& Grow! – Engage with us across all the social media platforms and feel free to contact us if you have any queries.</p></br>
<p><a href="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/fb.jpg" style="height:30px; width:30px;"></a><a href="https://twitter.com/pmichennai"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/twitt.jpg" style="height:30px; width:30px;"></a><a href="https://www.youtube.com/channel/UCERuZW3vspo3aE2OWOc3Oeg"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/yt.png" style="height:30px; width:30px;"></a><a href="https://www.linkedin.com/grp/home?gid=3424598"><img src="http://pmichennai.org/pmi/wp-content/themes/pmi/images/in.jpg" style="height:30px; width:30px;"></a></p></br></br>
<p>Best Regards,</p>
<p>Koushik Srinivasan</p>
<p>Vice President - Membership</p>
<p>PMI Chennai Chapter</p>
<p>Email: Koushik.s@pmi-chennai.org</p>
<p>Mobile: +91-90030 17127</p>
<p>Website: http://www.pmichennai.org</p>' ;

				if(wp_mail($to,  'Registration Confirmation - Welcome to PMI Chennai Chapter!', $messageuser, $headers))
				{
				 $resss ="Thank you for registering at PMIChennai.org. We shall revert back to you with the confirmation";
					
				}else
				{
					echo  $resss = "Error";
				}
			
				if ( is_wp_error( $reg_pmino ) ) {
		
					$resss ="Error in registering.";
				}
				else
				{
					$resss ="Thank you for registering at PMIChennai.org. We shall revert back to you with the confirmation";
				}
			}
		else
		{
			$resss = "You have already Registered. Please Login";
		}
		
		return $resss;
	}
function exstingsing_insert($userinsert)
{
	
	$reg_pmino  			=  $userinsert['reg_pmino']; 
	$reg_fistname   		=  $userinsert['reg_fistname'];
	$reg_lastname   		=  $userinsert['reg_lastname'];
	$reg_emailaddress       =  $userinsert['reg_emailaddress'];
	$reg_mobile 			=  $userinsert['reg_mobile'];
	$reg_password 			=  $userinsert['reg_password'];
	$reg_desgination 		=  $userinsert['reg_desgination'];
	//$reg_conphone 			=  $userinsert['reg_conphone'];
	
	global $wpdb;
	$query = $wpdb->get_results("select * from newdata where pmiid = '".$reg_pmino."' OR  primaryemail = '".$reg_emailaddress."'");
	//$reg_pmino ='reg_pmino';
	
	if(count($query) == 0)
	{
	global $wpdb;
	$table_name = "newdata"; 
	$wpdb->insert($table_name, array(
                                'pmiid'       		 => $reg_pmino, 
                                'firstname'   		 => $reg_fistname,
								'lastname'     		 => $reg_lastname,
								'primaryemail' 		 => $reg_emailaddress,
								'mobileno'     		 => $reg_mobile,
								'userstatus'   		 => '0',
								'usepass'   		 => $reg_password,
								'reg_desgination'    => $reg_desgination
							//	'reg_conphone'       => $reg_conphone
							));	
							
				$from_mail = get_option( 'admin_email' );
				$admin_details = get_user_by_email( $from_mail ); 
				$admin_nickname = $admin_details->display_name;
			
				$adminname = 'PMI Chennai';
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:" .$adminname. "<".$from_mail.">\r\n";
				$headers .= "CC: krishc@zenstill.com";
				$email_message = "Registered successfully, Please check your email for user activation";
		      	$message .= strip_tags($userinsert['reg_emailaddress']). ' - ' . strip_tags($userinsert['reg_fistname']) .' Has registered to your website';
   				if(wp_mail( 'membership@pmi-chennai.org', 'New user has registered', $message,$headers))
				{
					 $insert ="Thanks for Registering. We Will shortly send you an email.";
					}
				

				//member mail
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:" .$admin_nickname. "<".$from_mail.">\r\n";	
				//$to = $reg_emailaddress;
				//$message ='Registration Confirmation' ;
				$message .= strip_tags($userinsert['reg_emailaddress']). ' - ' . strip_tags($userinsert['reg_fistname']) . ' - ' . strip_tags($userinsert['reg_password']) .' Thanks for Registering';

				if(wp_mail($reg_emailaddress,  'Register Confirmation', $message, $headers))
				{
					 $insert ="Thanks for Registering. We Will shortly send you an email.";
				}
				if ( is_wp_error( $reg_pmino ) ) {
					$insert ="Error in registering.";
				}
				else
				{
					
					$insert ="Thank you for registering. Your PMI ID is not available in the system. You will be notified through email once your ID has been actioned. If you need urgent assistance, please contact <a href='www.zenstill.com'>VP Registration.</a>";
				}
	}
	
	else
	{
	$insert = "User Name Exist Please login using sign-in page";
	}		
		return $insert;
}
function userprofileupdate($profiles,$profiles_file)
{
	 $user_id 				= $profiles['user_id'];
	 $profile_headlines		= $profiles['profile_headlines'];
	 $pro_objectives 		= $profiles['pro_objectives'];
	 $credentials 			= $profiles['credentials'];  
	 $facebook_url 			= $profiles['facebook_url'];
	 $google_url 			= $profiles['google_url'];
	 $twitter_url 			= $profiles['twitter_url'];
	 $linkedin_url 			= $profiles['linkedin_url'];
	 $Website1 				= $profiles['Website1'];
	 $websitename1 			= $profiles['websitename1'];
	 $Website2 				= $profiles['Website2'];
	 $websitename2 			= $profiles['websitename2'];
	 $Website3 				= $profiles['Website3'];
	 $websitename3 			= $profiles['websitename3'];
	 $interest_hobbies 		= $profiles['interest_hobbies'];
	 $associationgroups 	= $profiles['associationgroups'];
	 $honorawards 			= $profiles['honorawards'];
	 $grantpermissin 		= $profiles['grantpermissin'];
	 $showprofiles 			= $profiles['showprofiles']; 
	 
	if(isset($profiles_file['profile_image']) && $profiles_file['profile_image']['name']!=""){
	$profile_image = $profiles_file['profile_image'];
	$upload_overrides = array( 'test_form' => false );
	$current_photo = wp_handle_upload( $profile_image, $upload_overrides );
	update_user_meta($user_id, 'profile_image', $current_photo['url']);
	}
	else
	{
		$old_url = $profiles['old_profile_image'];
		update_user_meta($user_id, 'profile_image', $profiles['old_profile_image']);
	}
	update_user_meta($user_id, 'profile_headlines', $profiles['profile_headlines']);
	update_user_meta($user_id, 'pro_objectives', $profiles['pro_objectives']);
	update_user_meta($user_id, 'credentials', implode(',',$profiles['credentials']));
	update_user_meta($user_id, 'facebook_url', $profiles['facebook_url']);
	update_user_meta($user_id, 'google_url', $profiles['google_url']);
	update_user_meta($user_id, 'twitter_url', $profiles['twitter_url']);
	update_user_meta($user_id, 'linkedin_url', $profiles['linkedin_url']);
	update_user_meta($user_id, 'Website1', $profiles['Website1']);
	update_user_meta($user_id, 'websitename1', $profiles['websitename1']);
	update_user_meta($user_id, 'Website2', $profiles['Website2']);
	update_user_meta($user_id, 'websitename2', $profiles['websitename2']);
	update_user_meta($user_id, 'Website3', $profiles['Website3']);
	update_user_meta($user_id, 'websitename3', $profiles['websitename3']);
	update_user_meta($user_id, 'interest_hobbies', $profiles['interest_hobbies']);
	update_user_meta($user_id, 'honorawards', $profiles['honorawards']);
	update_user_meta($user_id, 'associationgroups', $profiles['associationgroups']);
	update_user_meta($user_id, 'grantpermissin', $profiles['grantpermissin']);
	update_user_meta($user_id, 'showprofiles', $profiles['showprofiles']);

	if($profileupdate)
	{
	$profileupdate = 'Soory! Error Uplaoding Profile';
	}
	else
	{
	$profileupdate = 'Your Profile has been updated Successfully.';
	}
 return $profileupdate;	
}
function volenroll($enroll)
{
		 $firstname   			= $enroll['firstname']; 
		 $last_name  			= $enroll['last_name'];
		 $contact_no  			= $enroll['contact_no'];
		 $mobile_no  			= $enroll['mobile_no'];
		 $employee  			= $enroll['employee'];
		 $email_add  	    	= $enroll['email_add'];
		 $interest_of_work  	= $enroll['interest_of_work'];
		 $expertise  			= $enroll['expertise'];
		 $commited_hrs  		= $enroll['commited_hrs'];
		 $availability 			= $enroll['availability'];
		 $from__vol_opportunity	= $enroll['from__vol_opportunity'];
		 $prefer_not_to_do  	= $enroll['prefer_not_to_do'];  
		 global $wpdb;
		 $table_name = "v_enroll"; 
		 $eninsert =  $wpdb->insert($table_name, array(
			'firstname'   			=> $firstname,
			'last_name'  			=> $last_name,
			'contact_no'  			=> $contact_no,
			'mobile_no'  			=> $mobile_no,
			'employee'  			=> $employee,
			'email_add'      		=> $email_add,
			'interest_of_work'  	=> $interest_of_work,
			'expertise'  			=> $expertise,
			'commited_hrs'  		=> $commited_hrs,
			'availability' 			=> $availability,
			'from__vol_opportunity'	=> $from__vol_opportunity,
			'prefer_not_to_do'		=> $prefer_not_to_do
));	
	 $from_mail = $email_add;
     $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From:" ."Volunteer Enrollment Requestt". "<".$from_mail.">\n";
	 //$from = "From:" .$help_name. "<".$help_mail.">\r\n";
	// $message = strip_tags($_POST['help_name']). '- ' . strip_tags($_POST['help_mail']) . '- ' . strip_tags($_POST['help_contact']). '- ' . strip_tags($_POST['help_subject']) . '- ' .  strip_tags($_POST['help_category']) .'- '. strip_tags($_POST['help_desc']) .'';
   	$message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($enroll['firstname']).'</p>
						  <p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($enroll['last_name']).'</p>
						   <p style="font-size: 16px; color: #666666;">Email Address: '. strip_tags($enroll['email_add']).'</p>
						  <p style="font-size: 16px; color: #666666;">Contact Phone Number : '. strip_tags($enroll['contact_no']).'</p>
						 	 <p style="font-size: 16px; color: #666666;">Employee : '. strip_tags($enroll['employee']).'</p>
							   <p style="font-size: 16px; color: #666666;">Preference towards leading a team or working within a team : '. strip_tags($enroll['interest_of_work']).'</p>
								  <p style="font-size: 16px; color: #666666;">Areas of Expertise  : '. strip_tags($enroll['expertise']).'</p>
								  <p style="font-size: 16px; color: #666666;">Committed Hours : '. strip_tags($enroll['commited_hrs']).'</p>
								   <p style="font-size: 16px; color: #666666;">Time Constraints and Availability  : '. strip_tags($enroll['availability']).'</p>
									 <p style="font-size: 16px; color: #666666;">What am I looking for from this volunteer opportunity : '. strip_tags($enroll['from__vol_opportunity']).'</p>
									  <p style="font-size: 16px; color: #666666;">Prefer Not to Do: '. strip_tags($enroll['prefer_not_to_do']).'</p>
                        </td> 
						
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
	 if(wp_mail( 'website@pmi-chennai.org', 'Volunteer Enrollment Request',$message,$headers ))
				{
					 $enroll = "Your request for volunteering has been submitted successfully";
					}
else
{
	$enroll  = 'Soory! Error Your request volunteering';
}
return $enroll;
}
function nonhelpdisk($nonhelp){
	global $wpdb;  
	$help_name 		= $nonhelp['help_name'];
	$last_name 		= $nonhelp['last_name'];
	$help_mail		= $nonhelp['help_mail'];  
	$help_contact 	= $nonhelp['help_contact'];
	$help_category 	= $nonhelp['help_category'];
	$help_report 	= $nonhelp['help_report'];
	$help_subject 	= $nonhelp['help_subject'];
	$help_desc 		= $nonhelp['help_desc'];
	$status 		= $nonhelp['status'];
 	
	if(email_exists($help_mail)){
	 $helpdisk = $wpdb->insert('helpdisk',array(
	 'help_name'		=> $help_name,
	 'last_name'		=> $last_name,
	 'help_mail'		=> $help_mail,
	 'help_contact'		=> $help_contact,
	 'help_category'	=> $help_category,
	 'help_report'		=> $help_report,
	 'help_subject'		=> $help_subject,
	 'help_desc'		=> $help_desc,
	 'status'			=> $status
	));
	 //$headers  = "From: $help_desc <$help_mail>\n";
	 $from_mail = $help_mail;
     $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From:" ."Help Desk Ticket ". "<".$from_mail.">\n";
	 //$from = "From:" .$help_name. "<".$help_mail.">\r\n";
	// $message = strip_tags($_POST['help_name']). '- ' . strip_tags($_POST['help_mail']) . '- ' . strip_tags($_POST['help_contact']). '- ' . strip_tags($_POST['help_subject']) . '- ' .  strip_tags($_POST['help_category']) .'- '. strip_tags($_POST['help_desc']) .'';
   	$message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($_POST['help_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($_POST['last_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Mail Address : '. strip_tags($_POST['help_mail']).'</p>
						   <p style="font-size: 16px; color: #666666;">Contact Phone : '. strip_tags($_POST['help_contact']).'</p>
							 <p style="font-size: 16px; color: #666666;">Ticket Category : '. strip_tags($_POST['help_category']).'</p>
							   <p style="font-size: 16px; color: #666666;">Subject : '. strip_tags($_POST['help_subject']).'</p>
							  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($_POST['help_desc']).'</p>
                        </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
	 if(wp_mail( 'website@pmi-chennai.org', 'Help Desk Ticket',$message,$headers ))
				{
					 $nonhelp = "Your Help Desk Ticket has been generated successfully. We will get in touch with you soon.";
					}
				else
				{
					  $nonhelp = "Error";
				}
		}
		else
		{
			$helpdisk = $wpdb->insert('nonhelpdisk',array(
			 'help_name'		=> $help_name,
			 'last_name'		=> $last_name,
			 'help_mail'		=> $help_mail,
			 'help_contact'		=> $help_contact,
			 'help_category'	=> $help_category,
			 'help_report'		=> $help_report,
			 'help_subject'		=> $help_subject,
			 'help_desc'		=> $help_desc,
			 'status'			=> $status
			));
			
				
	 //$headers  = "From: $help_desc <$help_mail>\n";
	 $from_mail = $help_mail;
     $headers .= "MIME-Version: 1.0\r\n";
	 $headers .= "Content-type: text/html; charset=iso-8859-1\n";
	 $headers .= "From:" ."Unregistered User Help Desk Ticket ". "<".$from_mail.">\n";
	 //$from = "From:" .$help_name. "<".$help_mail.">\r\n";
	// $message = strip_tags($_POST['help_name']). '- ' . strip_tags($_POST['help_mail']) . '- ' . strip_tags($_POST['help_contact']). '- ' . strip_tags($_POST['help_subject']) . '- ' .  strip_tags($_POST['help_category']) .'- '. strip_tags($_POST['help_desc']) .'';
   	$message = '<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td align="center" valign="top">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td></td></tr>
                    <tr>
                      <td></p>
						 <p style="font-size: 16px; color: #666666;">First Name : '. strip_tags($_POST['help_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Last Name : '. strip_tags($_POST['last_name']).'</p>
						  <p style="font-size: 16px; color: #666666;">Mail Address : '. strip_tags($_POST['help_mail']).'</p>
						   <p style="font-size: 16px; color: #666666;">Contact Phone : '. strip_tags($_POST['help_contact']).'</p>
							 <p style="font-size: 16px; color: #666666;">Ticket Category : '. strip_tags($_POST['help_category']).'</p>
							   <p style="font-size: 16px; color: #666666;">Subject : '. strip_tags($_POST['help_subject']).'</p>
							  <p style="font-size: 16px; color: #666666;">Description : '. strip_tags($_POST['help_desc']).'</p>
                        </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                        </div></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;">
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr >
      <td>.</td>
    </tr>
  </tbody>
</table>';
	 if(wp_mail('website@pmi-chennai.org', 'Unregistered User Help Desk Ticket',$message,$headers ))
				{
					 $nonhelp = "Your Help Desk Ticket has been generated successfully. We will get in touch with you soon.";
					}
				else
				{
					  $nonhelp = "Error";
				}

		}
		return $nonhelp;
}
?>
