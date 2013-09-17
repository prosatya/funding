<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class News extends CI_Controller {
	public function index(){
		$data = array();
		$data['main_content'] ='frontend/list_news';
		$data['meta_title']  = 'News List - Firebird International';
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
		//  echo $this->db->last_query();
		
		$this->load->view('frontend/includes/template', $data);
	}
	
	
	//this function shows project details 
	function viewnews() {
		
		$data = array();
		$data['main_content'] ='frontend/view_page';
		$data['meta_title']  = 'View Page Firebird International';
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
		$data['is_news']  = true;
		$this->load->helper('url');
		$id = $this->uri->segment(3, 0);
		$view=$this->News_Model->get_news_details($id);
		// echo $this->db->last_query();
		$data['details']=$view;
		$this->load->view('frontend/includes/template', $data);
		 
			
	}//end  projects details function
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
