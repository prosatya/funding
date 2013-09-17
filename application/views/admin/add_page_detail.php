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
			required:"<td><div class='error-left'></div><div class='error-inner'>The publish  field is required.</div></td>"	
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
<script>
page_name.onblur = function() { 
    page_slug.value = this.value;
};
</script>
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


<div id="page-heading"><h1>Add Page</h1></div>


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
       
		 <form name="manage_record" method="post" action="admin/add_page" id="manage_record">
        <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Page Details:</strong></legend>
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form" style=" width: 81%">
		
        <tr>
			<th valign="top">Page Name:</th>
			<td><input type="text" name="page_name" id="page_name" class="inp-form" value="<?php echo set_value("page_name"); ?>" /></td>
			<td> <?php if(isset($error)) {  echo form_error('page_name');  } ?></td>
		</tr>
		<tr>
			<th valign="top">Page Heading:</th>
			<td><input type="text" name="page_heading" id="page_heading" class="inp-form" value="<?php echo set_value("page_heading"); ?>" />
            	  
           
            </td>
			<td>
			 <?php if(isset($error)) {  echo form_error('page_heading');  } ?>
			</td>
		</tr>
        
        <tr>
			<th valign="top">Page Slug:</th>
			<td><input type="text" name="page_slug" id="page_slug" class="inp-form" value="<?php echo set_value("page_slug"); ?>" />
            	  
           
            </td>
			<td>
			<?php if(isset($error)) {  echo '<div class="error-left"></div><div class="error-inner">Slug alerady exits.</div>' ;  } ?>
			</td>
		</tr>
        
        
          <tr>
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
						if(isset($row->page_desc))  
						{
							$txt=$row->page_desc;											
						}	
						else
						{ 
							$txt= set_value('page_desc');						
						}	
						$txt= set_value('page_description');						
						$oFCKeditor->Value = $txt;
						$oFCKeditor->Create();
					?>
            </span>	
		 
		</td>
		<td><?php if(isset($error)) {  echo form_error('page_desc');  } ?></td>
		</tr> 
        
		
        </table>
        </fieldset>
        <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Search Engine Optmization Details:</strong></legend>
         <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		
        <tr>
		<th valign="top">Page Title:</th>
		<td>
	       <input name="page_title" id="page_title" value="<?php echo set_value("page_slug"); ?>"  class="inp-form"/>
           
           
            
		 
		</td>
		<td><?php if(isset($error)) {  echo form_error('page_title');  } ?></td>
		</tr>
        
        <tr>
		<th valign="top">Page Keywords:</th>
		<td>
	       <textarea name="page_keywords" id="page_keywords" cols="90" rows="3"><?php echo set_value("page_slug"); ?></textarea>
           
           
            
		 
		</td>
		<td><?php if(isset($error)) {  echo form_error('page_keywords');  } ?></td>
		</tr>
        
         <tr>
		<th valign="top">Page Metatag:</th>
		<td>
	       <textarea name="page_meta" id="page_meta" cols="90" rows="3"><?php echo set_value("page_slug"); ?></textarea>
           
           
            
		 
		</td>
		<td></td>
		</tr>
        
        
       </table> 
       </fieldset>
        
      <fieldset  style="border-color: #666;margin-right: 200px;padding-left: 30px;padding-top: 10px;margin-top: 30px;">
        <legend><strong>Page Status:</strong></legend>
         <table border="0" cellpadding="0" cellspacing="0"  id="id-form">  
        <tr>
		<th valign="top">Content Type</th>
		<td>	
        	<select name="publish" id="publish" style="width:150px;" class="inp-form"  >
			 
				  
                <option value="1" selected="selected">News</option>                
                <option value="0">Page</option>                
           
                 
            </select>
		</td>
		<td></td>
		</tr> 
        
      
        
         <tr>
		<th valign="top">Status:</th>
		<td>	
		<select name="status" id="status" style="width:150px;" class="inp-form"  >
            	
    			<option value="1">Active</option>                
                <option value="0">Deactive</option>                
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
 <script type="text/javascript"><!--
// Free JavaScript course - coursesweb.net

// create the object with methods to add and delete <option></option>
var adOption = new Object();
  // method that check if the option is already in list
  // receives the id of the <select></select> list, and box with the value for <option>
  adOption.checkList = function(list, optval) {
    var re = 0;           // variable that will be returned

    // get the <option> elements
    var opts = document.getElementById(list).getElementsByTagName('option');

    // if the option exists, sets re=1
    for(var i=0; i<opts.length; i++) {
      if(opts[i].value == document.getElementById(optval).value) {
        re = 1;
        break;
      }
    }

    return re;         // return the value of re
   };

   // method that adds <option>
  adOption.addOption = function(list, optval) {
    // gets the value for <option>
    var opt_val = document.getElementById(optval).value;

    // check if the user adds a value
    if(opt_val.length > 0) {
      // check if the value not exists (when checkList() returns 0)
      if(this.checkList(list, optval) == 0) {
        // define the <option> element and adds it into the list
        var myoption = document.createElement('option');
        myoption.value = opt_val;
        myoption.innerHTML = opt_val;
        document.getElementById(list).insertBefore(myoption, document.getElementById(list).firstChild);

        document.getElementById(optval).value = '';           // delete the value added in text box
      }
      else alert('The value "'+opt_val+'" already added');
    }
    else alert('Add a value for option');
  };

  // method that delete the <option>
  adOption.delOption = function(list, optval) {
    // gets the value of <option> that must be deleted
    var opt_val = document.getElementById(optval).value;

    // check if the value exists (when checkList() returns 1)
    if(this.checkList(list, optval) == 1) {
       // gets the <option> elements in the <select> list
      var opts = document.getElementById(list).getElementsByTagName('option');

      // traverse the array with <option> elements, delete the option with the value passed in "optval"
      for(var i=0; i<opts.length; i++) {
        if(opts[i].value == opt_val) {
          document.getElementById(list).removeChild(opts[i]);
          break;
        }
      }
    }
    else alert('The value "'+opt_val+'" not exist');
  }

  // method that adds the selected <option> in text box
  adOption.selOpt = function(opt, txtbox) { document.getElementById(txtbox).value = opt; }
--></script>
</body>
</html>