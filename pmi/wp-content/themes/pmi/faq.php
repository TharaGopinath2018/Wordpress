<?php
/*
Template Name:Frequently Ask Template
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
	$args = array(
	'type'                     => 'ws_faq',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'faq-tax',
	'pad_counts'               => false 
); 
	$categories = get_categories( $args );
?>
        <h2 class="pmi_title">FAQ</h2>
        <div class="tab_pane" id="c">
            <select name="cate" id="ddlFruits" >
              <option value="">Choose Categories</option>
              <?php foreach($categories as $cats){	 ?>
              <option  value="<?php echo $cats->slug;?>" <?php if($cat_name == $cats->slug){ echo 'selected="selected"';} ?>><?php echo $cats->name; ?> </option>
              <?php }  ?>
            </select>
            <!--<input type="submit" value="Search" name="cat_search" />-->
         
         <!--  <select id="ddlFruits">
        <option value=""></option>
        <option value="1">Apple</option>
        <option value="2">Mango</option>
        <option value="3">Orange</option>
    </select>-->
        </div>
        <div class="tab-pane" id="e">
     <?php
					
                   $args = array(
                   'post_type' => 'ws_faq',
                   'posts_per_page' => 20,
				   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
		// Start the loop.
		 
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <ul class="mtree transit">
            <li> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse"><?php echo the_title();?> <?php echo get_the_date();?></a>
              <?php //the_excerpt(); ?>
              <ul class="advanced-filters">
                <li> <?php echo the_post_thumbnail(); the_content();  ?> </li>
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
			
		) ) );	?>
          <!--New Start Here--> 
          
        </div>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/mtree.js"></script>
<script type="text/javascript">
        $(function () {
            $("#ddlFruits").change(function () {
              //  var selectedText = $(this).find("option:selected").text();
                var selectedValue = $(this).val();
                //alert("Value: " + selectedValue);
				    $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jfaqajax',  
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
<?php get_footer(); ?>
