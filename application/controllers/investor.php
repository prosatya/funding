<?php
class Investor extends CI_Controller {
	
	public function index(){
		$data = array();
		$this->load->model('User_Model');
		$userdata 		= $this->User_Model->check_user();
		$user_id 		= $this->session->userdata('user_id');
		
		$data['main_content'] ='frontend/investor_registration';
		$data['meta_title']  = 'Investor Registration - Firebird International';
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
		$data['is_news']  = true;
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
	
		if(!empty($userdata)){
			if($this->session->userdata('user_type') != "investor") {
			redirect('company');
			}
			$data['main_content'] ='frontend/investor_registration';
			$data['meta_title']   = 'Profile | Firebird International';
			$data['user_id'] 	  = $this->session->userdata('user_id');
			// Get Investor Detail if already
			$this->load->model('Investor_Model');
			$query = $this->Investor_Model->getinvestor($data['user_id']);
			$data['getinvestor'] = $query ; 

			$this->load->view('frontend/includes/template', $data);
		} else{
			redirect('user/login');
		}
	}
	
	public function investregsave(){
		
		$this->load->library('form_validation');
		$userdata = $this->session->userdata('user_id');
	
		$this->load->model('User_Model');
		$userdata 		= $this->User_Model->check_user();
			
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
		$data['is_news']  = true;
		$this->load->model('News_Model');
		$query = $this->News_Model->all_news_list();
		if($query){
			$data['news'] = $query ; 
		}
			
		
		/* Field name, Name, Rules */
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('company','Company','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('zipcode','Zipcode','trim|required');
		$this->form_validation->set_rules('phone','Phone','trim|required');
					
		if(empty($userdata)){
			redirect('user/login');
		}else if($this->form_validation->run() == FALSE){
			$this->index();
		} else{
			$this->load->model('Investor_Model');
			$last_id = $this->Investor_Model->addinvestor();
			redirect('user/profile');
		}
	}
	
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
