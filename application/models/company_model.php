<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_Model extends CI_Model {
	
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


	function addcompany(){
		$company_registration_doc = $this->Company_Model->upload_file('company_registration_doc');
		if(!empty($company_registration_doc)){
			$company_registration_doc = $company_registration_doc['upload_data']['file_name'];
		} else{
			$company_registration_doc ='';
		}
		
		$business_plans = $this->Company_Model->upload_file('business_plans');
		if(!empty($company_registration_doc)){
			$business_plans = $business_plans['upload_data']['file_name'];
		} else{
			$business_plans ='';
		}
		
		$financial_uploads = $this->Company_Model->upload_file('financial_uploads');
		if(!empty($financial_uploads)){
			$financial_uploads = $financial_uploads['upload_data']['file_name'];
		} else{
			$financial_uploads ='';
		}
		
		$bios_pics1 = $this->Company_Model->upload_file('bios_pics1');
		if(!empty($bios_pics1)){
			$bios_pics1 = $bios_pics1['upload_data']['file_name'];
		} else{
			$bios_pics1 ='';
		}
		
		$bios_pics2 = $this->Company_Model->upload_file('bios_pics2');
		if(!empty($bios_pics2)){
			$bios_pics2 = $bios_pics2['upload_data']['file_name'];
		} else{
			$bios_pics2 ='';
		}
		
		$bios_pics3 = $this->Company_Model->upload_file('bios_pics3');
		if(!empty($bios_pics3)){
			$bios_pics3 = $bios_pics3['upload_data']['file_name'];
		} else{
			$bios_pics3 ='';
		}
		
		$bios_pics4 = $this->Company_Model->upload_file('bios_pics4');
		if(!empty($bios_pics4)){
			$bios_pics4 = $bios_pics4['upload_data']['file_name'];
		} else{
			$bios_pics4 ='';
		}

		$bios_pics5 = $this->Company_Model->upload_file('bios_pics5');
		if(!empty($bios_pics5)){
			$bios_pics5 = $bios_pics5['upload_data']['file_name'];
		} else{
			$bios_pics5 ='';
		}
			
		$marketing_material1 = $this->Company_Model->upload_file('marketing_material1');
		if(!empty($marketing_material1)){
			$marketing_material1 = $marketing_material1['upload_data']['file_name'];
		} else{
			$marketing_material1 ='';
		}
		
		$marketing_material2 = $this->Company_Model->upload_file('marketing_material2');
		if(!empty($marketing_material2)){
			$marketing_material2 = $marketing_material2['upload_data']['file_name'];
		} else{
			$marketing_material2 ='';
		}
		
		$marketing_material3 = $this->Company_Model->upload_file('marketing_material3');
		if(!empty($marketing_material3)){
			$marketing_material3 = $marketing_material3['upload_data']['file_name'];
		} else{
			$marketing_material3 ='';
		}
		
		$marketing_material4 = $this->Company_Model->upload_file('marketing_material4');
		if(!empty($marketing_material4)){
			$marketing_material4 = $marketing_material4['upload_data']['file_name'];
		} else{
			$marketing_material4 ='';
		}
		
		$marketing_material5 = $this->Company_Model->upload_file('marketing_material5');
		if(!empty($marketing_material5)){
			$marketing_material5 = $marketing_material5['upload_data']['file_name'];
		} else{
			$marketing_material5 ='';
		}
		
		$feedback_upload = $this->Company_Model->upload_file('feedback_upload');
		if(!empty($feedback_upload)){
			$feedback_upload = $feedback_upload['upload_data']['file_name'];
		} else{
			$feedback_upload ='';
		}
		$project_data= array(
					'user_id'   => $this->session->userdata('user_id'),
					'title' 	=> $this->input->post('title'),
					'first_name'=> $this->input->post('first_name'),
					'is_fname_confidential'=> $this->input->post('is_fname_confidential'),
					'last_name' => $this->input->post('last_name'),
					'is_lname_confidential'=> $this->input->post('is_lname_confidential'),
					'company_name' => $this->input->post('company_name'),
					'introduction_for_investors' => $this->input->post('introduction_for_investors'),
					'type'     => $this->input->post('type'),
					'other'     => $this->input->post('other'),
					'address'   => $this->input->post('address'),
					'city'   => $this->input->post('city'),
					'state'   => $this->input->post('state'),
					'country'   => $this->input->post('country'),
					'zipcode'   => $this->input->post('zipcode'),
					'phone'   => $this->input->post('phone'),
					'email1'   => $this->input->post('email1'),
					'email2'   => $this->input->post('email2'),
					'company_url'   => $this->input->post('company_url'),
					'facebook_url_personal'   => $this->input->post('facebook_url_personal'),
					'facebook_url_company'   => $this->input->post('facebook_url_company'),
					'vkontekte_address_personal'   => $this->input->post('vkontekte_address_personal'),
					'vkontekte_address_company'   => $this->input->post('vkontekte_address_company'),
					'odnoklassniki_address_personal'   => $this->input->post('odnoklassniki_address_personal'),
					'odnoklassniki_address_company'   => $this->input->post('odnoklassniki_address_company'),
					'linkedin_url'   => $this->input->post('linkedin_url'),
					'twitter'   => $this->input->post('twitter'),
					'is_company_registered'   => $this->input->post('is_company_registered'),
					'company_details'   => $this->input->post('company_details'),
					'company_registration_doc'   => $company_registration_doc,
					'business_plans'   => $business_plans,
					'financial_uploads'   => $financial_uploads,
					'min_amount_requested'   => $this->input->post('min_amount_requested'),
					'investment_towards'   => $this->input->post('investment_towards'),
					'interested_in_incrowdsourcing'   => $this->input->post('interested_in_incrowdsourcing'),
					'interested_in_bd'   => $this->input->post('interested_in_bd'),
					'strategy_details'   => $this->input->post('strategy_details'),
					'investor_preference'   => $this->input->post('investor_preference'),
					'ideal_investor'   => $this->input->post('ideal_investor'),
					'bios_pics1'   => $bios_pics1,
					'bios_pics2'   => $bios_pics2,
					'bios_pics3'   => $bios_pics3,
					'bios_pics4'   => $bios_pics4,
					'bios_pics5'   => $bios_pics5,
					'current_valuation'   => $this->input->post('current_valuation'),
					'major_assets'   => $this->input->post('major_assets'),
					'marketing_material1'   => $marketing_material1,
					'marketing_material2'   => $marketing_material2,
					'marketing_material3'   => $marketing_material3,
					'marketing_material4'   => $marketing_material4,
					'marketing_material5'   => $marketing_material5,
					'feedback_upload'   => $feedback_upload,
					'feedback_text'   => $this->input->post('feedback_text'),
					'short_term_goals'   => $this->input->post('short_term_goals'),
					'companies_you_emulate'   => $this->input->post('companies_you_emulate'),
					'competitors'   => $this->input->post('competitors'),
					'market_research'   => $this->input->post('market_research'),
					'create_date' 			=> date("Y-m-d h:i:s"),
					'status'		=> 0
			);
		
		$query = $this->db->insert('company_registration',$project_data);


		if($query)
		{
					return true;
		} else
		{
					return false;
		}


	}
	
	
	function getcompany($id){
		$query=$this->db->query("SELECT * FROM company_registration   where user_id= $id ");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $query->row_array();
		}

		// If no records found, return FALSE
		return FALSE;
	
	}
	
	
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