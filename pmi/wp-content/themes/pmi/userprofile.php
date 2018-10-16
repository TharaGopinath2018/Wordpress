<?php
/*
Template Name: User Profile Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <?php 
global $current_user;
      get_currentuserinfo();
	   echo 'Welcome '.$current_user->display_name . "\n";
?>
        <div  class="">
          <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">My Dashboard</a></li>
            <li><a href="#tab2" data-toggle="tab">Account Setting</a></li>
          <!--  <li><a href="#tab3" data-toggle="tab">Training and Knowlegde Sharing </a></li>-->
            <li><a href="#tab4" data-toggle="tab">Help Desk</a></li>
          </ul>
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane  active" id="tab1"> 
             <div class="input-group"> <span class="">
                <p><a href="<?php echo HOME;?>/member-profile-setup">Set your Member Profile</a> | <a href="<?php echo HOME;?>/member-preview">Preview your Member Profile</a></p>
                </span>
                <p>Complete your own member profile page.</p>
               <!-- <span class="">
                <p><a href="<?php echo HOME; ?>/photo-upload">Upload your Photograph</a></p>
                </span>
                <p>Associate a Photograph to your Profile.</p>-->
                <span class="">
                <p><a href="<?php echo HOME;?>/volunteer-enroll">Enroll to be a Volunteer</a></p>
                </span>
                <p>Join the Chapter to provide Volunteering services.</p>
                <span class="">
                <p><a href="<?php echo HOME; ?>/enroll-status">Volunteer Enrollment Status</a></p>
                </span>
                <p>Check the Status of your Volunteer Enrollments applications.</p>
              </div>
            </div>
            <div class="tab-pane" id="tab2"> 
             
               <span class="">
              <p><a href="<?php echo HOME; ?>/edit-profile">Change Password</a></p>
              </span>
              <p>Change your sign in Password</p>
              <span class="">
              <p><a href="<?php echo HOME;?>/site-contact">Contact us</a></p>
              </span>
              <p>You can reach out to us for all your queries, we are here to help you enjoy the best service.</p>
              <span class="">
              <p><a href="<?php echo HOME;?>/site-feedback">Give us your Feedback</a></p>
              </span>
              <p>Spread the word about our services and we will ensure we improve our services.</p>
           
            </div>
            <div class="tab-pane" id="tab3"> 
            
              <div class="input-group"> <span class="">
                <p><a href="<?php echo HOME;?>/event-request">Register for Knowledge Sharing Session</a></p>
                </span>
                <p>Learn about the Current knowledge sharing session.</p>
                <span class="">
                <p><a href="<?php echo HOME;?>/training-request">Register for Training Programs</a></p>
                </span>
                <p>Enroll for Training program offered by your Chapter.</p>
                               
              </div>
            </div>
            <div class="tab-pane" id="tab4"> 
             
              <div class="input-group"> <span class="">
                <p><a href="<?php echo HOME;?>/helpdesk-case">Open a HelpDesk Case</a></p>
                </span>
                <p>Let us know how we can help you.</p>
                <span class="">
                <p><a href="<?php echo HOME;?>/open-cases">Open Cases</a></p>
                </span>
                <p>List of all the cases opened by you with regards to the Services we offer.</p>
                <span class="">
                <p><a href="<?php echo HOME; ?>/close-cases">Closed Cases</a></p>
                </span>
                <p>List of all resolved cases opened by you.</p>
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
