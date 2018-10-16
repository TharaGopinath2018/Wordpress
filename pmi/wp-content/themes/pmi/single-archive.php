<?php get_header();?>
<script>
$(document).ready(function(){
	$('.contentarea').collapser({
		mode: 'chars',
		truncate: 1000
	});
});
</script>
         <div class="main container">
<div class="main_bg_shadow">
<div class="pmichennai_tab">
<div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
<div class="pmi_welcome">
             <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
            <?php the_content();
         
			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		// End the loop.
		endwhile;
		?>
             </div>
            </div>
            
               <?php get_template_part('right','bar');?>
          </div>
            </div>
      
      <!-- Contact section Starts here -->
    <?php get_footer();?>