<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		// Load form helper library
			$this->load->helper('form');

			// Load form validation library
			$this->load->library('form_validation');

			// Load session library
			$this->load->library('session');
			$this->load->helper('date');

			// Load database
			$this->load->model('login_database');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
		$this->load->model('Welcome_model','welcome'); /* LOADING MODEL * Welcome_model as welcome */
	    //$this->load->model('owner');
	}


	/**************************  START FETCH OR VIEW FORM DATA ***************/
	public function mainpage()
	{
	    // $this->data['view_boat']= $this->welcome->view_boat();
		
		$pref['template']='
			 {table_open}<table border="1" cellpadding="1" cellspacing="2" style="padding-top:10px;">{/table_open}
			 
			 {heading_row_start}<tr>{/heading_row_start}
			 {heading_previous_cell}<th><a href="{previous_url}">上月</a></th></th>{/heading_previous_cell}
			 {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			 {heading_next_cell}<th><a href="{next_url}">下月</a></th>{/heading_next_cell}
			 {heading_row_end}</tr>{/heading_row_end}
			 
			 {week_row_start}<tr class="wk_nm" style="color:white;">{/week_row_start}
			 {week_day_cell}<td>{week_day}</td>{/week_day_cell}
			 {week_row_end}</tr>{/week_row_end}
			 
			 
			 {cal_row_start}<tr>{/cal_row_start}
			 {cal_cell_start}<td>{/cal_cell_start}
			 {cal_cell_content}{day}<a href="http://www.leapofeducation.com/projects/codeigniter/index.php/Welcome/view_reservation"><img src="{content}" style="height:10px;float:right;margin:10px 10px;"/></a>{/cal_cell_content}
			 {cal_cell_content_today}{day}<a href="view_reservation"><img src="{content}" style="height:10px;float:right; margin-right:10px; margin-top:10px;"/></a>{/cal_cell_content_today}
			 
			 {cal_cell_content}{day}{/cal_cell_content}
			 {cal_cell_content_today}{/call_cell_content_today}
			 
			 {cal_cell_blank}&nbsp;{/cal_cell_blank}
			 
			 {cal_cell_end}</td>{/cal_cell_end}
			 {cal_row_end}</tr>{/cal_cell_end}
			 
			 {table_close}</table>{/table_close}
			 ';
 
		 $pref['start_day']='sunday';
		 $pref['day_type']='china_name';
		 $pref['show_next_prev'] = TRUE;
		 $pref['show_other_days'] = TRUE;
		 $pref['next_prev_url'] = site_url('welcome/mainpage/');
		 
		 $year = $this->uri->segment(3);
		 if (!isset($year))
			$year = date('Y');	
		 
		 $month = $this->uri->segment(4);
		 if (!isset($month))
			$month = date('m');
		 $month = (int)$month;
		 
		 $wday= getdate()['wday'];
		 $week_names = ["星期日", "星期一","星期二","星期三","星期四","星期五","星期六"];

		$yeardisplay =date('y');
		$monthdisplay= date('m');
		 $day = date('d');
		 $curboat_price_dayname = date("l");
		 if ($curboat_price_dayname == "Sunday")
			$fromday = date("Y-m-d");
		 else 
		 	$fromday = date("Y-m-d",strtotime('previous sunday'));
		 
		 $today = date("Y-m-d",strtotime("saturday this week")); 
		 $reservaions = $this->welcome->view_reservation_date('', '');
		 $week_reservation = $this->welcome->view_reservation_date($fromday, $today);
		 
		 $content = array();
		 $curDate = date('Y-m-d');
		 $monFirstDate = date("$year-$month-01");
		 $monLastDate = date("$year-$month-t");
		 foreach ($reservaions as $reservation) {
			if (strtotime($monFirstDate) <= strtotime($reservation['date']) && strtotime($monLastDate) >= strtotime($reservation['date'])) {
				if(strtotime($curDate) > strtotime($reservation['date']) || strtotime($today) < strtotime($reservation['date'])){
					$content[$reservation['day']] = base_url('/images/old_boat.png');
				}else{
					$content[$reservation['day']] = base_url('/images/new_boat.png');	 
				}
			}
		}
		
		$data = array('year'=>$year, 'month'=>$month, 'day'=>$day, 'week'=>$week_names[$wday], 'content'=>$content, 'reservations'=>$reservaions, 'week_reservations'=>$week_reservation);
		$this->load->library('calendar', $pref);
		
		$this->load->view('mainpage', $data);
	}

	private function receviePost(){
		$value1 = $this->input->post('post_key1');
		$value2 = $this->input->post('post_key2');
		$value3 = $this->input->post('post_key3');
		$value4 = $this->input->post('post_key4');
		
		$value5 = $this->input->post('post_key5');
		$value6 = $this->input->post('post_key6');
		
		if(	fieldChecking($value1) AND 
			fieldChecking($value2) AND 
			fieldChecking($value3) AND 
			fieldChecking($value4) AND 
			
			fieldChecking($value5) AND 
			fieldChecking($value6)){
				$this->load->modal('table_model');
				
				$dataToTable1 = array();
				$dataToTable2 = array();
				
				array_push($dataToTable1, $value1);
				array_push($dataToTable1, $value2);
				array_push($dataToTable1, $value3);
				array_push($dataToTable1, $value4);
				
				array_push($dataToTable2, $value5);
				array_push($dataToTable2, $value6);
				
				$this->table_model->setValuesToTable1($dataToTable1);
				$this->table_model->setValuesToTable2($dataToTable2);
			}
	}
	
	private function fieldChecking($value){
		if($value == null || $value == "")
			return false;
		return true;
	}
	
    public function calendar() {
		$prefs = array(
				'start_day'    => 'saturday',
				'month_type'   => 'long',
				'day_type'     => 'short',
				'show_next_prev'  => TRUE,
				'next_prev_url'   => 'http://example.com/index.php/calendar/show/'
		);

         $this->load->library('calendar', $prefs);
        $this->load->view('calendar');
       
	}
	/****************************  END FETCH OR VIEW FORM DATA ***************/


	// /*****************Gallery************/
	// function _example_output($output = null)
	// {
	// 	$this->load->view('example.php',$output);	
	// }
	
	// function index_gallery()
	// {
	// 	$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	// }	
	
	// function example1()
	// {
	// 	$image_crud = new image_CRUD();
		
	// 	$image_crud->set_primary_key_field('id');
	// 	$image_crud->set_url_field('url');
	// 	$image_crud->set_table('example_1')
	// 		->set_image_path('assets/uploads');
			
	// 	$output = $image_crud->render();
		
	// 	$this->_example_output($output);
	// }
	
	// function example2()
	// {
	// 	$image_crud = new image_CRUD();
		
	// 	$image_crud->set_primary_key_field('id');
	// 	$image_crud->set_url_field('url');
	// 	$image_crud->set_table('example_2')
	// 	->set_ordering_field('priority')
	// 	->set_image_path('assets/uploads');
			
	// 	$output = $image_crud->render();
	
	// 	$this->_example_output($output);
	// }

	// function example3()
	// {
	// 	$image_crud = new image_CRUD();
	
	// 	$image_crud->set_primary_key_field('id');
	// 	$image_crud->set_url_field('url');
	// 	$image_crud->set_table('example_3')
	// 	->set_relation_field('category_id')
	// 	->set_ordering_field('priority')
	// 	->set_image_path('assets/uploads');
			
	// 	$output = $image_crud->render();
	
	// 	$this->_example_output($output);
	// }

	// function example4()
	// {
	// 	$image_crud = new image_CRUD();
	
	// 	$image_crud->set_primary_key_field('id');
	// 	$image_crud->set_url_field('url');
	// 	$image_crud->set_title_field('title');
	// 	$image_crud->set_table('example_4')
	// 	->set_ordering_field('priority')
	// 	->set_image_path('assets/uploads');
			
	// 	$output = $image_crud->render();
	
	// 	$this->_example_output($output);
	// }
	
	// function simple_photo_gallery()
	// {
	// 	$image_crud = new image_CRUD();
		
	// 	$image_crud->unset_upload();
	// 	$image_crud->unset_delete();
		
	// 	$image_crud->set_primary_key_field('id');
	// 	$image_crud->set_url_field('url');
	// 	$image_crud->set_table('example_4')
	// 	->set_image_path('assets/uploads');
		
	// 	$output = $image_crud->render();
		
	// 	$this->_example_output($output);		
	// }

	/**************End of Gallery*************/	
	
	

	/****************************  START OPEN ADD FORM FILE ******************/
	public function add_data(){
		$this->load->view('add');
	}
	public function add_location(){
	$this->data['view_location']= $this->welcome->view_location();
	$this->load->view('add_location',  $this->data, FALSE);
	}
	
	public function add_owner() {
		$this->load->view('add_owner');
	}

	public function add_boat(){
        $this->data['view_owner']= $this->welcome->view_owner(); 
		$this->load->view('add_boat',$this->data, FALSE);
	}
	public function add_reservation(){
	$this->data['view_owner']= $this->welcome->view_owner();  
	$this->data['view_location']= $this->welcome->view_location(); 
    $this->data['view_boat']= $this->welcome->view_boat(); 
	$this->load->view('add_reservation',  $this->data, FALSE);
	}		
	

	/****************************  END OPEN ADD FORM FILE ********************/
	public function testcode() {
		$this->load->view('numbers');
	}
    
    /****************************  START INSERT FORM DATA ********************/
	

	
	
	
    public function submit_owner(){
		$imagePath = $this->input->post('uploadphoto');
		$this->load->library('form_validation'); 
		$maxID = $this->welcome->getMaxId('id' , 'owner_data');
		$dir = FCPATH . "uploads/tmp/";
		$newDir = FCPATH . "uploads/owner/";  
		if (!is_dir($newDir)) {
			mkdir($newDir, 0777, TRUE);	
		}
		
		if(!empty($imagePath) && !empty($maxID)){
			$imgItem = $imagePath[0];
			if(!empty($imgItem))
			{
			   $newPath = $newDir."owner-".$maxID.".png";
			   if (file_exists($newPath)){
					unlink($newPath);    
			   }      	   
			   copy($dir.$imgItem, $newPath);
			   unlink($dir.$imgItem);
			}
			
		}
		$query = null; //emptying in case 

        $lastname   = $_POST['lastname']; //getting from post value
        $firstname   = $_POST['firstname']; //getting from post value
        $loginid   = $_POST['loginid']; //getting from post value        

        $query = $this->db->get_where('owner_data', array(//making selection
            'owner_lastname' => $lastname,
            'owner_name' => $firstname,
            'login' => $loginid,
        ));

        $count = $query->num_rows(); //counting result from query

        if ($count === 0) {
    $data = array('owner_lastname'             => $this->input->post('lastname'),
				   'owner_name'                => $this->input->post('firstname'),
			      'owner_company'              => $this->input->post('company'),
			      'status'                     => $this->input->post('status'),
			      'contact_person'             => $this->input->post('contactperson'),
			      'owner_phone'                => $this->input->post('phone1'),
			      'owner_phone2'               => $this->input->post('phone2'),
			      'owner_address'              => $this->input->post('address'),
			      'owner_email'                => $this->input->post('email'),   
			      'login'                      => $this->input->post('loginid'),
			      'password'                   => $this->input->post('password'),	
			      'others'                     => $this->input->post('others'),		
			      // 'img_url'					   => "uploads/owner/owner-".$id.".png",		      		      
			      'insert_time'                => date('Y-m-d H:i:s'),
			      'owner_status'               => 'Y');
	// $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
 //    $this->form_validation->set_rules('owner_lastname', 'Last Name', 'required');
 //    $this->form_validation->set_rules('owner_name', 'First Name', 'required');
 //    $this->form_validation->set_rules('owner_company', 'Company', 'required');
 //    $this->form_validation->set_rules('status', 'Status', 'required');
 //    $this->form_validation->set_rules('contact_person', 'Contact Person', 'required');
 //    $this->form_validation->set_rules('owner_phone', 'Phone 1', 'required');
 //    $this->form_validation->set_rules('owner_phone2', 'Phone 2', 'required');
 //    $this->form_validation->set_rules('owner_address', 'Address', 'required');
 //    $this->form_validation->set_rules('owner_email', 'Email', 'required|');
 //    $this->form_validation->set_rules('login', 'Login', 'required');
 //    $this->form_validation->set_rules('password', 'Password', 'required');
 //    $data['owner_lastname'] = set_value('owner_lastname');
 //    $data['owner_name'] = set_value('owner_name');
 //    $data['owner_company'] = set_value('owner_company');
 //    $data['status'] = set_value('status');
 //    $data['contact_person'] = set_value('contact_person');
 //    $data['owner_phone'] = set_value('owner_phone');
 //    $data['owner_phone2'] = set_value('owner_phone2');
 //    $data['owner_address'] = set_value('owner_address');  
 //    $data['owner_email'] = set_value('owner_email');
 //    $data['login'] = set_value('login');
 //    $data['password'] = set_value('password'); 
 //    $data['others'] = set_value('others'); 
 //    if ($this->form_validation->run() ==FALSE)
 //    {
 //    $this->session->set_flashdata('message', 'Please enter all field..'); 
 //    $this->load->view('add_owner',  $this->data, FALSE);
 //    } else {
 //    // if ($this->form_validation->run() ==TRUE){
 //    	    $data = array('owner_lastname'             => $this->input->post('lastname'),
	// 			   'owner_name'                => $this->input->post('firstname'),
	// 		      'owner_company'              => $this->input->post('company'),
	// 		      'status'                     => $this->input->post('status'),
	// 		      'contact_person'             => $this->input->post('contactperson'),
	// 		      'owner_phone'                => $this->input->post('phone1'),
	// 		      'owner_phone2'               => $this->input->post('phone2'),
	// 		      'owner_address'              => $this->input->post('address'),
	// 		      'owner_email'                => $this->input->post('email'),   
	// 		      'login'                      => $this->input->post('loginid'),
	// 		      'password'                   => $this->input->post('password'),	
	// 		      'others'                     => $this->input->post('others'),		
	// 		      // 'img_url'					   => "uploads/owner/owner-".$id.".png",		      		      
	// 		      'insert_time'                => date('Y-m-d H:i:s'),
	// 		      'owner_status'               => 'Y');
		$insert = $this->welcome->insert_owner($data);
		$id = $this->db->insert_id();
		$upData = array('img_url'  => "uploads/owner/owner-".$id.".png");
		$this->db->where('id', $id);
	    $this->db->update('owner_data', $upData);
		$this->session->set_flashdata('message', 'Owner inserted Successfully..');
		redirect('welcome/view_owner');
		} 
	
		else {
		$this->session->set_flashdata('message', 'Owner or Username Exists already');
		redirect('welcome/add_owner');
		}
    }
    

    
    public function submit_reservation(){   	
    $this->load->library('form_validation'); 
    $this->data['view_owner']= $this->welcome->view_owner();  
	$this->data['view_location']= $this->welcome->view_location(); 
    $this->data['view_boat']= $this->welcome->view_boat();   
    $submitdata = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                      => $this->input->post('fromtime'),
			      'todate'                          => $this->input->post('todate'),			      
			      'totime'                          => $this->input->post('totime'),
			      'boatname'                     => $this->input->post('boatname'),
			      'speedboat'                     => $this->input->post('speedboat'),
			      'price'                     => $this->input->post('price'),
			     'balance'                     => $this->input->post('balance'),
			      'deposit'                     => $this->input->post('deposit'),
			      'remark'                     => $this->input->post('remark'),
			      'boat_owner'                   => $this->input->post('boat_owner'),
			      'clientname'                    => $this->input->post('clientname'),
			      'contactphone'                => $this->input->post('contactphone'),
			      'boardinglocation'            => $this->input->post('boardinglocation'),
			      'offlocation'                     => $this->input->post('offlocation'),			      
			      'status'                           => $this->input->post('status'),			      		      
			      'created_date'                 => date("m/d/y h:i:s"),
			      'dstatus'                          =>  'Y',);
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('fromdate', 'Start Date', 'required');
    $this->form_validation->set_rules('fromtime', 'Start Time', 'required');
    $this->form_validation->set_rules('todate', 'End Date', 'required');
    $this->form_validation->set_rules('totime', 'End Time', 'required');
    $this->form_validation->set_rules('speedboat', 'Speed Boat Option', 'required');
    $this->form_validation->set_rules('boatname', 'Boat', 'required');
    $this->form_validation->set_rules('boat_owner', 'Boat Owner', 'required');
    $this->form_validation->set_rules('clientname', 'Client', 'required');
    $this->form_validation->set_rules('contactphone', 'Phone', 'required|numeric');
    $this->form_validation->set_rules('boardinglocation', 'Boarding Location', 'required');
    $this->form_validation->set_rules('offlocation', 'Alight Location', 'required');
    $submitdata['fromdate'] = set_value('fromdate');
    $submitdata['fromtime'] = set_value('fromtime');
    $submitdata['todate'] = set_value('todate');
    $submitdata['totime'] = set_value('totime');
    $submitdata['boatname'] = set_value('boatname');
    $submitdata['boat_owner'] = set_value('boat_owner');
    $submitdata['clientname'] = set_value('clientname');
    $submitdata['contactphone'] = set_value('contactphone');            
    if ($this->form_validation->run() ==FALSE)
    {
    $this->session->set_flashdata('message', 'Please enter all field..'); 
    $this->load->view('add_reservation',  $this->data, FALSE);
    }
    else {
    $submitdata = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                      => $this->input->post('fromtime'),
			      'todate'                          => $this->input->post('todate'),			      
			      'totime'                          => $this->input->post('totime'),
			      'boatname'                     => $this->input->post('boatname'),
			      'speedboat'                     => $this->input->post('speedboat'),
			      'boat_owner'                   => $this->input->post('boat_owner'),
			      'clientname'                    => $this->input->post('clientname'),
			      'contactphone'                => $this->input->post('contactphone'),
			      'boardinglocation'            => $this->input->post('boardinglocation'),
			      'offlocation'                     => $this->input->post('offlocation'),			      
			      'status'                           => $this->input->post('status'),	
			      'price'                     => $this->input->post('price'),
			     'balance'                     => $this->input->post('balance'),
			      'deposit'                     => $this->input->post('deposit'),
			      'remark'                     => $this->input->post('remark'),		      		      
			      'created_date'                 => date("m/d/y h:i:s"),
			      'dstatus'                          =>  'Y',);
    
    $insert = $this->welcome->insert_reservation($submitdata);
    $this->session->set_flashdata('message', 'Your Reservation has been added..');
    redirect('welcome/view_reservation');
}

    }   
    
    public function submit_location()
    {
    $this->load->library('form_validation'); 
	$this->data['view_location']= $this->welcome->view_location();
    $maxID = $this->welcome->getMaxId('id' , 'location_data');
    $imagePath = $this->input->post('uploadphoto');
    $dir = FCPATH . "uploads/tmp/";
    $newDir = FCPATH . "uploads/location/";  
    if (!is_dir($newDir)) {
	    mkdir($newDir, 0777, TRUE);	
	}
	
    if(!empty($imagePath) && !empty($maxID))
    {
    	$imgItem = $imagePath[0];
        if(!empty($imgItem))
        {
	       $newPath = $newDir."location-".$maxID.".png";
           if (file_exists($newPath)){
           		unlink($newPath);    
           }      	   
           copy($dir.$imgItem, $newPath);
           unlink($dir.$imgItem);
        }
    }
    $data = array('newlocation'         	   => $this->input->post('newlocation'),
			      'address'                    => $this->input->post('address'),
			      'img_url'					   => "uploads/location/location-".$maxID.".png", 
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('newlocation', 'Location', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $data['newlocation'] = set_value('newlocation');
    $data['address'] = set_value('address');
        if ($this->form_validation->run() ==FALSE)
    {
    $this->session->set_flashdata('message', 'Please enter all field..'); 
    $this->load->view('add_location',  $this->data, FALSE);
    }
    else {
    $data = array('newlocation'          => $this->input->post('newlocation'),
			      'address'                    => $this->input->post('address'),
			      'img_url'					   => "uploads/location/location-".$maxID.".png", 
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    $insert = $this->welcome->insert_location($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
        
    redirect('welcome/view_location');
    } 
    }        
	
    public function submit_boat()
    {
	$maxID = $this->welcome->getMaxId('id' , 'boat_data');
	$imagePath = $this->input->post('uploadphoto');
	$this->data['view_owner']= $this->welcome->view_owner(); 
	$this->load->library('form_validation'); 
	$data = array('boat_owner'                => $this->input->post('boat_owner'),                        
					  'boat_name'                => $this->input->post('boat_name'),
					  // 'owner_address'             => $this->input->post('owner_address'),
					  // 'owner_sex'             => $this->input->post('owner_sex'),
					  // 'owner_id'                => $this->input->post('owner_id'),
					 'contactperson'               => $this->input->post('contactperson'),
					  'status'               => $this->input->post('status'),
					  'boat_brand'               => $this->input->post('boat_brand'),
					  'weekdayprice'               => $this->input->post('weekdayprice'),
					  'weeknightprice'               => $this->input->post('weeknightprice'),
					  'weekendnightprice'               => $this->input->post('weekendnightprice'),
					  'weekendprice'               => $this->input->post('weekendprice'),
					  'wifi'               => $this->input->post('wifi'),
					  'singing'               => $this->input->post('singing'),
					  'cooking'               => $this->input->post('cooking'),
					  'fishing'               => $this->input->post('fishing'),    
					  'boat_cap'               => $this->input->post('boat_cap'),                                                                    
					  'created_date'               => date("m/d/y h:i:s"),
					  'dstatus'                    => 'Y');
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('boat_owner', 'Boat Owner', 'required');
    $this->form_validation->set_rules('boat_name', 'Boat Name', 'required');
    $this->form_validation->set_rules('status', 'Status', 'required');
    $this->form_validation->set_rules('boat_brand', 'Boat Brand', 'required');
    $this->form_validation->set_rules('weekdayprice', 'Week day price', 'required');
    $this->form_validation->set_rules('weeknightprice', 'weeknightprice', 'required');
    $this->form_validation->set_rules('weekendnightprice', 'weekendnightprice', 'required');
    $this->form_validation->set_rules('weekendprice', 'weekendprice', 'required');
    $this->form_validation->set_rules('contactperson', 'contactperson', 'required');
    $data['boat_owner'] = set_value('boat_owner');
    $data['boat_name'] = set_value('boat_name');    
    $data['status'] = set_value('status');
    $data['boat_brand'] = set_value('boat_brand');
    $data['weekdayprice'] = set_value('weekdayprice');
    $data['weeknightprice'] = set_value('weeknightprice');    
    $data['weekendnightprice'] = set_value('weekendnightprice');
    $data['weekendprice'] = set_value('weekendprice');
    $data['contactperson'] = set_value('contactperson');
        if ($this->form_validation->run() ==FALSE)
    {
   	$this->session->set_flashdata('message', 'Please enter all field..'); 
    $this->load->view('add_boat',  $this->data, FALSE);
}
else {
	$data = array(	'boat_owner'                => $this->input->post('boat_owner'),                        
					 'boat_name'                => $this->input->post('boat_name'),
					  // 'owner_address'             => $this->input->post('owner_address'),
					  // 'owner_sex'             => $this->input->post('owner_sex'),
					  // 'owner_id'                => $this->input->post('owner_id'),
					 'contactperson'               => $this->input->post('contactperson'),
					  'status'               => $this->input->post('status'),
					  'boat_brand'               => $this->input->post('boat_brand'),
					  'weekdayprice'               => $this->input->post('weekdayprice'),
					  'weeknightprice'               => $this->input->post('weeknightprice'),
					  'weekendnightprice'               => $this->input->post('weekendnightprice'),
					  'weekendprice'               => $this->input->post('weekendprice'),
					  'wifi'               => $this->input->post('wifi'),
					  'singing'               => $this->input->post('singing'),
					  'cooking'               => $this->input->post('cooking'),
					  'fishing'               => $this->input->post('fishing'),    
					  'boat_cap'               => $this->input->post('boat_cap'),                                                                    
					  'created_date'               => date("m/d/y h:i:s"),
					  'dstatus'                    => 'Y');
		$insert = $this->welcome->insert_boat($data);
	
		$dir = FCPATH . "uploads/tmp/";
		$newDir = FCPATH . "uploads/boat/";  
		if (!is_dir($newDir)) {
			mkdir($newDir, 0777, TRUE);	
		}
		
		if(!empty($imagePath) && !empty($maxID))
		{
			$index = 1;
			foreach($imagePath as $imgItem)
			{
				if(!empty($imgItem))
				{
				   $newPath = $newDir."boat-".$maxID."-".$index.".png";
				   if (file_exists($newPath)){
					   unlink($newPath);
				   }
				   copy($dir.$imgItem, $newPath);
				   unlink($dir.$imgItem);
				   $image_data = array("boat_id" => $maxID, "path" => "uploads/boat/boat-".$maxID."-".$index.".png");
				   $this->welcome->insert_boat_image($image_data);
				   $index = $index + 1;
				}
			}
		}
		$this->session->set_flashdata('message', 'Your data inserted Successfully..');
		redirect('welcome/view_boat');
    }  
    }       
    /****************************  END INSERT FORM DATA ************************/


    /****************************  START FETCH OR VIEW FORM DATA ***************/
    public function view_data()
    {
    $this->data['view_data']= $this->welcome->view_data();
    $this->load->view('welcome_message_boat1', $this->data, FALSE);
    }


    public function view_location()
    {
    $keyword = $this->input->post('keyword');
    $this->data['view_location_list']= $this->welcome->view_location_list();
    $region = $this->input->post('region');
    if (empty($keyword) && empty($region))
	    $this->data['view_location']= $this->welcome->view_location();
    else
    	$this->data['view_location']= $this->welcome->search_location($keyword, $region);
    $this->data['keyword'] = $keyword;
    $this->data['region'] = $region;    
    $this->load->view('list_place', $this->data, FALSE);
    }
    
    public function view_owner()
    {
    $keyword = $this->input->post('keyword');
    if (empty($keyword))
	     $owner_data = $this->welcome->view_owner();
    else
    	$owner_data = $this->welcome->search_owner($keyword);
    for ($i=0;$i <  count($owner_data); $i++) {
    	$boat_data = $this->welcome->search_boat_by_owner($owner_data[$i]['owner_name']);
    	$boat_img = array();
    	foreach ($boat_data as $boat) {
	    	$images = $this->welcome->view_boat_image($boat['id']);
	    	
	    	if (count($images) > 0){
	    		$boat_img[] = $images[0];
	    	}
	    	
	    		
	    	/*
if (count($boat_data) == 1) {
		    	foreach ($images as $img) {
			    	$boat_img[] = $img;
		    	}
		    }


		    if (count($boat_data) == 2) {
		    	$index = array_search($boat, $boat_data);
		    	if ($index == 0) {
			    	foreach ($images as $img) {
			    		$boat_img[] = $img;
			    	}	
		    	}
		    	if ($index == 1 && count($images) > 0) {
		    		if (count($boat_img) == 3)
		    			$boat_img[2] = $images[0];
		    			
				    if (count($boat_img) == 2) {
				    	$boat_img[] = $images[0];			    	
			    	}			    	
			    	if (count($boat_img) == 1) {
				    	$boat_img[] = $images[0];
				    	if (count($images) > 1)
					    	$boat_img[] = $images[1];			    	
			    	}	
		    	}		    	
		    }
		     
		    if (count($boat_data) >= 3) {
			    if (count($images) > 0)
				    $boat_img[] = $images[0];
		    }	    	
*/

	     }
    	$owner_data[$i]['boat_img'] = $boat_img;    	
    }
   
    $this->data['view_owner']= $owner_data;
    $this->data['keyword'] = $keyword;
    $this->load->view('list_owner', $this->data, FALSE);
    }

    public function view_post()
    {
    $keyword = $this->input->post('keyword');
    if (empty($keyword))
	     $owner_data = $this->welcome->view_owner();
    else
    	$owner_data = $this->welcome->search_owner($keyword);
    for ($i=0;$i <  count($owner_data); $i++) {
    	$boat_data = $this->welcome->search_boat_by_owner($owner_data[$i]['owner_name']);
    	$boat_img = array();
    	foreach ($boat_data as $boat) {
	    	$images = $this->welcome->view_boat_image($boat['id']);
	    	
	    	if (count($images) > 0){
	    		$boat_img[] = $images[0];
	    	}
	    	


	     }
    	$owner_data[$i]['boat_img'] = $boat_img;    	
    }
   
    $this->data['view_owner']= $owner_data;
    $this->data['keyword'] = $keyword;
    $this->load->view('list_post', $this->data, FALSE);
    }    
    public function view_reservation()
    // {
    // $this->data['view_reservation']= $this->welcome->view_reservation();
    // // $this->data['view_boat']= $this->welcome->view_boat();

    // $this->load->view('list_reservation', $this->data, FALSE);
    // }

    {

    $fromdate = $this->input->post('fromdate');
    $todate = $this->input->post('todate');
    $keyword = $this->input->post('keyword');
    
    if(empty($keyword) && empty($fromdate) && empty($todate) ){
    	$reservation_data= $this->welcome->view_reservation();    	
    	$free_reservation_data_all= $this->welcome->search_free_boat($keyword, $fromdate, $todate);

    }else{
    	$reservation_data= $this->welcome->search_reservation($keyword, $fromdate, $todate);
    	$free_reservation_data= $this->welcome->search_free_boat($keyword, $fromdate, $todate);
    }	
	$this->data['view_reservation'] = $reservation_data;
	$this->data['view_free_boat'] = $free_reservation_data;
	$this->data['fromdate'] = $fromdate;
    $this->data['todate'] = $todate;
    $this->data['keyword'] = $keyword;
    
    $this->load->view('list_reservation', $this->data, FALSE);
    } 
    
    public function view_boat()
    {
    $keyword = $this->input->post('keyword');
    $boat_owner = $this->input->post('boat_owner');
    $boat_price = $this->input->post('boat_price');
    $status = $this->input->post('status');
    $sort_field = $this->input->post('sort_field');
    $sort_order = $this->input->post('sort_order');
    
    if(empty($keyword) && empty($boat_owner) && empty($boat_price) && empty($status) && empty($sort_field) && empty($sort_order))
    	$boat_data= $this->welcome->view_boat();
    else
    	$boat_data= $this->welcome->search_boat($keyword, $boat_owner, $boat_price, $status, $sort_field, $sort_order);
    	
    for ($index = 0;$index < count($boat_data);$index++) {
    	$boat = $boat_data[$index];
	    $boat['img_url'] = $this->welcome->view_boat_image($boat['id']);
	    $boat_data[$index] = $boat;
	}
	
	$this->data['view_boat'] = $boat_data;
	$this->data['view_owner'] = $this->welcome->view_owner();
	$this->data['keyword'] = $keyword;
    $this->data['boat_owner'] = $boat_owner;
    $this->data['boat_price'] = $boat_price;
    $this->data['status'] = $status;
    $this->data['sort_field'] = $sort_field;
    $this->data['sort_order'] = $sort_order;
    
    $this->load->view('list_boat', $this->data, FALSE);
    }           
	
	
    /****************************  END FETCH OR VIEW FORM DATA ***************/

    
    /****************************  START OPEN EDIT FORM WITH DATA *************/
    public function edit_data($id)
    {
    $this->data['edit_data']= $this->welcome->edit_data($id);
    $this->load->view('edit', $this->data, FALSE);
    }
    public function edit_reservation($id)
    {
    $this->data['view_location']= $this->welcome->view_location(); 
    $this->data['view_owner']= $this->welcome->view_owner();  
    $this->data['view_boat']= $this->welcome->view_boat(); 	
    $this->data['edit_reservation']= $this->welcome->edit_reservation($id);
    $this->load->view('edit_reservation', $this->data, FALSE);
    }    
    public function edit_boat($id)
    {
    $boat_data = $this->welcome->edit_boat($id);
    $boat_data[0]['img_url'] = $this->welcome->view_boat_image($id);
    $this->data['edit_boat']= $boat_data;
    $this->data['view_owner']= $this->welcome->view_owner();
    $this->load->view('edit_boat', $this->data, FALSE);
    }        
    public function edit_location($id)
    {
    $this->data['view_location_list']= $this->welcome->view_location_list();	
    $this->data['edit_location']= $this->welcome->edit_location($id);
    $this->load->view('edit_location', $this->data, FALSE);
    }     
    public function edit_owner($id)
    {
    	$this->data['edit_owner']= $this->welcome->edit_owner($id);
    	$this->load->view('edit_owner', $this->data, FALSE);
    }        
    /****************************  END OPEN EDIT FORM WITH DATA ***************/


    /****************************  START UPDATE DATA *************************/
    public function update_owner($id)
    {
    $imagePath = $this->input->post('uploadphoto');
    $dir = FCPATH . "uploads/tmp/";
    $newDir = FCPATH . "uploads/owner/";  
    if (!is_dir($newDir)) {
	    mkdir($newDir, 0777, TRUE);	
	}
	
    if(!empty($imagePath))
    {
        $imgItem = $imagePath[0];
        if(!empty($imgItem))
        {
           $newPath = $newDir."owner-".$id.".png";
           if (file_exists($newPath)){
           		unlink($newPath);    
           }      	   
           copy($dir.$imgItem, $newPath);
           unlink($dir.$imgItem);
        }
        
    }
	
    $query = null; //emptying in case 

        $lastname   = $_POST['lastname']; //getting from post value
        $firstname   = $_POST['firstname']; //getting from post value
        $loginid   = $_POST['loginid']; //getting from post value        

        $query = $this->db->get_where('owner_data', array(//making selection
            'owner_lastname' => $lastname,
            'owner_name' => $firstname,
            'login' => $loginid,
        ));

        $count = $query->num_rows(); //counting result from query

        if ($count <=1 ) {
    $data = array('owner_lastname'                       => $this->input->post('lastname'),
				'owner_name'                       => $this->input->post('firstname'),
			      'owner_company'                    => $this->input->post('owner_company'),
			      'status'                     => $this->input->post('status'),
			      'contact_person'              => $this->input->post('contact_person'),
			      'owner_phone'                     => $this->input->post('owner_phone'),
			      'owner_phone2'                     => $this->input->post('owner_phone2'),
			      'owner_address'                    => $this->input->post('owner_address'),
			      'owner_email'                    => $this->input->post('email'),   
			      'login'                      => $this->input->post('loginid'),
			      'password'                   => $this->input->post('password'),	
			      'others'                     => $this->input->post('others'),		
			      'img_url'							 => "uploads/owner/owner-".$id.".png",		      		      
			      'insert_time'               => date("m/d/y h:i:s"),
			      'owner_status'                    => 'Y');
				  
    $this->db->where('id', $id);
    $this->db->update('owner_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/view_owner');
    }else {
		$this->session->set_flashdata('message', 'Owner or Username Exists already');
		redirect('welcome/view_owner');
		}
	}

     public function update_reservation($id)
    
    {
    $data = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                    => $this->input->post('fromtime'),
			      'todate'                     => $this->input->post('todate'),
			      'totime'               => $this->input->post('totime'),
			      'boatname'              => $this->input->post('boatname'),
			      'speedboat'                     => $this->input->post('speedboat'),
			       'price'                     => $this->input->post('price'),
			     'balance'                     => $this->input->post('balance'),
			      'deposit'                     => $this->input->post('deposit'),
			      'remark'                     => $this->input->post('remark'),
			      'boat_owner'              => $this->input->post('ownername'),
			      'clientname'              => $this->input->post('clientname'),
			      'contactphone'                     => $this->input->post('contactphone'),
			      'boardinglocation'                     => $this->input->post('boardinglocation'),
			      'offlocation'                     => $this->input->post('offlocation'),			      
			      'status'                    => $this->input->post('status'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y',);
    $this->db->where('id', $id);
    $this->db->update('reservation_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/view_reservation');
    }   

    public function update_location($id)
    {
    $imagePath = $this->input->post('uploadphoto');
    
    $dir = FCPATH . "uploads/tmp/";
    $newDir = FCPATH . "uploads/location/";  
    if (!is_dir($newDir)) {
	    mkdir($newDir, 0777, TRUE);	
	}
	
    if(!empty($imagePath))
    {
    	$imgItem = $imagePath[0];
        if(!empty($imgItem))
        {
	       $newPath = $newDir."location-".$id.".png";
           if (file_exists($newPath)){
           		unlink($newPath);    
           }      	   
           copy($dir.$imgItem, $newPath);
           unlink($dir.$imgItem);
        }
    }
            $data = array('newlocation'                => $this->input->post('newlocation'),
            'address'                    => $this->input->post('address'),
            'img_url'					   => "uploads/location/location-".$id.".png", 
            'created_date'               => date("m/d/y h:i:s"),
            'dstatus'                    => 'Y');            
    $this->db->where('id', $id);
    $this->db->update('location_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/view_location');
    }      


     public function update_boat($id)
    {
		$imagePath = $this->input->post('uploadphoto');
		$data = array('boat_owner'                => $this->input->post('boat_owner'),                        
					  'boat_name'                => $this->input->post('boat_name'),
					  // 'owner_address'             => $this->input->post('owner_address'),
					  // 'owner_sex'             => $this->input->post('owner_sex'),
					  // 'owner_id'                => $this->input->post('owner_id'),
					  'contactperson'               => $this->input->post('contactperson'),
					  'status'               => $this->input->post('status'),
					  'boat_brand'               => $this->input->post('boat_brand'),
					  'weekdayprice'               => $this->input->post('weekdayprice'),
					  'weeknightprice'               => $this->input->post('weeknightprice'),
					  'weekendnightprice'               => $this->input->post('weekendnightprice'),
					  'weekendprice'               => $this->input->post('weekendprice'),
					  'wifi'               => $this->input->post('wifi'),
					  'singing'               => $this->input->post('singing'),
					  'cooking'               => $this->input->post('cooking'),
					  'fishing'               => $this->input->post('fishing'),    
					  'boat_cap'               => $this->input->post('boat_cap'),                                                                    
					  'created_date'               => date("m/d/y h:i:s"),
					  'dstatus'                    => 'Y');
		$this->db->where('id', $id);
		$this->db->update('boat_data', $data);
		
		$dir = FCPATH . "uploads/tmp/";
		$newDir = FCPATH . "uploads/boat/";  
		if (!is_dir($newDir)) {
			mkdir($newDir, 0777, TRUE);	
		}
		
		
		
		if(!empty($imagePath))
		{
			$this->db->where('boat_id', $id);
			$this->db->delete('boat_image');
			$index = 1;
			foreach($imagePath as $imgItem)
			{
				if(!empty($imgItem))
				{
				   $newPath = $newDir."boat-".$id."-".$index.".png";
				   if (strstr($imgItem, "uploads/boat") != false){
						if (!file_exists(FCPATH.$imgItem)){	
							continue;
						}
						if (strcmp(FCPATH.$imgItem, $newPath) != 0) {
							if (file_exists($newPath))
								unlink($newPath);  
							copy(FCPATH.$imgItem, $newPath);		          
							unlink(FCPATH.$imgItem);	
						}
						
				   } else {   
					   if (!file_exists($dir.$imgItem))	
							continue;
					   if (file_exists($newPath))
							unlink($newPath);    
							
					   copy($dir.$imgItem, $newPath);
					   unlink($dir.$imgItem);	           
				   }
				   $image_data = array("boat_id" 	=> $id,
									   "path" => "uploads/boat/"."boat-".$id."-".$index.".png");
				   $this->welcome->insert_boat_image($image_data);	           
				   $index = $index + 1;
				}
			}
		}
	
		$this->session->set_flashdata('message', 'Your data updated Successfully..');
		redirect('welcome/view_boat');
    }       
    
	public function remove_boat_image() {
		$id =$this->input->post('id');	
		$img = $this->welcome->view_boat_image_by_id($id);
		$img = $img[0];
		
		$this->db->where('id', $id);
		$this->db->delete('boat_image');
		$newPath = FCPATH.$img['path'];
		if (file_exists($newPath)){
		   unlink($newPath);    
		} 	
		die("success");
	}
	
    //  public function update_reservation123($id)
    // {
    // $data = array('fromdate'                      => $this->input->post('fromdate'),
			 //      'fromtime'                    => $this->input->post('fromtime'),
			 //      'todate'                     => $this->input->post('todate'),
			 //      'totime'               => $this->input->post('totime'),
			 //      'clientname'              => $this->input->post('clientname'),
			 //      'contactphone'                     => $this->input->post('contactphone'),
			 //      'boardinglocation'                     => $this->input->post('boardinglocation'),
			 //      'status'                    => $this->input->post('status'),			      		      
			 //      'created_date'               => date("m/d/y h:i:s"),
			 //      'dstatus'                    => 'Y');
    // $this->db->where('id', $id);
    // $this->db->update('reservation_data', $data);
    // $this->session->set_flashdata('message', 'Your data updated Successfully..');
    // redirect('welcome/index');
    // }   
    //  public function update_owner123($id)
    // {
    // $data = array('fromdate'                      => $this->input->post('fromdate'),
			 //      'fromtime'                    => $this->input->post('fromtime'),
			 //      'todate'                     => $this->input->post('todate'),
			 //      'totime'               => $this->input->post('totime'),
			 //      'clientname'              => $this->input->post('clientname'),
			 //      'contactphone'                     => $this->input->post('contactphone'),
			 //      'boardinglocation'                     => $this->input->post('boardinglocation'),
			 //      'status'                    => $this->input->post('status'),			      		      
			 //      'created_date'               => date("m/d/y h:i:s"),
			 //      'dstatus'                    => 'Y');
    // $this->db->where('id', $id);
    // $this->db->update('reservation_data', $data);
    // $this->session->set_flashdata('message', 'Your data updated Successfully..');
    // redirect('welcome/index');
    // }           
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('boat_dataexample');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/index');
    }
    public function delete_reservation($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('reservation_data');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/view_reservation');
    }

	public function deleteAllReservation(){
	  $this->db->where_in('id', $this->input->post('ids'));
	  $this->db->delete('reservation_data');
	  
	  $this->session->set_flashdata('message', 'Your reservation deleted Successfully..');
	  redirect('welcome/view_reservation');
	}
	
	function delete_checkbox() {
    $data = $this->input->post('forms');
    for ($i = 0; $i < sizeof($dat); $i++) {
        print_r($data[$i]);
        $this->load->model('registration');
        $this->registration->delete_check($dat[$i]);
    }
    redirect('viewreg/showall', 'refresh');
}    
     public function delete_owner($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('owner_data');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/view_owner');
    }
     public function delete_boat($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('boat_data');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/view_boat');
    }    
     public function delete_location($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('location_data');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/view_location');
    }             
    /****************************  END DELETE DATA ***************************/

    public function week_calendar() {
    	$curboat_price = date('Y-m-d');;
	    $this->data['view_reservation']= $this->welcome->view_reservation();
	    $this->data['curboat_price'] = $curboat_price;
	    $this->load->view('week_calendar', $this->data, FALSE);
    }

    /*********** Login ********/
    // Show login page
		public function index() {
		$this->load->view('login_form');
		}

		// Show registration page
		public function user_registration_show() {
		$this->load->view('registration_form');
		}

		// Validate and store registration data in database
		public function new_user_registration() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('registration_form');
		} else {
		$data = array(
		'user_name' => $this->input->post('username'),
		'user_email' => $this->input->post('email_value'),
		'user_password' => $this->input->post('password')
		);
		$result = $this->login_database->registration_insert($data);
		if ($result == TRUE) {
		$data['message_display'] = 'Registration Successfully !';
		$this->load->view('login_form', $data);
		} else {
		$data['message_display'] = 'Username already exist!';
		$this->load->view('registration_form', $data);
		}
		}
		}

		// Check for user login process
		public function user_login_process() 
		{
			$this->load->helper('security');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE) {
				if(isset($this->session->userdata['logged_in'])){
					$this->mainpage();
				}else{
					$this->load->view('login_form');
				}
			} else {
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
				
				$result = $this->login_database->login($data);
				if ($result == TRUE) {
			
					$username = $this->input->post('username');
					$result = $this->login_database->read_user_information($username);
					if ($result != false) {
						$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
						// Add user data in session
						$this->session->set_userdata('logged_in', $session_data);
						// $this->load->view('main',);
						$this->mainpage();
					}
				} else {
					$data = array(
					'error_message' => 'Invalid Username or Password'
					);
					$this->load->view('login_form', $data);
				}
			}
		}
		
		// Logout from admin page
		public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login_form', $data);
}



}
