<?php
/*
Template Name: Photo Upload Template
*/
?>

<?php get_header();?>
<?php
if(isset($_POST['uploadphoto']))
{
	$message = photoupload($_FILES);
}
?>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
       <h4>Member Photograph </h4>
<?php
global $current_user;
echo $current_user->display_name;
?>
      
        <div class="">
         <p>Attach the Photograph to be displayed along with your profile. </p>
          <form method="post" action="" enctype="multipart/form-data" class="">
          <label><input type="file" name="photos"></label>
          <label><input type="submit" name="uploadphoto" value="Upload"></label>
          </form>
          <?php
		  if($message)
		  {
			  echo $message;
		  }
		  ?>
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
