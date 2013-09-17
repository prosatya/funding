<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*************************************************
## @ Package Firebird
## Main Controller
## From V 1.0
*************************************************/

class Main extends CI_Controller {

	public function index(){
		$data = array();
		$data['main_content'] ='frontend/home';
		$data['meta_title']  = 'Firebird International';
		$data['is_home']  = true;
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
		$this->load->view('frontend/includes/template', $data);
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */