<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/****************************************************
 ## Package Firebird
## User controller
## Login, Registration, Message, Notification
## From V 1.0
****************************************************/

class User extends CI_Controller {

	public function index(){
		redirect('main');
	}
	
	// login function
	// load login view
	public function login(){
		$data = array();
		$data['main_content'] ='frontend/login';
		$data['meta_title']  = 'Login | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}


	// Login Validation Function
	// Redirect to profile page as status

	function loginvalidation(){

		$this->load->model('User_Model');
		$query = $this->User_Model->loginvalidation();

		/* If the user exists*/

		if($query){
			redirect('user/profile');

		} else{

			$this->session->set_flashdata('errormessage', 'Invalid Email or Password!');
			redirect('user/login');
		}

	}

	// Forget password function
	// load Forget password view
	public function forgetpassword(){
		$data = array();
		$data['main_content'] ='frontend/forgetpassword';
		$data['meta_title']  = 'Forget password | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}


	// Login Validation Function
	// Redirect to profile page as status

	function forgetpasswordvalidation(){

		$this->load->model('User_Model');
		$query = $this->User_Model->forgetpasswordvalidation();

		/* If the user exists*/

		if($query){
			$this->session->set_flashdata('errormessage', 'Please verify your password in Email!');
			redirect('user/login');

		} else{

			$this->session->set_flashdata('errormessage', 'Invalid Email!');
			redirect('user/forgetpassword');
		}

	}



	// Registration function
	// load Registration view
	public function registration(){
		$data = array();
		$data['main_content'] ='frontend/registration';
		$data['meta_title']  = 'Registration | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}
	
   

	// Registration Vaidation function
	// load Registration view if failed, load success message if true

	public function registrationvalidation(){
		$this->load->library('form_validation');
			
		/* Field name, Name, Rules */
		$this->form_validation->set_rules('user_name','User Name','trim|required');
		$this->form_validation->set_rules('user_email','Email Address','trim|required|valid_email|is_unique[user.user_email]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
			
		if($this->form_validation->run() == FALSE){
			$this->registration();
		} else{
			$this->load->model('User_Model');
			$last_id = $this->User_Model->add_user();


			if($last_id){

				$data = array(
						'user_email' 	=> $this->input->post('user_email'),
						'user_name' 	=> $this->input->post('user_name'),
						'user_id' 		=> $last_id,
						'user_status' 	=> 0,
						'user_login' 	=> true,
						'user_type' 	=> $this->input->post('usertype'),
				);
					
				$this->set_session($data) ;

				$email_debug = $this->User_Model->send_verification_email();
				if ($email_debug){
					redirect('user/profile');
				}else{
					redirect(base_url());
				}
				
			}
		}
	}


	/*****************************************************
		## PROFILE PAGE
	## GET USERSTATUS
	## RETURN TO APPROPRIATE MODEL
	****************************************************/

	public function profile(){

		/** Check Logged In User */
		$data = array();
		$this->load->model('User_Model');
		$userdata 		= $this->User_Model->check_user();
		$user_id 		= $this->session->userdata('user_id');
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		if(!empty($userdata)){
			$data['main_content'] ='frontend/profile';
			$data['meta_title']   = 'Profile | Firebird International';
			$data['user_id'] 	  = $user_id ;
			
			
			$this->load->view('frontend/includes/template', $data);
		} else{
			redirect('user/login');
		}
			

	}

	/*********************************************
		## Logout Function
	## Remove data from session
	**********************************************/

	public function logout(){

		$userdata = array(
				'user_email' 	=> $this->session->userdata('user_email'),
				'user_name' 	=> $this->session->userdata('user_name'),
				'user_status' 	=> $this->session->userdata('user_status'),
				'user_type' 	=> $this->session->userdata('usertype'),
				'user_id' 		=> $this->session->userdata('user_id'),
				'user_login' 	=> true,
		);

		$this->session->unset_userdata($userdata);
		redirect(base_url());

	}

	/**********************************************
		## SET USERDATA TO SESSION
	## PARM: $userdata
	**********************************************/

	public function set_session($usedata){
		$this->session->set_userdata($usedata);
		return true;
	}

	/***
	 * email varification
	*/

	function emailverification() {
		$this->load->model('User_Model');
		$param = $this->uri->segment(3);
		$verify = $this->User_Model->check_verification_email( $param);
		//  echo $this->db->last_query();
		redirect('user/profile');
	}

	/**
	 * Edit profile
	 */
	function editProfile(){
		$data = array();
		$data['main_content'] ='frontend/editProfile';
		$data['meta_title']  = 'Edit Profile | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}

		
	/**
	 * Save Edit profile
	 */
	
	function editProfileSave(){
		$this->load->library('form_validation');
		
		/* Field name, Name, Rules */
		$this->form_validation->set_rules('about_me','About me','trim|required');
		//$this->form_validation->set_rules('upload_photo','Upload Photo','trim|required');
		$this->form_validation->set_rules('contact_address','Contact Address','trim|required');
		$this->form_validation->set_rules('contact_number','Contact Number','trim|required');
		$this->form_validation->set_rules('company_url','Company Url','trim|required');
		$this->form_validation->set_rules('company_description','Company description','trim|required');
		//$this->form_validation->set_rules('company_reg_doc','Company registration Document','trim|required');
		$this->form_validation->set_rules('email','Company Email','trim|required|valid_email');
		
		
		if($this->form_validation->run() == FALSE){
			$this->editProfile();
		} else{
			 
			$this->load->model('User_Model');
			$last_id = $this->User_Model->editProfileSave();
			echo $last_id; die;
			if($last_id){
				redirect('user/profile');
			}
		}
		
	}

	/**hh
	 * Change Password
	 */
	function changePassword(){
		$data = array();
		$data['main_content'] ='frontend/changePassword';
		$data['meta_title']  = 'Change Password | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->projects_list();
		if($query){
			$data['projects_list'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		$data['is_news']  = true;
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}

	/**
	 * Save Change Password
	 */
	
	function changePasswordSave(){
		$this->load->library('form_validation');
		
		/* Field password, confirm password */
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
		
		if($this->form_validation->run() == FALSE){
			$this->changePassword();
		} else{
			$password= $this->input->post('password'); 
			$user_id = $this->session->userdata('user_id');
			$this->load->model('User_Model');
			$last_id = $this->User_Model->saveUserPassword($user_id ,$password);
			if($last_id){
				$this->session->set_flashdata('errormessage', 'Invalid Email!');
				$this->changePassword();
			}else{
				$this->session->set_flashdata('errormessage', 'Password Not Updated!');
				$this->changePassword();
			}
		}
		
	}





// contactus function
	// load contact view
	public function contactus(){
		$data = array();
		$data['main_content'] = 'frontend/contactus';
		$data['meta_title']  = 'Contact us | Firebird International';
		$this->load->model('Category_Model');
		$query = $this->Category_Model->category_list();
		if($query){
			$data['category'] = $query ; 
		}
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}
		
		$this->load->model('Project_Model');
		$query = $this->Project_Model->projects_list();
		if($query){
			$data['projects_list'] = $query ; 
		}
		$this->load->model('Event_Model');
		$query = $this->Event_Model->upcoming_event_list();
		if($query){
			$data['upcoming_event_list'] = $query ; 
		}
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		
		//  echo $this->db->last_query();
		$this->load->model('News_Model');
		$query = $this->News_Model->News_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}





	// contactus Vaidation function
	// load contactus view if failed, load success message if true

	public function contactusvalidation(){
		$this->load->library('form_validation');
			
		/* Field name, Name, Rules */
		$this->form_validation->set_rules('cname','Full Name','trim|required');
		$this->form_validation->set_rules('csubject','Subject','trim|required');
		$this->form_validation->set_rules('cmail','Email Address','trim|required|valid_email');
		$this->form_validation->set_rules('contactno','Contact No.','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
			
		if($this->form_validation->run() == FALSE){
			$this->contactus();
		} else{
			$this->load->model('User_Model');
			$last_id = $this->User_Model->add_contact();
			// echo $this->db->last_query();
			

			if($last_id){
				// $this->session->set_flashdata('errormessage', 'Invalid Email!');
				redirect('user/contactus');				
			}
		
		}
	}	


} 
/* End of file User.php */ /* Location:
./application/controllers/User.php */
