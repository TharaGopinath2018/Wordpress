<?php
/*
Template Name: Event Request Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome"> <h4>Event Request </h4>
         <div class="edit_profile">
             <form method="post" action="" class="sitecontact">
          <p>
            <label>Date of Request:</label>
            <span>
            <input type="text" name="update_email" value="<?php echo date("d/m/Y"); ; ?>"  >
            </span>
            </p>
            <p>
             <label>Name:</label>
            <span>
            <input type="text" name="update_email"  >
            </span>
            </p>
            <p>
            <label>PMI ID:</label>
            <span>
            <input type="text" name="update_email"  >
            </span>
            </p>
            <p><strong>Contact Details:</strong>
            </p>
            <p>
            <span>
            	<label>Mobile</label><span><input type="text" name="update_email"  >
                </span>
                </p>
                <p><label>Telephone</label><input type="text" name="update_email"  ></p>
                <p><label>Email ID</label><input type="text" name="update_email"  ></p>
            <input class="btn btn_action" type="submit" name="sitecontact" value="Send Request">
            <label>
          </form>
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
