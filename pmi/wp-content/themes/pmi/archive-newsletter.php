<?php get_header();?>

<div class="main container">
<div class="main_bg_shadow">
  <div class="pmichennai_tab">
    <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8">
      <div class="pmi_welcome pdf_downlode">
        <?php
		$args = array(
                   'post_type' => 'newsletter',
                   'posts_per_page' => 5,
				   'category_name'=>'',
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			the_title( '<h1 class="entry-title">', '</h1>' );
			the_content();
		   echo get_the_date();

			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

		// End the loop.
		endwhile;
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			)));
		?>
      </div>
    </div>
    <?php get_template_part('right','bar');?>
  </div>
</div>

<!-- Contact section Starts here -->
<?php get_footer();?>
