<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_Model extends CI_Model {

	function addprojectsave(){

		$this->load->model('User_Model');
		$project_doc = $this->User_Model->upload_file('project_doc');
		
		if(!empty($project_doc)){
			$project_doc = $project_doc['upload_data']['file_name'];
		} else{
			$project_doc ='';
		}

		$project_data= array(
					'title' 	    => $this->input->post('porject_title'),
					'slug' 		    => $this->get_slug($this->input->post('porject_title')),
					'description'   => $this->input->post('project_description'),
					'author' 		=> $this->session->userdata('user_id'),
					'date' 			=> date("Y-m-d h:i:s"),
					'status'		=> 0
			);
		
		$query = $this->db->insert('projects',$project_data);


		if($query){
			$last_projects_id = $this->db->insert_id();

			$project_data_array = array();
			
			$project_data_array[] = array(
					'project_id' => $last_projects_id,
					'data_field' => 'minimum_investment',
					'data_value' => $this->input->post('minimum_investment'),
				);

			$project_data_array[] = array(
					'project_id' => $last_projects_id,
					'data_field' => 'project_doc',
					'data_value' => $project_doc,
				);

			$this->add_project_data($project_data_array);
			return true;

		} else{
			return false;
		}


	}


	// Add Project Data
	// Parm: Data array
	// return bool
	function add_project_data($data_array){
		
		foreach ($data_array as $key){

			if($key['data_value']){

				$project_meta_data= array(
					'project_id' => $key['project_id'],
					'data_field' => $key['data_field'],
					'data_value' => $key['data_value'],
				);
					$query = $this->db->insert('projects_data',$project_meta_data);
				}
			}

	}

	// slug from title

	function get_slug($string, $space="-") {
	    if (function_exists('iconv')) {
	        $string = @iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	    }
	    $string = preg_replace("/[^a-zA-Z0-9 -]/", "", $string);
	    $string = strtolower($string);
	    $string = str_replace(" ", $space, $string);
	    return $string;
	}


	function get_projects_by_user($userid){
	
		 $this->db->where('author', $userid);
		$query = $this->db->get('projects');

		if($query->num_rows>0){
			$query = $query->result();

			foreach($query as $q) {

				$data[] = array(
						'title' 		=> $q->title,
						'slug' 			=> $q->slug,
						'description' 	=> $q->description,
						'date' 			=> $q->date,
						'status' 		=> $q->status,
				);
			}
			return $data;
		}else{
			return false;
		}  

		

	}

// To fetch list of projects in projects section
	function project_list()
	{
	
		$query = $this->db->query("SELECT * FROM company_registration where status=1 ORDER BY company_name");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}


// To fetch list of all projects in project display
function projects_list()
	{
	
		$query = $this->db->query("SELECT * FROM company_registration where status=1  ORDER BY company_name LIMIT 0 , 10");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}


	function get_project_details($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id "; die;
		$query=$this->db->query("SELECT * FROM company_registration   where id= $id  and status = 1");
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

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */