<section>
<div class="main container">
<div class="main_bg_shadow">
<div id="myCarousel"  class="carousel slide slider_head"  data-ride="carousel"> 
            <!-- Indicators -->
           
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
         	 <!--/*<div class="item active"><img src="<?php echo get_template_directory_uri();?>/images/slider1.jpg" class="wrapper1"> </div>
              <div class="item"> <img src="<?php echo get_template_directory_uri();?>/images/slider1.jpg" class="wrapper1"> </div>
              <div class="item"> <img src="<?php echo  get_template_directory_uri();?>/images/slider1.jpg" class="wrapper1"> </div>*/-->
              
             <?php 
	     $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'banners',
                   'posts_per_page' =>1,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
             <?php
		// Start the loop.
while ( have_posts() ) : the_post();?>

			<div class="section_cont header_img_wid">
    		<a href="<?php the_permalink();?>"><?php echo the_post_thumbnail(); ?></a> <?php //echo get_the_date();?>
            <a href="<?php the_permalink(); ?>" class="inner_head_title"><?php echo the_title();?></a>
			<?php //the_excerpt(); ?>
            </div>
            
			<?php 	endwhile;
				echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => '<<',  
            			'next_text' => '>>',
						'type'			=> 'list'
			
		) ) );
		?>

            </div>
            
            <!-- Left and right controls --> 
             </div>
               