<?php
add_action( 'wp_ajax_nopriv_jfaqajax', 'jfaqajax' );  
add_action( 'wp_ajax_jfaqajax', 'jfaqajax' ); 
function jfaqajax(){
			if(isset($_POST['cate']))
				{
				   $cat_name = $_POST['cate'];
 			       $value = array(
                   'post_type' => 'ws_faq',
               	   'posts_per_page' => 20,
				   'faq-tax'=>$cat_name,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($value);}
	  ?>
    
        <div class="tab-pane" id="e">
          <?php
		  
		// Start the loop.
	
		while ( have_posts() ) : the_post();?>
          <ul class="mtree transit">
            <li> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse"><?php echo the_title();?>
             <?php //echo get_the_date();?></a>
              <?php //the_excerpt(); ?>
              <ul class="advanced-filters">
                <li> <?php echo the_post_thumbnail(); the_content();  ?> </li>
              </ul>
            </li>
          </ul>
          <?php 	endwhile; 
				?>
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
<script src="<?php echo get_template_directory_uri(); ?>/js/mtree.js"></script>
<?php
exit;}
?>
