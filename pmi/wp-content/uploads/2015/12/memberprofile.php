<?php
/*
Template Name: Member Profile Setup Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome"> <h4>Member Profile  </h4>


        <div class="edit_profile">
   
        
          <form method="post" action="" class="sitecontact">
          <p>INTRODUCTION</p>
          <p>
            <label>Profile Headlines:</label>
            <span>
            <input type="text" name="update_email"  placeholder="Email Address">
            </span>
            </p>
            <p>
              <label>Your Professional Objectives:</label>
            <span>
            <textarea name=""></textarea>
            </span>
            </p>
            <p>
            <div class="form_select_act">
            <p>SOCIAL MEDIA</p>
              <div class="form-left"><label>Your Social Media Profile URL :</label>
              </div>
              <div class="form-right">
            <span class="right_ali">
            <p><input type="text" name="update_email"  placeholder="Email Address"></p>
             <p><input type="text" name="update_email"  placeholder="Email Address"></p>
             <p><input type="text" name="update_email"  placeholder="Email Address"></p>
            </span>
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
            <select name="">
            <option value="1">Personal Website</option>
            <option value="2">Company Website</option>
            <option value="3">Blog</option>
            <option value="4">RSS Feed</option>
            <option value="5">Portfolio</option>
            <option value="6">Other</option>
            </select>
            </span>
            
            <input type="text" name=""></p>
            <p>
            <select name="">
            <option value="1">Personal Website</option>
            <option value="2">Company Website</option>
            <option value="3">Blog</option>
            <option value="4">RSS Feed</option>
            <option value="5">Portfolio</option>
            <option value="6">Other</option>
            </select>
            <input type="text" name="">
            </p>
            <p>
            <select name="">
            <option value="1">Personal Website</option>
            <option value="2">Company Website</option>
            <option value="3">Blog</option>
            <option value="4">RSS Feed</option>
            <option value="5">Portfolio</option>
            <option value="6">Other</option>
            </select>
            <input type="text" name="">
            </p>
            </div>
            </div>
            <p>
              <label>Interests & Hobbies</label>
            <span>
             <textarea name=""></textarea>
            </span>
            </p>
            <p>
             <label>Association Group</label>
            <span>
             <textarea name=""></textarea>
            </span>
            </p>
            <p>
             <label>Honors and Awards</label>
            <span>
             <textarea name=""></textarea>
            </span>
            </p>
            <p>
             <label>Uplode  Photo </label>
             </p>
            <span>
            <input type="submit" name="uploadphoto" value="Upload">
            <!--<textarea class="ckeditor" id="editor1" name="editor1" cols="70" rows="10"></textarea>-->
           </span>
            <p>
            Do you grant permission for your profile to be randomly picked for the Chapter's Featured Member?
            </p>
            <p>
           <span><select name="">
            <option value="1">Yes </option>
            <option value="2">No </option>
            </select>
           </span>
           
            <p>
            Do you wish your profile information given above to be viewed by other registered members of the Chapter?
            </p>
            <p>
           <span><select name="">
            <option value="1">Yes </option>
            <option value="2">No </option>
            </select>
           </span>
           
           </p>
           <p>
            <input type="submit" name="sitecontact" value="Send">
            </p>
          </form>
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
