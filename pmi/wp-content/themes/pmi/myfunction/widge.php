<?php
if (function_exists('register_sidebar')) {  
     register_sidebar(array(  
      'name' => 'Sidebar Widgets',  
      'id'   => 'sidebar-widgets',  
      'description'   => 'Widget Area',  
     'before_widget' => '',
      'after_widget'  => '',  
      'before_title'  => '<h3>',  
      'after_title'   => '</h3>'  
     ));  
    } 
if (function_exists('register_sidebar')) {  
     register_sidebar(array(  
      'name' => 'Sidebar recent views',  
      'id'   => 'sidebar-widget-recent-views',  
      'description'   => 'Widget Area',  
     'before_widget' => '<div class="recent_views">',
      'after_widget'  => '</div>',  
      'before_title'  => '<h3>',  
      'after_title'   => '</h3>'  
     ));  
    } 
?>