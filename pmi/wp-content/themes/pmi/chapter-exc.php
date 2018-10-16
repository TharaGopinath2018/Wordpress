<?php
/*
Template Name: Chapter_Exc Template
*/
?>
<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
    <div class="pmi_welcome news_events">
      <div class="chapter_exc"> <h2 class="pmi_title">Chapter Executives</h2>

         <?php
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'chapter_executives',
                   'posts_per_page' => -1,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
      <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
      <ul class="mtree transit">
        <li class="bava"> <p class="e_image"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a></p> 
          <?php //the_excerpt(); ?>
          <ul class="advanced-filters">
          <p class="e_title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></p>
            <li>
              <?php //echo the_post_thumbnail(); // the_content(); global $wpdb;
			echo"<p><span>".$c_executives_Designation  = get_post_meta( $post->ID, 'c_executives_Designation', true )."</span></p>";
	        echo"<p><span>".$c_executives_email = get_post_meta( $post->ID, 'c_executives_email', true )."</span></p>";
	        echo"<p><span>".$c_executives_mobile = get_post_meta( $post->ID, 'c_executives_mobile', true )."</span></p>"; ?>
            </li>
          </ul>
        </li>
      </ul>
      <?php 	endwhile;
	  echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			
		) ) );	
				?>
     
      
      </div>
      </div>
      <div class="pmi_welcome news_events">
       <div class="chapter_exc">
        <div class="chapter_exc"> <h2 class="pmi_title">Additional Chapter Executives</h2>

         <?php
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'a_chapter_executives',
                  'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
      <?php
		// Start the loop.
	while ( have_posts() ) : the_post();?>
      <ul class="mtree transit">
        <li class="bava"> <p class="e_image"><a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail(); ?></a></p> 
          <?php //the_excerpt(); ?>
          <ul class="advanced-filters">
          <p class="e_title"><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></p>
            <li>
              <?php //echo the_post_thumbnail(); // the_content(); global $wpdb;
			echo"<p><span>".$a_executives_designation  = get_post_meta( $post->ID, 'a_executives_designation', true )."</span></p>";
	        echo"<p><span>".$a_executives_email = get_post_meta( $post->ID, 'a_executives_email', true )."</span></p>";
	        echo"<p><span>".$a_executives_mobile = get_post_meta( $post->ID, 'a_executives_mobile', true )."</span></p>"; ?>
            </li>
          </ul>
        </li>
      </ul>
      <?php 	endwhile;
	  echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			
		) ) );	
				?>
     
      
      </div>
      </div>
    </div>
    </div> 
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
