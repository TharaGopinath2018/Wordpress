<?php
/*
Template Name: Member Profile Setup Template
*/
?>
<?php get_header();?>
<?php
if(isset($_POST['profile_updates']))
{
$profileupdate = userprofileupdate($_POST,$_FILES);
}
?>
<script>
   $(document).ready(function() {
	   $(".thumb").hover(function() {
		   $(this).trigger("click");
		});
		<?php if(isset($profileupdate) && !empty($profileupdate)){?>
		$(".success-msg").text("<?php echo $profileupdate; ?>");
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
      <div class="pmi_welcome"> <h4>Member Profile  </h4>
      
     <?php global $current_user;
	 $id = $current_user->ID; 
	 $result = get_user_meta($id);
			//echo $current_user->display_name;
			//echo $current_user->ID; ?>
        <div class="edit_profile">
          <form method="post" action=""  enctype="multipart/form-data" class="sitecontact">
          <p>INTRODUCTION</p>
          <p>
            <label>Profile Headlines:</label>
            <span>
            <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="profile_headlines"  value="<?php  echo get_user_meta($id, 'profile_headlines', true); ?>">
            </span>
            </p>
            <p>
              <label>Your Professional Objectives:</label>
            <span>
            <textarea name="pro_objectives"><?php  echo get_user_meta($id, 'pro_objectives', true); ?></textarea>
            </span>
            </p>
            <p>
              <label>Current PMI Credentials:</label>
            <span class="check_box_span"> <?php   $restr = get_user_meta($id, 'credentials', true);
			$va = explode(',',$restr);	
        ?>
           <span class="check"><input type="checkbox" name="credentials[]" value="CAPM"<?php for($i=0;$i<9;$i++){if($va[$i] == 'CAPM'){?>checked<?php } } ?> />CAPM® </span>
          <span class="check"><input type="checkbox" name="credentials[]" value="PMP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PMP'){?>checked<?php } } ?>/>PMP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PgMP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PgMP'){?>checked<?php } } ?>/>PgMP®</span> 
           <span class="check"><input type="checkbox" name="credentials[]" value="PfMP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PfMP'){?>checked<?php } } ?>/>PfMP®</span>    
           <span class="check"><input type="checkbox" name="credentials[]" value="PMIPBA" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PMIPBA'){?>checked<?php } } ?>/>PMI-PBA®</span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMIACP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PMIACP'){?>checked<?php } } ?>/>PMI-ACP®</span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMIRMP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PMIRMP'){?>checked<?php } } ?>/>PMI-RMP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMISP" <?php for($i=0;$i<9;$i++){if($va[$i] == 'PMISP'){?>checked<?php } } ?>/>PMI-SP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="None"  <?php for($i=0;$i<9;$i++){if($va[$i] == 'None'){?>checked<?php } } ?>/>None</span> 
           
          
            </span>
            </p>
            <p>
            <div class="form_select_act">
            <p>SOCIAL MEDIA</p>
              <!--<div class="form-left"><label>Profile Headlines :</label>
              </div>-->
              <!--<div class="form-right">
            <span class="right_ali">
            <p>
             <label>Profile Headlines:</label>
              <span>
             <input type="text" name="socialmedia1"  value="<?php  echo get_user_meta($id, 'socialmedia1', true); ?>" ></span></p>
            <p><input type="text" name="socialmedia2"  value="<?php  echo get_user_meta($id, 'socialmedia2', true); ?>"  ></p>
            <p><input type="text" name="socialmedia3"  value="<?php  echo get_user_meta($id, 'socialmedia3', true); ?>" ></p>
            </span>
            </div>-->
            </div>
            <p>
            <label>FaceBook:</label>
            <span>
            <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="facebook_url"  value="<?php  echo get_user_meta($id, 'facebook_url', true); ?>">
            </span>
            </p>
            <p>
            <label>Google:</label>
            <span>
            <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="google_url"  value="<?php  echo get_user_meta($id, 'google_url', true); ?>">
            </span>
            </p>
            <p>
            <label>Twitter:</label>
            <span>
            <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="twitter_url"  value="<?php  echo get_user_meta($id, 'twitter_url', true); ?>">
            </span>
            </p>
            <p>
            <label>LinkedIn:</label>
            <span>
            <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="linkedin_url"  value="<?php  echo get_user_meta($id, 'linkedin_url', true); ?>">
            </span>
            </p>
            <div class="form_select_act">
            <div class="form-left"><p>
              <label>Website Type/Website Name:</label>
              </p>
              </div>
              <div class="form-right">
              <p>
            <span>
			<select name="Website1">
            <option <?php echo get_user_meta($id, 'Website1', true)?'selected="selected"' : '' ?>value="<?php  echo get_user_meta($id, 'Website1', true); ?>"><?php  echo get_user_meta($id, 'Website1', true); ?></option>
            <option value="Personal Website">Personal Website</option>
            <option value="Company Website">Company Website</option>
            <option value="Blog">Blog</option>
            <option value="RSS Feed">RSS Feed</option>
            <option value="Portfolio">Portfolio</option>
            <option value="Other">Other</option>
            </select>
            </span>
            <input type="text" name="websitename1" value="<?php  echo get_user_meta($id, 'websitename1', true); ?>"></p>
            <p>
            <select name="Website2">
             <option <?php echo get_user_meta($id, 'Website2', true)?'selected="selected"' : '' ?>value="<?php  echo get_user_meta($id, 'Website1', true); ?>"><?php  echo get_user_meta($id, 'Website2', true); ?></option>
            <option value="Personal Website">Personal Website</option>
            <option value="Company Website">Company Website</option>
            <option value="Blog">Blog</option>
            <option value="RSS Feed">RSS Feed</option>
            <option value="Portfolio">Portfolio</option>
            <option value="Other">Other</option>
            </select>
            <input type="text" name="websitename2" value="<?php  echo get_user_meta($id, 'websitename2', true); ?>">
            </p>
            <p>
            <select name="Website3">
             <option <?php echo get_user_meta($id, 'Website3', true)?'selected="selected"' : '' ?>value="<?php  echo get_user_meta($id, 'Website3', true); ?>"><?php  echo get_user_meta($id, 'Website3', true); ?></option>
            <option value="Personal Website">Personal Website</option>
            <option value="Company Website">Company Website</option>
            <option value="Blog">Blog</option>
            <option value="RSS Feed">RSS Feed</option>
            <option value="Portfolio">Portfolio</option>
            <option  value="Other">Other</option>
            </select>
            <input type="text" name="websitename3" value="<?php  echo get_user_meta($id, 'websitename3', true); ?>">
            </p>
            </div>
            </div>
            <p>
              <label>Interests & Hobbies</label>
            <span>
             <textarea name="interest_hobbies"><?php  echo get_user_meta($id, 'interest_hobbies', true); ?></textarea>
            </span>
            </p>
            <p>
             <label>Association Group</label>
            <span>
             <textarea name="associationgroups"><?php  echo get_user_meta($id, 'associationgroups', true); ?></textarea>
            </span>
            </p>
            <p>
             <label>Honors and Awards</label>
            <span>
             <textarea name="honorawards"><?php  echo get_user_meta($id, 'honorawards', true); ?></textarea>
            </span>
            </p>
            <p>
             <label>Upload  Photo </label>
            
            <span>
             <img src="<?php echo esc_attr( get_the_author_meta( 'profile_image', $id) ); ?>" height="250px" width="250px">
            <input type="file" name="profile_image">
           <input type="hidden" name="old_profile_image" value="<?php echo esc_attr( get_the_author_meta( 'profile_image', $id) ); ?>">
            <!--<textarea class="ckeditor" id="editor1" name="editor1" cols="70" rows="10"></textarea>-->
           </span> </p>
           <p>
            Do you grant permission for your profile to be randomly picked for the Chapter's Featured Member?
            </p>
            <p>
           <span><select name="grantpermissin">
             <option <?php echo get_user_meta($id, 'grantpermissin', true)?'selected="selected"' : '' ?>value="<?php  echo get_user_meta($id, 'grantpermissin', true); ?>"><?php  echo get_user_meta($id, 'grantpermissin', true); ?></option>
            <option value="Yes">Yes </option>
            <option value="No">No </option>
            </select>
           </span>
            <p>
            Do you wish your profile information given above to be viewed by other registered members of the Chapter?
            </p>
            <p>
           <span><select name="showprofiles">
             <option <?php echo get_user_meta($id, 'showprofiles', true)?'selected="selected"' : '' ?>value="<?php  echo get_user_meta($id, 'showprofiles', true); ?>"><?php  echo get_user_meta($id, 'showprofiles', true); ?></option>
            <option value="Yes">Yes </option>
            <option value="No">No </option>
            </select>
           </span>
           
           </p>
           <p>
            <input type="submit" name="profile_updates" value="Update Profile">
            </p>
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
<?php get_footer(); ?>
