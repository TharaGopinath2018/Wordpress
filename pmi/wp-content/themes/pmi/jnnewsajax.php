<?php
add_action( 'wp_ajax_nopriv_jnnewsajax', 'jnnewsajax' );  
add_action( 'wp_ajax_jnnewsajax', 'jnnewsajax' ); 
function jnnewsajax(){
		if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}?>
	 
          <?php $args = array(
		  		   
                   'post_type' => 'news',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont">
            <div class="event_date_sec"> <?php //echo get_the_date();?></div>
            <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?></a>
            <?php //the_content(); ?>
          </div>
          <?php 	endwhile;
				echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			
		)));?>
          <!--New Start Here--> 
          
        </div>
<?php exit;}
?>