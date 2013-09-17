<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
 *
 * Adds one validation rule, "unique" and accepts a
 * parameter, the name of the table and column that
 * you are checking, specified in the forum table.column
 */
class MY_Form_validation  extends CI_Form_validation {

	function __construct()
	{
	    parent::__construct();
	}
	
	/** Overrided function - overried to use with avoid_mysql_injection()
	 * Get the value from a form
	 *
	 * Permits you to repopulate a form field with the value it was submitted
	 * with, or, if that value doesn't exist, with the default
	 *
	 * @access	public
	 * @param	string	the field name
	 * @param	string
	 * @return	void
	 */	
	function set_value($field = '', $default = '')
	{
		if ( ! isset($this->_field_data[$field]))
		{
			return stripslashes($default);
		}
		
		return stripslashes(str_replace("\\n",chr(10),$this->_field_data[$field]['postdata']));
	}

	// --------------------------------------------------------------------

	/**
	 * Unique
	 *
	 * @access    public
	 * @param    string
	 * @param    field
	 * @return    bool
	 */
	function unique($str, $field)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('unique', 'This %s already exists. Please enter different %s.');
		list($table, $column) = explode(".", $field, 2);	

		$query = $CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = '$str'");
		$row = $query->row();
		return ($row->dupe > 0) ? FALSE : TRUE;
	}
	// for matching of captcha text
	// By Jharna Malviya
	// Created on 14-march-2011
	function checkCaptcha($str,$word)
	{ 
		$CI =& get_instance();
		$CI->form_validation->set_message('checkCaptcha', 'Please enter the verification code below.');
		if($str == $word)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	// --------------------------------------------------------------------

	/**
	 * valid_url (Added by Ankit to validate URL )
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function valid_url($str)
    {

        $CI =& get_instance();
		
		if (preg_match("/^((ftp|Http|HTTP|https?):\/\/)+((www|WWW\.))?(([\d\w]|%[a-fA-f\d]{2,2})+(:([\d\w]|%[a-fA-f\d]{2,2})+)?@)?([\d\w][-\d\w]{0,253}[\d\w]\.)+[\w]{2,4}(:[\d]+)?(\/([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)*(\?(&?([-+_~.\d\w]|%[a-fA-f\d]{2,2})=?)*)?(#([-+_~.\d\w]|%[a-fA-f\d]{2,2})*)?$/", $str))
		{
		return TRUE;
		}
		else
		{
		return FALSE;
		}
    }

	
	// --------------------------------------------------------------------
	
	/**
	 * date (Added by Ankit to validate date format)
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function date_format($str)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('date_format', 'Please re-enter correct date in YYYY-MM-DD format.');
		$val=explode("-",$str);
		if(count($val)==3)
		{
			if(strlen($val[0])==4 && is_numeric($val[0]) && strlen($val[1])==2 && is_numeric($val[1]) && strlen($val[2])==2 && is_numeric($val[2]))
			{
				if(checkdate($val[1],$val[2],$val[0]))
				return TRUE;
				else
				return FALSE;
			}
			else
			return FALSE;
		}
		else
		{
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * num_min, num_max (Added by Ankit to validate minimum and maximum number)
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function num_min($str,$val)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('num_min', "Please enter a value greater than or equal to $val.");
		return $str >= $val ? TRUE : FALSE;
	}
	
	function num_max($str,$val)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('num_max', "Please enter a value less than or equal to $val.");
		return $str <= $val ? TRUE : FALSE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * valid_date (Added by Ankit to validate DATE )
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function valid_date($str,$format="%m/%d/%Y")
	{
		$CI =& get_instance();
		$CI->validation->set_message('valid_date', $val = 'The %s field must contain a valid date.');
		
		$date_array = $this->_strToTime($str, $format);
		if($date_array === false ||
	      !isset($date_array['tm_mon']) ||
	      !isset($date_array['tm_mday']) ||
	      !isset($date_array['tm_year'])
	     )
	    {
			return false;
	   	}
	   	else
	   	{
	   		return checkdate($date_array['tm_mon'],$date_array['tm_mday'],$date_array['tm_year']);
	   	}
	}
	
	//borrowed and modified from php strptime page
	function _strToTime($date, $format)
	{
    	$search = array('%d', '%D', '%j', // day
        '%m', '%M', '%n', // month
        '%Y', '%y', // year
        '%G', '%g', '%H', '%h', // hour
        '%i', '%s');
        
        $replace = array('(\d{2})', '(\w{3})', '(\d{1,2})', //day
        '(\d{2})', '(\w{3})', '(\d{1,2})', // month
        '(\d{4})', '(\d{2})', // year
        '(\d{1,2})', '(\d{1,2})', '\d{2}', '\d{2}', // hour
        '(\d{2})', '(\d{2})');
        
        
        
        $return = array('s' => 'tm_sec',    // sec
                        'i' => 'tm_min',   //min
                        'g' => 'tm_hour', 'h' => 'tm_hour',   //hour
                        'd' => 'tm_mday', 'j' => 'tm_mday', //day
                        'm' => 'tm_mon',  'n' => 'tm_mon',  //month
                        'y' => 'tm_year');
        
        $pattern = str_replace($search, $replace, $format);
        
        
        if(!preg_match("#$pattern#", $date, $matches)) {
            return false;
        }
        $dp = $matches;

        if(!preg_match_all('#%(\w)#', $format, $matches)) {
            return false;
        }
        $id = $matches['1'];

        if(count($dp) != count($id)+1) {
            return false;
        }

        $ret = array();
        for($i=0, $j=count($id); $i<$j; $i++) {
            $ret[$return[strtolower($id[$i])]] = $dp[$i+1];
        }

        return $ret;
    }
	
	// --------------------------------------------------------------------
	
	/**
	 * Amount-numeric with dot
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function amount($str)
	{
		return ( ! preg_match("/^([0-9.])+$/", $str)) ? FALSE : TRUE;
	}
	
 	// --------------------------------------------------------------------
	
	/**
	 * Alpha-numeric with underscores, dot and dashes
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function alpha_dot_dash($str)
	{
		return ( ! preg_match("/^([+()-.a-z0-9_-])+$/", $str)) ? FALSE : TRUE;
	}
	
 	// --------------------------------------------------------------------
	
	/**
	 * Alpha-numeric with dash, + and ()
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function valid_phone($str)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('valid_phone', 'The %s field must contain a valid phone number.');
		return ( ! preg_match("/^([ 0-9+-])+$/", $str)) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * alpha_space
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	 		
	function alpha_space($str)
	{
		return ( ! preg_match("/^([a-z ])+$/", $str)) ? FALSE : TRUE;
	}
	
	/**
	 * alpha_space
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */		
	function alpha_numeric_space($str)
	{
		return ( ! preg_match("/^([a-z0-9 ])+$/i", $str)) ? FALSE : TRUE;
		
	}
	
	// To check captcha code
	function captcha($str)
	{
		$CI =& get_instance();
		if($str==$CI->session->userdata('ses_captcha_key'))
		{
			return TRUE;
		}
		else
		{
			$CI->form_validation->set_message('captcha', 'Please re-enter correct code.');
			return FALSE;
		}
	}
	
	/**
	 * Max Length - Overrided for the problem of newline character count
	 *
	 * @access	public
	 * @param	string
	 * @param	value
	 * @return	bool
	 */	
	function max_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}
		
		// Replacing "\\n" with "n" so that line break character length should be 1 instead of 3.
		// Using stripslashes so that single and double quotes will be counted as 1 instead of 2.
		$str = stripslashes(str_replace("\\n","n",$str));

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) > $val) ? FALSE : TRUE;		
		}
	
		return (strlen($str) > $val) ? FALSE : TRUE;
	}
	
	//for zipcode
	function valid_zipcode($str)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('valid_zipcode', 'The %s field must contain a valid zipcode number.');
		return ( ! preg_match("/^([ a-z0-9+-])+$/", $str)) ? FALSE : TRUE;
	}

	function check_unique($str, $field)
	{
		$CI =& get_instance();
		list($table, $column) = explode(".", $field, 2);	

		$query = $CI->db->query("SELECT COUNT(*) dupe FROM $table WHERE $column = '".addslashes($str)."'");
		$row = $query->row();
		return ($row->dupe > 0) ? FALSE : TRUE;
	}
	
	
	/*============================== START custome CREDIT CARD VALIDATE ======================= */

	function ValidCreditCard ($cardnumber, $cardname)
	 {
	  // Define the cards we support. You may add additional card types.
	  //  Name:      As in the selection box of the form - must be same as user's
	  //  Length:    List of possible valid lengths of the card number for the card
	  //  prefixes:  List of possible prefixes for the card
	  //  checkdigit Boolean to say whether there is a check digit
	  // Don't forget - all but the last array definition needs a comma separator!
	  $cards = array (  array ('name' => 'American Express', 
							  'length' => '15', 
							  'prefixes' => '34,37',
							  'checkdigit' => true
							 ),
					   array ('name' => 'Diners Club Carte Blanche', 
							  'length' => '14', 
							  'prefixes' => '300,301,302,303,304,305',
							  'checkdigit' => true
							 ),
					   array ('name' => 'Diners Club', 
							  'length' => '14,16',
							  'prefixes' => '36,54,55',
							  'checkdigit' => true
							 ),
					   array ('name' => 'Discover', 
							  'length' => '16', 
							  'prefixes' => '6011,622,64,65',
							  'checkdigit' => true
							 ),
					   array ('name' => 'Diners Club Enroute', 
							  'length' => '15', 
							  'prefixes' => '2014,2149',
							  'checkdigit' => true
							 ),
					   array ('name' => 'JCB', 
							  'length' => '16', 
							  'prefixes' => '35',
							  'checkdigit' => true
							 ),
	
					   array ('name' => 'Maestro', 
							  'length' => '12,13,14,15,16,18,19', 
							  'prefixes' => '5018,5020,5038,6304,6759,6761',
							  'checkdigit' => true
							 ),
	
					   array ('name' => 'MasterCard', 
							  'length' => '16', 
							  'prefixes' => '51,52,53,54,55',
							  'checkdigit' => true
							 ),
	
					   array ('name' => 'Solo', 
							  'length' => '16,18,19', 
							  'prefixes' => '6334,6767',
							  'checkdigit' => true
							 ),
	
					   array ('name' => 'Switch', 
							  'length' => '16,18,19', 
							  'prefixes' => '4903,4905,4911,4936,564182,633110,6333,6759',
							  'checkdigit' => true
							 ),
	
					   array ('name' => 'Visa', 
							  'length' => '13,16', 
							  'prefixes' => '4',
							  'checkdigit' => true
							 ),
					   array ('name' => 'Visa Electron', 
							  'length' => '16', 
							  'prefixes' => '417500,4917,4913,4508,4844',
							  'checkdigit' => true
							 )
					);
	  $ccErrorNo = 0;
	  $ccErrors [0] = "Unknown card type";
	  $ccErrors [1] = "No card number provided";
	  $ccErrors [2] = "Credit card number has invalid format";	
	  $ccErrors [3] = "Credit card number is invalid";
	  $ccErrors [4] = "Credit card number is wrong length";

		// Establish card type
	
	  $cardType = -1;	
	  for ($i=0; $i<sizeof($cards); $i++) {
		// See if it is this card (ignoring the case of the string)
		if (strtolower($cardname) == strtolower($cards[$i]['name'])) {	
		  $cardType = $i;
		  break;
	
		}
	
	  }
	  // If card type not found, report an error
	
	  if ($cardType == -1) {
		 $errornumber = 0;     
		 $errortext = $ccErrors [$errornumber];
		 return false; 
	  }
	
	   
	
	  // Ensure that the user has provided a credit card number
	
	  if (strlen($cardnumber) == 0)  {
		 $errornumber = 1;     
		 $errortext = $ccErrors [$errornumber];
		 return false; 
	  }
	
	  
	
	  // Remove any spaces from the credit card number
	  $cardNo = str_replace (' ', '', $cardnumber);  

	  // Check that the number is numeric and of the right sort of length.
//	  if (!eregi('^[0-9]{13,19}$',$cardNo))  
  	  if (!preg_match('/^[0-9]{13,19}$/',$cardNo))  {
		 $errornumber = 2;     
		 $errortext = $ccErrors [$errornumber];
		 return false; 
	  }

	  // Now check the modulus 10 check digit - if required
	  if ($cards[$cardType]['checkdigit']) {
		$checksum = 0;                                  // running checksum total	
		$mychar = "";                                   // next char to process
		$j = 1;                                         // takes value of 1 or 2
	
		// Process each digit one by one starting at the right
		for ($i = strlen($cardNo) - 1; $i >= 0; $i--) {
		  // Extract the next digit and multiply by 1 or 2 on alternative digits.      
		  $calc = $cardNo{$i} * $j;
		  // If the result is in two digits add 1 to the checksum total
		  if ($calc > 9) {
			$checksum = $checksum + 1;
			$calc = $calc - 10;
		  }
		  // Add the units element to the checksum total
		  $checksum = $checksum + $calc;
		  // Switch the value of j
		  if ($j ==1) {$j = 2;} else {$j = 1;};
	
		} 
	
	  
	
		// All done - if checksum is divisible by 10, it is a valid modulus 10.
	
		// If not, report an error.
	
		if ($checksum % 10 != 0) {
	
		 $errornumber = 3;     
	
	     $errortext = $ccErrors [$errornumber];
	
		 return false; 
	
		}
	
	  }  

	
	  // The following are the card-specific checks we undertake.

	  // Load an array with the valid prefixes for this card
	
	  //$prefix = split(',',$cards[$cardType]['prefixes']);
	  $prefix = explode(',',$cards[$cardType]['prefixes']);
	
	  // Now see if any of them match what we have in the card number  
	  $PrefixValid = false; 
	  for ($i=0; $i<sizeof($prefix); $i++) {
		$exp = '^' . $prefix[$i];
     //if (ereg($exp,$cardNo)) 
		if (preg_match('/'.$exp.'/',$cardNo)) {
		  $PrefixValid = true;
		  break;
		}
	
	  }
	
		  
	
	  // If it isn't a valid prefix there's no point at looking at the length
	  if (!$PrefixValid) {
		 $errornumber = 3;     
		 $errortext = $ccErrors [$errornumber];
		 return false; 
	  }
	
		
	
	  // See if the length is valid for this card
	
	  $LengthValid = false;
		//	$lengths = split(',',$cards[$cardType]['length']);
	  $lengths = explode(',',$cards[$cardType]['length']);
	  for ($j=0; $j<sizeof($lengths); $j++) {
		if (strlen($cardNo) == $lengths[$j]) {
		  $LengthValid = true;
		  break;
		}
	  }
	
	  
	
	  // See if all is OK by seeing if the length was valid. 
	
	  if (!$LengthValid) {
		 $errornumber = 4;     
		 $errortext = $ccErrors [$errornumber];
		 return false; 
	  };   
	
	  
	
	  // The credit card is in the required format.
	  return true;
	}   
	
	
	function valid_cc_month($cc_expMonth,$cc_expYear)
	{
		if ($cc_expYear<=date("Y"))
		{	
			//date("m")
			if (date("m")>$cc_expMonth)
			{	
				return false;		
			}
			else
			{	
				return true;
			}
		}
		else
		{
			return true;
		}
	}
	// for check date
	// By Jharna Malviya
	// Created on 22 April 2011
	function valid_cc_date($cc_expDate,$my)
	{
		$cc_expmy = explode('/',$my);
		$cc_expMonth = $cc_expmy[0];
		$cc_expYear = $cc_expmy[1]; 
		if($cc_expMonth == 1 || $cc_expMonth == 3 || $cc_expMonth == 5 || $cc_expMonth == 7 || $cc_expMonth == 8 || $cc_expMonth == 10 || $cc_expMonth == 12)
		{
			if($cc_expDate>=1 && $cc_expDate<=31)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else if($cc_expMonth == 4 || $cc_expMonth == 6 || $cc_expMonth == 9 || $cc_expMonth == 11)
		{
			if($cc_expDate>=1 && $cc_expDate<=30)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		// code for 2nd month
		if($cc_expMonth == 2)
		{ 
			// if leap year then 29 days else  28 days 
			if($cc_expYear%4==0)
			{
				if($cc_expDate>=1 && $cc_expDate<=29)
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
			else
			{
				if($cc_expDate>=1 && $cc_expDate<=28)
				{
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}
		
		
	}
	/*============================== END custome CREDIT CARD VALIDATE ======================= */
	function matches_db($str, $field)
	{
		$CI =& get_instance();
		list($table, $column) = explode(".", $field, 2);	

		$query = $CI->db->query("SELECT * FROM $table WHERE $column = '".addslashes($str)."'");
		$row = $query->row();
		return ($row->dupe > 0) ? FALSE : TRUE;
	}
		
}
?>
