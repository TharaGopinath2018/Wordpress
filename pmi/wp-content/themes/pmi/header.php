<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title('|',true,''); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="icon" type="image/png" href="http://pmichennai.org/pmi/wp-content/themes/pmi/images/pmi_fav2.png">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/css/main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.collapser.js"></script>

<script src="https://cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type = "text/javascript"></script>-->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type = "text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel = "Stylesheet" type="text/css" /> 

<div id="fb-root"></div>
<!--fb share code -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php wp_head();?>

<body>
<header>
<?php
/*if(isset($_POST['login_submit']))
{
	$msg  = login_user($_POST);
	if(!is_user_logged_in())
	{
		wp_redirect(HOME.("user-profile")); 
	}
	
}*/
?>
<div class="main container">
<div class="header_function">
  <div class="brand_logo"><a href="<?php echo site_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" /></a></div>
  <div class="navbar top_position">
    <button type="button" class="navbar-toggle collapsed social_media_setting" data-toggle="collapse" data-target="#social_menu" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="header_menu_wid navbar-collapse collapse" id="social_menu">
      <div class="menu_top">
        <ul>
          <li><a href="<?php echo HOME;?>?post_type=about">About</a></li>
          <li><a href="<?php echo HOME;?>?post_type=pmijoin">Join</a></li>
          <li><a href="<?php echo HOME;?>?post_type=pmicontact">Contact</a></li>
          <li><a href="<?php echo HOME;?>/freq">Help</a></li>
          <!-- <li><a href="<?php echo HOME;?>/existing-user">Registration</a></li>-->
          <li>
            <?php if(!is_user_logged_in()){  ?>
            <span><a href="<?php echo HOME;?>/signup">Register / Sign In</a></span>
            <?php } else { ?>
            <span> <a href="<?php echo wp_logout_url(home_url()); ?>" class="mylog">Logout</a></span>
            <?php } ?>
          </li>
        </ul>
      </div>
      <div class="container">
        <div class="social_media_top">
          <ul>
            <li><a href="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/fb.jpg" /></a></li>
            <li><a href="https://twitter.com/pmichennai" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/twitt.jpg" /></a></li>
            <li><a href="https://www.youtube.com/channel/UCERuZW3vspo3aE2OWOc3Oeg" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/yt.png" /></a></li>
            <li><a href="https://www.linkedin.com/grp/home?gid=3424598" target="_blank"><img src="<?php echo get_template_directory_uri();?>/images/in.jpg" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="menu_nav">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed menu_setting" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="icon-bar-menu"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>
              <?php if(!is_user_logged_in()){  ?>
              <a href="<?php echo HOME;?>/signup">MyPMICC</a>
              <?php } else { ?>
              <a href="<?php echo HOME; ?>/user-profile">MyPMICC</a>
              <?php } ?>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Membership <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="http://www.pmi.org/Membership.aspx">Overview</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Membership/What-PMI-Membership-Is.aspx">What PMI membership is</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Membership/Membership-Benefits-of-Membership.aspx">Benefits — see all that we offer</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Membership/Membership-Types-of-Memberships.aspx">Types of memberships</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Get-Involved/Chapters-PMI-Chapters.aspx">Chapters</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Get-Involved/Communities-of-Practice.aspx">Communities of practice</a></li>
                <!--   <li><a target="_blank" href="http://www.pmi.org/About-Us/Ethics.aspx">Code of ethics</a></li>-->
                <li><a target="_blank" href="http://www.pmi.org/Membership/Membership-Library-Subscription.aspx">Library subscription</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Membership/Membership-Group-Billing-Plan.aspx">Group billing plan</a></li>
                <li><a target="_blank" href="http://www.pmi.org/membership/premium-tools-and-templates.aspx">Premium Tool & Templates</a></li>
                <li><a target="_blank" href="http://www.pmi.org/membership/volunteer-opportunities.aspx">Volunteer</a></li>
                <li><a target="_blank" href="http://www.pmi.org/membership/volunteer-excel-as-a-leader.aspx">Leadership Institute</a></li>
              </ul>
            </li>
            <!--  <li> 
			<?php if(!is_user_logged_in()){  ?>
            <a href="<?php echo HOME;?>/signup">MyPMICC</a>
              <?php } else { ?>
              <a href="#">MyPMICC</a>
               <?php } ?>
            </li>-->
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Certification <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a target="_blank" href="http://www.pmi.org/Certification/Why-Choose-a-PMI-Certification.aspx">Overview</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Certification/What-are-PMI-Certifications.aspx">What are PMI certifications?</a></li>
                
                <!--  <li><a target="_blank" href="http://www.pmi.org/Certification/Why-Choose-a-PMI-Certification.aspx">Why choose a PMI certification?</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Certification/Which-PMI-Certification-is-Right-for-You.aspx">Which certification is right for you?</a></li>-->
                <li><a target="_blank" href="http://www.pmi.org/Certification/Maintain-Your-Credential.aspx">Maintain your certification: Earn and report PDUs</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Certification/Credential-Registry.aspx">Certification registry</a></li>
                <li><a target="_blank" href="http://www.pmi.org/Certification/Certification-FAQ.aspx">Frequently asked questions</a></li>
                <li><a target="_blank" href="http://www.pmi.org/certification/get-started.aspx">Get Started</a></li>
                <li><a target="_blank" href="http://www.pmi.org/certification/earn-pdus.aspx">Ways to Earn PDUs</a></li>
              </ul>
            </li>
            <li><a href="<?php echo HOME;?>/services">Programs</a></li>
            <li><a href="<?php echo HOME;?>/new-events">News & Events</a></li>
            <li><a href="<?php echo HOME;?>/media-coverage">Media Coverage</a></li>
            <li><a href="<?php echo HOME;?>?post_type=newsletter">Newsletter</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Volunteering <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo HOME; ?>/volunteer-spotlight">Volunteer Spotlight</a></li>
                <li><a href="<?php echo HOME; ?>/benefits-volunteering">Benefits of Volunteering</a></li>
                <!-- <li><a href="<?php echo HOME;?>/signup">Submit a Volunteer application</a></li>-->
                <li><a href="<?php echo HOME;?>?post_type=vol_opps">Current Opportunities</a></li>
                <!--<li><a href="<?php echo HOME;?>/signup">Check Enrollment Status</a></li>-->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="fb-social">
  <div class="fb_oncclike"><a href="#"><span class="fb_wid"></span></a></div>
  <div class="fb_tag">
    <div class="fb-page" data-href="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497" data-width="250" data-height="347" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
      <div class="fb-xfbml-parse-ignore">
        <blockquote cite="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497"><a href="https://www.facebook.com/pages/PMI-Chennai-Chapter/102674293128497">PMI Chennai Chapter</a></blockquote>
      </div>
    </div>
  </div>
</div>
</header>
