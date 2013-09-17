<?php
/*********************************
## @Package Firebird
## From V 1.0
## Template File
## Include Header, Footer and Sidebar
********************************/
	

$this->load->view('frontend/includes/header');
if(isset($is_home)){
$this->load->view('frontend/includes/slider');
}
$this->load->view('frontend/includes/sidebar');
$this->load->view($main_content);
$this->load->view('frontend/includes/footer');
