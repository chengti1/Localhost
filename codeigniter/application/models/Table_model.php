<?php
class Table_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
	
	function setValuesToTable1($data){
		$newValues = array(
		   'value1' => $data['value1'],
		   'value2' => $data['value2'],
		   'value3' => $data['value3'],
		   'value4' => $data['value4']
		);

		$query = $this->db->insert('table1', $newValues); 
		return $query;
	}
	
	function setValuesToTable2($data){
		$newValues = array(
		   'value5' => $data['value5'],
		   'value6' => $data['value6']
		);

		$query = $this->db->insert('table2', $newValues); 
		return $query;
	}