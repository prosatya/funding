<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model {


	
	// To fetch list of users in manage user section
	function upcoming_event_list()
	{
	
	   $sql = "SELECT * FROM meeting_room where starts_at > now() ORDER BY name LIMIT 0 , 2" ;
		$query = $this->db->query($sql);
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}
	// To fetch list of users in manage user section
	function latest_event_list()
	{
	
	   $sql = "SELECT * FROM meeting_room where starts_at < now() ORDER BY name LIMIT 0 , 5" ;
		$query = $this->db->query($sql);
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	function get_meeting_details($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id "; die;
		$query=$this->db->query("SELECT *  FROM `meeting_room`  where id= $id  and (is_deleted= 0)");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	function _strip($res)
	{
		foreach($res as $rk=>$rv)
		foreach($res[$rk] as $k=>$v)
		{
			$res[$rk]->$k=stripslashes($v);
		}
		return $res;
	}
	
	

}

/* End of file Categorty_Model */
/* Location: ./application/models/Categorty_Model.php */