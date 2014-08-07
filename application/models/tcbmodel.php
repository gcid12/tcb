<?php
	class Tcbmodel extends CI_Model{
	
	
		function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
		
		
		function get_AllMembers(){
		
        
        $query = $this->db->query("SELECT * FROM tblMember ORDER BY first ASC");


			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			
		
		
		}
		

		function get_all_home(){
		
        
        $query = $this->db->query("SELECT id,username,first_name,last_name,pitch,city,country FROM users WHERE exist>='1' ORDER BY first_name ASC");


			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			
		
		
		}

		function get_Member($slug){
		$query = $this->db->query("SELECT * FROM tblMember WHERE slug='$slug'");
			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
		}
		
	
		function count_endorser($id){
		$query = $this->db->query("SELECT COUNT(*) FROM users WHERE endorser='$id'");
			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
		}		
		

	
	}// close model
 
   
   


?>




