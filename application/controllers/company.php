<?php 

class Company extends CI_Controller {
	
	public function index(){
		$data = array();
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
		if(!empty($userdata)){
			if($this->session->userdata('user_type') != "company") {
			redirect('investor');	
			}
	
			$data['main_content'] ='frontend/company_registration';
			$data['meta_title']   = 'Profile | Firebird International';
			$data['user_id'] 		= $this->session->userdata('user_id');
			// Get Company Detail if already
			$this->load->model('Company_Model');
			$query = $this->Company_Model->getcompany($data['user_id']);
			$data['getcompany'] = $query ;

			$this->load->view('frontend/includes/template', $data);
		} else{
			redirect('user/login');
		}
	
	}
	
	public function compregsave(){
		$this->load->library('form_validation');
	
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
		$this->form_validation->set_rules('introduction_for_investors','Introduction for investors','trim|required');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('type','Type','trim|required');
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('company_name','Company','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('city','City','trim|required');
		$this->form_validation->set_rules('state','State','trim|required');
		$this->form_validation->set_rules('zipcode','Zipcode','trim|required');
		$this->form_validation->set_rules('phone','Phone','trim|required');
		$this->form_validation->set_rules('email1','Email1','trim|required');
		$this->form_validation->set_rules('company_details','Company or project exceptionally unique','trim|required');
		$this->form_validation->set_rules('company_docs','Company Registration document','trim|required');
		$this->form_validation->set_rules('min_amount_requested','Minimum investment required','trim|required');
		$this->form_validation->set_rules('investor_preference','Investor Preference','trim|required');
		$this->form_validation->set_rules('ideal_investor','Ideal Investor','trim|required');
		$this->form_validation->set_rules('major_assets','Major Assets','trim|required');
		$this->form_validation->set_rules('short_term_goals','short term goals for the company/project','trim|required');
		$this->form_validation->set_rules('companies_you_emulate','companies/entrepreneurs do you emulate','trim|required');
		$this->form_validation->set_rules('competitors','companies would you consider to be competitors','trim|required');
		$this->form_validation->set_rules('market_research','market research can you provide','trim|required');
		
		if(empty($userdata)){
			redirect('user/login');
		}else if($this->form_validation->run() == FALSE){
			$this->index();
		} else{
			$this->load->model('Company_Model');
			$last_id = $this->Company_Model->addcompany();
			redirect('payment');
		}
	}


	
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
