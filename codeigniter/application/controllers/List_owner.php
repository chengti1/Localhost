<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_owner extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
		$this->load->model('Owner'); /* LOADING MODEL * Welcome_model as welcome */
	    //$this->load->model('owner');
	}


	/**************************  START FETCH OR VIEW FORM DATA ***************/
	public function index()
	{
		$data = $this->get_owner_data();
		
	    $this->load->view('list_owner',$data);
		
	}
	/****************************  END FETCH OR VIEW FORM DATA ***************/


	/****************************  START OPEN ADD FORM FILE ******************/
	
	

	/****************************  END OPEN ADD FORM FILE ********************/

    
    /****************************  START INSERT FORM DATA ********************/
	

	function get_owner_data() {
		
		//$dataCounter = 0;
		for($i = 0; $i < 5 ; $i++) {
	
		//$data['recent_id'] =   $recent_id;
		 
		 //while($this->owner->check_recruitment_exist($recent_id)== false) $recent_id--;
			 
		$data['owner'][$i]['owner_name'] =  $this->Owner->get_owner_name($i);
        $data['owner'][$i]['owner_email'] =  $this->Owner->get_owner_email($i);
		$data['owner'][$i]['owner_address'] =  $this->Owner->get_owner_address($i);
	//	$data['owner'][$i]['owner_sex'] =  $this->Owner->get_owner_sex($i);
		$data['owner'][$i]['owner_phone'] =  $this->Owner->get_owner_phone($i);
		$data['owner'][$i]['owner_status'] =  $this->Owner->get_owner_status($i);
		$data['owner'][$i]['owner_ship_number'] =  $this->Owner->get_owner_ship_number($i);

		

		echo $data['owner'][$i]['owner_phone'] ;
		//$dataCounter++;
		//$recent_id--;
		//$data['job_offer'][$i]['recruitment_insertTime'] =  $this->recruitment->get_insertTime($i);

		//echo $data['job_offer'][$i]['detail'] ;
		
		} 
		
		return $data; 
	}
	
	
	
    public function submit_data()
    {
    $data = array('cname'                      => $this->input->post('cname'),
			      'company'                    => $this->input->post('company'),
			      'status'                     => $this->input->post('status'),
			      'companyphoto'                    => $this->input->post('companyphoto'),
			      'contactperson'                      => $this->input->post('contactperson'),
			      'phone1'                        => $this->input->post('phone1'),
			      'phone2'                    => $this->input->post('phone2'),
			      'address'                      => $this->input->post('address'),
			      'login'                        => $this->input->post('login'),
			      'password'                    => $this->input->post('password'),	
			      'others'                    => $this->input->post('others'),				      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                     => 'Y',
				  'picture'                 => file_get_contents($_FILES['picture']['tmp_name']) 
				  );
	
	
	
    $insert = $this->welcome->insert_data($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('welcome/index');
    }
    

    


}
