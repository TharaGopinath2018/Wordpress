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
			the_title( '<h1 class="entry-title">', '</h1>' );
			 the_content(); 
			 
		
    echo"<div class='event_blog'>";
	echo "<p><span>Evetn Type </span><label>:</label> ". 	$events_type = get_post_meta( $post->ID, 'events_type', true )."</p>";
	echo "<p><span>Events Venue </span><label>:</label>".	$events_venue = get_post_meta( $post->ID, 'events_venue', true )."</p>";
	echo "<p><span>Events Link Video </span><label>:</label>". $events_link_video = get_post_meta( $post->ID, 'events_link_video', true )."</p>";
	echo "<p><span>Events Highlights </span><label>:</label>".	$events_highlights = get_post_meta( $post->ID, 'events_highlights', true )."</p>";
	echo "<p><span>Events Start Date </span><label>:</label>".	$events_start_date = get_post_meta( $post->ID, 'events_start_date', true )."</p>";
	echo "<p><span>Events End Date </span><label>:</label>". $events_end_date = get_post_meta( $post->ID, 'events_end_date', true )."</p>";
	echo "<p><span>Events Start Time </span><label>:</label>".	$events_start_time = get_post_meta( $post->ID, 'events_start_time', true )."</p>";
	echo "<p><span>Events End Time </span><label>:</label>".	$events_end_time = get_post_meta( $post->ID, 'events_end_time', true )."</p>";
	echo "</div>";
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
