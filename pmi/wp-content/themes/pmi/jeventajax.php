<?php
add_action( 'wp_ajax_nopriv_jeventajax', 'jeventajax' );  
add_action( 'wp_ajax_jeventajax', 'jeventajax' ); 
function jeventajax(){
		if(isset($_POST['page_no']))
	{
		$paged = $_POST['page_no'];
	}else{
		$paged = 1;
	}?>
	  <ul class="tap_list_type">
              <?php 
	      //$paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'events',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>

              <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="section_cont" id="<?php echo $j;?>"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a><?php //echo get_the_date();?>
                <?php //the_content(); ?>
              </div>
              <?php 	endwhile;
				echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, $paged ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			
		) ) );	?>
            </ul>
<?php exit;}
?>