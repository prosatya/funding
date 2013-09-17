<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Meeting extends CI_Controller {
	public function index(){
		$data = array();
		$data['main_content'] ='frontend/list_meeting';
		$data['meta_title']  = 'Event List - Firebird International';
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
		$data['is_event']  = true;
		//  echo $this->db->last_query();
		$this->load->model('News_Model');
		$query = $this->News_Model->News_list();
		if($query){
			$data['news'] = $query ; 
		}
		$this->load->view('frontend/includes/template', $data);
	}
	
	
	//this function shows project details 
	function viewevent() {
		
		$data = array();
		$data['main_content'] ='frontend/view_meeting';
		$data['meta_title']  = 'View Event Firebird International';
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
		
		//  echo $this->db->last_query();
		$this->load->model('News_Model');
		$query = $this->News_Model->News_list();
		if($query){
			$data['news'] = $query ; 
		}
		$data['is_event']  = true;
		$this->load->helper('url');
		$id = $this->uri->segment(3, 0);
		$view=$this->Event_Model->get_meeting_details($id);
		$data['details']=$view;
		$this->load->view('frontend/includes/template', $data);
		 
			
	}//end  projects details function
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
