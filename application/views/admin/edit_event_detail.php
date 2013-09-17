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


<div id="page-heading"><h1>Edit Event</h1></div>


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
	
	
	<?php 
		foreach($edit as $data_meeting) {
			 
	?>
		 <form name="manage_record" method="post" action="<?php echo ($event_id) ? "admin/edit_event/$event_id" : "admin/edit_page";?>" id="manage_record">
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Room name:</th>
			<td><input type="text" name="name" id="name" class="inp-form" value="<?php if(isset($data_meeting) && !empty($data_meeting->name)) { echo $data_meeting->name; }?>" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Room:</th>
			<td>
            	<select name="romm type" id="room_type" class="inp-form">
                  <option value="meeting" <?php if(isset($data_meeting) && $data_meeting->name_url=='meeting') { echo 'selected' ; }?>>Meeting</option>
                  <option value="webinar" <?php if(isset($data_meeting) && $data_meeting->name_url=='webinar') { echo 'selected' ; }?>>Webinar</option>
			</select>
    </td>
			<td>
			
			</td>
		</tr>
		<tr>
		<th valign="top">Room type:</th>
		<td>
	        <select name="permanent_room" id="permanent_room" class="inp-form">
              <option value="1" <?php if(isset($data_meeting) && $data_meeting->permanent_room==1) { echo 'selected' ; }?>>Permanent</option>
              <option value="0" <?php if(isset($data_meeting) && $data_meeting->permanent_room==0) { echo 'selected' ; }?>>Scheduled</option>
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
                        
                         
                        <?php 
						//echo $data_meeting->starts_at.'manish'; 
						$date='';
						if(isset($data_meeting) && !empty($data_meeting->starts_at)) { 
						$date=str_replace('T',' ',$data_meeting->starts_at) ;
						$date=substr($date,0,-9);
						}
						 ?>
					 		<input type="text" name="starts_at" id="basic_example_1" value="<?php echo $date;  ?>"  class="inp-form"/>
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
		<?php
            $date='';
			$hours='';
						if(isset($data_meeting) && !empty($data_meeting->starts_at) && !empty($data_meeting->ends_at)) { 
							$date_start=str_replace('T',' ',$data_meeting->starts_at) ;
							$date_end=str_replace('T',' ',$data_meeting->ends_at) ;
							$date_s=substr($date_start,0,-6);
							$date_e=substr($date_end,0,-6);
							$seconds = strtotime($date_e) - strtotime($date_s);
							$hours = $seconds / 60 /  60;
						}
           ?>                     
        
        	<select  id="timeEndField" name="duration" class="inp-form" >
                <option value="1" <?php if($hours==1) { echo 'selected'; } ?>>1</option>
                <option value="2" <?php if($hours==2) { echo 'selected'; } ?>>2</option>
                <option value="3" <?php if($hours==3) { echo 'selected'; } ?>>3</option>
            </select>
		</td>
		<td></td>
		</tr> 
        
        <tr>
			<th valign="top">Waiting Room Message:</th>
			<td><textarea   style="height:50px" id="description" name="description"   ><?php if(isset($data_meeting) && !empty($data_meeting->description)) { echo $data_meeting->description; }?></textarea></td>
			<td></td>
		</tr>
        
       <tr>
        <th valign="top">Access type:</th>
        
        <td>
        	<select id="access_type" name="access_type"  class="inp-form">
                <option  id="freeAccess" value="1" <?php if(isset($data_meeting) && $data_meeting->access_type==1) { echo 'selected' ; }?>>Free to all</option>
                <option  id="passwordProtected" value="2" <?php if(isset($data_meeting) && $data_meeting->access_type==2) { echo 'selected' ; }?>>Password protected</option>
                <option  id="tokenProtected" value="3" <?php if(isset($data_meeting) && $data_meeting->access_type==3) { echo 'selected' ; }?>>Token protected</option>
            </select>
        </td><td></td>
    </tr>
        
		
		
	
	
	
	
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" name="sub"  class="form-submit" id="submit"/>
			<input type="button" value="Back" class="form-reset"  onclick="window.history.back();" />
		</td>
		<td></td>
	</tr>
	</table>
    <input type="hidden" name="room_id" id="room_id" value="<?php if(isset($data_meeting) && !empty($data_meeting->click_id)) { echo $data_meeting->click_id; }?>">
<input type="hidden" name="status" id="status" value="<?php if(isset($data_meeting) && !empty($data_meeting->status)) { echo $data_meeting->status; }?>">

</form>
<?php
		}
	?>
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