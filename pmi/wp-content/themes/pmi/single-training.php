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
      <div class="pmi_welcome training_event training_section">
        <?php 
	    /*  $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'training',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
    $result =   query_posts($args);
	  echo "<pre>";print_r($result); exit;*/
   ?>
   
        <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			the_content(); 
			echo"<div class='training_section_list'>";
	echo"<p><span>Format Type	</span><label>:</label> ". 	    $training_formate_type = get_post_meta( $post->ID, 'training_formate_type', true )."</p>";
	echo"<p><span>Location </span><label>:</label> ". 		    $training_venue = get_post_meta( $post->ID, 'training_venue', true )."</p>";
	echo"<p><span>Event Date </span><label>:</label>
	<span class='training_event_span'> ". 	$training_start_date1 = get_post_meta( $post->ID, 'training_start_date1', true )." ".$training_start_time1 = get_post_meta( $post->ID, 'training_start_time1', true )." - ".$training_end_time1 = get_post_meta( $post->ID, 'training_end_time1', true )."</span></p>".
	
			"<p><span class='training_event_span'> ".$training_start_date2 = get_post_meta( $post->ID, 'training_start_date2', true )."  ".$training_start_time2 = get_post_meta( $post->ID, 'training_start_time2', true )." - ".$training_end_time2 = get_post_meta( $post->ID, 'training_end_time2', true )."</span></p>".
			
"<p><span class='training_event_span'> ".$training_start_date3 = get_post_meta( $post->ID, 'training_start_date3', true )."  ".$training_start_time3 = get_post_meta( $post->ID, 'training_start_time3', true )." - ".$training_end_time3 = get_post_meta( $post->ID, 'training_end_time3', true )."</span></p>".

"<p><span class='training_event_span'> ".$training_start_date4 = get_post_meta( $post->ID, 'training_start_date4', true )."  ".$training_start_time4 = get_post_meta( $post->ID, 'training_start_time4', true )." - ".$training_end_time4 = get_post_meta( $post->ID, 'training_end_time4', true )."</span></p>".

"<p><span class='training_event_span'> ".$training_start_date5 = get_post_meta( $post->ID, 'training_start_date5', true )."</span></p>";
	echo"<p><span>Member Price </span><label>:</label> ". $training_member_price = get_post_meta( $post->ID, 'training_member_price', true )."</p>";
	echo"<p><span>Non Member </span><label>:</label> ". $training_non_member_price = get_post_meta( $post->ID, 'training_non_member_price', true )."</p>";
	echo"<p><span>PDU Awarded </span><label>:</label> ".$training_pdu_awarded = get_post_meta( $post->ID, 'training_pdu_awarded', true )."</p>";
	echo"<p><span>Language </span><label>:</label> ".$training_language = get_post_meta( $post->ID, 'training_language', true )."</p>";
	echo"<p><span>Seats Allocated </span><label>:</label> ".$training_seats_allocated = get_post_meta( $post->ID, 'training_seats_allocated', true )."</p>";
			
echo"</div>";
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
