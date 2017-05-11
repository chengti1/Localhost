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

    public function insert_reservation($data){
        $this->db->insert('reservation_data', $data); 
        return TRUE;
    }
    public function insert_location($data){
        $this->db->insert('location_data', $data); 
        return TRUE;
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

        public function view_data(){
        $query=$this->db->query("SELECT *
                                 FROM location_data  
                                 WHERE dstatus = 'y'
                                 ORDER BY id ASC");
        return $query->result_array();
    }

        public function view_reservation(){
        $query=$this->db->query("SELECT *
                                 FROM reservation_data  
                                 WHERE status = 'yes'
                                 ORDER BY id ASC");
        return $query->result_array();
    } 
        public function view_location(){
        $query=$this->db->query("SELECT *
                                 FROM location_data  
                                 WHERE dstatus = 'y'
                                 ORDER BY id ASC");
        return $query->result_array();
    }     

        public function view_owner(){
        $query=$this->db->query("SELECT *
                                 FROM owner_data  
                                 -- WHERE owner_status = 'yes'
                                 ORDER BY id ASC");
        return $query->result_array();
    }
        public function view_boat(){
        $query=$this->db->query("SELECT *
                                 FROM boat_data  
                                 -- WHERE owner_status = 'yes'
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
      public function edit_owner($id){
        $query=$this->db->query("SELECT *
                                 FROM owner_data  
                                 WHERE id = $id");
        return $query->result_array();
    }         
    /*************  END EDIT PARTICULER DATA QUERY ***************/

}