<?php  

class Welcome extends CI_Controller {
	var $data=array();//Public variable to pass with each view
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','pagination','session'));  // load library classes
		$this->load->library('email');
		$this->data['basepath']=$this->config->item('base_url');//assigning base path
	}

	function index()
	{
		echo 'Mnaihs';
		$this->load->helper('url');
		$this->load->view('welcome_message',$this->data);
		 
	}
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
