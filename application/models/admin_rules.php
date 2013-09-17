<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Class used to include all the form validation rules.
 */
// ------------------------------------------------------------------------
class Admin_rules extends  CI_Model {
	
	/**
	 * Constructor
	 */	
	function __construct()
	{
		parent::__construct();
	}
	
	// Validation rules used when admin changes his account password
	function change_password()
	{
		return array(
					array(
						 'field'   => 'old_password',
						 'label'   => 'old password',
						 'rules'   => 'trim|required|matches_db[admin.password]'
					  ),
					array(
						 'field'   => 'password',
						 'label'   => 'new password',
						 'rules'   => 'trim|required|min_length[8]'
					  ),
					array(
						 'field'   => 'confirm_password',
						 'label'   => 'confirm password',
						 'rules'   => 'trim|required||matches[password]'
					  )
               );
	}
	
	// Validation rules used when admin changes his account password
	function admin_profile()
	{
		return array(
					array(
						 'field'   => 'email',
						 'label'   => 'email',
						 'rules'   => 'trim|required|valid_email'
					  )
               );
	}
	
	// Validation rules used when admin logs in
	function login()
	{
		return array(
					array(
						 'field'   => 'username',
						 'label'   => 'username',
						 'rules'   => 'trim|required'
					  ),
					array(
						 'field'   => 'password',
						 'label'   => 'password',
						 'rules'   => 'trim|required'
					  )
               );
	}
	
	// Validation rules used when admin adds or edits a stance
	function add_user()
	{
		return array(
					array(
						 'field'   => 'user_name',
						 'label'   => 'user_name',
						 'rules'   => 'trim|required'
					  ),
					array(
						 'field'   => 'user_email',
						 'label'   => 'user_email',
						 'rules'   => 'trim|required'
					  ),
					array(
						 'field'   => 'user_password',
						 'label'   => 'user_password',
						 'rules'   => 'trim|required'
					  )
               );
	}
	
	// Validation rules used when admin adds or edits a stance option
	function add_stance_option($is_editing)
	{
		$rule=array(
					array(
						 'field'   => 'statement',
						 'label'   => 'statement',
						 'rules'   => 'trim|required'
					  )
               );
		
		// define a rule for option id if user is editing the option
		if(!empty($is_editing))
		{
			$rule[]=array(
							 'field'   => 'option_id',
							 'label'   => 'option_id',
							 'rules'   => 'trim|required'
						  );
		}
		
		return $rule;
	}
	
	// Validation rules used when admin adds or edits a poll option
	function add_poll_option($is_editing)
	{
		$rule=array(
					array(
						 'field'   => 'option',
						 'label'   => 'option',
						 'rules'   => 'trim|required'
					  )
               );
		
		// define a rule for option id if user is editing the option
		if(!empty($is_editing))
		{
			$rule[]=array(
							 'field'   => 'poll_option_id',
							 'label'   => 'poll_option_id',
							 'rules'   => 'trim|required'
						  );
		}
		
		return $rule;
	}
	
	// Validation rules used when admin adds or edits a poll
	function add_poll()
	{
		return array(
					array(
						 'field'   => 'question',
						 'label'   => 'question',
						 'rules'   => 'trim|required'
					  )
               );
	}
}
?>