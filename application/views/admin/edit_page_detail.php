<?php 
 /**------------------------------------------------------------------------------------#
Desc: from this page admin will manage the content of the static pages using cms
-------------------------------------------------------------------------------------------*/
include("fckeditor/fckeditor.php"); //user fck editor
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $basepath;?>">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Dashboard</title>
<link rel="stylesheet" href="public/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
<![endif]-->

<!--  jquery core -->
<script src="public/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="public/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery_main.js"  type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.validate.js"  type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {	

	var container = $('div.error-inner');
	var validator1 = $("#manage_record").validate({
	                    //FOR THIS Option You will have to use jquery.metadata.js 
	highlight:false,
	unhighlight:false,
	rules: {
		page_name: {
			required: true
		},
		page_heading: {
			required: true
			 
		},
		page_desc: {
			required: true
		},
		page_title: {
			required: true
		},
		page_keywords: {
			required: true
		},
		page_meta: {
			required: true
		},
		publish: {
			required: true
		},
		status: {
			required: true
		},
		page_slug: {
			required: true
		} 
		
	},
	messages: {
	   page_name: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The page name field is required.</div></td>"
		},
		page_heading: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The page heading field is required.</div></td>"
			 	
		},
		page_desc: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The description field is required.</div></td>"	
		},
		page_title: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The page title field is required.</div></td>"	
		},
		page_keywords: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The page keywords field is required.</div></td>"	
		},
		page_meta: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The page meta field is required.</div></td>"	
		},
		publish: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The publish field is required.</div></td>"	
		},
		status: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The status field is required.</div></td>"	
		},
		page_slug: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The page slug field is required.</div></td>"	
		}
		
	} 
		 
});
	 
	
});
</script>
<!--  styled select box script version 2 --> 

</head>
<body> 
<!-- Start: page-top-outer -->

<!-- End: page-top-outer -->
	

 
<!--  start nav-outer-repeat................................................................................................. START -->
<?php include('header.php');?>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">


<div id="page-heading"><h1>Edit Page</h1></div>


<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="public/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="public/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
    		<!--  start step-holder -->
		
		<!--  end step-holder -->
	
		<!-- start id-form -->
       
		 <form name="manage_record" method="post" action="<?php echo ($page_id) ? "admin/edit_page/$page_id" : "admin/edit_page";?>" id="manage_record">
        <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Page Details:</strong></legend>
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style=" width: 81%">
		
        <tr>
			<th valign="top">Page Name:</th>
			<td><input type="text" name="page_name" id="page_name" class="inp-form" value="<?php if(isset($row) && !empty($row->page_name)) { echo $row->page_name ; } ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Page Heading:</th>
			<td><input type="text" name="page_heading" id="page_heading" class="inp-form" value="<?php if(isset($row) && !empty($row->page_heading)) { echo $row->page_heading ; } ?>" />
            	  
           
            </td>
			<td>
			
			</td>
		</tr>
          <tr>
          <tr>
			<th valign="top">Page Slug:</th>
			<td><input type="text" name="page_slug" id="page_slug" class="inp-form" value="<?php if(isset($row) && !empty($row->page_slug)) { echo $row->page_slug ; } ?>" />
            	  
           
            </td>
			<td>
			<?php if(isset($error)) {  echo '<div class="error-left"></div><div class="error-inner">Slug alerady exits.</div>' ;  } ?>
			</td>
		</tr>
        
          
		<th valign="top">Description:</th>
		<td>
          
        
        <span style="width:500px;">
        
        	 <?php
						// calling html editor.
						$oFCKeditor = new FCKeditor('page_desc') ;
						$oFCKeditor->BasePath = 'fckeditor/' ;
						$oFCKeditor->Width		= '100%' ;
						$oFCKeditor->Height		= '350' ;
			$txt='';
			if($row->page_desc) {
				$txt=$row->page_desc;											
			} else { 
				$txt= set_value('page_description');						
			}	
						$oFCKeditor->Value = $txt;
						$oFCKeditor->Create();
					?>
            </span>	
		 
		</td>
		<td></td>
		</tr> 
        
		
        </table>
        </fieldset>
        <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Search Engine Optmization Details Details:</strong></legend>
         <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		
        <tr>
		<th valign="top">Page Title:</th>
		<td>
	       <input name="page_title" id="page_title" value="<?php if(isset($row) && !empty($row->page_title)) { echo $row-> page_title; } ?>" class="inp-form"/>
           
           
            
		 
		</td>
		<td></td>
		</tr>
        
        <tr>
		<th valign="top">Page Keywords:</th>
		<td>
	       <textarea name="page_keywords" id="page_keywords"  cols="90" rows="3"><?php if(isset($row) && !empty($row->page_keywords)) { echo $row->page_keywords ; } ?></textarea>
           
           
            
		 
		</td>
		<td></td>
		</tr>
        
         <tr>
		<th valign="top">Page Metatag:</th>
		<td>
	       <textarea name="page_meta" id="page_meta" cols="90" rows="3"><?php if(isset($row) && !empty($row->page_meta)) { echo $row->page_meta ; } ?></textarea>
           
           
            
		 
		</td>
		<td></td>
		</tr>
        
        
       </table> 
       </fieldset>
        
      <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Page Status:</strong></legend>
         <table border="0" cellpadding="0" cellspacing="0"  id="id-form">  
        <tr>
		<th valign="top">Publish:</th>
		<td>
        
        <select name="publish" id="publish" style="width:150px;" class="inp-form"  >
			 
				  
                <option value="1" <?php if($row->publish==1) { echo 'selected'; }?>>Yes</option>                
                <option value="0" <?php if($row->publish==1) { echo 'selected'; }?>>No</option>                
           
                 
            </select>	
		 
		</td>
		<td></td>
		</tr> 
        
      
        
         <tr>
		<th valign="top">Status:</th>
		<td>	
		<select name="status" id="status" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->status==1) { echo 'selected'; }?> >Active</option>                
                <option value="0" <?php if($row->status==0) { echo 'selected'; }?> >Deactive</option>                
            </select>	
		</td>
		<td></td>
		</tr> 
        
        
        </table>
     </fieldset>
       
        
		
		
	<div style="padding-top:20px;">
	 
         <table border="0" cellpadding="0" cellspacing="0"  id="id-form" >  
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top" height="50px">
			<input type="submit"   class="form-submit" id="submit"/>
			<input type="button" value="Back" class="form-reset"  onclick="window.history.back();" />
		</td>
		<td></td>
	</tr>
	</table>
     </div> 
    </form>
	<!-- end id-form  -->

	</td>
	<td>

	<!--  start related-activities -->
	
	<!-- end related-activities -->

</td>
</tr>

</table>
 
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<?php include('footer.php');?>
<!-- end footer -->
 
</body>
</html>