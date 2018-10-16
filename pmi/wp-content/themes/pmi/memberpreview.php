
<?php
/*
Template Name: Member Preview Template
*/
?>
<?php get_header();?>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
       <h4>Member Profile Preview</h4>
<?php
global $current_user;
//echo $current_user->display_name;
$id = $current_user->ID; 
$result = get_user_meta($id);
//echo "<pre>";print_r($result);
?>
      
        <div class="edit_profile">
          <form method="post" action=""  enctype="multipart/form-data" class="sitecontact">
        <!--  <p>INTRODUCTION</p>-->
           <p>
           <span class="profile photo">
             <img src="<?php echo esc_attr( get_the_author_meta( 'profile_image', $id) ); ?>" height="120px" width="120px">
           <!-- <input type="file" name="profile_image">
           <input type="hidden" name="old_profile_image" value="<?php echo esc_attr( get_the_author_meta( 'profile_image', $id) ); ?>">-->
            <!--<textarea class="ckeditor" id="editor1" name="editor1" cols="70" rows="10"></textarea>-->
           </span> </p>
          <p>
            <label>Profile Headlines:</label>
            <span class="interestarea">
            <!--<input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="profile_headlines"  value="">-->
            <?php  echo get_user_meta($id, 'profile_headlines', true); ?>
            </span>
            </p>
            <p>
              <label>Your Professional Objectives:</label>
            <span class="interestarea">
            <!--<textarea name="pro_objectives">--><?php  echo get_user_meta($id, 'pro_objectives', true); ?><!--</textarea>
           --> </span>
            </p>
            <p>
              <label>Current PMI Credentials:</label>
              <?php  echo  get_user_meta($id, 'credentials', true); ?>
           <!-- <span class="check_box_span">
           <span class="check"><input type="checkbox" name="credentials[]"  value="CAPM"/>CAPM® </span>
           <span class="check"><input type="checkbox" name="credentials[]" value="PMP"/>PMP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PgMP"/>PgMP®</span> 
           <span class="check"><input type="checkbox" name="credentials[]" value="PfMP"/>PfMP®</span>    
           <span class="check"><input type="checkbox" name="credentials[]" value="PMI-PBA"/>PMI-PBA®</span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMI-ACP"/>PMI-ACP®</span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMI-RMP" />PMI-RMP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="PMI-SP"/>PMI-SP® </span>  
           <span class="check"><input type="checkbox" name="credentials[]" value="None" />None</span>  
            </span>-->
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
          
          <!--  <input type="text" name="facebook_url"  value="">-->
            <?php  echo get_user_meta($id, 'facebook_url', true); ?>
            </span>
            </p>
            <p>
            <label>Google:</label>
            <span>
            <!--<input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="google_url"  value="">-->
            <?php  echo get_user_meta($id, 'google_url', true); ?>
            </span>
            </p>
            <p>
            <label>Twitter:</label>
            <span>
           <!-- <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="twitter_url"  value="">-->
            <?php  echo get_user_meta($id, 'twitter_url', true); ?>
            </span>
            </p>
            <p>
            <label>LinkedIn:</label>
            <span>
           <!-- <input type="hidden" name="user_id" value="<?php echo $current_user->ID;?>" >
            <input type="text" name="linkedin_url"  value="">-->
            <?php  echo get_user_meta($id, 'linkedin_url', true); ?>
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
             <?php  echo get_user_meta($id, 'Website1', true); ?>
		       </span>
           <!-- <input type="text" name="websitename1" value="">-->
           <p> <?php  echo get_user_meta($id, 'websitename1', true); ?></p>
            </p>
             </div>
            </div>
         <div class="form_select_act">
            <div class="form-left"><p>
              <label>Website Type/Website Name:</label>
              </p>
              </div>
              <div class="form-right">
              <p>
            <span>
             <?php  echo get_user_meta($id, 'Website2', true); ?>
		       </span>
           <!-- <input type="text" name="websitename1" value="">-->
           <p> <?php  echo get_user_meta($id, 'websitename2', true); ?></p>
            </p>
             </div>
            </div>
            <div class="form_select_act">
            <div class="form-left"><p>
              <label>Website Type/Website Name:</label>
              </p>
              </div>
              <div class="form-right">
              <p>
            <span>
             <?php  echo get_user_meta($id, 'Website3', true); ?>
		       </span>
           <!-- <input type="text" name="websitename1" value="">-->
           <p> <?php  echo get_user_meta($id, 'websitename3', true); ?></p>
            </p>
             </div>
            </div>
           
            <p>
              <label>Interests & Hobbies</label>
            <span class="interestarea">
            <!-- <textarea name="interest_hobbies"></textarea>-->
             <?php  echo get_user_meta($id, 'interest_hobbies', true); ?>
            </span>
            </p>
            <p>
             <label>Association Group</label>
            <span  class="interestarea">
             <!--<textarea name="associationgroups"></textarea>-->
             <?php  echo get_user_meta($id, 'associationgroups', true); ?>
            </span>
            </p>
            <p>
             <label>Honors and Awards</label>
            <span  class="interestarea">
            <!-- <textarea name="honorawards"></textarea>-->
             <?php  echo get_user_meta($id, 'honorawards', true); ?>
            </span>
            </p>
           
           <!-- <p>
            Do you grant permission for your profile to be randomly picked for the Chapter's Featured Member?
            </p>
            <p>
           <span>
           <?php // echo get_user_meta($id, 'grantpermissin', true); ?>
          <!-- <select name="grantpermissin">
            <option value="1">Yes </option>
            <option value="2">No </option>
            </select>-->
           <!--</span>
           
            <p>
            Do you wish your profile information given above to be viewed by other registered members of the Chapter?
            </p>
            <p>
           <span>-->
            <?php  //echo get_user_meta($id, 'showprofiles', true); ?>
           <!--<select name="showprofiles">
            <option value="1">Yes </option>
            <option value="2">No </option>
            </select>-->
         <!--  </span>
           
           </p>-->
          <!-- <p>
            <input type="submit" name="profile_updates" value="Send">
            </p>-->
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
