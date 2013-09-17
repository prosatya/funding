<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {


	/****************************************
		## ADD NEW USER FROM REGISTRATION FORM
	******************************************/

	private $email_verify = 'email_varification_code';

	function add_user() {

		$user_data = array(
				'user_name' 	=> $this->input->post('user_name'),
				'user_email' 	=> $this->input->post('user_email'),
				'password' 		=> md5($this->input->post('password')),
				'status' 		=> 0,
				'user_type' 	=> $this->input->post('usertype'),
				'joining_date' 	=>	date("Y-m-d h:i:s"),
		);

		$query = $this->db->insert('user',$user_data);
		if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
		} else{
			return false;
		}
	}

/****************************************
		## ADD NEW CONTACT FROM CONTACT US FORM
	******************************************/

	

	function add_contact() {

		$user_data = array(
				'cname' 	=> $this->input->post('cname'),
				'csubject' 	=> $this->input->post('csubject'),
				'cmail' 	=> $this->input->post('cmail'),
				'contactno' 	=> $this->input->post('contactno'),
				'description' 	=> $this->input->post('description'),
				
		); 

		$query = $this->db->insert('contactus',$user_data);
		if($query){
			$last_user_id = $this->db->insert_id();
			return $last_user_id;
			
		} else{
			return false;
		}
	}


	/***********************************************************
	 ## CHECK USER LOGGED IN
	## RETURN USERDATA IF TRUE
	************************************************************/

	function check_user(){

		$is_user_logged_in = $this->session->userdata('user_login');

		if(isset($is_user_logged_in) && $is_user_logged_in == true){

			$userdata = array(
					'user_email' 	=> $this->session->userdata('user_email'),
					'user_name' 	=> $this->session->userdata('user_name'),
					'user_role' 	=> $this->session->userdata('user_role'),
					'user_id' 		=> $this->session->userdata('user_id'),
					'user_status'	=> $this->session->userdata('user_status'),
			);

			return 	$userdata;
		} else{
			return false;
		}
	}

	function loginvalidation(){

		$this->db->where('user_email', $this->input->post('user_email'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('user');

		if($query->num_rows==1){
			$query = $query->result();

			$data = array(
					'user_id' 		=> $query[0]->id,
					'user_email' 	=> $query[0]->user_email,
					'user_name' 	=> $query[0]->user_name,
					'user_login' 	=> true,
					'user_type' 	=> $query[0]->user_type,
					'user_status' 	=> $query[0]->status,

			);

			$this->session->set_userdata($data);
			return true;
		}else{
			return false;
		}
	}

	function generateRandomPassword() {
	  //Initialize the random password
	  $password = '';

	  //Initialize a random desired length
	  $desired_length = rand(8, 20);

	  for($length = 0; $length < $desired_length; $length++) {
		//Append a random ASCII character (including symbols)
		$password .= chr(rand(32, 126));
	  }

	  return $password;
	}

	function forgetpasswordvalidation(){

		$this->db->where('user_email', $this->input->post('user_email'));
		$query = $this->db->get('user');
		if($query->num_rows==1){
			$query = $query->result();

			$data = array(
					'user_id' 		=> $query[0]->id,
					'user_email' 	=> $query[0]->user_email,
					'user_name' 	=> $query[0]->user_name,
				);
			$password = $this->generateRandomPassword();
			$this->send_forgetpassword_email($data['user_id'], $data['user_email'], $data['user_name'], $password);
			return true;
		}else{
			return false;
		}
	}

	function send_forgetpassword_email($userid, $email, $username, $password){
		$result = '';
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("text or html");

		$this->email->from('no-reply@speedfundrussia.com', 'FireBird');
		$this->email->to($email);

		$this->email->subject('Firebird Forget password');
		$user_id= random_string('alnum',16);
		$this->email->message('Hello '.$username.', \r\n Thank you for reset your account password. Please Login and update your password for more Security: \r\n \r\nPassword:'.$password.'\r\n\r\n Thank you!');

		if ($this->email->send()){
				return $this->saveUserPassword($userid,$password);
			
		}else{
			return false;
		}
	}

	function send_verification_email(){
		$result = '';
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("text or html");

		$this->email->from('no-reply@speedfundrussia.com', 'FireBird');
		$this->email->to($this->session->userdata('user_email'));

		$this->email->subject('Firebird Account Verification');
		$user_id= random_string('alnum',16);
		$this->email->message('Hello,'.$this->session->userdata('user_name').', <br/>  Thank you for creating account with Firebird. Please click this link to verify your  account: '.base_url().'user/emailverification/'.$user_id.'   <br/><br/>  Thank you!');

		if ($this->email->send()){

			return $this->saveUserData($this->session->userdata('user_id'),$this->email_verify,$user_id,0);
		}else{
			return false;
		}
	}



	function saveUserData($user_id,$data_field,$data_value,$display){
		$user_data = array(
				'user_id' 		 => $user_id,
				'data_field' 	 => $data_field,
				'data_value' 	 => $data_value,
				'display_public' => $display
		);

		$query = $this->db->insert('user_data',$user_data);
		if($query){
			return true;
		} else{
			return false;
		}
	}

	function saveUserPassword($user_id,$password){
		$data = array(
               'password'=> md5($password)
        );
		$this->db->where('id', $user_id );
		$this->db->update('user', $data); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return false;
	}

	/***
	 *
	* Email verification
	*/

	function check_verification_email($params){
			$this->db->where('data_field', $this->email_verify);
			$this->db->where('data_value', $params);
			$query = $this->db->get('user_data');
			if($query->num_rows==1){
				$result = $query->row();
				$this->updateUserData(1,$result->user_id);
			}else{
				return false;
			}
	}

	function updateUserData($param,$userid=false){
		 
		if($userid){
			$where = array('id'=> $userid);
		}else{
			$where = array('id'=> $this->session->userdata('user_id'));
		}
		$this->session->set_userdata('user_status',$param);
		$set = array('status'=>$param);
		$this->db->update('user', $set, $where, 1);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		return FALSE;
	}

	/***
	 *
	* Save Profile
	*/

	function editProfileSave(){
		$com_photo = $this->upload_file('upload_photo');
		$com_reg_document = $this->upload_file('company_reg_doc');

		if(!empty($com_photo) && !empty($com_reg_document)){
			$com_photo = $com_photo['upload_data']['file_name'];
			$com_reg_document = $com_reg_document['upload_data']['file_name'];
				
			foreach ($this->input->post() as $key=>$value){
				 
				if($this->input->post($key."_pp")){
					$user_data= array(
							'user_id' 			=> $this->session->userdata('user_id'),
							'data_field' 		=> $key,
							'data_value' 		=> $value,
							'display_public' 	=> $this->input->post($key."_pp")
					);
					$query = $this->db->insert('user_data',$user_data);
				}
			}
				
			$user_data= array(
					'user_id' 			=> $this->session->userdata('user_id'),
					'data_field' 		=> 'upload_photo',
					'data_value' 		=> $com_photo,
					'display_public' 	=> $this->input->post('upload_photo_pp')
			);
			 
			$query = $this->db->insert('user_data',$user_data);
			
			$user_data= array(
					'user_id' 			=> $this->session->userdata('user_id'),
					'data_field' 		=> 'company_reg_doc',
					'data_value' 		=> $com_reg_document,
					'display_public' 	=> $this->input->post('company_reg_doc_pp')
			);
			$query = $this->db->insert('user_data',$user_data);
			
			if($query){
				return $this->updateUserData(2);
			} else{
				return false;
			}
		}
	}

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

}

/* End of file User_Model.php */
/* Location: ./application/models/User_Model.php */