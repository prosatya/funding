<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Investor_Model extends CI_Model {
	
	function upload_file($fieldName){
		$this->load->library('upload');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf|ppt|mp4|doc|docx|text';
		$config['max_size'] = '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload($fieldName))
		{
			return $data = array();
		}
		else
		{
			return $data = array('upload_data' => $this->upload->data());
		}

	}
	// To fetch list of all projects in project display
	function investor_list()
	{
		$query = $this->db->query("SELECT * FROM investor_registration where status=1  ORDER BY company ");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->result();
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	

	function addinvestor(){
		$photograph = $this->Investor_Model->upload_file('photograph');
		if(!empty($photograph)){
			$photograph = $photograph['upload_data']['file_name'];
		} else{
			$photograph ='';
		}
		
		$company_logo = $this->Investor_Model->upload_file('company_logo');
		if(!empty($photograph)){
			$company_logo = $company_logo['upload_data']['file_name'];
		} else{
			$company_logo ='';
		}
	
		$project_data= array(
					'user_id'   => $this->session->userdata('user_id'),
					'title' 	=> $this->input->post('title'),
					'first_name'=> $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'company' => $this->input->post('company'),
					'photograph' => $photograph,
					'company_logo' => $company_logo,
					'project_type'     => $this->input->post('type'),
					'other'     => $this->input->post('other'),
					'address'   => $this->input->post('address'),
					'city'   => $this->input->post('city'),
					'state'   => $this->input->post('state'),
					'zipcode'   => $this->input->post('zipcode'),
					'phone'   => $this->input->post('phone'),
					'skype'   => $this->input->post('skype'),
					'email1'   => $this->input->post('email1'),
					'email2'   => $this->input->post('email2'),
					'company_url'   => $this->input->post('company_url'),
					'facebook_url_personal'   => $this->input->post('facebook_url_personal'),
					'facebook_url_company'   => $this->input->post('facebook_url_company'),
					'linkedin_url'   => $this->input->post('linkedin_url'),
					'twitter'   => $this->input->post('twitter'), 
					'company_details'   => $this->input->post('company_details'),
					'state_company_registered'   => $this->input->post('state_company_registered'),
					'country'   => $this->input->post('country'),
					'company_type'   => $this->input->post('company_type'),
					'other_company_type'   => $this->input->post('other_company_type'),
					'current_capitalization'   => $this->input->post('current_capitalization'),
					'seeking_company'   => $this->input->post('seeking_company'),
					'investment_size'   => $this->input->post('investment_size'),
					'min_amt'   => $this->input->post('min_amt'),
					'max_amt'   => $this->input->post('max_amt'),
					'ownership_share'   => $this->input->post('ownership_share'),
					'control_percentage'   => $this->input->post('control_percentage'),
					'investor_details'   => $this->input->post('investor_details'),
					'companies_looking'   => $this->input->post('companies_looking'),
					'experience_in_russia'   => $this->input->post('experience_in_russia'),
					'experience_in_investment'   => $this->input->post('experience_in_investment'),
					'portfolio'   => $this->input->post('portfolio'),
					'average_roi'   => $this->input->post('average_roi'),
					'time_for_returns'   => $this->input->post('time_for_returns'),
					'about_investment'   => $this->input->post('about_investment'),
					'investing_experience'   => $this->input->post('investing_experience'),
					'ratings'   => $this->input->post('ratings'),
					'interested_in_crowdsourcing'   => $this->input->post('interested_in_crowdsourcing'),
					'project_consideration'   => $this->input->post('project_consideration'),
					'partners_consideration'   => $this->input->post('partners_consideration'),
					'companies_intrested_in'   => $this->input->post('companies_intrested_in'),
					'investment_strategies'   => $this->input->post('investment_strategies'),
					'competitors'   => $this->input->post('competitors'),
					'create_date' 			=> date("Y-m-d h:i:s")
			);
		
		 $query = $this->db->insert('investor_registration',$project_data);


		if($query)
		{
					return true;
		} else
		{
					return false;
		}


	}
	
	function getinvestor($id){
		$query=$this->db->query("SELECT * FROM investor_registration   where user_id= $id ");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->row_array();
		}

		// If no records found, return FALSE
		return FALSE;
	
	}
	
	
	function get_investor_details($id)
	{
		 //echo "SELECT * FROM investor_registration where id= $id  and status = 1"; die;
		$query=$this->db->query("SELECT * FROM investor_registration where id= $id  and status = 1"); 
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