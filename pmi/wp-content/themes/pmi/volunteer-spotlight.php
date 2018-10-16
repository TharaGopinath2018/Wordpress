<?php
/*
Template Name:Volunteer Spotlight Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
<div class="pmichennai_tab">
<div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
<div class="pmi_welcome">
  <?php
			  
		    $args = array( 'post_type' => 'volunteerspotlight');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
	       ?>
		
			<div class="volunteer_spot"><a href="<?php //the_permalink(); ?>" class="#"><?php echo the_post_thumbnail(); ?><?php echo the_title();?></a></div>
			<?php //the_excerpt(); 
			endwhile;?>

           
</div>
</div>
<?php get_template_part('right','bar');?>
</div></div>
<?php get_footer(); ?>   