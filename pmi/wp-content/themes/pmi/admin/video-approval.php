<?php
add_option('video_table_example_db_version', $video_table_example_db_version);
add_action('plugins_loaded', 'video_table_example_update_db_check');

function video_table_example_update_db_check()
{
    global $video_table_example_db_version;
	
    if (get_site_option('video_table_example_db_version') != $video_table_example_db_version) {
        custom_table_example_install();
    }
}

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Video_Table_Example_List_Table extends WP_List_Table
{
   
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'video',
            'plural' => 'videos',
        ));
    }

 
    function column_default($item, $column_name)
	    {
			//print_r($item);exit;
		switch($column_name){
			case 'vedio_url':
                return $this->vedio_url($item[$column_name]);
			case 'vedio_status':
                return $this->vedio_status($item[$column_name]);
			case 'created_date_time':
                return ($item[$column_name]);
			
			default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }

	function user_name1($user_id){
		 $user_info = get_userdata($user_id);
         echo $user_info->user_login;
                	} 
	function vedio_status($vedio_status){
		if($vedio_status == 0){
			echo "Pending";
		}else{
			echo "Approved";
		}
                	} 
	function vedio_url($image_id){
		echo '<video  width="300" height="100" controls><source src="'.$image_id. '" type="video/mp4"></video>';
                	}   
   
    function column_title($item){
       	
		//Build row actions
        $actions = array(
            'approval'  => sprintf('<a href="?page=%s&id=%s">Approve</a>',$_REQUEST['page'],$item['id']),
			//'deny'      => sprintf('<a href="?page=%s&id=%s">Deny</a>',$_REQUEST['page'],$item['id']),
            'delete'    => sprintf('<a href="?page=%s&delete=%s">Delete</a>',$_REQUEST['page'],$item['id']),
        );
        
        //Return the title contents
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            /*$1%s*/ $this->user_name1($item['user_id']),
            /*$2%s*/ $item['id'],
            /*$3%s*/ $this->row_actions($actions)
			
        );
    }

    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

   
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'title' => __('User Name', 'custom_table_example'),
            'vedio_url' => __('Video', 'custom_table_example'),
            'vedio_status' => __('Status', 'custom_table_example')
        );
        return $columns;
    }

   
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'user_id' => array('user_id', true),
            'vedio_url' => array('video_url', false),
          
        );
        return $sortable_columns;
    }

    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    function process_bulk_action()
    {
     	global $wpdb;
		if( 'delete'===$this->current_action()) 
		{
		$del_val = $_REQUEST['id'];
		foreach($del_val as $del_id)
		{
			  $wpdb->delete( 'video', array( 'id' => $del_id ) );
		}
		}
		       
 
    }
 	
    function prepare_items()
    {
        global $wpdb;
       // $table_name = $wpdb->prefix . 'cte'; // do not forget about tables prefix
   
        $per_page = 10; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
		
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->process_bulk_action();
   
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM video");
      
        //$paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
       
        function objectToArray($d) 
		{
		if (is_object($d)) {
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			return array_map(__FUNCTION__, $d);
		}
		else {
			return $d;
		}
		}
        
		$data1 = $wpdb->get_results("select * from video");
		$data2=objectToArray($data1);
		if($data2=="") $data2 = array();
		$data = array();
		foreach($data2 as $k=>$d)
		{
			$data[] = $d;
		}
	    $current_page = $this->get_pagenum();
        
        
        $total_items = count($data);
        
        
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }
}

function video_table_example_admin_menu()
{
    add_menu_page(__('Video Approval', 'video_table_example'), __('Video Approval', 'video_table_example'), 'activate_plugins', 'videos', 'video_table_example_persons_page_handler');
   // add_submenu_page('persons', __('Persons', 'custom_table_example'), __('Persons', 'custom_table_example'), 'activate_plugins', 'persons', 'custom_table_example_persons_page_handler');
    // add new will be described in next part
    //add_submenu_page('persons', __('Add new', 'custom_table_example'), __('Add new', 'custom_table_example'), 'activate_plugins', 'persons_form', 'custom_table_example_persons_form_page_handler');
}

add_action('admin_menu', 'video_table_example_admin_menu');

function video_table_example_persons_page_handler()
{
    global $wpdb;
	
	//delete row process
	if(isset($_GET['delete']))
	{
		$wpdb->delete( 'video', array( 'id' => $_GET['delete'] ) );
	}
	
    // update the image status
	if(isset($_GET['id']))
	{ 
	   $wpdb->update( "video", array('vedio_status' => '1'), array( 'id' => $_GET['id'] ));
	}
		 
    $table = new Video_Table_Example_List_Table();
    $table->prepare_items();
/*
    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'custom_table_example'), count($_REQUEST['id'])) . '</p></div>';
    }*/
    ?>


    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <!--<h2><?php _e('Persons', 'video_table_example')?> <a class="add-new-h2"
                                 href="<?php //echo get_admin_url(get_current_blog_id(), 'admin.php?page=persons_form');?>"><?php _e('Add new', 'custom_table_example')?></a>
    </h2>--><h4><font color="#FF0000">(Note : video play only any Head Phone and Speakers)</font></h4>
    <?php echo $message; ?>

    <form id="persons-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->display() ?>
    </form>
<?php
}?>