<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author	- Ankit Gautam
 * Class used to include all the utility functions which can be used any where.
 */

// ------------------------------------------------------------------------

/**
 * Utility Class
 *
 * @category	Utility
 */
class Utility extends CI_Model {
	

	/**
	 * Constructor
	 */	
	function __construct()
	{
		parent::__construct();
	}	
	// --------------------------------------------------------------------
	
	
	

	/**
	 * Author : Ankit Gautam
	 * To replace '\n' with newline character
	 */	
	function setnl($str)
	{
		return str_replace("\\n",chr(10),$str);
	}	
	// --------------------------------------------------------------------
	
	/**
	 * Author : Ankit Gautam
	 * date_picker
	 * To make a date picker.
	 * Parameters:
	 
	 $month_name : Name and ID of the month dropdown box DEFAULT "sel_month"
	 $date_name : Name and ID of the date dropdown box DEFAULT "sel_date"
	 $year_name : Name and ID of the year dropdown box DEFAULT "sel_year"
	 $val_month : Selected value of the month dropdown box DEFAULT NULL
	 $val_date : Selected value of the date dropdown box DEFAULT NULL
	 $val_year : Selected value of the year dropdown box DEFAULT NULL
	 $format : Sequence of the dropdown boxes it can be M-D-Y or D-M-Y or Y-M-D DEFAULT "M-D-Y"
	 $null : True if you want to add null or zero values in each box or False. DEFAULT "TRUE"
	 $separator : To separate the dropdown boxes DEFAULT "-"
	 
	 */	
	function date_picker($month_name="sel_month",$date_name="sel_date",$year_name="sel_year",$val_month,$val_date,$val_year,$format="M-D-Y",$null=TRUE,$separator="-")
	{	
		$month_array=array('1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December');
		
		$month_box="<select name='$month_name' id='$month_name'>";
		$date_box="<select name='$date_name' id='$date_name'>";
		$year_box="<select name='$year_name' id='$year_name'>";
		
		if($null==TRUE)
		{
			$month_box.="<option value='0'>MONTH</option>";
			$date_box.="<option value='0'>DATE</option>";
			$year_box.="<option value='0'>YEAR</option>";
		}
		
		//options for month
		foreach($month_array as $key => $val)
		{
			if($val_month==$key)
			$month_box.="<option value='$key' selected='selected'>$val</option>";
			else
			$month_box.="<option value='$key'>$val</option>";
		}
		
		//options for date
		for($i=1;$i<=31;$i++)
		{
			if($val_date==$i)
			$date_box.="<option value='$i' selected='selected'>$i</option>";
			else
			$date_box.="<option value='$i'>$i</option>";
		}
		
		//options for year
		$year=date("Y");
		for($i=$year;$i>=$year-100;$i--)
		{
			if($val_year==$i)
			$year_box.="<option value='$i' selected='selected'>$i</option>";
			else
			$year_box.="<option value='$i'>$i</option>";
		}
		
		//ending the boxes
		$month_box.="</select>";
		$date_box.="</select>";
		$year_box.="</select>";
		
		//formatting and concatinating the boxes
		if($format=="M-D-Y")
		return $month_box.$separator.$date_box.$separator.$year_box;
		elseif($format=="D-M-Y")
		return $date_box.$separator.$month_box.$separator.$year_box;
		elseif($format=="Y-M-D")
		return $year_box.$separator.$month_box.$separator.$date_box;
		else
		return FALSE;
		
	}	
	// --------------------------------------------------------------------
	
	// To toggle date format of given date
	function toggle_date($date)
	{
    	if(strpos($date,"-")!==FALSE)
		return date("M d, Y",strtotime($date));
		else
		return date("Y-m-d",strtotime($date));
	}

	/**
	 * Author : Ankit Gautam
	 * To make a fish category picker.
	 */	
	function category_picker($selected=NULL)
	{
		$combo="<select name='category_id' id='category_id'>";
		$combo.="<option value=''>[Select Category]</option>";
		
		$query = $this->db->get('fish_category');
		foreach($query->result() as $row)
		{
			$id=$row->category_id;
			$name=$row->category_name;
			if($selected==$id)
			$combo.="<option value='$id' selected='selected'>$name</option>";
			else
			$combo.="<option value='$id'>$name</option>";
		}
		$combo.="</select>";
		return $combo;
	}	
	// --------------------------------------------------------------------
	
	/**
	 * Author : Ankit Gautam
	 * To make a fish category picker.
	 */	
	function location_picker($selected=NULL)
	{
		$combo="<select name='location_id' id='location_id'>";
		$combo.="<option value=''>[Select Location]</option>";
		
		$query = $this->db->get('location');
		foreach($query->result() as $row)
		{
			$id=$row->location_id;
			$name=$row->location_name;
			if($selected==$id)
			$combo.="<option value='$id' selected='selected'>$name</option>";
			else
			$combo.="<option value='$id'>$name</option>";
		}
		$combo.="</select>";
		return $combo;
	}	
	// --------------------------------------------------------------------
	
	/**
	 * Author : Ankit Gautam
	 * To return a button with css
	 */
	function button($value, $name=NULL, $type='submit', $extra=NULL)
	{
		$value=empty($value) ? "" : "value='$value'";
		$type=empty($type) ? "" : "type='$type'";
		$name=empty($name) ? "" : "name='$name'";
		return "<div class='btn_left'></div><input $value $type $name $extra class='exp-button' /><div class='btn_right'></div>";
	}
	// --------------------------------------------------------------------
    
	function get_login_user_name()
	{
	 if($this->session->userdata('ses_admin_id'))
	 {
	    $this->db->where('id',$this->session->userdata('ses_admin_id'));
	    $query_name =  $this->db->get('registration');
	    $row_name =$query_name->row();
	    return $row_name->username;
	 }
	 
	
	}
	
	function get_records($where,$table_name)
	{
	   $this->db->where($where);
	   $query  = $this->db->get($table_name);
	   return $query;
	}
	
	function get_ingredient($menu_id)
	{
	     $this->db->where('menu_id',$menu_id);
	     $query  = $this->db->get('ingredient');
	     return $query->result();
	}
	
	// function to get the average rating by lokesh vijayvargiya on 8 march 2011 //
	function get_average_rating($menu_id)
	{
	  	$this->db->where('menu_id',$menu_id);
		$this->db->select_avg('rating');
		$query = $this->db->get('rating');
	    $row_avg = $query->row();
	    if(!empty($row_avg->rating))
		{
			$rate= $row_avg->rating;
		}
		else
		{
			$rate ="NA";
		}
		return $rate;
	}
	
	
	// To limit the number of characters if they are exceeding the size of container
function limit_char($str, $n = 500, $end_char = '&#8230;')
{
	$orig_str = addslashes(htmlentities($str));
	if (strlen($str) < $n)
	{
		return $str;
	}
	$str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));
	if (strlen($str) <= $n)
	{
		return $str;
	}
	$out = "";
	foreach (explode(' ', trim($str)) as $val)
	{
		$out .= $val.' ';
		if (strlen($out) >= $n)
		{	
			$out = trim($out);
			$out=(strlen($out) == strlen($str)) ? $out : $out.$end_char;
			return $out;
		}
	}
}

	function get_review_list($orderby,$order,$rating_id,$offset=FALSE,$limit=20)
	{
		$condition='';
		
		$user_id=$this->session->userdata('ses_admin_id');
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		 
		 if(!empty($rating_id))
		 {
			$this->db->where('rating.rating_id',$rating_id);
		 }
		 
		 $this->db->where('menu.user_id',$this->session->userdata('ses_admin_id'));
		 $this->db->join('menu','menu.menu_id=rating.menu_id');
		 $query = $this->db->get('rating');
		 
		//$query = $this->db->query("SELECT * from rating $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Returning result
			return $this->admin_common->_strip($query->result());
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}
	}
	
	function get_menu_name($menu_id)
	{
		$this->db->where('menu_id',$menu_id);
	    $query_name =  $this->db->get('menu');
	    if($query_name->num_rows()>0)
		{
			$row_name =$query_name->row();
			return $row_name->menu_name;	
		}
		else
		{
			return "no_rec";
		}
	}
	
	function delete_review($review_id_array)
	{
		$this->db->where_in('rating_id',$review_id_array);
		$this->db->delete('rating');
	}
	
  
	
    
	function update_todays_special($menu_array)
	{
		$this->db->where_in('menu_id',$menu_array);
		$update_vals['todays_special']=1;
		$this->db->update('menu',$update_vals);
		
	}
	function get_menu_list_xml($todays=0,$orderby,$order,$search_type,$user_id,$offset=FALSE,$limit=20)
	{
		$condition='';
		$condition.='where `user_id`='.$user_id;
		if($todays)
		{
			$condition.=" AND `todays_special`='1' ";
		}
		if(!empty($search_type))
		{
			$condition.=" and `menu_type`='".$search_type."'";
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		$query = $this->db->query("SELECT * from menu $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Returning result
			return $this->admin_common->_strip($query->result());
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}
	}
	
	
	function get_menu_searchtype_xml($orderby,$order,$search_type,$offset=FALSE,$limit=20)
	{
		$condition='';
		//$condition.='where `user_id`='.$user_id;
		/*if($todays)
		{
			$condition.=" AND `todays_special`='1' ";
		}*/
		if(!empty($search_type))
		{
			$condition.=" Where `menu_type`='".$search_type."'";
		}
		
		// Making limit query based on parameters
		$limit_query = $offset!==FALSE ? "LIMIT $offset, $limit" : "";
		
		// Running query
		$query = $this->db->query("SELECT * from menu $condition ORDER BY $orderby $order $limit_query");
		
		// Checking if records found
		if($query->num_rows())
		{
			// Returning result
			return $this->admin_common->_strip($query->result());
		}
		else
		{
			// If no records found, return FALSE
			return FALSE;
		}
	}
	
	
	
	 
	function get_review($menu_id)
	{
		$this->db->where('rating.menu_id',$menu_id);
		$this->db->join('menu','menu.menu_id=rating.menu_id');
		$query_review = $this->db->get('rating');
		return $query_review->result();
	}
	
	// function to get the selected data by lokesh vijayvargiya //
	function get_selected_data($where,$table_name)
	{
	 	$this->db->where($where);
	 	$query_new = $this->db->get($table_name);
	  	return $query_new->row();
	}
	// To generate random string of specified length
	function random_str($len)
	{
		$pool="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$lchr=strlen($pool)-1;
		$ranid="";
		for($i=0;$i<$len;$i++)	$ranid.=$pool[mt_rand(0,$lchr)];
		return $ranid;
	}
	/*  function to update the records */
	function update_table_model($update_values,$where,$tablename)
	{
	 $this->db->where($where);
	 $this->db->update($tablename, $update_values);
	 return true;
	}
	
	 // function to get the meny list by the lokesh vijayvagiya //
	function get_menu_list()
	{
		$query = $this->db->get('menuname');
	 	  return $query;
		
	
	
	}
	
	
	/**
	 * Author : Ankit Gautam
	 * To make a evelu country picker from dropdown. 
	 */	
	function country_picker($name="country",$others="class='input-boxsel'",$selected=NULL)
	{
		$combo='<select style=" width:320px; float:left;" name='.$name.' id='.$name.' '.$others.'>';
		$combo.="<option value=''>Please select your country</option>";
		$query = $this->db->get('tbl_country');
		foreach($query->result() as $row)
		{
			$id=$row->country_id;
			$name=$row->printable_name;
			
			if($selected==$name)
			$combo.="<option value='$name' selected='selected'>$name</option>";
			else
			$combo.="<option value='$name'>$name</option>";
		}
		$combo.="</select>";
		return $combo;
	}
	
	
	
	
}
?>
