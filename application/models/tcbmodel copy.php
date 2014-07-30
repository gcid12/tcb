<?php
	class Tcbmodel extends CI_Model{
	
	
		function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
		
		
		function get_users(){
		
			$query = $this->db->get('tblUsers');
        return $query->result();
		
		
		}
		

function get_projects($yes,$no,$limit){

if($yes==''){$filter1='';}else{$filter1="AND type='$yes'";} //exclusive for this type
if($no==''){$filter2='';}else{$filter2="AND type!='$no'";} //exclude this type
if($limit==''){$filter3='';}else{$filter3="limit $limit";}


$query = $this->db->query("SELECT * FROM tblProjects WHERE exist BETWEEN 1 AND 3 $filter1 $filter2 $filter3");

//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		



function get_between($b1,$b2,$limit){

if($limit==''){$filter3='';}else{$filter3="limit $limit";}


$query = $this->db->query("SELECT * FROM tblProjects WHERE exist BETWEEN $b1 AND $b2 $filter3");

//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		
		


function get_home(){

$query = $this->db->query("SELECT * FROM tblProjects WHERE exist BETWEEN 2 AND 3");

//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		
		
function get_single($slug){

$query = $this->db->query("SELECT * FROM tblProjects WHERE slug='$slug'");


//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		
		
function get_similar($slug){

$query = $this->db->query("SELECT * FROM tblProjects WHERE slug='$slug'");


//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}		
		
		

/*

GER FUNCTIONS
*/		


function get_ger($b1,$b2,$limit){

if($limit==''){$filter3='';}else{$filter3="limit $limit";}


$query = $this->db->query("SELECT * FROM tblProjects WHERE exist BETWEEN $b1 AND $b2 $filter3 AND g=1 ORDER BY gorden");

//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		
function get_ger_home(){


$query = $this->db->query("SELECT * FROM tblProjects WHERE ghome=1 ORDER BY RAND()");

//$query = $this->db->get('tblCases');

			if($query->num_rows() >0){
				return $query->result();
			}else{
				return NULL;
			}
			

		}
		
					
		
		
		

	
	}// close model
 
   
   


?>




