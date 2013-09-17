<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author	- Ankit Gautam
 * Class used to include all the security functions which can be used any where.
 */
// ------------------------------------------------------------------------
class Admin_security extends CI_Model {
	

	/**
	 * Constructor
	 */	
	function __construct()
	{	
		parent::__construct();
	}
	
	function _strip($res)
	{
		foreach($res as $rk=>$rv)
		foreach($res[$rk] as $k=>$v)
		{
			$res[$rk]->$k=stripslashes($v);
		}
		return $res;
	}
	
	// To check if admin is logged in
	function check_admin_login($redirect=TRUE)
	{	
		if(!$this->session->userdata('admin_id'))
		{
			if($redirect)
			redirect('admin/');
			else
			return FALSE;
		}
		else
		return TRUE;
	}
	// To change fish status
	function change_publish($id, $status,$table)
	{
		 //echo "UPDATE $table SET `is_publish`='".$status."' WHERE `id` = $id"; die;
		// Running query
		$query = $this->db->query("UPDATE $table SET `is_feature`='".$status."' WHERE `id` = $id");
		
		
		// If query executed successfully, return TRUE, else return FALSE
		if($query)
			return TRUE;
		else
			return FALSE;
	}	
	
	
	function authenticate_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_name = "'.$username.'" ');
		$this->db->where('password = "'.$password.'" ');
		$this->db->where('is_admin = 1');
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	// To check if admin is not logged in
	function check_no_admin_login($redirect=TRUE)
	{	
		if($this->session->userdata('admin_id'))
		{
			if($redirect)
			redirect('admin/dashboard');
			else
			return FALSE;
		}
		else
		return TRUE;
	}
	
	
	// To check if admin is not logged in
	function check_no_user_login($redirect=TRUE)
	{	
		if($this->session->userdata('user_id'))
		{
			if($redirect)
			redirect('dashboard');
			else
			return FALSE;
		}
		else
		return TRUE;
	}
	
	
	// To fetch list of users in manage user section
	function user_list($user='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE is_admin=0 and `user`.`user_name`  LIKE '$user%' OR `user`.`user_email` LIKE '$user%'";
		}
		else 
		{
			$condition= "WHERE is_admin=0";	
		}
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`user`.`id`) AS total FROM `user`  $condition");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		//echo "SELECT `user`.* FROM `user` $condition ORDER BY $orderby $order $limit_query"; die;
		$query = $this->db->query("SELECT `user`.* FROM `user` $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	
		// To fetch list of comapny in manage user section
	function company_list($user='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE  `company_registration`.`title`  LIKE '$title%' OR `company_registration`.`slug` LIKE '$title%'";
		}  
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`company_registration`.`id`) AS total FROM `company_registration`");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//select * from projects, user where user.id = projects.author
		 
		// Running query
		 // echo "SELECT `company_registration`.*   FROM company_registration, user  $condition ORDER BY $orderby $order $limit_query";  
		$query = $this->db->query("SELECT `company_registration`.*   FROM company_registration  $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
		// To fetch list of comapny in manage user section
	function investor_list($user='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE  `investor_registration`.`company`  LIKE '$title%' OR `investor_registration`.`title` LIKE '$title%'";
		}  
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`investor_registration`.`id`) AS total FROM `investor_registration`");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//select * from projects, user where user.id = projects.author
		 
		// Running query
		 // echo "SELECT `company_registration`.*   FROM company_registration, user  $condition ORDER BY $orderby $order $limit_query";  
		$query = $this->db->query("SELECT `investor_registration`.*   FROM investor_registration  $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	
	//fech Contact us User Details
	// To fetch list of users in manage user section
	function contact_list($user='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE `contactus`.`cname`  LIKE '$user%' OR `contactus`.`cmail` LIKE '$user%'";
		}
		 
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`contactus`.`id`) AS total FROM `contactus`  $condition");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		//echo "SELECT `user`.* FROM `user` $condition ORDER BY $orderby $order $limit_query"; die;
		$query = $this->db->query("SELECT `contactus`.* FROM `contactus` $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	
	
	// To fetch list of users in manage user section
	function category_list($category='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($category))
		{
			$condition = " WHERE  `category`.`category_name`  LIKE '$category%'";
		}
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`category`.`id`) AS total FROM `category`  $condition");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		//echo "SELECT `user`.* FROM `user` $condition ORDER BY $orderby $order $limit_query"; die;
		$query = $this->db->query("SELECT `category`.* FROM `category` $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	// Fetch all the users records
	function getUserName()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT user_name FROM `user` where is_admin=0 order by user_name asc');	
		$statearray[""] = "Select Select";
		foreach($query->result() as $row)
		{
			$statearray[$row->user_name] = $row->user_name;
		}
			
		//ending the boxes
		return $userarray;				
	}	
	
	
	// Fetch all the users records
	function total_user()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT *  FROM `user` where is_admin=0');	
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}	
	
	// Fetch all the active users records
	function total_user_active()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT  * FROM `user` where is_admin=0 and status = 1');	
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}


		// If no records found, return FALSE
		return FALSE;			
	}
	
	function total_name()
	{
		$userarray = array();
		 
		$query = $this->db->query('SELECT  id,user_name  FROM `user` where status = 1');	
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $this->_strip($query->result());
		}


		// If no records found, return FALSE
		return FALSE;			
	}
	
	function total_category()
	{
		$userarray = array();
		 
		$query = $this->db->query('SELECT  id,category_name  FROM `categoty` where status = 1');	
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $this->_strip($query->result());
		}


		// If no records found, return FALSE
		return FALSE;			
	}
	
	function total_menu()
	{
		$userarray = array();
		 
		$query = $this->db->query('SELECT  menu_id,menu_name  FROM `manage_menu` where publish = 1');	
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $this->_strip($query->result());
		}


		// If no records found, return FALSE
		return FALSE;			
	}
	
	
	// Fetch all the deactive users records
	function total_user_deactive()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and status = 0');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}
		// If no records found, return FALSE
		return FALSE;			
	}	
	
	// Fetch all the comapany users records
	function total_user_company()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and user_type = "company"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}
	
	
	function total_user_company_active()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and status=1 and user_type = "company"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}
	
	
	function total_user_company_deactive()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and status=0 and user_type = "company"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}
	
	// Fetch all the comapany users records
	function total_user_investor()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and user_type = "investor"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}
	
	function total_user_investor_active()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and  status=1 and user_type = "investor"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}				
	
	function total_user_investor_deactive()
	{
		$userarray = array();
		
		$query = $this->db->query('SELECT * FROM `user` where is_admin=0 and  status=0 and user_type = "investor"');	
		 
		$rows=$query->num_rows();
		if($rows > 0)
		{
			// Return result
			return $rows;
		}

		// If no records found, return FALSE
		return FALSE;			
	}	
	
	// To change fish status
	function change_st_user($user_id, $status,$table)
	{
		
		// Running query
		$query = $this->db->query("UPDATE $table SET `status`='".$status."' WHERE `id` = $user_id");
		
		
		// If query executed successfully, return TRUE, else return FALSE
		if($query)
			return TRUE;
		else
			return FALSE;
	}	
	
	function getUser($user_id)
	{
		
		
		$query = $this->db->query('SELECT * FROM `user`  where id='.$user_id);	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	
	
	
	
	function getCompany($com_id)
	{
		
		
		$query = $this->db->query('SELECT * FROM `company_registration`  where id='.$com_id);	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	function getInvestor($inv_id)
	{
		 
		
		$query = $this->db->query('SELECT * FROM `investor_registration`  where id='.$inv_id);	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	
	
	function getContact($c_id)
	{
		
		
		$query = $this->db->query('SELECT * FROM `contactus`  where id='.$c_id);	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	
	
	function getProjectAuthor($user_id)
	{
		
		//echo 'SELECT user_name FROM `user`  where id='.$user_id; die;
		$query = $this->db->query('SELECT user_name FROM `user`  where id='.$user_id);	
		if($query->num_rows())
		{
			// Returning result
			$query = $query->row();
			return $query->user_name;
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	
	
	
	function getProject($id)
	{
		
		//echo 'select projects.*,user.user_name from projects, user where user.id = projects.author and p.id='.$id ; die;
		$query = $this->db->query('select projects.*,user.user_name from projects, user where user.id = projects.author and projects.id='.$id   );	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	//  get Category
	function getCategory($id)
	{
		
		$query = $this->db->query('select * from category where category.id='.$id   );	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	function getPages($id)
	{
		$query = $this->db->query('select pages.* from  pages where pages.id='.$id   );	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	
	
	function getProject_data($id)
	{
		
		 
		$query = $this->db->query('SELECT * FROM  projects_data as pd where pd.id='.$id );	
		if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}			
	}	
	
	function deleteuser($id)
	{
		
		if(is_array($id))
		{
			$user_id=implode(',',$id);
		}
		
			$query=$this->db->query("DELETE FROM `user` WHERE `id` IN ($id)");
			$query1=$this->db->query("DELETE FROM `user_data` WHERE `id` IN ($id)");
			if($query)
				return TRUE;
			else
				return FALSE;
		}
		
		function deletecomp($id)
		{
			
			if(is_array($id))
			{
				$user_id=implode(',',$id);
			}
			
				$query=$this->db->query("DELETE FROM `company_registration` WHERE `id` IN ($id)");
				 
				if($query)
					return TRUE;
				else
					return FALSE;
			}
		
		function deleteinvestor($id)
		{
			
			if(is_array($id))
			{
				$user_id=implode(',',$id);
			}
			 
				$query=$this->db->query("DELETE FROM `investor_registration` WHERE `id` IN ($id)");
				 
				if($query)
					return TRUE;
				else
					return FALSE;
			}
		
		
		
		
		function deletecontact($id)
		{
			
			if(is_array($id))
			{
				$user_id=implode(',',$id);
			}
			
				$query=$this->db->query("DELETE FROM `contactus` WHERE `id` IN ($id)");
				 
				if($query)
					return TRUE;
				else
					return FALSE;
		}	
			
		
		function deleteproject($id)
		{
		
		if(is_array($id))
		{
			$user_id=implode(',',$id);
		}
		
			$query=$this->db->query("DELETE FROM `projects` WHERE `id` IN ($id)");
			$query1=$this->db->query("DELETE FROM `projects_data` WHERE `id` IN ($id)");
			if($query)
				return TRUE;
			else
				return FALSE;
		}	
		
		function deletepage($id)
		{
		
		if(is_array($id))
		{
			$user_id=implode(',',$id);
		}
		
			$query=$this->db->query("DELETE FROM `pages` WHERE `id` IN ($id)");
			 
			if($query)
				return TRUE;
			else
				return FALSE;
		}	
		
		
		
		
		function deletecategory($id)
		{
		
			if(is_array($id))
			{
				$user_id=implode(',',$id);
			}
		
			$query=$this->db->query("DELETE FROM `category` WHERE `id` IN ($id)");
			if($query)
				return TRUE;
			else
				return FALSE;
		}					
	
/*	// To avoid mysql injection
	function avoid_mysql_injection1()
	{
		if(isset($_POST))
		{
			$_POST=$this->sanitize($_POST);
		}
		
		if(isset($_GET))
		{
			$_GET=$this->sanitize($_GET);
		}
		
		if(isset($_COOKIE))
		{
			$_COOKIE=$this->sanitize($_COOKIE);
		}
		
		if(isset($_REQUEST))
		{
			$_REQUEST=$this->sanitize($_REQUEST);
		}
		
	}
	function sanitize1($input)  // Internal function to use within avoid_mysql_injection
	{
		$output="";
		if(is_array($input))
		{
			foreach($input as $k=>$i)
			{
				$output[$k]=$this->sanitize($i);
			}
		}
		else
		{
			if(get_magic_quotes_gpc())
			{
				$input=stripslashes($input);
			}       
			$output=strip_tags($input, '<a><b><br><font><strong><span><i><h1><h2><h3><h4><h5><h6><img><p><u><em><sub><sup><ol><li><ul><hr><big><center><div><label>');
			$output = mysql_real_escape_string($output);
			$output = trim($output);
		}
		return $output;
	}*/
	
	
	// To avoid mysql injection
	function avoid_mysql_injection($addslashes=true)
	{
		if(isset($_POST))
		{
			$_POST=$this->sanitize($_POST,$addslashes);
		}
		
		if(isset($_GET))
		{
			$_GET=$this->sanitize($_GET,$addslashes);
		}
		
		if(isset($_COOKIE))
		{
			$_COOKIE=$this->sanitize($_COOKIE,$addslashes);
		}
		
		if(isset($_REQUEST))
		{
			$_REQUEST=$this->sanitize($_REQUEST,$addslashes);
		}
		
	}
	function sanitize($input,$addslashes=true)  // Internal function to use within avoid_mysql_injection
	{
		$output="";
		if(is_array($input))
		{
			foreach($input as $k=>$i)
			{
				$output[$k]=$this->sanitize($i,$addslashes);
			}
		}
		else
		{
				
			if(get_magic_quotes_gpc())
			{	
				$input=stripslashes($input);
			}       
			$output=strip_tags($input, '<a><b><br><font><strong><span><i><h1><h2><h3><h4><h5><h6><img><p><u><em><sub><sup><ol><li><ul><hr><big><center><div><label><object><param><embed>');
			
			if ($addslashes==true) 
			{	
				if (function_exists('mysql_real_escape_string')) 
				{	
					$output = mysql_real_escape_string($output);
				}
				else
				{
					$output = addslashes($output);			
				}
			}
			$output = trim($output);
		}
		return $output;
	}
	
	function check_user_login($redirect=TRUE)
	{	
		if(!$this->session->userdata('user_id'))
		{
			if($redirect)
			redirect('user');
			else
			return FALSE;
		}
		else
		return TRUE;
	}
	
	// To fetch list of project in manage project section
	function project_list($title='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE  user.id = projects.author and `projects`.`title`  LIKE '$title%' OR `projects`.`slug` LIKE '$title%'";
		} else {
			$condition=" WHERE  user.id = projects.author ";
		}
		 
		
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`projects`.`id`) AS total FROM `projects`");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//select * from projects, user where user.id = projects.author
		 
		// Running query
		// echo "SELECT `projects`.*,user.user_name FROM projects, user  $condition ORDER BY $orderby $order $limit_query"; die;
		$query = $this->db->query("SELECT `projects`.*,user.user_name FROM projects, user  $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	// To fetch list of pages in manage page section
	function page_list($title='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE `pages`.`page_name`  LIKE '$title%' OR `pages`.`menu_name` LIKE '$title%'";
		}  
		 
		 
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`pages`.`id`) AS total FROM `pages`");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//select * from projects, user where user.id = projects.author
		 
		// Running query
		//echo "SELECT `pages`.*,manage_menu.menu_name FROM pages, manage_menu  $condition ORDER BY $orderby $order $limit_query";  die;
		$query = $this->db->query("SELECT `pages`.*  FROM pages   $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	// To fetch list of pages in manage page section
	function event_list($title='',$count=TRUE,$orderby=FALSE,$order=FALSE,$offset=FALSE,$limit=20)
	{
		// Declaring condition
		$condition='';
		 
		// Making condition if filter is not empty
		if(!empty($user))
		{
			$condition = " WHERE `meeting_room`.`name`  LIKE '$title%' OR `meeting_room`.`room_url` LIKE '$title%'";
		}  
		 
		 
		// Making condition if category id is not empty
		
		
		// Checking if it is a request to count the total data for pagination
		if($count)
		{
			$total=$this->db->query("SELECT COUNT(`meeting_room`.`id`) AS total FROM `meeting_room`");
			$total=$total->row();
			return $total->total;
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		//select * from projects, user where user.id = projects.author
		 
		// Running query
		//echo "SELECT `pages`.*,manage_menu.menu_name FROM pages, manage_menu  $condition ORDER BY $orderby $order $limit_query";  die;
		$query = $this->db->query("SELECT `meeting_room`.*  FROM meeting_room   $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}	
	
	
	function get_meeting_details($id)
	{
		 //echo "SELECT *  FROM `meeting_room`  where room_id= $id "; die;
		$query=$this->db->query("SELECT *  FROM `meeting_room`  where id= $id  and (is_deleted= 0)");
		// Checking if records found
	if($query->num_rows())
		{
			// Returning result
			$res = $this->_strip($query->result());
			return $res[0];
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}
	}
	
	function edit_event($id)
	{
		// echo "SELECT *  FROM `meeting_room`  where  id= $id "; die;
		$query=$this->db->query("SELECT *  FROM `meeting_room`  where id= $id  and (is_deleted= 0)");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	 //This function use for fetch user for sent meenting invitation.
	 function get_user()
	{
		//echo "SELECT *  FROM `meeting_room`  order by starts_at asc "; die;
		$query=$this->db->query("SELECT user_name,user_email,status  FROM `user`  order by user_name asc ");
		// Checking if records found
		if($query->num_rows())
		{
			// Return result
			return $this->_strip($query->result());
		}

		// If no records found, return FALSE
		return FALSE;
	}
	
	function CreateThumbnail($inputFilename, $newfilename, $new_width=110, $new_height=110) {
	 
	$imagedata = getimagesize($inputFilename);
	$w = $imagedata[0];
	$h = $imagedata[1];
	
	if($w <= $new_width && $h <= $new_height)
	{
		copy($inputFilename, $newfilename);
	}
	else
	{
		if ($h >= $w)
		{
			$new_w = ($new_height / $h) * $w;
			$new_h = $new_height;	
		}
		else
		{
			$new_h = ($new_width / $w) * $h;
			$new_w = $new_width;
		}
	
		$imagetype = $imagedata[2];
		
		switch ($imagetype) 
		{
			case 1:
				$image = imagecreatefromgif($inputFilename);
				break;
			case 2:
				$image = imagecreatefromjpeg($inputFilename);
				break;
			case 3:
				$image = imagecreatefrompng($inputFilename);
				break;
			case 6:
				$image = imagecreate($inputFilename);
		}
		
		$im2 = imagecreatetruecolor($new_w, $new_h);
	
		imagecopyresampled ($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);
		imagejpeg($im2,  $newfilename, 100);
		imagedestroy($image);
		
		
		$imagedata = getimagesize($newfilename);
		$w = $imagedata[0];
		$h = $imagedata[1];

		if($w > $new_width || $h > $new_height)
		{
			
			$newfilename_new  =rename($newfilename,$newfilename);
			$this->CreateThumbnail($newfilename, $newfilename_new, $new_width, $new_height);
			
		}
	}
		 } 	
	
	function CreateThumbnail_210_150($inputFilename, $newfilename, $new_width=210, $new_height=150) {
	//echo '<br>'.$inputFilename.'<br>'.$newfilename;
	//die;
	$imagedata = getimagesize($inputFilename);
	  $w = $imagedata[0];
	 $h = $imagedata[1];
	
	if($w <= $new_width && $h <= $new_height)
	{
		copy($inputFilename, $newfilename);
	}
	else
	{
		if ($h >= $w)
		{
			$new_w = ($new_height / $h) * $w;
			$new_h = $new_height;	
		}
		else
		{
			$new_h = ($new_width / $w) * $h;
			$new_w = $new_width;
		}
	
		$imagetype = $imagedata[2];
		
		switch ($imagetype) 
		{
			case 1:
				$image = imagecreatefromgif($inputFilename);
				break;
			case 2:
				$image = imagecreatefromjpeg($inputFilename);
				
				break;
			case 3:
				$image = imagecreatefrompng($inputFilename);
				break;
			case 6:
				$image = imagecreate($inputFilename);
		}
		
		$im2 = imagecreatetruecolor($new_w, $new_h);
	
		imagecopyresampled ($im2, $image, 0, 0, 0, 0, $new_w, $new_h, $imagedata[0], $imagedata[1]);
		imagejpeg($im2,  $newfilename, 100);
		
		imagedestroy($image);
		
		
		$imagedata = getimagesize($newfilename);
		$w = $imagedata[0];
		//echo '<br>';
		$h = $imagedata[1];

		
	}
		 }		 

}
?>
