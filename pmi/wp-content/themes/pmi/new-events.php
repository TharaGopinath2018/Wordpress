<?php
/*
Template Name:New and Events Template
*/
?>
<?php get_header();?>
<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome">
        <?php 
	      $paged=get_query_var('page');
		  
		  $categories = get_categories( $args );
	    // echo "</pre>"; print_r($categories);exit;
		  $args = array(
				'type'                     => 'ai1ec_event',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'DESC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false 

					);
?>
         <h2 class="pmi_title">Events</h2> 
         <div class="tab_pane" id="c">
        <!-- <form method="post" action="" name="catagories" class="news_event" id="form" onchange="javascript: submit()">-->
          <select name="cate" id="ddlFruits">
          <option value="">Choose Events</option>
            <?php foreach($categories as $cats){	 ?>
            <option  value="<?php echo $cats->slug;?>" <?php if($cat_name == $cats->slug){ echo 'selected="selected"';} ?>><?php echo $cats->name; ?> </option>
            <?php }  ?>
          </select>
          <?php
		
		  ?>
          <!--<input type="submit" value="Search" name="cat_search" />
        </form>-->
        </div>
         <div class="tab-pane" id="e">
         <?php
				    $args = array(
                   'post_type' => 'ai1ec_event',
                   'posts_per_page' => 15,
				   'category_name'=>'',
                   'paged' => $paged,
				   'page' => $paged,
                   );
				 // echo date('d/m/y', '1428744600');
    	 query_posts($args);
		 
		 // $event_name = get_post_meta( $post->ID, 'ai1ec_event' );

		// Start the loop.
		while ( have_posts() ) : the_post();
		 	   $startime = $wpdb->get_results("SELECT start FROM `wp_ai1ec_events` WHERE `post_id` =".get_the_ID());
			   $start_date = $startime[0]->start;
		?>
          <div class="display_time">
            <div class="event_date"> <?php  //echo date('d/m/y', $start_date);?>
              <?php //the_content(); ?>
            </div>
            <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title(); 	echo $startime->start;	 ?> </a> </div>
          </div>
          
          <?php	endwhile; 
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
      </div>
      <div class="pmi_welcome news_events">
        <div class="new_area">
          <h2 class="pmi_title">News</h2>
          <div class="tab-pane" id="n">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(
		  		   
                   'post_type' => 'news',
                   'posts_per_page' => 15,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <!-- <p>News</p>-->
          <?php
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
			
		) ) );	?>
                <script>
   $(document).ready(function(){
//event
   $( "body" ).on( "click", "#e .page-numbers a", function(e) {
		e.preventDefault();
		  page_no = $(this).text();
		  if(page_no == 'Next'){
			  current = $("#e .current").text();
			  var page_no = parseInt(current) + 1;
		  }
 		 if(page_no == 'Previous'){
			  current = $("#e .current").text();
			  var page_no = parseInt(current) - 1;
		  }
	     $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jneventajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#e").html(data);
					}
 	});
 });	
//news
   $( "body" ).on( "click", "#n .page-numbers a", function(e) {
		e.preventDefault();
		  page_no = $(this).text();
		  if(page_no == 'Next'){
			  current = $("#n .current").text();
			  var page_no = parseInt(current) + 1;
		  }
 		 if(page_no == 'Previous'){
			  current = $("#n .current").text();
			  var page_no = parseInt(current) - 1;
		  }
	     $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jnnewsajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#n").html(data);
					}
 	});				
   });
//event
$("#site").on("change", function() {
		e.preventDefault();
		  cat = $(this).text();
		  alert(cat);
		  $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jneventajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#c").html(data);
					}
 	});
 });	
 });
</script>
<script type="text/javascript">
        $(function () {
            $("#ddlFruits").change(function () {
              //  var selectedText = $(this).find("option:selected").text();
                var selectedValue = $(this).val();
               // alert("Value: " + selectedValue);
				    $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jnewseventsajax',  
					cate:selectedValue
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					$("#e").html(data);
					}
				});
            });
        });
    </script>
 </div>
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<?php get_footer(); ?>
