<?php 
/**********************************************************************************************
 * Filename       : Admin
 * Database       : meeting
 * Creation Date  : 23 march 2013
 * Author         : S Patidar (spatidar@matictechnology.com)
 * Description    : The file is controller file for admin section.
*********************************************************************************************/	
class Admin extends CI_Controller 
{
	var $data=array();//Public variable to pass with each view
   // Constructor
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','pagination','Session','email'));  // load library classes
		$this->load->library('email');
		$this->load->model(array('admin_common','admin_security','admin_rules','utility','image')); // load model  	
		$this->data['basepath']=$this->config->item('base_url');//assigning base path
		
		
	}
	
	// Default function which will show login page if admin is not logged in and home page if admin is logged in
	function index() {
		$this->admin_security->check_no_admin_login();
	   $this->load->view('admin/login',$this->data);		
	}
	
	// To log the admin into the system
	function login() {	
		 
		$this->admin_security->check_no_admin_login();
		// Process the inputs if form is posted
		if($_POST)
		{			
			// To avoid mysql injection
			$this->admin_security->avoid_mysql_injection();
			// Setting validation rules
			$this->form_validation->set_rules($this->admin_rules->login());
			$this->form_validation->set_error_delimiters('<div class="er">', '</div>');	 //provide div to show message 	
			// Continue authentication if form is valid
			if($this->form_validation->run() == FALSE)
			{ 					
				$this->data['error']=1;
			}
			else
			{
				// make sessions and redirect to home page if admin is authenticated
				if($admin_id=$this->admin_security->authenticate_admin($_POST['username'],md5($_POST['password'])))
				{
					// Set session data
					$this->session->set_userdata('admin_id', $admin_id);
					redirect(base_url().'admin/dashboard');
				}
				else
				{
					// Assign error message
					$this->data['err_msg_invalid'] = 'Invalid username or password.';
				}
			}
		}
		// Load login page
		$this->load->view('admin/login',$this->data);
	}// end login
	
	function dashboard() {
		$this->admin_security->check_admin_login(TRUE);
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		$total=$this->admin_security->total_user(); 
		 
		$this->data['total']=$total;
		$total_active=$this->admin_security->total_user_active();
		$this->data['total_active']=$total_active;
		$total_deactive=$this->admin_security->total_user_deactive();
		$this->data['total_deactive']=$total_deactive;
		$total_company=$this->admin_security->total_user_company();
		$this->data['total_company']=$total_company;
		$total_investore=$this->admin_security->total_user_investor();
		$this->data['total_investore']=$total_investore;
		
		$total_user_company_active=$this->admin_security->total_user_company_active();
		$this->data['total_user_company_active']=$total_user_company_active;
		
		$total_user_company_deactive=$this->admin_security->total_user_company_deactive();
		$this->data['total_user_company_deactive']=$total_user_company_deactive;
		
		$total_user_investor_active=$this->admin_security->total_user_investor_active();
		$this->data['total_user_investor_active']=$total_user_investor_active;
		
		$total_user_investor_deactive=$this->admin_security->total_user_investor_deactive();
		$this->data['total_user_investor_deactive']=$total_user_investor_deactive;
		
		$this->load->view('admin/admin_welcome',$this->data);
	}
	
	// To view list of projects
	function project_details() {
		 
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'title';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['title']=$this->input->post('title') ? $this->input->post('title') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->project_list($this->data['title']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->project_list($this->data['title'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		
		$this->load->view('admin/project_details',$this->data);
	}//end user details functions
	
	//For Project list
	function user_details() {
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'user_name';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['user_name']=$this->input->post('user_name') ? $this->input->post('user_name') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->user_list($this->data['user_name']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->user_list($this->data['user_name'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		
		$this->load->view('admin/user_details',$this->data);
	}//end user details functions
	
	
	//For Contact us list
	function contactus_details() {
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'cname';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['cname']=$this->input->post('cname') ? $this->input->post('cname') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->contact_list($this->data['cname']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->contact_list($this->data['cname'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		
		$this->load->view('admin/contact_details',$this->data);
	}//end user details functions
	
	// To edit User for admin home page 
	function edit_category() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['category_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getCategory($this->data['category_id']);
		else
			redirect(base_url()."admin");
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'category_name',
					 'label'   => 'category',
					 'rules'   => 'trim|required|min_length[2]|max_length[250]'
				  ),
				   array(
					 'field'   => 'description',
					 'label'   => 'description',
					 'rules'   => 'trim'
				  )
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					$this->data['error']=1;
				 	$this->load->view('admin/edit_category_details',$this->data);		 				                    //If validation fails load the Sign up
			}
			else
			{
				if($this->input->post('category_name')!='')
				{
					$update_values=array(     
										'category_name' => $this->input->post('category_name'),
										'description' => $this->input->post('description'),
										'status' => $this->input->post('status')
																		
									);
                     // Saving in DB
					$this->db->where("id = ".$this->data['category_id']);
					$this->db->update('category',$update_values);
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Category has been updated successfully.');
					redirect(base_url()."admin/category_details");
				}
				
			}
		}
		$this->load->view('admin/edit_category_details',$this->data);
	}//end of edit_category function
	
	// To edit User for admin home page
	function edit_user() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['user_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getUser($this->data['user_id']);
		else
			redirect(base_url()."admin");
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'user_name',
					 'label'   => 'username',
					 'rules'   => 'trim|required|min_length[2]|max_length[50]'
				  ),
				   array(
					 'field'   => 'user_email',
					 'label'   => 'email',
					 'rules'   => 'trim|valid_email'
				  )
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/edit_user_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$user=$this->input->post('user_name');
				$password=$this->input->post('user_password');
				if($user!='')
				{
					$update_values=array(     
										'user_name' => $this->input->post('user_name'),
										'user_email' => $this->input->post('user_email'),
										'status' => $this->input->post('status'),
										'user_type' => $this->input->post('user_type')
																		
									);
                     // Saving in DB
					$this->db->where("id = ".$this->data['user_id']);
					$this->db->update('user',$update_values);
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Profile has been updated successfully.');
					redirect(base_url()."admin/user_details");
				}
				
			}
		}
		$this->load->view('admin/edit_user_detail',$this->data);
	}//end of edit_user function
	
	// To edit Projects for admin home page
	function edit_project() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['project_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->getProject($this->data['project_id']);
			$rows1=$this->data['row1']=$this->admin_security->total_name();
			 
		}
		else
			redirect(base_url()."admin");
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'title',
					 'label'   => 'project title',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'slug',
					 'label'   => 'slug',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'description',
					 'label'   => 'description',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'author',
					 'label'   => 'author',
					 'rules'   => 'trim|required'
				  ),
				    
				   array(
					 'field'   => 'status',
					 'label'   => 'status',
					 'rules'   => 'trim|required'
				  ) 
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/edit_project_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$title= $this->input->post('title');
				if($title!='')
				{
					$update_values=array(     
										'title' => $this->input->post('title'),
										'slug' => $this->input->post('slug'),
										'description' => $this->input->post('description'),
										'author' => $this->input->post('author'),
										 
										'status' => $this->input->post('status')
					);
					
					
                     // Saving in DB
					$this->db->where("id = ".$this->data['project_id']);
					$this->db->update('projects',$update_values);
					 
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Project has been updated successfully.');
					redirect(base_url()."admin/project_details");
				}
				
			}
		} else {
			$this->load->view('admin/edit_project_detail',$this->data);
		}
	}//end of edit_user function
	
	// To add Projects for admin home page
	function add_project() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		$rows1=$this->data['row1']=$this->admin_security->total_name();
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'title',
					 'label'   => 'project title',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'slug',
					 'label'   => 'slug',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'description',
					 'label'   => 'description',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'author',
					 'label'   => 'author',
					 'rules'   => 'trim|required'
				  ),
				    
				   array(
					 'field'   => 'status',
					 'label'   => 'status',
					 'rules'   => 'trim|required'
				  ) 
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/add_project_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$title= $this->input->post('title');
				if($title!='')
				{
					
					if(isset($_FILES['imgFile']['tmp_name']) && !empty($_FILES['imgFile']['tmp_name'])) {
						$day=date('His');
						$day1=date('is');
						$flag=0;
						$this->load->library('upload'); 
						if($_FILES['imgFile']['name']) {
							//save image image folder name on server 
							$this->image->upload_path="upload_img/";
							$config['upload_path'] = 'upload_img/';
							//image file format
							$config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
							//$config['allowed_types'] = '';
							$this->upload->initialize($config);	
							$this->upload->do_upload('imgFile');
							$fileDetail=$this->upload->data();
							$sImgFile='upload_img/'.$fileDetail['file_name'];  
							$newfilename1='upload_img/'.$day.$fileDetail['file_name'];
							$newfilename12='upload_img/thumb/'.$day.$fileDetail['file_name'];
							
							 
							//echo '<br><br>';
							$project_img=$day.$fileDetail['file_name'];
							//create image thubnail 110X110 or less
							$this->admin_security->CreateThumbnail($sImgFile, $newfilename1, 110, 110);
							//create image thubnail 210X150 or less
							$this->admin_security->CreateThumbnail_210_150($sImgFile, $newfilename12, 210, 150);
							//$insert_values['imgFile']=$project_img;			
						}
						
					}
					
					if(isset($_FILES['doc']['tmp_name']) && !empty($_FILES['doc']['tmp_name']))
					{
						$day=date('His');
						$day1=date('is');
						$flag=0;
						
						if($_FILES['doc']['name']) {
							//save image image folder name on server 
							$this->image->upload_path="upload_doc/";
							$config['upload_path'] = 'upload_doc/';
							//image file format
							$config['allowed_types'] = '*';
							
							$this->upload->initialize($config);	
							$this->upload->do_upload('doc');
							$fileDetail=$this->upload->data();
							
							$sImgFile='upload_doc/'.$fileDetail['file_name'];
							$newfilename1='upload_doc/'.$day.$fileDetail['file_name'];
							$newfilename12='upload_doc/big_'.$day.$fileDetail['file_name'];
							//print_r($fileDetail);
							//echo '<br><br>';
							$doc=$day.$fileDetail['file_name'];
						}
						
					}
					$date=date('Y-m-d H:i:s');
					$insert_values=array(     
										'title' => $this->input->post('title'),
										'slug' => $this->input->post('slug'),
										'description' => $this->input->post('description'),
										'author' => $this->input->post('author'),
										'status' => $this->input->post('status'),
										'docFile'=>$doc,
										'imgFile'=>$project_img,
										'date'=>$date
					);
					
					 
                     // Saving in DB
					$this->db->insert('projects',$insert_values);//insert query
					 
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Project has been updated successfully.');
					redirect(base_url()."admin/project_details");
				}
				
			}
		} else {
			$this->load->view('admin/add_project_detail',$this->data);
		}
	}//end of edit_user function
	
	// To add Projects for admin home page
	function add_category() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		$rows1=$this->data['row1']=$this->admin_security->total_name();
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'category_name',
					 'label'   => 'Category Name',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'description',
					 'label'   => 'description',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'status',
					 'label'   => 'status',
					 'rules'   => 'trim|required'
				  ) 
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/add_category_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$category_name= $this->input->post('category_name');
				if($category_name!='')
				{
					
					
					$date=date('Y-m-d H:i:s');
					$insert_values=array(     
										'category_name' => $this->input->post('category_name'),
										'description' => $this->input->post('description'),
										'status' => $this->input->post('status'),
										'date'=>$date
					);
					
					 
                     // Saving in DB
					$this->db->insert('category',$insert_values);//insert query
					 
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Category has been updated successfully.');
					redirect(base_url()."admin/category_details");
				}
				
			}
		} else {
			$this->load->view('admin/add_category_detail',$this->data);
		}
	}//end of edit_user function
	
	//this function shows user details 
	function details() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['user_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getUser($this->data['user_id']);
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_user_detail',$this->data);
	}//end od user details function
	
	//this function shows company details 
	function company_view() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['com_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getCompany($this->data['com_id']);
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_company_detail',$this->data);
	}//end od user details function
	
	//this function shows investor details 
	function investor_view() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['com_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getInvestor($this->data['com_id']);
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_investor_detail',$this->data);
	}//end od user details function
	
	//this function shows user details 
	function contact_view() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['c_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getContact($this->data['c_id']);
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_contact',$this->data);
	}//end od user details function
	
	//this function shows project details 
	function view_project() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['p_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->getProject($this->data['p_id']);
			 
		}
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_project',$this->data);
	}//end  projects details function
	
	// To let admin log out from the system
	function logout() {
		$this->session->sess_destroy(); //destroy session
		redirect($this->config->item('base_url').'admin'); //redirect to login page
	}//end of admin logout function
	
	//this function shows category details 
	function view_category() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['p_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->getCategory($this->data['p_id']);
			 
		}
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_category',$this->data);
	}//end  projects details function
	
	//this function user for change user status 1 active 0 for deactive 
	function change_status() {
		// Load required model
		$this->load->model('admin_security');
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// Checking if having id in url
		if($status=$this->uri->segment(3))
		{
			if($table=$this->uri->segment(4))
			{
				$table=explode('/',$table);	
				$table=$table[0];
			}
			$status=explode('-',$status);
			
			$id=$status[0];
			$status=$status[1]=='activate' ? 1 : 0;
			$this->admin_security->change_st_user($id, $status,$table);
			if($status==1)
				echo "<img title='Click here to deactive this user.' style='cursor:pointer;' onclick='change_status($id,\"deactivate\",\"$table\");' src='public/admin/images/ico4.png' border='0' />";
			else
			echo "<img title='Click here to activate this user.' style='cursor:pointer;' onclick='change_status($id,\"activate\",\"$table\");' src='public/admin/images/ico5.png' border='0' />";
		}
	}// end for change status function
	
	//this function user for change user status 1 active 0 for deactive 
	function change_publish() {
		// Load required model
		$this->load->model('admin_security');
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// Checking if having id in url
		if($status=$this->uri->segment(3))
		{
			if($table=$this->uri->segment(4))
			{
				$table=explode('/',$table);	
				$table=$table[0];
			}
			$status=explode('-',$status);
			
			$id=$status[0];
			$status=$status[1]=='activate' ? 1 : 0;
			$this->admin_security->change_publish($id, $status,$table);
			if($status==1)
				echo "<img title='Click here to deactive this publish.' style='cursor:pointer;' onclick='change_publish($id,\"deactivate\",\"$table\");' src='public/admin/images/yes.png' border='0' />";
			else
			echo "<img title='Click here to activate this publish.' style='cursor:pointer;' onclick='change_publish($id,\"activate\",\"$table\");' src='public/admin/images/no.png' border='0' />";
		}
	}// end for change status function
	
	//this function admin for change passwords 
	function change_password() {
			$this->admin_security->check_admin_login(TRUE);
			$id= $this->session->userdata('admin_id');
			foreach($id as $admin_details)
			{
				$admin_id=$admin_details->admin_id;
			}
			$this->data['admin_id']=$admin_id;
			if($_POST)
			{
				$config = array(
					array(
						 'field'   => 'admin_login',
						 'label'   => 'current password',
						 'rules'   => 'trim|required'
					  ),
					  array(
						 'field'   => 'admin_password',
						 'label'   => 'new password',
						 'rules'   => 'trim|required'
					  ),
					 array(
						 'field'   => 'admin_password_retype',
						 'label'   => 'retype password',
						 'rules'   => 'trim|required|matches[admin_password]'
					  )
					);
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<div id="error-msg">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					$this->data['error']=1;
				 //If validation fails load the Sign up
			}
			else
			{	  
					$row=$this->admin_common->getAdmin($this->data['admin_id']);	
					if($row->admin_password == $this->input->post('admin_login'))
					{
					$upadate_password=array(     
										'admin_password' => $this->input->post('admin_password')
									);
						 // Saving in DB
						$this->db->where("admin_id = ".$this->data['admin_id']);
						$this->db->update('tbl_admin',$upadate_password);
						$this->session->set_flashdata('flash_success','Password has been changed successfully.');
						redirect($this->config->item('base_url').'admin/change_password'); //redirect to login page
					}
					else
					{
						$this->data['err_msg']='Please enter valid password.';
					}			
			} 
		}
		$this->load->view('admin_change_password',$this->data);
	}// End of Change_password Function
	
	//this function user for delete user.
	function deleteuser() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deleteuser($ids[0]);
			$this->session->set_flashdata('flash_success','User has been deleted successfully.');
			redirect(base_url().'admin/user_details/');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	//this function user for delete Company.
	function deletecompany() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deletecomp($ids[0]);
			$this->session->set_flashdata('flash_success','Company has been deleted successfully.');
			redirect(base_url().'admin/company_details');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	//this function user for delete Investor.
	function deleteinvestor() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deleteinvestor($ids[0]);
			$this->session->set_flashdata('flash_success','Investor has been deleted successfully.');
			redirect(base_url().'admin/investor_details');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	//this function contact for delete contact.
	function deletecontact() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deletecontact($ids[0]);
			$this->session->set_flashdata('flash_success','Contact has been deleted successfully.');
			redirect(base_url().'admin/contactus_details');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	
	//this function user for delete projects.
	function deleteproject() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deleteproject($ids[0]);
			$this->session->set_flashdata('flash_success','Project has been deleted successfully.');
			redirect(base_url().'admin/project_details');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	// To view list of category
	function category_details() {
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'category_name';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['category_name']=$this->input->post('category_name') ? $this->input->post('category_name') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->user_list($this->data['category_name']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->category_list($this->data['category_name'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		
		$this->load->view('admin/category_details',$this->data);
	}//end user details functions
	
	// To view list of company
	function company_details() {
		//echo $this->input->post('page'); die;
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'company_name';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['company_name']=$this->input->post('company_name') ? $this->input->post('company_name') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->company_list($this->data['company_name']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->company_list($this->data['company_name'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		$this->load->view('admin/company_details',$this->data);
	}//end user details functions
	
	// To view list of investor
	function investor_details() {
		//echo $this->input->post('page'); die;
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'company';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['company']=$this->input->post('company') ? $this->input->post('company') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->investor_list($this->data['company']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->investor_list($this->data['company'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		$this->load->view('admin/investor_details',$this->data);
	}//end user details functions
	
	
	// To edit Company for admin home page
	function edit_company() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['comp_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getCompany($this->data['comp_id']);
		else
			redirect(base_url()."admin");
		if(isset($_POST['sub']))
		{
			$user=$this->input->post('introduction_for_investors');
			 
			if($user!='') {
				$update_values=array(     
					'introduction_for_investors' => $this->input->post('introduction_for_investors'),
					'company_name' => $this->input->post('company_name'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'title' => $this->input->post('title'),
					'type' => $this->input->post('type'),
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'country' => $this->input->post('country'),
					'zipcode' => $this->input->post('zipcode'),
					'phone' => $this->input->post('phone'),
					'email1' => $this->input->post('email1'),
					'email2' => $this->input->post('email2'),
					'company_url' => $this->input->post('company_url'),
					'facebook_url_personal' => $this->input->post('facebook_url_personal'),
					'facebook_url_company' => $this->input->post('facebook_url_company'),
					'vkontekte_address_personal' => $this->input->post('vkontekte_address_personal'),
					'vkontekte_address_company' => $this->input->post('vkontekte_address_company'),
					'odnoklassniki_address_personal' => $this->input->post('odnoklassniki_address_personal'),
					'odnoklassniki_address_company' => $this->input->post('odnoklassniki_address_company'),
					'linkedin_url' => $this->input->post('linkedin_url'),
					'twitter' => $this->input->post('twitter'),
					'status' => $this->input->post('status'),
					'company_details' => $this->input->post('company_details'),
					
					
					'min_amount_requested' => $this->input->post('min_amount_requested'),
					'investment_towards' => $this->input->post('investment_towards'),
					'interested_in_incrowdsourcing' => $this->input->post('interested_in_incrowdsourcing'),
					'interested_in_bd' => $this->input->post('interested_in_bd'),
					
					'strategy_details' => $this->input->post('strategy_details'),
					'current_valuation' => $this->input->post('current_valuation'),
					'ideal_investor' => $this->input->post('ideal_investor'),
					'investor_preference' => $this->input->post('investor_preference'),
				 	'short_term_goals' => $this->input->post('short_term_goals'),
					
					'feedback_text' => $this->input->post('feedback_text'),
					'major_assets' => $this->input->post('major_assets'),
					'companies_you_emulate' => $this->input->post('companies_you_emulate'),
					
					'competitors' => $this->input->post('competitors'),
					'companies_you_emulate' => $this->input->post('companies_you_emulate'),
					'market_research' => $this->input->post('market_research')
					
					
													
									);
									
									 
                     // Saving in DB
					$this->db->where("id = ".$this->data['comp_id']);
					$this->db->update('company_registration',$update_values);
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Company has been updated successfully.');
					redirect(base_url()."admin/company_details");
				}
				
			 
		}
		$this->load->view('admin/edit_company_detail',$this->data);
	}//end of edit_user function
	
	// To edit Investor for admin home page
	function edit_investor() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['invest_id']=$this->uri->segment(3))
			// Fetching user details
			$this->data['row']=$this->admin_security->getInvestor($this->data['invest_id']);
		else
			redirect(base_url()."admin");
			
		
		$this->load->view('admin/edit_investor_detail',$this->data);
	}//end of edit_user function
	
	//this function user for delete category.
	function deletecategory() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deletecategory($ids[0]);
			$this->session->set_flashdata('flash_success','Category has been deleted successfully.');
			redirect(base_url().'admin/category_details/');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	//For Pages list
	function page_list() {
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'id';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['page_name']=$this->input->post('page_name') ? $this->input->post('page_name') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->page_list($this->data['page_name']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->page_list($this->data['page_name'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		
		$this->load->view('admin/page_details',$this->data);
	}//end page details functions
	
	//this function shows pages details 
	function view_page() {
		 
			// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['page_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->getPages($this->data['page_id']);
			 
		}
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_page',$this->data);
	}//end  projects details function
	
	// To edit Projects for admin home page
	function edit_page() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['page_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->getPages($this->data['page_id']);
			 
			 
		}
		else
			redirect(base_url()."admin");
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'page_name',
					 'label'   => 'project name',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_heading',
					 'label'   => 'page heading',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_desc',
					 'label'   => 'description',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_title',
					 'label'   => 'page title',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_keywords',
					 'label'   => 'page keywords',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_meta',
					 'label'   => 'page meta',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'publish',
					 'label'   => 'publish',
					 'rules'   => 'trim|required'
				  ),
				    
				   array(
					 'field'   => 'status',
					 'label'   => 'status',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_slug',
					 'label'   => 'page slug',
					 'rules'   => 'trim|required'
				  )
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/edit_page_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$title= $this->input->post('page_title');
				if($title!='')
				{
					$update_values=array(     
										'page_title' => $this->input->post('page_title'),
										'page_name' => $this->input->post('page_name'),
										'page_slug' => $this->input->post('page_slug'),
										'page_heading' => $this->input->post('page_heading'),
										'page_desc' => $this->input->post('page_desc'),
										'page_keywords' => $this->input->post('page_keywords'),
										 'page_meta' => $this->input->post('page_meta'),
										 'publish' => $this->input->post('publish'),
										'status' => $this->input->post('status'),
										'page_slug'=> $this->input->post('page_slug')
					);
					
					
                     // Saving in DB
					$this->db->where("id = ".$this->data['page_id']);
					$this->db->update('pages',$update_values);
					 
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Page has been updated successfully.');
					redirect(base_url()."admin/page_list");
				}
				
			}
		} else {
			$this->load->view('admin/edit_page_detail',$this->data);
		}
	}//end of edit_user function
	
	// To edit Projects for admin home page
	function add_page() {
		 
		// To verify admin is logged in
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		$this->data['row']=$this->admin_security->getPages(1);
		
		if($_POST)
		{
			 
				$config = array(
				array(
					 'field'   => 'page_name',
					 'label'   => 'project name',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_heading',
					 'label'   => 'page heading',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_desc',
					 'label'   => 'description',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_title',
					 'label'   => 'page title',
					 'rules'   => 'trim|required'
				  ),
				   array(
					 'field'   => 'page_keywords',
					 'label'   => 'page keywords',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_meta',
					 'label'   => 'page meta',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'publish',
					 'label'   => 'publish',
					 'rules'   => 'trim|required'
				  ),
				    
				   array(
					 'field'   => 'status',
					 'label'   => 'status',
					 'rules'   => 'trim|required'
				  ),
				  array(
					 'field'   => 'page_slug',
					 'label'   => 'page slug',
					 'rules'   => 'trim|required|check_unique[pages.page_slug]'
				  )
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<td><div class="error-left"></div><div class="error-inner">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					 
					$this->data['error']=1;
				 	$this->load->view('admin/add_page_detail',$this->data);		 //If validation fails load the Sign up
			}
			else
			{
				$title= $this->input->post('page_title');
				if($title!='')
				{
					$insert_values=array(     
										'page_title' => $this->input->post('page_title'),
										'page_name' => $this->input->post('page_name'),
										'page_heading' => $this->input->post('page_heading'),
										'page_desc' => $this->input->post('page_desc'),
										'page_keywords' => $this->input->post('page_keywords'),
										 'page_meta' => $this->input->post('page_meta'),
										 'publish' => $this->input->post('publish'),
										'status' => $this->input->post('status'),
										'page_slug'=> $this->input->post('page_slug')
					);
					
					
                     // Saving in DB
					 
					$this->db->insert('pages',$insert_values);//insert query
					 
					 
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Page has been added successfully.');
					redirect(base_url()."admin/page_list");
				}
				
			}
		} else {
			$this->load->view('admin/add_page_detail',$this->data);
		}
	}//end of edit_user function
	
	//this function user for delete projects.
	function deletepage() {
		if($this->uri->segment(3))
		{
			$ids=explode('_',$this->uri->segment(3));
			
			$id=$this->uri->segment(3);
			$this->admin_security->deletepage($ids[0]);
			$this->session->set_flashdata('flash_success','Page has been deleted successfully.');
			redirect(base_url().'admin/page_list');
		}
		//$this->load->view('admin_welcome',$this->data);
	}
	
	 function add_event() {
		$this->admin_security->check_admin_login(TRUE);
		$api_key='99f12847fbb99dea135ce3eb1edbfc719f28ab81';
		$this->load->helper('url');
		if($_POST) {
		//extract data from the post
			extract($_POST);
			//set POST variables
			$url = 'https://api.clickmeeting.com/v1/conferences/?';
			$fields = array(
					'api_key'=>urlencode($api_key),				
					'name'=>urlencode($_POST['name']),
					'room_type'=>urlencode('meeting'),
					'permanent_room'=>urlencode($_POST['permanent_room']),
					'access_type'=>urlencode($_POST['access_type']),
					'description'=>urlencode($_POST['description']),
					'starts_at'=>urlencode($_POST['starts_at']),
					'duration'=>urlencode($_POST['duration'])
				);
	
			$fields_string='';
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string,'&');
			//print_r($fields_string); die;
			$ch = curl_init();
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			    
			//execute post
			$result = curl_exec($ch);
			//close connection
			curl_close($ch);
			//$data=unserialize($result);	
			$data = json_decode($result,true);
			if(!empty($data['code'])) {
				'Please Try Again';	
			} else {
				
				 if(isset($data['room']['id']) && !empty($data['room']['id'])) {
				   $insert_values['click_id']=$data['room']['id'];
				 }
				 if(isset($data['room']['room_type']) && !empty($data['room']['room_type'])) {
				   $insert_values['room_type']=$data['room']['room_type'];
				 }
				 if(isset($data['room']['room_pin']) && !empty($data['room']['room_pin'])) {
				   $insert_values['room_pin']=$data['room']['room_pin'];
				 }
				 if(isset($data['room']['name']) && !empty($data['room']['name'])) {
				   $insert_values['name']=$data['room']['name'];
				 }
				 if(isset($data['room']['name_url']) && !empty($data['room']['name_url'])) {
				   $insert_values['name_url']=$data['room']['name_url'];
				 } 
				 if(isset($data['room']['starts_at']) && !empty($data['room']['starts_at'])) {
				   $insert_values['starts_at']=$data['room']['starts_at'];
				 } 
				 if(isset($data['room']['ends_at']) && !empty($data['room']['ends_at'])) {
				   $insert_values['ends_at']=$data['room']['ends_at'];
				 } 
				 if(isset($data['room']['description']) && !empty($data['room']['description'])) {
				   $insert_values['description']=$data['room']['description'];
				 } 
				 if(isset($data['room']['access_type']) && !empty($data['room']['access_type'])) {
				   $insert_values['access_type']=$data['room']['access_type'];
				 } 
				 if(isset($data['room']['lobby_enabled']) && !empty($data['room']['lobby_enabled'])) {
				   $insert_values['lobby_enabled']=$data['room']['lobby_enabled'];
				 } 
				 if(isset($data['room']['lobby_description']) && !empty($data['room']['lobby_description'])) {
				   $insert_values['lobby_description']=$data['room']['lobby_description'];
				 } 
				 if(isset($data['room']['status']) && !empty($data['room']['status'])) {
				   $insert_values['status']=$data['room']['status'];
				 } 
				 if(isset($data['room']['created_at']) && !empty($data['room']['created_at'])) {
				   $insert_values['created_at']=$data['room']['created_at'];
				 } 
				 
				if(isset($data['room']['updated_at']) && !empty($data['room']['updated_at'])) {
					 $insert_values['updated_at']=$data['room']['updated_at'];
				 }
				if(isset($data['room']['permanent_room']) && !empty($data['room']['permanent_room'])) {
					 $insert_values['permanent_room']=$data['room']['permanent_room'];
				}
				if(isset($data['room']['ccc']) && !empty($data['room']['ccc'])) {
					 $insert_values['ccc']=$data['room']['ccc'];
				}
				if(isset($data['room']['access_role_hashes']['listener']) && !empty($data['room']['access_role_hashes']['listener'])) {
					 $insert_values['listener']=$data['room']['access_role_hashes']['listener'];
				}
				if(isset($data['room']['access_role_hashes']['presenter']) && !empty($data['room']['access_role_hashes']['presenter'])) {
					 $insert_values['presenter']=$data['room']['access_role_hashes']['presenter'];
				}
				if(isset($data['room']['access_role_hashes']['host']) && !empty($data['room']['access_role_hashes']['host'])) {
					 $insert_values['host']=$data['room']['access_role_hashes']['host'];
				}
				if(isset($data['room']['room_url']) && !empty($data['room']['room_url'])) {
					 $insert_values['room_url']=$data['room']['room_url'];
				}
				if(isset($data['room']['phone_presenter_pin']) && !empty($data['room']['phone_presenter_pin'])) {
					 $insert_values['phone_presenter_pin']=$data['room']['phone_presenter_pin'];
				}
				if(isset($data['room']['phone_listener_pin']) && !empty($data['room']['phone_listener_pin'])) {
					 $insert_values['phone_listener_pin']=$data['room']['phone_listener_pin'];
				}
				if(isset($data['room']['embed_room_url']) && !empty($data['room']['embed_room_url'])) {
					 $insert_values['embed_room_url']=$data['room']['embed_room_url'];
				}
    			$this->db->insert('meeting_room',$insert_values);
				$this->session->set_flashdata('flash_success','Event has been added successfully.');
				 
				redirect(base_url().'admin/event_view');
				
				
			}
			
		
		} else {
		$this->load->view('admin/add_event_detail',$this->data);	
		}
	}
	
	function event_view() {
	// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// To avoid mysql injection
		$this->admin_security->avoid_mysql_injection(FALSE);
		// Getting order by field, setting default if null
		$this->data['orderby']=$this->input->post('orderby') ? $this->input->post('orderby') : 'id';
		// Getting order, setting default if null
		$this->data['order']=$this->input->post('order') ? $this->input->post('order') : 'ASC';
		// Getting offset for pagination, setting default if null
		$this->data['page']=$this->input->post('page') ? $this->input->post('page') : 0;
		// Getting filter keyword to filter the list accordingly
		$this->data['name']=$this->input->post('name') ? $this->input->post('name') : '';
		// Getting category id to filter the list accordingly
		//$this->data['email']=$this->input->post('email') ? $this->input->post('email') : '';
				
		// ---------- pagination block starts ---------- //
		$this->load->library('pagination');
		$config=array();
		$config['total_rows'] = $this->admin_security->event_list($this->data['name']);
		$config['form_name'] = 'record_list';
		$this->pagination->initialize($config);
		// ---------- pagination block ends ---------- //
		$user_data=$this->data['records']=$this->admin_security->event_list($this->data['name'],FALSE,$this->data['orderby'], $this->data['order'],$this->data['page'],$this->pagination->per_page);
		// Assigning total number of records to display in view
		$this->data['total_records']=$config['total_rows'];
		$this->data['statedrop'] = $this->admin_security->getUserName(); 
		//$this->data['citydrop'] = $this->admin_common->getUserEmail();
		$this->load->view('admin/event_details',$this->data);
		 
		
	}
	
	//View Details of meeting
	function event_details() {
		
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		if($this->data['e_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['row']=$this->admin_security->get_meeting_details($this->data['e_id']);
			 
		}
		else
			redirect(base_url()."home");
	
		$this->load->view('admin/view_event',$this->data);
		 
	}
	
	//Edit of meeting
	function edit_event() {
		$this->admin_security->check_admin_login(TRUE);
		// Geting fish id from uri segment 3. If not found, redirect to home
		 
		if($this->data['event_id']=$this->uri->segment(3)) {
			// Fetching user details
			$this->data['edit']=$this->admin_security->edit_event($this->data['event_id']);
			 
			 
		}
		else
			redirect(base_url()."admin");
	 	$api_key='99f12847fbb99dea135ce3eb1edbfc719f28ab81';
		$this->load->helper('url');
		if(isset($_POST['sub'])) {
			 
		//extract data from the post
			extract($_POST);
			//set POST variables
			$room_id= (int)$_POST['room_id'];  
			//echo gettype($room_id); die;
			$api_key=$api_key;
			$url = 'https://api.clickmeeting.com/v1/conferences/'.$room_id.'/?api_key='.$api_key.'&';
			//echo $url;  
			$fields = array(
					'name'=>urlencode($_POST['name']),
					'room_type'=>urlencode('meeting'),
					'permanent_room'=>urlencode($_POST['permanent_room']),
					'access_type'=>urlencode($_POST['access_type']),
					'description'=>urlencode($_POST['description']),
					'starts_at'=>urlencode($_POST['starts_at']),
					'duration'=>urlencode($_POST['duration']),
					'status'=>urlencode($_POST['status'])
			);
	
			$fields_string='';
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string,'&');
			 // print_r($fields_string);  
			  // echo $url; die;
			$ch = curl_init();
			//set the url, number of POST vars, POST data
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_POST,count($fields));
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			    
			//execute post
			$result = curl_exec($ch);
			//close connection
			curl_close($ch);
			//print_r($result); die;
			//$data=unserialize($result);	
			$data = json_decode($result,true);
			//echo 'manish'; 
			//print_r($data); die;
			if(!empty($data['code'])) {
				'Please Try Again';	
			} else {
				
				 if(isset($data['conference']['id']) && !empty($data['room']['id'])) {
				   $insert_values['click_id']=$data['conference']['id'];
				 }
				 if(isset($data['conference']['room_type']) && !empty($data['conference']['room_type'])) {
				   $insert_values['room_type']=$data['conference']['room_type'];
				 }
				 if(isset($data['conference']['room_pin']) && !empty($data['conference']['room_pin'])) {
				   $insert_values['room_pin']=$data['conference']['room_pin'];
				 }
				 if(isset($data['conference']['name']) && !empty($data['conference']['name'])) {
				   $insert_values['name']=$data['conference']['name'];
				 }
				 if(isset($data['conference']['name_url']) && !empty($data['conference']['name_url'])) {
				   $insert_values['name_url']=$data['conference']['name_url'];
				 } 
				 if(isset($data['conference']['starts_at']) && !empty($data['conference']['starts_at'])) {
				   $insert_values['starts_at']=$data['conference']['starts_at'];
				 } 
				 if(isset($data['conference']['ends_at']) && !empty($data['conference']['ends_at'])) {
				   $insert_values['ends_at']=$data['conference']['ends_at'];
				 } 
				 if(isset($data['conference']['description']) && !empty($data['conference']['description'])) {
				   $insert_values['description']=$data['conference']['description'];
				 } 
				 if(isset($data['conference']['access_type']) && !empty($data['conference']['access_type'])) {
				   $insert_values['access_type']=$data['conference']['access_type'];
				 } 
				 if(isset($data['conference']['lobby_enabled']) && !empty($data['conference']['lobby_enabled'])) {
				   $insert_values['lobby_enabled']=$data['conference']['lobby_enabled'];
				 } 
				 if(isset($data['conference']['lobby_description']) && !empty($data['conference']['lobby_description'])) {
				   $insert_values['lobby_description']=$data['conference']['lobby_description'];
				 } 
				 if(isset($data['conference']['status']) && !empty($data['conference']['status'])) {
				   $insert_values['status']=$data['conference']['status'];
				 } 
				 if(isset($data['conference']['created_at']) && !empty($data['conference']['created_at'])) {
				   $insert_values['created_at']=$data['conference']['created_at'];
				 } 
				 
				if(isset($data['conference']['updated_at']) && !empty($data['conference']['updated_at'])) {
					 $insert_values['updated_at']=$data['conference']['updated_at'];
				 }
				if(isset($data['conference']['permanent_room']) && !empty($data['conference']['permanent_room'])) {
					 $insert_values['permanent_room']=$data['conference']['permanent_room'];
				}
				if(isset($data['conference']['ccc']) && !empty($data['conference']['ccc'])) {
					 $insert_values['ccc']=$data['conference']['ccc'];
				}
				if(isset($data['conference']['access_role_hashes']['listener']) && !empty($data['conference']['access_role_hashes']['listener'])) {
					 $insert_values['listener']=$data['conference']['access_role_hashes']['listener'];
				}
				if(isset($data['conference']['access_role_hashes']['presenter']) && !empty($data['conference']['access_role_hashes']['presenter'])) {
					 $insert_values['presenter']=$data['conference']['access_role_hashes']['presenter'];
				}
				if(isset($data['conference']['access_role_hashes']['host']) && !empty($data['conference']['access_role_hashes']['host'])) {
					 $insert_values['host']=$data['conference']['access_role_hashes']['host'];
				}
				if(isset($data['conference']['room_url']) && !empty($data['conference']['room_url'])) {
					 $insert_values['room_url']=$data['conference']['room_url'];
				}
				if(isset($data['conference']['phone_presenter_pin']) && !empty($data['conference']['phone_presenter_pin'])) {
					 $insert_values['phone_presenter_pin']=$data['conference']['phone_presenter_pin'];
				}
				if(isset($data['conference']['phone_listener_pin']) && !empty($data['conference']['phone_listener_pin'])) {
					 $insert_values['phone_listener_pin']=$data['conference']['phone_listener_pin'];
				}
				if(isset($data['conference']['embed_room_url']) && !empty($data['conference']['embed_room_url'])) {
					 $insert_values['embed_room_url']=$data['conference']['embed_room_url'];
				}
    			 
				//print_r($insert_values); die;
				//$this->db->insert('meeting_room',$insert_values);
				$where=$this->db->where('click_id',$room_id);
				$this->db->update('meeting_room',$insert_values); 
				
				$this->session->set_flashdata('flash_success','Event has been updated successfully.');
				redirect(base_url().'admin/event_view');
				 
				
			}
			
		
		} else {
			$this->load->view('admin/edit_event_detail',$this->data);	
		}
	}
	//Delete Meeting
	
	function delete_event() {
		
		$this->load->helper('url');
		$id=$this->uri->segment(3);	 
		$data=$this->admin_security->edit_event($id);
		$this->data['edit']=$data;
		$api_key='99f12847fbb99dea135ce3eb1edbfc719f28ab81';
		$room_id= (int)$id;  
		$api_key=$api_key;
		$url = 'https://api.clickmeeting.com/v1/conferences/'.$room_id.'/?api_key='.$api_key;
		$fields_string='';
		
		$ch = curl_init();
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL,$url);
		 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		//execute post
		$result = curl_exec($ch);
		//close connection
		curl_close($ch);
		
		//$data=unserialize($result);	
		$data = json_decode($result,true);
		if(isset($data['result']) && $data['result']=='OK') {
			$insert_values['is_deleted']=1;
			$where=$this->db->where('click_id',$id);
			$this->db->update('meeting_room',$insert_values); 
			$this->data['message']='Room deleted successfully.';
			$this->session->set_flashdata('flash_success','Event has been deleted successfully.');
			redirect(base_url().'admin/event_view');
		} 
	}
	
	//User invitation
	function invite_user() {
		$this->load->helper('url');
		$id=$this->uri->segment(3);
		$room_data=$this->admin_security->edit_event($id);
		//print_r($room_data); die;
		$this->data['room']=$room_data; 
		$data=$this->admin_security->get_user();
		//print_r($data); die;
		$this->data['user']=$data;
		
		$this->load->view('admin/invite_user',$this->data);
	}
	
	//send mail
	function sendmail() {
		$this->load->helper('url');	
		if($_POST) {
			 
			$mailid='';
			foreach($_POST['user'] as $mail) {
				$mailid.=$mail.',';	
			}
			 
			$id=$_POST['room_id'];
			 $url= $_POST['room_url'];
			 	
			//print_r($room_data); die;
			$mailid=substr($mailid,0,-1);
			$to = $mailid; // $seller_email
			$fromemail = 'spatidar@matictechnology.com'; 
			$subject = 'Live Webinar: Getting Started with ClickMeeting';
			$message ='';
			$message .='Live Webinar: Getting Started with ClickMeeting:'.'<br>';
			$message .= '-------------------------------------'.'<br>';
			$message .= 'Meeting Information:-'.'<br>';
			$message .= 'URL : <a href="'.$url.'">Click Here</a><br>';
			//$message .= 'Time : '.$user_name.'<br>';
			
			$message .= '<p>Warmest Regards,<br/>The Matic Technology Team</p>';
			$this->email->from('spatidar@matictechnology.com', 'Metic Technology');
			$this->email->to('manish4377@gmail.com'); 
			$this->email->bcc($to); 
			$this->email->subject($subject);
			$this->email->message($message); 
		
			$this->email->send();
			$this->session->set_flashdata('flash_success','Mail has been sent successfully.');
			$this->load->view('admin/event_details',$this->data); 
			redirect(base_url().'admin/event_view');
		}
	}
	 
}//end admin class

?>