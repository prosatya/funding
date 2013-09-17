<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errorpage extends CI_Controller {

	public function index(){
		
		$data = array();
		$data['main_content'] ='frontend/404';
		$data['meta_title']  = 'Page not Found | Firebird International';
		$this->load->view('frontend/includes/template', $data);
	}

}

/* End of file 404.php */
/* Location: ./application/controllers/404.php */