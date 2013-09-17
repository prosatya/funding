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
		title: {
			required: true
		},
		slug: {
			required: true
			 
		},
		description: {
			required: true
		},
		author: {
			required: true
		},
		date: {
			required: true
		},
		status: {
			required: true
		} 
		
	},
	messages: {
	   title: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The title field is required.</div></td>"
		},
		slug: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The slug field is required.</div></td>"
			 	
		},
		description: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The description field is required.</div></td>"	
		},
		author: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The author field is required.</div></td>"	
		},
		date: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The date field is required.</div></td>"	
		},
		status: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The status field is required.</div></td>"	
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


<div id="page-heading"><h1>Edit Project</h1></div>


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
		 <form name="manage_record" method="post" action="<?php echo ($project_id) ? "admin/edit_project/$project_id" : "admin/edit_project";?>" id="manage_record">
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Project Title:</th>
			<td><input type="text" name="title" id="title" class="inp-form" value="<?php if(isset($row) && !empty($row->title)) { echo $row->title ; } ?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Slug:</th>
			<td><input type="text" class="inp-form" name="slug"  id="slug" value="<?php if(isset($row) && !empty($row->slug)) { echo $row->slug ; } ?>" /></td>
			<td>
			
			</td>
		</tr>
		<tr>
		<th valign="top">Description:</th>
		<td>
	       <textarea name="description" id="description" cols="40" rows="10"><?php if(isset($row) && !empty($row->description)) { echo $row->description ; } ?></textarea>
           
           
            
		 
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Author:</th>
		<td>	
		<select name="author" id="author" style="width:150px;" class="inp-form"  >
			<?php for($i=0; $i < count($row1); $i++ ) { ?>
                <option value="<?php echo $row1[$i]->id;?>" <?php if($row->author==$row1[$i]->id) { echo 'selected'; }?> ><?php echo $row1[$i]->user_name;?></option>                
            <?php } ?>
            
                
            </select>	
		</td>
		<td></td>
		</tr> 
        
        <tr>
		<th valign="top">Date:</th>
		<td>	
		<input type="text" class="inp-form" name="date" id="date" value="<?php if(isset($row) && !empty($row->date)) { echo $row->date ; } ?>" disabled="disabled" />
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
        
        
        
       
        
		
		
	
	
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit"   class="form-submit" id="submit"/>
			<input type="button" value="Back" class="form-reset"  onclick="window.history.back();" />
		</td>
		<td></td>
	</tr>
	</table>
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