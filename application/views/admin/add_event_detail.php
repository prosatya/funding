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
 

<!--  checkbox styling script -->
<script src="public/admin/js/jquery/ui.core.js" type="text/javascript"></script>
 
<script src="public/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery_main.js"  type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.validate.js"  type="text/javascript"></script>
<!--
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
		} 
		
	} 
		 
});
	 
	
});
</script>-->
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


<div id="page-heading"><h1>Add Event</h1></div>


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
	
	 
		 <form name="manage_record" method="post" action="admin/add_event" id="manage_record">
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Room name:</th>
			<td><input type="text" name="name" id="name" class="inp-form" value="" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Room:</th>
			<td>
            	<select name="room_type" id="room_type" class="inp-form">
                  <option value="meeting">Meeting</option>
                  <option value="webinar" >Webinar</option>
			</select>
    </td>
			<td>
			
			</td>
		</tr>
		<tr>
		<th valign="top">Room type:</th>
		<td>
	        <select name="permanent_room" id="permanent_room" class="inp-form">
              <option value="1">Permanent</option>
              <option value="0">Scheduled</option>
	  </select>
    	</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Event Start Date:</th>
		<td>	
		<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" media="screen" type="text/css" href="date/css/date/jquery-ui-timepicker-addon.css" />
		
		<script type="text/javascript" src="date/js/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="date/js/jquery-ui-1.10.2.custom.js"></script>
		<script type="text/javascript" src="date/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="date/js/jquery-ui-sliderAccess.js"></script>
		<script type="text/javascript">
			
			$(function(){
				
		
				$('.example-container > pre').each(function(i){
					 
					eval($(this).text());
				});
			});
			
		</script>
	<div class="example-container">
						 
						<div> 
                        
                         
                      
					 		<input type="text" name="starts_at" id="basic_example_1" value=""  class="inp-form"/>
						 </div>					
                            <pre>
                            $('#basic_example_1').datetimepicker();
                            </pre>
					</div>
		</td>
		<td></td>
		</tr> 
        
        <tr>
		<th valign="top">Time Zone:</th>
		<td>	
                 <select name='timezoe' class="inp-form">
             		 <option value="America/New_York">America/New York</option>
             </select>
		</td>
		<td></td>
		</tr> 
        
         <tr>
		<th valign="top">Duration: up to:</th>
		<td>	
		 
        	<select  id="timeEndField" name="duration" class="inp-form" >
                <option value="1" >1</option>
                <option value="2" >2</option>
                <option value="3" >3</option>
            </select>
		</td>
		<td></td>
		</tr> 
        
        <tr>
			<th valign="top">Waiting Room Message:</th>
			<td><textarea   style="height:50px" id="description" name="description"   ></textarea></td>
			<td></td>
		</tr>
        
       <tr>
        <th valign="top">Access type:</th>
        
        <td>
        	<select id="access_type" name="access_type"  class="inp-form">
                <option  id="freeAccess" value="1" >Free to all</option>
                <option  id="passwordProtected" value="2">Password protected</option>
                <option  id="tokenProtected" value="3">Token protected</option>
            </select>
        </td><td></td>
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