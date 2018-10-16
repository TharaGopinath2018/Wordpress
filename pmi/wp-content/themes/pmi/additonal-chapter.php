<?php
/*
Template Name: Additonal Chapter  Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <?php
  $args = array( 'post_type' => 'a_chapter_executives');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
	       ?>
        <div><a href="<?php the_permalink(); ?>" class="#"><?php echo the_post_thumbnail(); ?><?php echo the_title();?></a></div>
        <?php //the_excerpt();
			
			global $wpdb;
            echo $c_executives_Designation = get_post_meta( $post->ID, 'c_executives_Designation', true );
	        echo $c_executives_email = get_post_meta( $post->ID, 'c_executives_email', true );
	        echo $c_executives_mobile = get_post_meta( $post->ID, 'c_executives_mobile', true );
			 endwhile;?>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<!-- Contact section Starts here -->
<?php get_footer();?>
