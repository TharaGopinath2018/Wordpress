<?php
/*
Template Name: AskQuestion Template
*/
?>
<?php
if(isset($_POST['ask_question']))
{  
	$ask = askques($_POST);
}

?>
<?php get_header();?>
  <div class="main container">
<div class="main_bg_shadow">
<div class="pmichennai_tab">
<div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
<div class="pmi_welcome">
<div class="askquestion">
<h4 class="pmi_title">Ask a Question</h4>

<p>Submit your queries to the chapter board members.
</p>
          
              <form method="post" action="" name="hiring_form" enctype="multipart/form-data">
                    <p><label>Full Name</label><input type="text"   name="ask_name" placeholder="Enter The Name..." /></p>
                     <p><label>EMail</label><input type="email"   name="ask_email" placeholder="Enter The Email..." /></p>
               		<p><label>Specify your Question</label><textarea name="ask_ques"></textarea></p>
                    <p><label>Provide any further Information that relates to your question.</label><textarea name="ask_desc"></textarea></p>
                  <p><span><input type="submit" name="ask_question"  value="Submit"  class="btn_search_carrer"/></span><span><input type="reset" name="reset" value="Clear"></span></p>
              </form>
      
   <?php
   if($ask)
   { 
   echo $ask;
   
   }
   ?>
             </div></div>
            </div>
            <?php get_template_part('right','bar');?>
             
      
             </div>
            </div>
      <!-- Contact section Starts here -->
<?php get_footer();?>