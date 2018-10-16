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
<div class="pmi_welcome event_selection">
             <?php
             global $wpdb;
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_title( '<h1 class="entry-title">', '</h1>' );?>
			 <div class="contentarea">
            <?php the_content(); ?>
         </div>
		<?php
    echo"<div class='event_blog'>";
	echo "<p><span>Type </span><label>:</label> ". 	$events_type = get_post_meta( $post->ID, 'events_type', true )."</p>";
	echo "<p><span>Venue </span><label>:</label>".	$events_venue = get_post_meta( $post->ID, 'events_venue', true )."</p>";
	 "<p><span>Link Video </span><label>:</label>".$events_link_video = get_post_meta( $post->ID, 'events_link_video', true )."</p>";
	echo "<p><span>Link Video </span><label>:</label>"."<a href='".$events_link_video."' target='_blank'>See Video</a>";
	echo "<p><span>Highlights </span><label>:</label>".	$events_highlights = get_post_meta( $post->ID, 'events_highlights', true )."</p>";
	echo "<p><span>Start Date </span><label>:</label>".	$events_start_date = get_post_meta( $post->ID, 'events_start_date', true )."</p>";
	echo "<p><span> End Date </span><label>:</label>". $events_end_date = get_post_meta( $post->ID, 'events_end_date', true )."</p>";
	echo "<p><span> Start Time </span><label>:</label>".	$events_start_time = get_post_meta( $post->ID, 'events_start_time', true )."</p>";
	echo "<p><span>End Time </span><label>:</label>".	$events_end_time = get_post_meta( $post->ID, 'events_end_time', true )."</p>";
//	echo "<a href='".$events_link_video."' target='_blank'>See More</a>";
	echo "</div>";
			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		// End the loop.
		endwhile;
		?>
       <a href="<?php echo HOME; ?>/public-signup">Register</a> &nbsp;&nbsp;&nbsp;<a href="#">Signin</a>
            </div>
            </div>
            
               <?php get_template_part('right','bar');?>
             </div>
             </div>
      
      <!-- Contact section Starts here -->
    <?php get_footer();?>