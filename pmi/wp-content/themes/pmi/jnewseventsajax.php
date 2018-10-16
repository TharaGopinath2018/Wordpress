<?php
add_action( 'wp_ajax_nopriv_jnewseventsajax', 'jnewseventsajax' );  
add_action( 'wp_ajax_jnewseventsajax', 'jnewseventsajax' ); 
function jnewseventsajax(){
			if(isset($_POST['cate']))
				{
				   $cat_name = $_POST['cate'];
 			       $args = array(
                   'post_type' => 'ai1ec_event',
               	   'posts_per_page' => 15,
				   'events_categories'=>$cat_name,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args); }
	  ?>
    
        <div class="tab-pane" id="e">
          <?php  while ( have_posts() ) : the_post();?>
          <div class="display_time">
            <div class="event_date"> <?php // echo get_the_date();?>
              <?php //the_content(); ?>
            </div>
            <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a> </div>
          </div>
          <?php 	endwhile; ?>
         <?php
				
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
<?php
exit;}
?>
