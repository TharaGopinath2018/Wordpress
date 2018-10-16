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
		while ( have_posts() ) : the_post(); ?>

	
			  <div class="cha_image"><p class="e_image"><a href="<?php the_permalink(); ?>" class="#"><?php echo the_post_thumbnail(); ?></a></p></div>
        <div class="e_details"> <p class="e_title"><?php echo the_title();?></p>
		<?php	  global $wpdb;
        echo"<p>". $c_executives_Designation = get_post_meta( $post->ID, 'c_executives_Designation', true );
		echo"<p>".$c_executives_email = get_post_meta( $post->ID, 'c_executives_email', true );
		echo"<p>". $c_executives_mobile = get_post_meta( $post->ID, 'c_executives_mobile', true );?></a></div>
			
           <div class="e_content"> <?php the_content(); ?></div>
        
			
		<?php	 endwhile;?>

			<?php
            // If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		// End the loop.
		//endwhile;
		?>
         
            </div></div>
            <?php get_template_part('right','bar');?>
             
      
             
            </div>
      <!-- Contact section Starts here -->
<?php get_footer();?>