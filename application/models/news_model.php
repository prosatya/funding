<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_Model extends CI_Model {


	
	// To fetch list of users in manage user section
	function news_list()
	{
	
		$query = $this->db->query("SELECT * FROM pages  where status =1 and publish=1   ORDER BY page_name LIMIT 0 , 5");
		
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
	function all_news_list()
	{
	
		$query = $this->db->query("SELECT * FROM pages where status =1 and publish=1  ORDER BY page_name  ");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	function get_news_details($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id "; die;
		$query=$this->db->query("SELECT * FROM pages   where id= $id  and (status =1)");
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