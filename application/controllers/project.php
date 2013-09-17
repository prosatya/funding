<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/************************************************
## PROJECT CONTROLLER
## ADD/EDIT/REMOVE PROJECT
## MY PROJECT LIST
***********************************************/

class Project extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('user_model');
		$userdata 		= $this->user_model->check_user();
		$user_id 		= $this->session->userdata('user_id');

		if(empty($user_id)) {
			redirect('user/login');
		}
	}	

	public function index()	{
		redirect('main');
	}

	// load add new project view

	public function addnew(){
		$data = array();
		$data['main_content'] ='frontend/addnew';
		$data['meta_title']  = 'Add New Project | Firebird International';
		
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


	// add new project validation
	// load model to insert into database
	// check valodation

	public function addnewvalidation(){

		$this->load->library('form_validation');

		/* Field name, Name, Rules */
		$this->form_validation->set_rules('porject_title','Project Title','trim|required');
		$this->form_validation->set_rules('project_description','Project Description','trim|required');
		$this->form_validation->set_rules('financial_plan','Financial Plan','trim|required');
		$this->form_validation->set_rules('minimum_investment','Minimum Investment','required|trim');


		if($this->form_validation->run() == FALSE){
			$this->addnew();
		} else{
			$this->load->model('Project_model');
			$last_id = $this->Project_model->addprojectsave();
			if($last_id){
				redirect('project/myprojects');
			}
		}

	}


	public function myprojects(){
		$data = array();
		$data['main_content'] ='frontend/myprojects';
		$data['meta_title']  = 'My Projects | Firebird International';
		$this->load->model('Project_model');
		$data['allprojects'] =  $this->Project_model->get_projects_by_user($this->session->userdata('user_id'));
		
		$this->load->view('frontend/includes/template', $data);
	}
}

/* End of file project.php */
/* Location: ./application/controllers/project.php */