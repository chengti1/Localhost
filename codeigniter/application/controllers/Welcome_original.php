<?php
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

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
		$this->load->model('Welcome_model','welcome'); /* LOADING MODEL * Welcome_model as welcome */
	    //$this->load->model('owner');
	}


	/**************************  START FETCH OR VIEW FORM DATA ***************/
	public function index()
	{
	    $this->data['view_boat']= $this->welcome->view_boat();
	    $this->load->view('main', $this->data, FALSE);
	}
	/****************************  END FETCH OR VIEW FORM DATA ***************/


	/****************************  START OPEN ADD FORM FILE ******************/
	public function add_data()
	{
		$this->load->view('add');
	}
	public function add_location()
	{
	
		$this->load->view('add_location');
	}
	
	public function add_owner() {
		$this->load->view('add_owner');
	}

	public function add_boat()
	{
		$this->load->view('add_boat');
	}
	public function add_reservation()
	{
	$this->load->view('add_reservation');	
	}		
	

	/****************************  END OPEN ADD FORM FILE ********************/

    
    /****************************  START INSERT FORM DATA ********************/
	

	
	
	
    public function submit_owner()
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
	
	
	
    $insert = $this->welcome->insert_owner($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('welcome/index');
    }
    
    public function submit_reservation()
    {
    $data = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                    => $this->input->post('fromtime'),
			      'todate'                     => $this->input->post('todate'),
			      'totime'               => $this->input->post('totime'),
			      'clientname'              => $this->input->post('clientname'),
			      'contactphone'                     => $this->input->post('contactphone'),
			      'boardinglocation'                     => $this->input->post('boardinglocation'),
			      'status'                    => $this->input->post('status'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y',
				  'picture'                     => $this->input->post('picture'));
    
    $insert = $this->welcome->insert_reservation($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('welcome/index');
    }   
    
    public function submit_location()
    {
    $data = array('newlocation'                => $this->input->post('newlocation'),
			      'address'                    => $this->input->post('address'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    
    $insert = $this->welcome->insert_location($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('welcome/index');
    }         
	
	public function submit_boat()
    {
    $data = array('owner_name'                => $this->input->post('owner_name'),		      		      
			      'owner_email'                => $this->input->post('owner_email'),
				  // 'owner_address'             => $this->input->post('owner_address'),
				  // 'owner_sex'             => $this->input->post('owner_sex'),
				  // 'owner_id'                => $this->input->post('owner_id'),
				  'owner_phone'               => $this->input->post('owner_phone'),
				  'ship_number'               => $this->input->post('ship_number'),
				  'owner_status'               => $this->input->post('owner_status'),
				  'created_date'               => date("m/d/y h:i:s"),
				  'dstatus'                    => 'Y');
    
    $insert = $this->welcome->insert_boat($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('welcome/index');
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
    $this->data['view_location']= $this->welcome->view_location();
    $this->load->view('list_place', $this->data, FALSE);
    }
    public function view_owner()
    {
    $this->data['view_owner']= $this->welcome->view_owner();
    $this->load->view('list_owner', $this->data, FALSE);
    }
     public function view_boat()
    {
    $this->data['view_boat']= $this->welcome->view_boat();
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
    $this->data['edit_reservation']= $this->welcome->edit_reservation($id);
    $this->load->view('edit_reservation', $this->data, FALSE);
    }    
    public function edit_location($id)
    {
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
    $data = array('cname'                      => $this->input->post('cname'),
			      'company'                    => $this->input->post('company'),
			      'status'                     => $this->input->post('status'),
			      'companyphoto'               => $this->input->post('companyphoto'),
			      'contactperson'              => $this->input->post('contactperson'),
			      'phone1'                     => $this->input->post('phone1'),
			      'phone2'                     => $this->input->post('phone2'),
			      'address'                    => $this->input->post('address'),
			      'login'                      => $this->input->post('login'),
			      'password'                   => $this->input->post('password'),	
			      'others'                     => $this->input->post('others'),				      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
				  
    $this->db->where('id', $id);
    $this->db->update('owner_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/index');
    }

     public function update_reservation($id)
    {
    $data = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                    => $this->input->post('fromtime'),
			      'todate'                     => $this->input->post('todate'),
			      'totime'               => $this->input->post('totime'),
			      'clientname'              => $this->input->post('clientname'),
			      'contactphone'                     => $this->input->post('contactphone'),
			      'boardinglocation'                     => $this->input->post('boardinglocation'),
			      'status'                    => $this->input->post('status'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    $this->db->where('id', $id);
    $this->db->update('reservation_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/index');
    }   

     public function update_reservation123($id)
    {
    $data = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                    => $this->input->post('fromtime'),
			      'todate'                     => $this->input->post('todate'),
			      'totime'               => $this->input->post('totime'),
			      'clientname'              => $this->input->post('clientname'),
			      'contactphone'                     => $this->input->post('contactphone'),
			      'boardinglocation'                     => $this->input->post('boardinglocation'),
			      'status'                    => $this->input->post('status'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    $this->db->where('id', $id);
    $this->db->update('reservation_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/index');
    }   
     public function update_owner123($id)
    {
    $data = array('fromdate'                      => $this->input->post('fromdate'),
			      'fromtime'                    => $this->input->post('fromtime'),
			      'todate'                     => $this->input->post('todate'),
			      'totime'               => $this->input->post('totime'),
			      'clientname'              => $this->input->post('clientname'),
			      'contactphone'                     => $this->input->post('contactphone'),
			      'boardinglocation'                     => $this->input->post('boardinglocation'),
			      'status'                    => $this->input->post('status'),			      		      
			      'created_date'               => date("m/d/y h:i:s"),
			      'dstatus'                    => 'Y');
    $this->db->where('id', $id);
    $this->db->update('reservation_data', $data);
    $this->session->set_flashdata('message', 'Your data updated Successfully..');
    redirect('welcome/index');
    }           
    /****************************  END UPDATE DATA ****************************/


    /****************************  START DELETE DATA **************************/
    public function delete_data($id)
    {  
    $this->db->where('id', $id);
    $this->db->delete('boat_data');
    $this->session->set_flashdata('message', 'Your data deleted Successfully..');
    redirect('welcome/index');
    }
    /****************************  END DELETE DATA ***************************/



}
