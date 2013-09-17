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
<?php 
		foreach($details as $data_meeting) {
			 
			 ?>
<h1><a href="meeting/view">View all Meeting</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="meeting">Create new Meeting</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="meeting/edit/<?php echo base64_encode($data_meeting->room_id);?>">Edit Meeting</a>   &nbsp;&nbsp; | &nbsp;&nbsp; <a href="meeting/invite/<?php echo base64_encode($data_meeting->room_id);?>">User Invite</a></h1>
<h1>Welcome to <strong style="color:#060;"><?php echo $data_meeting->name; ?></strong> Room detail</h1>
<form name="login_frm" id="login_frm" method="post" action="meeting/setup">
<table>
    
        
   
    <tr>
    	<td><label for="conference_name">Room name:</label></td>
        <td>
      <?php echo $data_meeting->name ; ?>
        </td>
    </tr>
    <tr>
        <td><label for="conference_url">Room </label></td>
        <td>
	  <?php if($data_meeting->room_type=='meeting') { echo 'Meeting'; } elseif($data_meeting->room_type=='webinar') { echo 'Webinar'; } ?>
	
        </td>
    	<td></td>
    </tr>
    <tr>
        <td><label for="permanent_endless_enabled">Room type:</label></td>
        <td>
        	<?php if($data_meeting->permanent_room==0) { echo 'Scheduled'; } elseif($permanent_room->room_type==1) { echo 'Permanent'; } ?>
	  
       
	 
    </tr>
    <tr>
        <td><label for="even_date">Event Date:</label></td>
        <td> Starts on <?php 
							
							$str1=str_replace('T0',' ',$data_meeting->starts_at);
							$dateString1 = $str1;
							$dateObject1 = new DateTime($dateString1);
							$start1= $dateObject1->format('Y-m-d h:i A');
							
							$str11=str_replace('T0',' ',$data_meeting->ends_at);
							$dateString11 = $str11;
							$dateObject11 = new DateTime($dateString11);
							$end1= $dateObject11->format('h:i A');
							
							echo $start1.'&nbsp;To&nbsp;'.$end1; 
							 ?> 
                             
                              </td>
    </tr>
     
    <tr>
        <td><label for="conference_lobby_description">Waiting Room Message:</label></td>
        <td> <?php echo $data_meeting->description ; ?> </td>
    
    </tr>
    <tr>
        <td><label for="fAccessType">Room URL:</label></td>
       <td> <?php echo $data_meeting->room_url ; ?> </td>
    </tr>
    
    <tr>
        <td><label for="fAccessType">Listener:</label></td>
       <td> <?php echo $data_meeting->listener ; ?> </td>
    </tr>
    
    <tr>
        <td><label for="fAccessType">Presenter:</label></td>
       <td> <?php echo $data_meeting->presenter ; ?> </td>
    </tr>
    
    <tr>
        <td><label for="fAccessType">Room Embed URL:</label></td>
       <td> <?php echo $data_meeting->embed_room_url ; ?> </td>
    </tr>
    
    <tr>
        <td><label for="fAccessType">Phone Presenter Pin:</label></td>
       <td> <?php echo $data_meeting->phone_presenter_pin ; ?> </td>
    </tr>
    <tr>
        <td><label for="fAccessType">Phone Listener Pin:</label></td>
       <td> <?php echo $data_meeting->phone_listener_pin ; ?> </td>
    </tr>
    
	 
 
</table>
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