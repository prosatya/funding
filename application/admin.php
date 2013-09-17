<?php 
/**********************************************************************************************
 * Filename       : Admin
 * Database       : Zoobny
 * Creation Date  : 29 march 2011
 * Author         : Manish Gautam
 * Description    : The file is controller file for admin.
*********************************************************************************************/	
class Admin extends CI_Controller 
{
	var $data=array();//Public variable to pass with each view
   
	// Constructor
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation','pagination','Session','email'));  // load library classes
		$this->load->library('email');
		$this->load->model(array('admin_common','admin_security','admin_rules','utility')); // load model  	
		$this->data['basepath']=$this->config->item('base_url');//assigning base path
		
		
	}
	
	
	// Default function which will show login page if admin is not logged in and home page if admin is logged in
	function index()
	{
		$this->admin_security->check_no_admin_login();
	   $this->load->view('admin/login',$this->data);		
	}
	
	// To log the admin into the system
	function login()
	{	
		 
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
	
	
	// To view list of user
	function user_details()
	{
		 
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
	
	
	// To edit User for admin home page
	function edit_category()
	{
		 
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
				$category=$this->input->post('category_name');
				$password=$this->input->post('description');
				if($user!='')
				{
					$update_values=array(     
										'category_name' => $this->input->post('category_name'),
										'description' => $this->input->post('description'),
										'is_active' => $this->input->post('is_active')
																		
									);
                     // Saving in DB
					$this->db->where("id = ".$this->data['category_id']);
					$this->db->update('category',$update_values);
					// Redirect with success mesage
					$this->session->set_flashdata('flash_success','Profile has been updated successfully.');
					redirect(base_url()."admin/category_details");
				}
				
			}
		}
		$this->load->view('admin/edit_category_details',$this->data);
	}//end of edit_category function
	
	// To edit User for admin home page
	function edit_user()
	{
		 
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
	
	//this function shows user details 
	function details()
	{
		 
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
	

// To let admin log out from the system
	function logout()
	{
		$this->session->sess_destroy(); //destroy session
		redirect($this->config->item('base_url').'admin'); //redirect to login page
	}//end of admin logout function
	
	//this function user for change user status 1 active 0 for deactive 
	function change_status()
	{
		// Load required model
		$this->load->model('admin_security');
		// To verify that admin is logged in
		$this->admin_security->check_admin_login();
		// Checking if having id in url
		if($status=$this->uri->segment(3))
		{
			$status=explode('-',$status);
			$id=$status[0];
			$status=$status[1]=='activate' ? 1 : 0;
			$this->admin_security->change_st_user($id, $status);
			if($status==1)
				echo "<img title='Click here to deactive this user.' style='cursor:pointer;' onclick='change_status($id,\"deactivate\");' src='public/admin/images/ico4.png' border='0' />";
			else
			echo "<img title='Click here to activate this user.' style='cursor:pointer;' onclick='change_status($id,\"activate\");' src='public/admin/images/ico5.png' border='0' />";
		}
	}// end for change status function
	
	function manage_content()
	{
		$this->data['pagename'] = "CMS";    // used to assign title
		$pagename=$this->uri->segment(3);   // used to assign page name  
		$this->data['page_name']=$pagename; // used to assign  page name 
		$this->data['page_title']='';       // used to assign  static page title
		$this->data['page_keywords']='';    // used to assign static page keyword
		$this->data['page_description']=''; // used to assign static page secription
		$this->data['page_content']='';     // used to assign  static page content
		$this->data['active']='Yes';        // used to assign static page activation
		$this->data['msg']='';              // used to assign message 
		if($_POST)
		{
			$pagename=$_POST['page_name'];
			$this->db->where('page_name',$pagename); //where condition for query				
			$total =$this->db->count_all_results('pages'); //				           
			//if total result is empty  
			
			//fetch the value with respect to pagename 
			$config = array(
				array(
					 'field'   => 'page_name',
					 'label'   => 'page name',
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
					'field'   => 'page_description',
					'label'   => 'page description',
					'rules'   => 'trim|required'
					)
				  		   
			);// Check Form Validation
			
			$this->form_validation->set_rules($config); 
			$this->form_validation->set_error_delimiters('<div id="error1">', '</div>');
			if($this->form_validation->run() == FALSE) //Checks whether the form is properly sent
			{ 	
					$this->data['error']=1;
				 		 //If validation fails load the Sign up
			}
			elseif(empty($total))
			{
					$insert_values=array('page_name' => trim($_POST['page_name']),
										 'page_content' => trim($_POST['page_content']),
										 'page_title' => trim($_POST['page_title']), 
										 'page_description' => trim($_POST['page_description']),
										 'page_keywords' => trim($_POST['page_keywords']),
										 'active' => trim($_POST['active'])
										);						
					$this->db->insert('pages',$insert_values);//insert query
					$this->data['msg']=1; //set message variable 
			}
			else
			{               
					//array of updated values
					$update_values=array('page_content' => trim($_POST['page_content']),
					                     'page_title' => trim($_POST['page_title']),
										 'page_description' => trim($_POST['page_description']),
										 'page_keywords' => trim($_POST['page_keywords']),
										 'active' => trim($_POST['active'])
										);	
					$this->db->where('page_name',$pagename); //where condition for update query
					$this->db->update('pages',$update_values);//update query
					$this->data['msg']=1; //set message variable
			}
		}
		if(!empty($pagename)) // if admin select a page for edit 
		{
				//select the values of page 
			$this->db->where('page_name',$pagename);
			$query=$this->db->get('pages');				 
			//if number of result row is greater than 1
			if($query->num_rows() >=1)
			{
				$row=$query->row();
				$this->data['page_name']=$row->page_name;               //set page name 
				$this->data['page_title']=$row->page_title;             //set page title
				$this->data['page_keywords']=$row->page_keywords;       //set page keyword
				$this->data['page_description']=$row->page_description; //set page discription
				$this->data['page_content']=$row->page_content;         //set page content
				$this->data['active']=$row->active;                     //set status
			}	
		}
		$this->load->view('admin_cms',$this->data);            //load view page 
	}//end of manage content function
	
	function  change_password()
	{
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
	
	//this function user for show particular book details.

	function deleteuser()
	{
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
	
	
	
	// To view list of category
	function category_details()
	{
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
	
	function deletecategory()
	{
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
	
	
}//end admin class

?>