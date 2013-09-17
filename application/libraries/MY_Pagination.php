<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Pagination Class
 * Author: Ankit Gautam
 * Extends Pagination library
 */
class MY_Pagination  extends CI_Pagination {

	var $form_name			= ''; // The form name we are going to submit
	var $input				= 'page'; // Name of hidden input to set value for page

	function __construct()
	{
	    parent::__construct();
	    $this->full_tag_open = '<span class="active">';
		 $this->full_tag_close = '</span>';
		//$this->full_tag_open = '<div id="next-pre">';
		//$this->full_tag_close = '</div>';
		
		$this->per_page = 2;
	
	}
	/**
	 * Generate the pagination links overrided to submit a form on clicking the links
	 *
	 * @access	public
	 * @return	string
	 */
	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.
		$CI =& get_instance();

		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($CI->input->post($this->input) != 0)
			{
				$this->cur_page = $CI->input->post($this->input);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = 0;
		}
		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($num_pages - 1) * $this->per_page;
		}

		$uri_page_number = $this->cur_page;
		$this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
		
//echo $this->cur_page.'=='.$this->num_links;

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
		}

  		// And here we go...
		$output = '';

		// Render the "First" link
		/*if  ($this->cur_page > ($this->num_links + 1))
		{
			$output .= $this->first_tag_open.'<a   onclick="document.'.$this->form_name.'.'.$this->input.'.value=\'\';document.'.$this->form_name.'.submit();" >'.$this->first_link.'</a>'.$this->first_tag_close;
		}*/

		// Render the "previous" link
		/*if  ($this->cur_page != 1)
		{
			$i = $uri_page_number - $this->per_page;
			if ($i == 0) $i = '';
			$output .= $this->prev_tag_open.'<a class="paginationlink_activate" style="cursor:pointer;" onclick="document.'.$this->form_name.'.'.$this->input.'.value=\''.$i.'\';document.'.$this->form_name.'.submit();">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}*/

		// Write the digit links
		for ($loop = $start ; $loop <= $end; $loop++)
		{
			$i = ($loop * $this->per_page) - $this->per_page;

			if ($i >= 0)
			{
				if ($this->cur_page == $loop)
				{
					$n = ($i == 1) ? '' : $i;
					$output .= $this->num_tag_open.'<a class="pagination_link" style="cursor:pointer;" onclick="document.'.$this->form_name.'.'.$this->input.'.value=\''.$n.'\';document.'.$this->form_name.'.submit();">'.$loop.'</a>'.$this->num_tag_close;
				}
				else
				{
					$n = ($i == 0) ? '' : $i;
					$output .= $this->num_tag_open.'<a class="pagination_link" style="cursor:pointer;" onclick="document.'.$this->form_name.'.'.$this->input.'.value=\''.$n.'\';document.'.$this->form_name.'.submit();">'.$loop.'</a>'.$this->num_tag_close;
				}
			}
		}

		// Render the "next" link
		/*if ($this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a class="paginationlink_activate" style="cursor:pointer;" onclick="document.'.$this->form_name.'.'.$this->input.'.value='.($this->cur_page * $this->per_page).';document.'.$this->form_name.'.submit();">'.$this->next_link.'</a>'.$this->next_tag_close;
		}*/

		// Render the "Last" link
		/*if (($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = (($num_pages * $this->per_page) - $this->per_page);
			$output .= $this->last_tag_open.'<a  onclick="document.'.$this->form_name.'.'.$this->input.'.value='.$i.';document.'.$this->form_name.'.submit();">'.$this->last_link.'</a>'.$this->last_tag_close;
		}*/

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}
}
?>
