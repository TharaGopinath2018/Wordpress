<?php
add_action( 'wp_ajax_nopriv_jneventajax', 'jneventajax' );  
add_action( 'wp_ajax_jneventajax', 'jneventajax' ); 
function jneventajax(){
		if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}?>
	 
          <?php
		  			 $args = array(
		  		   
                   'post_type' => 'ai1ec_event',
                   'posts_per_page' => 15,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
		// Start the loop.
		while ( have_posts() ) : the_post();
		global $wpdb;
		 $startime = $wpdb->get_results("SELECT start FROM `wp_ai1ec_events` WHERE `post_id` =".get_the_ID());
		 $start_date = $startime[0]->start; 	   ?>
          <div class="display_time">
            <div class="event_date"> <?php  echo date('d/m/y', $start_date);?>
              </div>
            <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a> </div>
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
			
		) ) );	?>
          <!--New Start Here--> 
          
        </div>
<?php exit;}
?>