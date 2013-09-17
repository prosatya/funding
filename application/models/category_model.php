<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_Model extends CI_Model {


	
	// To fetch list of users in manage user section
	function category_list()
	{
	
		$query = $this->db->query("SELECT *
FROM category
ORDER BY category_name
LIMIT 0 , 10");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}

	

	

	

	

	



	

	
	

	

}

/* End of file Categorty_Model */
/* Location: ./application/models/Categorty_Model.php */