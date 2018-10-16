<?php get_header();?>
<?php if(isset($_POST['recend_update']))
{
	// $recend = recentupdate($_POST);
}
?>
<div class="main container">
<div class="main_bg_shadow">
<div id="myCarousel"  class="carousel slide slider_head"  data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <?php 
//get_template_part('home','slider');
echo  do_shortcode('[advps-slideshow optset="3"]');

?>
  </div>
</div>
<div id="header_recent_news">

<div id="datacontainer" style="position:absolute;left:1px;top:10px;width:100%" onMouseOver="scrollspeed=0" onMouseOut="scrollspeed=cache" class="edit">
<?php

$args = array( 'post_type' => 'news');
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	echo '<div class="list_titile_content">';
 echo '<h4>'; the_title();
 echo '</h4>';
  echo '</div>';
  echo '<p>';
  the_content();
  echo '</p>';
endwhile;
		
?>
</div>
</div>

<?php if ( ! dynamic_sidebar() ) : ?>
<li></li>
<li>{static sidebar item 2}</li>
<?php endif; ?>
<div class="pmichennai_tab">
  <div class="col-xs-12 col-md-8 col-sm-8 col-lg-8 header_tad_funct">
    <div class="pmi_welcome">
      <form  action="" method="post">
        <p class="select_btn_home">
          <select name="recend_update" onchange="javascript: submit()">
            <option value="Recend Update">Recent Updates</option>
            <option value="One Month Before Update">One Month Before Update</option>
            <option value="Six Month Before Update">Six Month Before Update</option>
          </select>
        </p>
      </form>
      <?php
         /*  
		    $args = array( 'post_type' => 'recent_news');
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();*/
	       ?>
      <div class="item active"><a href="<?php //the_permalink(); ?>" class="#">
        <?php // echo the_post_thumbnail(); ?>
        <?php //echo the_title();?>
        </a></div>
      <?php // the_excerpt(''); endwhile;?>
      <?php
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'recent_news',
                  // 'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
      <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
      <ul class="mtree transit">
        <li> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse" aria-expanded="true" aria-controls="collapse"><?php echo the_title();?> <?php //echo get_the_date();?></a>
          <?php //the_excerpt(); ?>
          <ul class="advanced-filters">
            <li> <?php echo the_post_thumbnail(); the_content();  ?> </li>
          </ul>
        </li>
      </ul>
      <?php 	endwhile;
				?>
    </div>
    <div class="event_news">
      <h3 class="header_title">News and Events</h3>
      
      <!-- tabs left -->
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#a" data-toggle="tab">Current Affairs</a></li>
          <li><a href="#b" data-toggle="tab">Regional Chapter News</a></li>
          <li><a href="#c" data-toggle="tab">Global Chapter News</a></li>
          <li><a href="#d" data-toggle="tab">Archives</a></li>
          <li><a href="#e" data-toggle="tab">Events</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="a">
            <ul class="tap_list_type">
              <?php 
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'current',
                   'posts_per_page' => 3,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
              <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?></a> <?php // echo get_the_date();?>
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
            </ul>
          </div>
          <div class="tab-pane" id="b">
            <ul class="tap_list_type">
              <?php 
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'regional',
                   'posts_per_page' =>5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
              <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?></a><?php // echo get_the_date();?>
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
            </ul>
          </div>
          <div class="tab-pane" id="c">
            <ul class="tap_list_type">
              <?php 
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'global',
                   'posts_per_page' =>5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
              <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a><?php //echo get_the_date();?>
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
            </ul>
          </div>
          <div class="tab-pane" id="d">
            <ul class="tap_list_type">
              <?php 
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'archive',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
              <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
              <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a><?php //echo get_the_date();?>
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
            </ul>
          </div>
		  
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
					action: 'jeventajax',  
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
  
 //regional  
   $( "body" ).on( "click", "#b .page-numbers a", function(e) {
		e.preventDefault();
		  page_no = $(this).text();
		  if(page_no == 'Next'){
			  current = $("#b .current").text();
			  var page_no = parseInt(current) + 1;
		  }
 		 if(page_no == 'Previous'){
			  current = $("#b .current").text();
			  var page_no = parseInt(current) - 1;
		  }
	     $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jregionalajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#b").html(data);
					}
 	});				
   });
//global
 $( "body" ).on( "click", "#c .page-numbers a", function(e) {
		e.preventDefault();
		  page_no = $(this).text();
		  if(page_no == 'Next'){
			  current = $("#c .current").text();
			  var page_no = parseInt(current) + 1;
		  }
 		 if(page_no == 'Previous'){
			  current = $("#c .current").text();
			  var page_no = parseInt(current) - 1;
		  }
	     $.ajax({
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'jglobalajax',  
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
 
//affair
      $( "body" ).on( "click", "#a .page-numbers a", function(e) {
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
					action: 'jaffairajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#a").html(data);
					}
 	});				
   });

//archive   
         $( "body" ).on( "click", "#d .page-numbers a", function(e) {
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
					action: 'jarchiveajax',  
					page_no:page_no
					},
					context: this,  
					success: function(data){
						//$(".gif_loading").css("display", "none");
						//$(".j_full_page").css("opacity", "1");
					    $("#d").html(data);
					}
 	});				
   });
 });
   </script>
          <div class="tab-pane" id="e">
            <ul class="tap_list_type">
              <?php 
	      $paged=get_query_var('page');
		
		  $args = array(
		  		   
                   'post_type' => 'ai1ec_event',
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
              <?php 	$n++; endwhile;
				echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
						'base' => @add_query_arg('page','%#%'),  
						'format' 		=> '&page=%#%',
						'current' 		=> max( 1, get_query_var('page') ),
						'prev_next'     => true,
						'prev_text' => 'Previous',  
            			'next_text' => 'Next',
						'type'			=> 'list'
			
		) ) );	?>
            </ul>
          </div>
        </div>
      </div>
      <!-- /tabs --> 
    </div>
    <div class="tap_second_care">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#training">Training </a></li>
        <li><a href="#volunteers">Volunteers</a></li>
        <li><a href="#notices">Notices</a></li>
        <li><a href="#casestudies">Case Studies</a></li>
        <li><a href="#whitepapers">Whitepapers</a></li>
      </ul>
      <div class="tab-content">
        <div id="training" class="tab-pane fade in active">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'training',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a>
            <div class="t_date"><?php //echo get_the_date();?></div>
            <?php //the_content(); 
	
			?>
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
        </div>
        <div id="volunteers" class="tab-pane fade">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'volunteer',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont"> <a href="<?php //the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a>
            <div class="t_date"><?php //echo get_the_date();?></div>
            <?php //the_content(); 
			
			echo"<p><span>".  $volunteer_formate_type = get_post_meta( $post->ID, 'volunteer_formate_type', true )."</span></p>";
		    echo "<p><span>". $volunteer_duration = get_post_meta( $post->ID, 'volunteer_duration', true )."</span></p>";?>
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
        </div>
        <div id="notices" class="tab-pane fade">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'notices',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont"> <a href="<?php //the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a>
            <div class="t_date"><?php //echo get_the_date();?></div>
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
        </div>
        <div id="casestudies" class="tab-pane fade">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'case_studies',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a>
            <div class="t_date"><?php //echo get_the_date();?></div>
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
        </div>
        <div id="whitepapers" class="tab-pane fade">
          <?php 
	      $paged=get_query_var('page');
		  $args = array(

                   'post_type' => 'whitepaper',
                   'posts_per_page' => 5,
                   'paged' => $paged,
				   'page' => $paged,
                   );
      query_posts($args);
   ?>
          <?php
		// Start the loop.
		while ( have_posts() ) : the_post();?>
          <div class="section_cont"> <a href="<?php the_permalink(); ?>" class="inner_head"><?php echo the_title();?> </a>
            <div class="t_date"><?php //echo get_the_date();?></div>
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
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo get_template_directory_uri(); ?>/js/mtree.js"></script> 
<script type="text/javascript">
var scrollspeed=cache=2
var initialdelay=500
function initializeScroller(){
dataobj=document.all? document.all.datacontainer : document.getElementById("datacontainer")
dataobj.style.top="5px"
setTimeout("getdataheight()", initialdelay)
}
function getdataheight(){
thelength=dataobj.offsetHeight
if (thelength==0)
setTimeout("getdataheight()",10)
else
scrollDiv()
}
function scrollDiv(){
dataobj.style.top=parseInt(dataobj.style.top)-scrollspeed+"px"
if (parseInt(dataobj.style.top)<thelength*(-1))
dataobj.style.top="5px"
setTimeout("scrollDiv()",40)
}
if (window.addEventListener)
window.addEventListener("load", initializeScroller, false)
else if (window.attachEvent)
window.attachEvent("onload", initializeScroller)
else
window.onload=initializeScroller
</script> 
  
  <!--tap script--> 
  <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
  <?php  get_template_part('right','bar');?>
</div>
<?php get_footer(); ?>
