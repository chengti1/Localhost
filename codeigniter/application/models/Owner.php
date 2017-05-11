<?php
class Owner extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   /**************************  START INSERT QUERY ***************/
    public function insert_owner($data){
        $this->db->insert('owner_data', $data); 
        return TRUE;
    }
	
	function get_owner_name($owner_id) {
		$this->db->select('owner_name');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->owner_name; // return recuitment_title
		
	}
	
	function get_owner_status($owner_id){
		$this->db->select('owner_status');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->owner_status; // return recuitment_title
	}
	
	function get_owner_ship_number($owner_id){
		$this->db->select('ship_number');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->ship_number; // return recuitment_title
	}
	
	function get_owner_phone($owner_id) {
		$this->db->select('owner_phone');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->owner_phone; // return recuitment_title
	}
	
	function get_owner_email($owner_id) {
		$this->db->select('owner_email');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->owner_email; // return recuitment_title
	}
	
	function get_owner_address($owner_id) {
		$this->db->select('owner_address');
		$this->db->where('owner_id', $owner_id);
		$query = $this->db->get('owner_data');
		$result = $query->result();
		return $result[0]->owner_address; // return recuitment_title
	}
 
    function getAll_owner(){
	   $this->db->select('*');
	  // $this->db->from('recruitment');
	   $this->db->order_by('owner_id', 'desc' );
	   $query = $this->db->get('owner_data');
	   $result = $query->result();
	   return $result; 
	}
    /**************************  END INSERT QUERY ****************/

    
    /*************  START SELECT or VIEW ALL QUERY ***************/
  //   public function view_data(){
  //       $query=$this->db->query("SELECT ud.*
    //             FROM boat_data ud 
    //             WHERE ud.status = 'Y'
    //             ORDER BY ud.id ASC");
    // return $query->result_array();
  //   }

   

    /***************  END SELECT or VIEW ALL QUERY ***************/

    
    /*************  START EDIT PARTICULER DATA QUERY *************/
  //   public function edit_data($id){
  //       $query=$this->db->query("SELECT ud.*
    //             FROM boat_data ud 
    //             WHERE ud.id = $id");
    // return $query->result_array();
  //   }

  
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}