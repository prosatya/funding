<?php 

class BrowseProject extends CI_Controller {
	
	public function index(){
		$data = array();
		$data['main_content'] ='frontend/list_project';
		$data['meta_title']  = 'Company List - Firebird International';
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
		$query = $this->Project_Model->projects_list();
		if($query){
			$data['projects_list'] = $query ; 
		}
		$this->load->model('Investor_Model');
		$query = $this->Investor_Model->investor_list();
		if($query){
			$data['investor_list'] = $query ; 
		}
		 
		$this->load->model('Event_Model');
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}
		//  echo $this->db->last_query();
		$data['is_project']  = true;
		$this->load->model('News_Model');
		$query = $this->News_Model->News_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}
	
	
	//this function shows project details 
	function viewproject() {
		
		$data = array();
		$data['main_content'] ='frontend/view_project';
		$data['meta_title']  = 'View Company Firebird International';
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
		$this->load->model('Project_Model');
		$query = $this->Project_Model->project_list();
		if($query){
			$data['project'] = $query ; 
		}		
		$this->load->model('Event_Model');
		$query = $this->Event_Model->latest_event_list();
		if($query){
			$data['latest_event_list'] = $query ; 
		}		
		$this->load->model('News_Model');
		$query = $this->News_Model->News_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->helper('url');
		$id = $this->uri->segment(3, 0);
		$view=$this->Project_Model->get_project_details($id);
		 //echo $this->db->last_query();
		 $data['is_feature']  = true;
		$data['details']=$view;
		$this->load->view('frontend/includes/template', $data);
		 
			
	}//end  projects details function
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
