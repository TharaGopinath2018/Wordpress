<?php
/*
Template Name: Training Request Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <h4>Training Request </h4>
        <div class="edit_profile">
          <?php
	  global $current_user;
	  $user_id = $current_user->ID;
	  $key = 'reg_lastname';
	  $single = true;
	  $user_last = get_user_meta( $user_id, $key, $single ); ?>
          <form method="post" action="" class="sitecontact">
            <p>
              <label>Date of Request:</label>
              <span>
              <input type="text" name="update_email" value="<?php echo date("d/m/Y"); ; ?>"  >
              </span> </p>
            <p>
              <label>Name:</label>
              <span>
              <input type="text" name="update_email"  value="<?php echo $current_user->display_name; ?>" >
              </span> </p>
            <p>
              <label>PMI ID:</label>
              <span>
              <input type="text" name="update_email"  >
              </span> </p>
            <p> Address for Communication: </p>
            <p>
              <label>Address Line 1 </label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Address Line 2 </label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Address Line 3</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>City</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>PIN</label>
              <input type="text" name="update_email"  >
            </p>
            <p> Organization Address: </p>
            <p>
              <label> Organization</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Address Line 1 </label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Address Line 2 </label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Address Line 3</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>City</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>PIN</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              Contact Details:
            </p>
            <p>
              <label>Mobile</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Telephone</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Email ID</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              Educational Qualifications:
            </p>
            <p>
              <label>Graduate</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>PG</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label> Others</label>
              <input type="text" name="update_email"  >
            </p>
            <p> Project Management Experience: </p>
            <p>
              <label>Years</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label> Months</label>
              <input type="text" name="update_email"  >
            </p>
            <p>
              <label>Planning to appear for PMO Certificate in:</label>
              <input type="text" name="update_email"   >
              </p>
            <p>Mode of Payment :</p>
            <p>
              <label>DD/Cheque</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label>
              Cheque/DD No.</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label>Date</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label>Bank</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label>Branch</label>
              <input type="text" name="update_email"  ></p>
              <p>
              <label>A/C No.</label>
              <input type="text" name="update_email"  >
              </p>
              <p>
              <label>Account Holder</label>
              <input type="text" name="update_email"  ></p>
              <p>
              <label>Amount</label>
              <input type="text" name="update_email"  >
               </p>
            <p>
              <input class="btn btn_action" type="submit" name="sitecontact" value="Send Request">
            </p>
          </form>
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
