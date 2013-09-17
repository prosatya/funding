<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author	- Ankit Gautam
 * Class used to upload images
 */
// ------------------------------------------------------------------------
class Image extends CI_Model
{
	var $upload_path="";
	var $allowed_type="jpg|jpeg|gif|png|bmp";
	var $max_size=2;
	var $error="";
	var $upload_status=array();
	
	//Constructor
	function __construct()
	{
		parent::__construct();
	}
	
	function flush()
	{
		$this->upload_path="";
		$this->allowed_type="jpg|jpeg|gif|png|bmp";
		$this->max_size=2;
		$this->error="";
		$this->upload_status=array();
	}
	
	// Function to get random string of supplied length.
	function get_rand_str($length)
	{
		$pool="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$lchr=strlen($pool)-1;
		$ranid="";
		for($i=0;$i<$length;$i++)	$ranid.=$pool[mt_rand(0,$lchr)];
		return $ranid;
	}
	
	// To validate image before uploading
	function validate($field)
	{
		
		// Checking if file size exceeds limit, setting error and return FALSE if size exceeds.
		if(((($_FILES[$field]['size'])/1024)/1024) > $this->max_size)
		{
			$this->error = "Please upload file less than ".$this->max_size." MB.";
			return FALSE;
		}
		
		// Getting extension of uploaded file.
		$ext = strtolower(end(explode(".", $_FILES[$field]['name'])));
		// Getting allowed image extensions in the form of array.
		$allowed_type = explode("|", $this->allowed_type);
		// Checking if extension present in array of allowed extensions, if not set error and return FALSE.
		if(!in_array($ext, $allowed_type))
		{
			$this->error = "Please upload ".str_replace("|", " or ", $this->allowed_type)." file.";
			return FALSE;
		}
		
		return TRUE;
	}
	
	// To make unique image name
	function get_name()
	{
		return date("Ymd_His_").$this->get_rand_str(5);
	}
	
	// Function to upload a file
	// Author : Ankit Gautam
	// $field - Name of input in form
	// $thumb_param - Thumbnail parameters :
	//				array('prefix', width, height) or
	//				array(array('prefix1', width1, height1), array('prefix2', width2, height2))

	function upload($field, $thumb_param=array(), $retain_original=TRUE)
	{
		// Check if image is selected for upload, set error and return FALSE if not selected.
		if(!isset($_FILES[$field]['tmp_name']) || empty($_FILES[$field]['tmp_name']))
		{
			$this->error = "Please select a file to upload.";
			return FALSE;
		}
		
		// Checking if upload path is defined or not, set error and return FALSE if not defined.
		if(empty($this->upload_path))
		{
			$this->error = "Upload Error : Destination path is not defined.";
			return FALSE;
		}
		
		// If image is not valid return false, no need to set error message here as it is already set in validate function.
		if(!$this->validate($field))
		{
			return FALSE;
		}
		
		// Checking if directory exists or not, set error and return FALSE if directory does not exist.
		if(!file_exists($this->upload_path))
		{
			$this->error = "Upload Error : Destination directory '".$this->upload_path."' does not exist.";
			return FALSE;
		}
		
		// Checking if directory is writable, set error and return FALSE if not writable.
		if(!is_writable($this->upload_path))
		{
			$this->error = "Upload Error : Destination directory '".$this->upload_path."' is not writable.";
			return FALSE;
		}

		// Added By abhishek and commented on 23/12/2010 

		/*if($_FILES[$field]['tmp_name'])
		{
			  list($width, $height) =getimagesize($_FILES[$field]['tmp_name']);
			  if($width<>300 && $height<>200)
			{
                 $this->error = "Upload Error : Uploaded image size is invalid it should be 300x200 ";
			        return FALSE;
			}
		}*/

		
		// Getting extension of uploaded file.
		$ext = strtolower(end(explode(".", $_FILES[$field]['name'])));
		
		// Making unique image name.
		$image_name = $this->get_name().".".$ext;
		
		// Checking if we have to keep the original image. If yes, move it to destination directory.
		if($retain_original===TRUE || empty($thumb_param))
		{
			// Finally uploading file to destination directory.
			if(!copy($_FILES[$field]['tmp_name'], $this->upload_path.$image_name))
			{
				// Set error and return FALSE if any other reason.
				$this->error = "Upload Error : Unable to upload file in '".$this->upload_path."'";
				return FALSE;
			}
		}
		
		if(!empty($thumb_param))
		{
			// Checking if dimension is not in the form of array, set error and return FALSE if so.
			if(!is_array($thumb_param))
			{
				$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
				return FALSE;
			}
			
			$thumb_name=array();
			foreach($thumb_param as $param)
			{
				// Checking and breaking loop if parameter is not an array of array.
				if(!is_array($param))
				{
					break;
				}
				
				// Checking parameter count is equal to 3. If not, set error message and return FALSE.
				if(count($param)!=3)
				{
					$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
					return FALSE;
				}
				
				// Checking for emty and improper parameters. If improper,  set error message and return FALSE.
				if(empty($param[0]) || empty($param[1]) || !is_numeric($param[1]) || empty($param[2]) || !is_numeric($param[2]))
				{
					$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
					return FALSE;
				}
				
				// Making thumbnail and saving with prefixes in destination directory.
				$this->resize_image($_FILES[$field]['tmp_name'], $this->upload_path.$param[0].$image_name, $param[1], $param[2]);
				
				
				// Storing thumbnail name in an array to return.
				$thumb_name[]=$param[0].$image_name;
				
				// If it is last thumbnail, return TRUE
				if($param == end($thumb_param))
				{
					// Deleting if temporary file exists
					if(file_exists($_FILES[$field]['tmp_name']))
					{
					  unlink($_FILES[$field]['tmp_name']);
					}
					
					$this->upload_status['image_name'] = $image_name;
					$this->upload_status['thumb_name'] = $thumb_name;
					return TRUE;
				}
			}
			
			if(count($thumb_param)!=3 || is_array($thumb_param[0]) || is_array($thumb_param[1]) || is_array($thumb_param[2]) || empty($thumb_param[0]) || empty($thumb_param[1]) || !is_numeric($thumb_param[1]) || empty($thumb_param[2]) || !is_numeric($thumb_param[2]))
			{
				$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
				return FALSE;
			}
			
			// Making thumbnail and saving with prefixes in destination directory.
			$this->resize_image($_FILES[$field]['tmp_name'], $this->upload_path.$thumb_param[0].$image_name, $thumb_param[1], $thumb_param[2]);
 
			
			// Deleting if temporary file exists
			if(file_exists($_FILES[$field]['tmp_name']))
			{
			unlink($_FILES[$field]['tmp_name']);
			}
					
			$this->upload_status['image_name'] = $image_name;
			$this->upload_status['thumb_name'] = $thumb_param[0].$image_name;
			return TRUE;
		}
	}
	
	
	
	
	
	
	
	
	function upload_updated($field, $thumb_param=array(), $retain_original=TRUE)
	{
		// Check if image is selected for upload, set error and return FALSE if not selected.
		if(!isset($_FILES[$field]['tmp_name']) || empty($_FILES[$field]['tmp_name']))
		{
			$this->error = "Please select a file to upload.";
			return FALSE;
		}
		
		// Checking if upload path is defined or not, set error and return FALSE if not defined.
		if(empty($this->upload_path))
		{
			$this->error = "Upload Error : Destination path is not defined.";
			return FALSE;
		}
		
		// If image is not valid return false, no need to set error message here as it is already set in validate function.
		if(!$this->validate($field))
		{
			return FALSE;
		}
		
		// Checking if directory exists or not, set error and return FALSE if directory does not exist.
		if(!file_exists($this->upload_path))
		{
			$this->error = "Upload Error : Destination directory '".$this->upload_path."' does not exist.";
			return FALSE;
		}
		
		// Checking if directory is writable, set error and return FALSE if not writable.
		if(!is_writable($this->upload_path))
		{
			$this->error = "Upload Error : Destination directory '".$this->upload_path."' is not writable.";
			return FALSE;
		}

		// Added By abhishek and commented on 23/12/2010 

		/*if($_FILES[$field]['tmp_name'])
		{
			  list($width, $height) =getimagesize($_FILES[$field]['tmp_name']);
			  if($width<>300 && $height<>200)
			{
                 $this->error = "Upload Error : Uploaded image size is invalid it should be 300x200 ";
			        return FALSE;
			}
		}*/

		
		// Getting extension of uploaded file.
		$ext = strtolower(end(explode(".", $_FILES[$field]['name'])));
		
		// Making unique image name.
		$image_name = $this->get_name().".".$ext;
		
		// Checking if we have to keep the original image. If yes, move it to destination directory.
		if($retain_original===TRUE || empty($thumb_param))
		{
			// Finally uploading file to destination directory.
			if(!copy($_FILES[$field]['tmp_name'], $this->upload_path.$image_name))
			{
				// Set error and return FALSE if any other reason.
				$this->error = "Upload Error : Unable to upload file in '".$this->upload_path."'";
				return FALSE;
			}
		}
		
		if(!empty($thumb_param))
		{
			// Checking if dimension is not in the form of array, set error and return FALSE if so.
			if(!is_array($thumb_param))
			{
				$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
				return FALSE;
			}
			
			$thumb_name=array();
			foreach($thumb_param as $param)
			{
				// Checking and breaking loop if parameter is not an array of array.
				if(!is_array($param))
				{
					break;
				}
				
				// Checking parameter count is equal to 3. If not, set error message and return FALSE.
				if(count($param)!=3)
				{
					$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
					return FALSE;
				}
				
				// Checking for emty and improper parameters. If improper,  set error message and return FALSE.
				if(empty($param[0]) || empty($param[1]) || !is_numeric($param[1]) || empty($param[2]) || !is_numeric($param[2]))
				{
					$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
					return FALSE;
				}
				
				// Making thumbnail and saving with prefixes in destination directory.
				$this->resize_image($_FILES[$field]['tmp_name'], $this->upload_path.$param[0].$image_name, $param[1], $param[2]);
				
				
				// Storing thumbnail name in an array to return.
				$thumb_name[]=$param[0].$image_name;
				
				// If it is last thumbnail, return TRUE
				if($param == end($thumb_param))
				{
					// Deleting if temporary file exists
					if(file_exists($_FILES[$field]['tmp_name']))
					{
					  unlink($_FILES[$field]['tmp_name']);
					}
					
					$this->upload_status['image_name'] = $image_name;
					$this->upload_status['thumb_name'] = $thumb_name;
					return TRUE;
				}
			}
			
			if(count($thumb_param)!=3 || is_array($thumb_param[0]) || is_array($thumb_param[1]) || is_array($thumb_param[2]) || empty($thumb_param[0]) || empty($thumb_param[1]) || !is_numeric($thumb_param[1]) || empty($thumb_param[2]) || !is_numeric($thumb_param[2]))
			{
				$this->error = "Thumbnail Error : Unable to read thumbnail parameters. Incorrect parameters passed.";
				return FALSE;
			}
			
			// Making thumbnail and saving with prefixes in destination directory.
			$this->resize_image($_FILES[$field]['tmp_name'], $this->upload_path.$thumb_param[0].$image_name, $thumb_param[1], $thumb_param[2]);

			
			
			$this->resize_image($_FILES[$field]['tmp_name'], $this->upload_path."bigthumb_".$image_name,244 ,129);
			
			
			
			 
			// Deleting if temporary file exists
			if(file_exists($_FILES[$field]['tmp_name']))
			{
			unlink($_FILES[$field]['tmp_name']);
			}
					
			$this->upload_status['image_name'] = $image_name;
			$this->upload_status['thumb_name'] = $thumb_param[0].$image_name;
			return TRUE;
		}
	}
	
	
	
	
	
	
	
	
	// Author : Ankit Gautam
	// creae thumbail. mentain height, width and aspect ratio
	// Params $inputFilename->source imagefile 
	//		  $newfilename->new fiel name
	//		  $new_width->new width to mentain
	//		  $new_height->new height to mentain
	function resize_image($inputFilename, $newfilename, $new_width, $new_height)
	{
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
		}
	}
}
?>
