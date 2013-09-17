<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo $basepath;?>">
	<meta charset="utf-8">
	<title>Welcome to clickmeeting Room Setup</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>
<h1><a href="meeting/view">View Meeting</a></h1>
<h1>Welcome to edit clickmeeting Room Setup</h1>
<?php 
		foreach($edit as $data_meeting) {
			 
	?>
<form name="login_frm" id="login_frm" method="post" action="meeting/edit/<?php echo base64_encode($data_meeting->room_id);?>">
<table>
    <?php 
		if(isset($this->data['message'])) { ?>
       <tr>
       	<td colspan="2" align="center"><?php echo $this->data['message'];?></td>
        </tr>
    <?php
		}
	?>
    
    <tr>
    	<td><label for="conference_name">Room name:</label></td>
        <td>
        <input type="text" maxlength="32" name="name" id="name" class="sizer38"  value="<?php if(isset($data_meeting) && !empty($data_meeting->name)) { echo $data_meeting->name; }?>" />
        </td>
    </tr>
    <tr>
        <td><label for="conference_url">Room </label></td>
        <td>
	 <select name="romm type" id="room_type">
	  <option value="meeting" <?php if(isset($data_meeting) && $data_meeting->name_url=='meeting') { echo 'selected' ; }?>>Meeting</option>
	  <option value="webinar" <?php if(isset($data_meeting) && $data_meeting->name_url=='webinar') { echo 'selected' ; }?>>Webinar</option>
	</select>
	
        </td>
    	<td></td>
    </tr>
    <tr>
        <td><label for="permanent_endless_enabled">Room type:</label></td>
        <td>
	  <select name="permanent_room" id="permanent_room">
	  <option value="1" <?php if(isset($data_meeting) && $data_meeting->permanent_room==1) { echo 'selected' ; }?>>Permanent</option>
	  <option value="0" <?php if(isset($data_meeting) && $data_meeting->permanent_room==0) { echo 'selected' ; }?>>Scheduled</option>
	  </select>
	 
    </tr>
    <tr>
        <td><label for="even_date">Event Start Date:</label></td>
        <td> Format "2013-03-15 03:15"
	
	
	<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.0/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="public/css/jquery-ui-timepicker-addon.css" />
		
		<script type="text/javascript" src="public/js/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="public/js/jquery-ui-1.10.2.custom.js"></script>
		<script type="text/javascript" src="public/js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="public/js/jquery-ui-sliderAccess.js"></script>
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
						$date='';
						if(isset($data_meeting) && !empty($data_meeting->starts_at)) { 
						$date=str_replace('T',' ',$data_meeting->starts_at) ;
						$date=substr($date,0,-9);
						}
						 ?>
					 		<input type="text" name="starts_at" id="basic_example_1" value="<?php echo $date;  ?>" />
						</div>					
<pre>
$('#basic_example_1').datetimepicker();
</pre>
					</div>
	
	
	
	</td>
    </tr>
    <tr>
        <td><label for="even_date">Time Zone:</label></td>
        <td>
	 <select name='timezoe'>
	  <option value="America/New_York">America/New York</option>
	 </select>
	</td>
    </tr>
    
    <tr>
        <td><label for="timeEndField">Duration: up to </label></td>
        <td>
			<?php
            $date='';
						if(isset($data_meeting) && !empty($data_meeting->starts_at) && !empty($data_meeting->ends_at)) { 
							$date_start=str_replace('T',' ',$data_meeting->starts_at) ;
							$date_end=str_replace('T',' ',$data_meeting->ends_at) ;
							$date_s=substr($date_start,0,-6);
							$date_e=substr($date_end,0,-6);
							$seconds = strtotime($date_e) - strtotime($date_s);
							$hours = $seconds / 60 /  60;
						}
           ?>                     
        
        	<select class="sizer5" id="timeEndField" name="duration" >
                <option value="1" <?php if($hours==1) { echo 'selected'; } ?>>1</option>
                <option value="2" <?php if($hours==2) { echo 'selected'; } ?>>2</option>
                <option value="3" <?php if($hours==3) { echo 'selected'; } ?>>3</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><label for="conference_lobby_description">Waiting Room Message:</label></td>
        <td> <textarea   style="height:50px" id="description" name="description"><?php if(isset($data_meeting) && !empty($data_meeting->description)) { echo $data_meeting->description; }?></textarea></td>
    
    </tr>
    <tr>
        <td><label for="fAccessType">Access type:</label></td>
        <td>
        	<select id="access_type" name="access_type" style="width:202px;">
                <option  id="freeAccess" value="1" <?php if(isset($data_meeting) && $data_meeting->access_type==1) { echo 'selected' ; }?>>Free to all</option>
                <option  id="passwordProtected" value="2" <?php if(isset($data_meeting) && $data_meeting->access_type==2) { echo 'selected' ; }?>>Password protected</option>
                <option  id="tokenProtected" value="3" <?php if(isset($data_meeting) && $data_meeting->access_type==3) { echo 'selected' ; }?>>Token protected</option>
            </select>
        </td>
    </tr>
	<tr>
    	<td align="center" colspan="3"><input type="submit" value="Submit" id="sub" name="sub"> </td>
    </tr>

</table>
<input type="hidden" name="room_id" id="room_id" value="<?php if(isset($data_meeting) && !empty($data_meeting->click_id)) { echo $data_meeting->click_id; }?>">
<input type="hidden" name="status" id="status" value="<?php if(isset($data_meeting) && !empty($data_meeting->status)) { echo $data_meeting->status; }?>">

</form>
<?php
		}
	?>
 <ul class="formMainUl clearfix fieldLineStyle1">
    
    
    
    
           
    
   
	
    
    <li class="fieldLine clearfix jsAccessTypeBox" id="tokenProtectedBox" style="display:none">
        <label></label>
        <span style="width:400px" class="tF-Text tF-t-2">Secure your invites with a special token so that your meetings can be accessed only by those users who received your emails. </span>
    </li>
	


</ul>

</body>
</html>