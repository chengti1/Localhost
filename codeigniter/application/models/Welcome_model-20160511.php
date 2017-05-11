<?php

class Welcome_model extends CI_Model

{

    public function __construct()

    {

        parent::__construct();

    }



   /**************************  START INSERT QUERY ***************/

    public function insert_data($data){

        $this->db->insert('boat_data', $data); 

        return TRUE;

    }

	

    public function insert_owner($data){

        $this->db->insert('owner_data', $data); 

        return TRUE;

    }

	

    public function insert_boat($data){

        $this->db->insert('boat_data', $data); 

        return TRUE;

    }  

    

    public function insert_boat_image($data){

        $this->db->insert('boat_image', $data); 

        return TRUE;

    }     



    public function insert_reservation($submitdata){

        $this->db->insert('reservation_data', $submitdata); 

        return TRUE;

    }

    public function insert_location($data){

        $this->db->insert('location_data', $data); 

        return TRUE;

    }    

    public function getMaxId($key,$tableName, $cond = NULL)

	{

		$strsql = "SELECT MAX(" . $key . ") as MAX_ID FROM " .$tableName;

		$whereSql = "";

		$query = $this->db->query($strsql);

		$data = $query->result_array();

		

		$max_id = $data[0]['MAX_ID'] + 1;

		return $max_id;

	}

    /**************************  END INSERT QUERY ****************/





//check if users exist//



    public function check_user()

    {

        $query = null; //emptying in case 



        $lastname   = $_POST['lastname']; //getting from post value

        $firstname   = $_POST['firstname']; //getting from post value



        $query = $this->db->get_where('owner_data', array(//making selection

            'owner_lastname' => $lastname,

            'owner_name' => $firstname

        ));



        $count = $query->num_rows(); //counting result from query



        if ($count === 0) {

        $data = array('owner_lastname'                       => $this->input->post('lastname'),

                'owner_name'                       => $this->input->post('firstname'),

                      'owner_company'                    => $this->input->post('company'),

                      'owner_status'                     => $this->input->post('status'),

                      'company_photo'                    => $this->input->post('companyphoto'),

                      'contact_person'                   => $this->input->post('contactperson'),

                      'owner_phone'                      => $this->input->post('phone1'),

                      'owner_phone2'                     => $this->input->post('phone2'),

                      'owner_address'                    => $this->input->post('address'),

                      'login'                            => $this->input->post('login'),

                      'password'                         => $this->input->post('password'), 

                      'others'                           => $this->input->post('others'),       

                      'img_url'                          => "uploads/owner/owner-".$maxID.".png",                         

                      'insert_time'                      => date("m/d/y h:i:s"),

                      'owner_status'                     => 'Y'

                      );

            $this->db->insert('owner_data', $data);

        }

    }



    

    /*************  START SELECT or VIEW ALL QUERY ***************/

  //   public function view_data(){

  //       $query=$this->db->query("SELECT ud.*

    //             FROM boat_data ud 

    //             WHERE ud.status = 'Y'

    //             ORDER BY ud.id ASC");

    // return $query->result_array();

  //   }



        public function view_data(){

        $query=$this->db->query("SELECT *

                                 FROM location_data  

                                 WHERE dstatus = 'y'

                                 ORDER BY id ASC");

        return $query->result_array();

    }



    public function view_image_boat(){

      $query=$this->db->query ("SELECT boat_data.boat_id, boat_image.image

                          FROM own_data, boat_data, boat_image

                          WHERE own_data.own_name=boat_data.own_name

                          AND boat_data.boat_id=boat_image.boat_id

                          -- AND own_data.own_name=â€˜Louisâ€™

                          GROUP BY boat_data.boat_id");

              return $query->result_array();

    }



        public function view_reservation(){

        $query=$this->db->query("SELECT id, fromdate, todate, boatname, clientname, boat_owner, contactphone, boardinglocation, offlocation, status, TIME_FORMAT(fromtime, '%H:%i') as fromtime, TIME_FORMAT(totime, '%H:%i') as totime

                                 FROM reservation_data  

                                 WHERE status = 'yes'

                                 ORDER BY fromdate DESC");

        return $query->result_array();

    } 
            public function view_reservationall(){

        $query=$this->db->query("SELECT id, fromdate, todate, boatname, clientname, boat_owner, contactphone, boardinglocation, offlocation, status, TIME_FORMAT(fromtime, '%H:%i') as fromtime, TIME_FORMAT(totime, '%H:%i') as totime

                                 FROM reservation_data  

                                 -- WHERE status = 'yes'

                                 ORDER BY fromdate DESC");

        return $query->result_array();

    } 

   		public function view_reservation_date($from, $to){

   		$where = ' ';

   		if ($from != '')

   			$where = " AND fromdate >= '".$from."' AND fromdate <= '".$to."' ";                               

        $query=$this->db->query("SELECT fromdate as date, clientname, id, boardinglocation, fromtime, boatname, day(fromdate) as day

                                 FROM reservation_data  

                                 WHERE status = 'yes'".$where

                                 ."ORDER BY fromdate DESC");

        return $query->result_array();

    } 

        public function view_location(){

        $query=$this->db->query("SELECT *

                                 FROM location_data  

                                 WHERE dstatus = 'y'

                                 ORDER BY id ASC");

        return $query->result_array();

    }   

        public function view_location_list(){

        $query=$this->db->query("SELECT *

                                 FROM location_list  

                                 ORDER BY locationid ASC");

        return $query->result_array();

    }       

    	public function search_location($keyword, $district) {

    	$where = "address LIKE '%".$keyword."%' ";

    	if(!empty($district))

    		$where = $where."AND newlocation LIKE '%".$district."%' ";

        $query=$this->db->query("SELECT *

                                 FROM location_data  

                                 WHERE dstatus = 'y' AND ".$where."

                                 ORDER BY id ASC");

        return $query->result_array();

    }  



        public function view_owner(){        

        $query=$this->db->query("SELECT owner_data.*, COUNT(boat_data.id) as ship_number 

        						FROM owner_data 

        						LEFT JOIN boat_data 

        						ON boat_data.boat_owner = owner_data.owner_name 

        						GROUP BY owner_data.id");

        return $query->result_array();

    }

   		public function search_owner($keyword){      

        $query=$this->db->query("SELECT owner_data.*, COUNT(boat_data.id) as ship_number 

        						FROM owner_data

        						LEFT JOIN boat_data 

        						ON boat_data.boat_owner = owner_data.owner_name 

        						WHERE owner_data.owner_name LIKE '%".$keyword."%' OR owner_data.owner_lastname LIKE '%".$keyword."%' OR owner_data.owner_address like '%".$keyword."%' OR owner_data.owner_phone LIKE '%".$keyword."%' OR owner_data.owner_email LIKE '%".$keyword."%' OR owner_data.status = '%".$keyword."%'

        						GROUP BY owner_data.id");

        return $query->result_array();

    }

        public function view_boat(){

        $query=$this->db->query("SELECT *

                                 FROM boat_data  

                                 -- WHERE owner_status = 'yes'

                                 ORDER BY id ASC");

        return $query->result_array();

    }   
public function search_reservation($keyword, $fromdate, $todate){

        $where = "where (fromdate <= '%".$keyword."%' OR todate >= '%".$keyword."%')";
       

        if(!empty($fromdate)) {

            $where = $where." AND fromdate >= '".$fromdate."'";

        }

        if(!empty($todate)) {

            $where = $where." AND todate <= '".$todate."'";

        }

        $order = "id DESC";

        if(!empty($sort_field))

            $order = $sort_field." ".$sort_order;


        $query=$this->db->query("SELECT *

                                 FROM reservation_data ".$where." 

                                  ORDER BY ".$order);

        return $query->result_array();

    } 
    public function search_free_boat($keyword, $fromdate, $todate){

        // $where = 'where (boat_data.boat_name NOT LIKE reservation_data.boatname AND "fromdate > '%".$keyword."%' OR todate < '%".$keyword."%' OR fromdate IS NULL OR todate IS NULL")';
       

        $order = "id DESC";

        if(!empty($sort_field))

            $order = $sort_field." ".$sort_order;


        $query=$this->db->query("SELECT b.*, IF(COALESCE(r.res_count,0)>0,'busy','free') as `boat_status` "
 . " FROM `boat_data` b LEFT OUTER JOIN "
 . " (SELECT `boatname`, count(`boatname`) as res_count "
 . " FROM `reservation_data` "
 . " WHERE '$keyword' BETWEEN fromdate AND todate "
 . " GROUP BY `boatname`) r "
 . " on b.`boat_name` = r.`boatname`");

        return $query->result_array();

    }     


    	public function search_boat($keyword, $boat_owner, $boat_price, $status, $sort_field, $sort_order){

    	$where = "where (boat_name LIKE '%".$keyword."%' OR boat_owner LIKE '%".$keyword."%' OR status LIKE '%".$keyword."%')";

    	

    	if(!empty($boat_price) && $boat_price > 0){

    		switch($boat_price) {

	    		case '1':

	    			$where = $where." AND boat_price >=1 AND boat_price < 1999 ";

	    			break;

	    		case '2':

		    		$where = $where." AND boat_price >=2000 AND boat_price < 3999 ";

	    			break;

	    		case '3':

	    			$where = $where." AND boat_price >=4000 AND boat_price < 5999 ";

	    			break;

	    		case '4':

	    			$where = $where." AND boat_price >=6000 AND boat_price < 7999 ";

	    			break;

    		}

    		

    	}    	

    	

    	if(!empty($boat_owner)) {

    		$where = $where." AND boat_owner LIKE '".$boat_owner."'";

    	}

    	if(!empty($status) && $status == "å?¯ç”¨")

    		$where = $where." AND status = 'å?¯ç”¨'";

    	if(!empty($status) && $status == "ä¸?å?¯ç”¨")

    		$where = $where." AND status = 'ä¸?å?¯ç”¨'";



    	$order = "id ASC";

    	if(!empty($sort_field))

    		$order = $sort_field." ".$sort_order;

    		

        $query=$this->db->query("SELECT *

                                 FROM boat_data ".$where." 

                                 ORDER BY ".$order);

        return $query->result_array();

    }    

    	public function search_boat_by_owner($boat_owner){

    	$where = "WHERE boat_owner LIKE '".$boat_owner."'";

    	$order = "id ASC";

        $query=$this->db->query("SELECT *

                                 FROM boat_data ".$where." 

                                 ORDER BY ".$order);

        return $query->result_array();

    } 

      

    	public function view_boat_image($boat_id){

        $query=$this->db->query("SELECT *

                                 FROM boat_image WHERE boat_id=".$boat_id." 

                                 ORDER BY id ASC");

        return $query->result_array();

    }    

	    public function view_boat_image_by_id($id){

        $query=$this->db->query("SELECT *

                                 FROM boat_image WHERE id=".$id." 

                                 ORDER BY id ASC");

        return $query->result_array();

    }    

        





    /***************  END SELECT or VIEW ALL QUERY ***************/



    

    /*************  START EDIT PARTICULER DATA QUERY *************/

  //   public function edit_data($id){

  //       $query=$this->db->query("SELECT ud.*

    //             FROM boat_data ud 

    //             WHERE ud.id = $id");

    // return $query->result_array();

  //   }



    public function edit_data($id){

        $query=$this->db->query("SELECT *

                                 FROM boat_data  

                                 WHERE id = $id");

        return $query->result_array();

    }

     public function edit_reservation($id){

        $query=$this->db->query("SELECT *

                                 FROM reservation_data 

                                 WHERE id = $id");

        return $query->result_array();

    }

      public function edit_location($id){

        $query=$this->db->query("SELECT *

                                 FROM location_data  

                                 WHERE id = $id");

        return $query->result_array();

    }    

      public function edit_boat($id){

        $query=$this->db->query("SELECT *

                                 FROM boat_data  

                                 WHERE id = $id");

        return $query->result_array();

    }        

      public function edit_owner($id){

        $query=$this->db->query("SELECT *

                                 FROM owner_data  

                                 WHERE id = $id");

        return $query->result_array();

    }         

    /*************  END EDIT PARTICULER DATA QUERY ***************/



}