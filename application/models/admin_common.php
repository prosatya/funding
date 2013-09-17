<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author	- Manish Gautam
 * Class used to include all the admin related functions which can be used any where.
 */
// ------------------------------------------------------------------------
class Admin_common extends  CI_Model {
	
	/**
	 * Constructor
	 */	
	function __construct()
	{
		parent::__construct();
	}
	
	
	// Author : Manish Gautam
	// Internal function to stripslashes in the fetched data if we are using avoid_mysql_injection while entering data
	// Pass $query->result() directly into it.
	function _strip($res)
	{
		foreach($res as $rk=>$rv)
		foreach($res[$rk] as $k=>$v)
		{
			$res[$rk]->$k=stripslashes($v);
		}
		return $res;
	}
	 
	function get_meeting()
	{
		//echo "SELECT *  FROM `meeting_room`  order by starts_at asc "; die;
		$query=$this->db->query("SELECT *  FROM `meeting_room` where  (is_deleted= 0) order by starts_at asc ");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}
 
 
 
	//this function show the meeting 					
	function get_meeting_page($user='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		
		
	// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE is_deleted=0 and `meeting_room`.`name`  LIKE '$user%' OR `meeting_room`.`name_url` LIKE '$user%'";
		}
		 
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`meeting_room`.`room_id`) AS total FROM `meeting_room`  $condition");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		//echo "SELECT `user`.* FROM `user` $condition ORDER BY $orderby $order $limit_query"; die;
		$query = $this->db->query("SELECT `meeting_room`.* FROM `meeting_room` $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	
	 			
	function get_meeting_page1($count=false,$offset=FALSE,$limit=20)
	{
		
		
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//echo "Select `meeting_room`.* from `meeting_room` $limit_query"; 
		$query = $this->db->query("Select `meeting_room`.* from `meeting_room` where room_type='meeting'  and (is_deleted= 0) $limit_query");
		if($query->num_rows())
		{
			if($count)
			{
				return $query->num_rows(); 
			}
			return $query->result();
		}
		return false;
	}
	
	function get_meeting_page2($count=false,$offset=FALSE,$limit=20)
	{
		
		
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//echo "Select `meeting_room`.* from `meeting_room` where room_type='webinar' $limit_query"; 
		$query = $this->db->query("Select `meeting_room`.* from `meeting_room` where room_type='webinar' and (is_deleted= 0) $limit_query");
		if($query->num_rows())
		{
			if($count)
			{
				return $query->num_rows(); 
			}
			return $query->result();
		}
		return false;
	}
	
	 
	function get_meeting_details($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id "; die;
		$query=$this->db->query("SELECT *  FROM `meeting_room`  where room_id= $id  and (is_deleted= 0)");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
 
	 //This function use for fetch user for sent meenting invitation.
	 function get_user()
	{
		//echo "SELECT *  FROM `meeting_room`  order by starts_at asc "; die;
		$query=$this->db->query("SELECT user_name,user_email,status  FROM `user`  order by user_name asc ");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	 //Get Room through ID 
	 function get_meeting_room($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id  and (is_deleted= 0)"; die;
		$query=$this->db->query("SELECT * FROM `meeting_room` where room_id= $id  and (is_deleted= 0)");
		// Checking if records found
		//print_r($query); die;
		//echo $query->num_rows(); die;
		if($query->num_rows())
		{
			// Return result
			 
			//print_r($this->_strip($query->result())); die;
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
					
}
?>
