<?php 
/*
Template Name: My Calender Template
*/
?>
<?php get_header();?>
  <div class="main container">
<div class="main_bg_shadow">
<div class="pmichennai_tab">
<div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
<div class="pmi_welcome">
<?php //echo WP_FullCalendar::calendar($args);
 echo do_shortcode('[ai1ec view="monthly"]'); ?>
</div>
</div>
        <?php get_template_part('right','bar');?>
             
      
             </div>
            </div>
      <!-- Contact section Starts here -->
<?php get_footer();?>