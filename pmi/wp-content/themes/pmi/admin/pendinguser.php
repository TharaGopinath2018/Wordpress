<?php
add_option('voix_table_example_db_version', $voix_table_example_db_version);
add_action('plugins_loaded', 'voix_table_example_update_db_check');

function voix_table_example_update_db_check()
{
    global $voix_table_example_db_version;
	
    if (get_site_option('voix_table_example_db_version') != $voix_table_example_db_version) {
        custom_table_example_install();
    }
}

if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class Voix_Table_Example_List_Table extends WP_List_Table
{
   
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'pending',
            'plural' => 'pendings',
        ));
    }

 
    function column_default($item, $column_name)
	    {
			//print_r($item);exit;
		switch($column_name){
			/*case 'title':
               return $item['pmiid'];*/
			case 'firstname':
                return $item['firstname'];
			case 'lastname':
                return $item['lastname'];
			case 'primaryemail':
                return $item['primaryemail'];
			case 'mobileno':
                return $item['mobileno'];
			case 'userstatus':
                return $this->userstatus($item[$column_name]);
			default:
                return print_r($item,true); //Show the whole array for troubleshooting purposes
        }
    }

	function pmiid($pmiid){
		 $user_info = get_userdata($pmiid);
		 echo $user_info->pmiid;
		}
	function userstatus($userstatus){
		if($userstatus == 0){
			echo "Pending";
		}else{
			echo "Approved";
		}
                	} 
	function voice_name($image_id){

	//echo '<audio controls><source src="'.$image_id .'" type="audio/mp3"></audio>';
			//echo '<img src="'.$image_id.'" width="100px" height="100px">';
                	}   
   
   function column_title($item){
       	
		//Build row actions
        $actions = array(
            'approval'  => sprintf('<a href="?page=%s&pmiid=%s">Approve</a>',$_REQUEST['page'],$item['pmiid']),
			//'deny'      => sprintf('<a href="?page=%s&id=%s">Deny</a>',$_REQUEST['page'],$item['id']),
            'delete'    => sprintf('<a href="?page=%s&delete=%s">Delete</a>',$_REQUEST['page'],$item['pmiid']),
        );
        
        //Return the title contents
        return sprintf('%1$s <span style="color:silver">(id:%2$s)</span>%3$s',
            /*$1%s*/ $item['pmiid'],
            /*$2%s*/ $item['pmiid'],
            /*$3%s*/ $this->row_actions($actions)
			
        );
    }

    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['pmiid']
        );
    }

   
    function get_columns()
    {
        $columns = array(
            'cb' 				=> '<input type="checkbox" />', //Render a checkbox instead of text
          // 'id' 				=> __('ID', 'custom_table_example'),
            'title' 			=> __('PMI ID', 'custom_table_example'),
            'firstname'			=> __('First Name', 'custom_table_example'),
			'lastname'			=> __('Last Name', 'custom_table_example'),
			'primaryemail' 		=> __('Email', 'custom_table_example'),
			'mobileno' 			=> __('Mobile', 'custom_table_example'),
			'userstatus' 		=> __('Status', 'custom_table_example'),
		    );
        return $columns;
    }

   
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'pmiid' => array('pmiid', true),
           
          
        );
        return $sortable_columns;
    }

    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete',
			'approve' => 'Approved',
        );
        return $actions;
    }

    function process_bulk_action()
    {
     	global $wpdb;
		if( 'delete'===$this->current_action()) 
		{
		$del_val = $_REQUEST['pmiid'];
		foreach($del_val as $del_id)
		{
			  $wpdb->delete( 'newdata', array( 'pmiid' => $del_id ) );
		}
		}
		global $wpdb;
		if( 'approve'===$this->current_action()) 
		{
		$app = $_REQUEST['pmiid'];
		foreach($app as $apps)
		{
			 //$wpdb->delete( 'newdata', array( 'pmiid' => $del_id ) );
			 $userstatus = '1';
			$table_name = 'newdata';
			error_reporting(0);
			$wpdb->get_var( $wpdb->prepare("UPDATE newdata SET userstatus='$userstatus' WHERE pmiid=$apps"));
		}
		}
		       
 
    }
    function prepare_items()
    {
        global $wpdb;
       // $table_name = $wpdb->prefix . 'cte'; // do not forget about tables prefix
   
        $per_page = 75; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
		
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->process_bulk_action();
  		 $userstatus = '0';
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM newdata where userstatus = $userstatus ");
      
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
        
		$userstatus = '0';
		$data1 = $wpdb->get_results("select * from newdata where userstatus = $userstatus  ");
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

function voix_table_example_admin_menu()
{
    add_menu_page(__('Pending User', 'voix_table_example'), __('Pending User', 'voix_table_example'), 'activate_plugins', 'pendings', 'voix_table_example_persons_page_handler');
   // add_submenu_page('persons', __('Persons', 'custom_table_example'), __('Persons', 'custom_table_example'), 'activate_plugins', 'persons', 'custom_table_example_persons_page_handler');
    // add new will be described in next part
    //add_submenu_page('persons', __('Add new', 'custom_table_example'), __('Add new', 'custom_table_example'), 'activate_plugins', 'persons_form', 'custom_table_example_persons_form_page_handler');
}

add_action('admin_menu', 'voix_table_example_admin_menu');

function voix_table_example_persons_page_handler()
{
    global $wpdb;
	
	//delete row process
	if(isset($_GET['delete']))
	{
		 
		$wpdb->delete( 'newdata', array( 'pmiid' => $_GET['delete'] ) );
	}
	
    // update the image status
	if(isset($_GET['pmiid']))
	{ 
	
	   $wpdb->update( "newdata", array('userstatus' => '1'), array( 'pmiid' => $_GET['pmiid'] ));
	   $pmiid = $_GET['pmiid'];
	   $query = $wpdb->get_results("select * from newdata where pmiid = '".$pmiid."'");
	   // echo "<pre>";print_r($query);
	  
            $reg_pmino 			 = $query[0]->pmiid;
            $reg_fistname 		 = $query[0]->firstname;
            $reg_lastname 		 = $query[0]->lastname;
            $primaryemail   	 = $query[0]->primaryemail;
            $usepass            = $query[0]->usepass;
            $reg_desgination 	= $query[0]->reg_desgination;
            $reg_conphone   	 = $query[0]->reg_conphone;
		    $reg_mobile  		 = $query[0]->mobileno;
			$role			 	= 'user'; 
			$pw_user_status     = 'approved';
			
			$user_id = username_exists( $primaryemail );
			if ( !$user_id and email_exists($primaryemail) == false ) {
				{
				$user_id = wp_insert_user(array
				(
				'user_login' 		=> $primaryemail,
				'user_pass'  		=> $usepass,
				'user_email'		=> $primaryemail,
				'first_name' 		=> $reg_fistname,
				'display_name'		=> $reg_fistname,
				'user_status'       => '1',
				'role'              => $role
		));
	}
	update_user_meta($user_id,'reg_lastname',$reg_lastname);
	update_user_meta($user_id,'reg_desgination',$reg_desgination);
	update_user_meta($user_id,'reg_conphone',$reg_conphone);
	update_user_meta($user_id,'reg_mobile',$reg_mobile);
	update_user_meta($user_id,'reg_pmino',$reg_pmino);
	update_user_meta($user_id,'pw_user_status',$pw_user_status);
				
			/*	$from_mail = get_option( 'admin_email' );
				$admin_details = get_user_by_email( $from_mail ); 
				$admin_nickname = $admin_details->display_name;
			
				$adminname = 'PMI Chennai';
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			    $headers .= "From:" .$adminname. "<".$from_mail.">\r\n";
				$email_message = "Your Account has been activated";
		        //$message = strip_tags($reg_fistname). ' - ' . strip_tags($primaryemail) . '-'. strip_tags($usepass) ;
				$message = '<p style="font-size: 16px; color: #666666;">Username : '.$reg_fistname.'</p><p style="font-size: 16px; color: #666666;">Email : '.$primaryemail.'</p><p style="font-size: 16px; color: #666666;">Password : '.$usepass.'</p>' ;
   				if(wp_mail( $primaryemail, 'Registration Activated', $message,$headers))
				{
				//$res ="Thanks for Registering. We Will shortly send you an email.";
				}*/
	}
	}
		 
    $table = new Voix_Table_Example_List_Table();
    $table->prepare_items();
/*
    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'custom_table_example'), count($_REQUEST['id'])) . '</p></div>';
    }*/
    ?>


    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
    <!--<h2><?php _e('Persons', 'voix_table_example')?> <a class="add-new-h2"
                                 href="<?php //echo get_admin_url(get_current_blog_id(), 'admin.php?page=persons_form');?>"><?php  _e('Add new', 'custom_table_example')?></a>
    </h2>--><h4><font color="#FF0000"></font></h4>
    <?php echo $message; ?>

    <form id="persons-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->display() ?>
    </form>
<?php
}?>	