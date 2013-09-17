<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plan_Model extends CI_Model {

		function _strip($res)
		{
			foreach($res as $rk=>$rv)
			foreach($res[$rk] as $k=>$v)
			{
				$res[$rk]->$k=stripslashes($v);
			}
			return $res;
		}
	
	// To fetch list of plan in manage plan section
	function plan_list($user_type)
	{
	
	     $sql = "SELECT * FROM plan where status = 1 and user_type='".$user_type."' ORDER BY plan_amt" ;
		 
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
	
	
	// To fetch list of plan in manage plan section
	function plan($id)
	{
	
	      	$this->db->where('id', $id);
			$this->db->from('plan');
			$query = $this->db->get();
			return $query->result();
		 		
	}

}

/* End of file Plan_Model */
/* Location: ./application/models/Plan_Model.php */