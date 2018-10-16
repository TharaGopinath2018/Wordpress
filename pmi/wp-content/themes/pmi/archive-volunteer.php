<?php get_header();?>
    
             <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_title( '<h1 class="entry-title">', '</h1>' );
			the_excerpt();

			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		// End the loop.
		endwhile;
		?>
             
            
               <?php get_template_part('right','bar');?>
            
      <!-- Contact section Starts here -->
    <?php get_footer();?>