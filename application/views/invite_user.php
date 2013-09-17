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
if($room)
foreach($room as $room_data) {
	
?>
<h1><a href="meeting/view">View Meeting</a></h1>
<h1>Invite user to room <strong style="color:#F00;"><?php echo $room_data->name ;?></strong> for join Meeting</h1>
<h4>Room URL : <strong style="color:#033;"><?php echo $room_data->room_url ;?></strong></h4>

<form name="login_frm" id="login_frm" method="post" action="meeting/sendmail">
<table>
   
   
    <tr>
    	<td><label for="conference_name">User name:</label></td>
        <td>
         <select name="user[]" id="name" multiple="multiple"  size="5">
         		
         	<?php 
			
				foreach($user as $user_data) {
			 
			?>
            <option value="<?php echo $user_data->user_email; ?>"><?php echo $user_data->user_name; ?></option>
            <?php } ?>
         </select><br>Press CTRL key to Multiple select
        </td>
         
    </tr>
    
    	<td align="center" colspan="3">
        <input type="hidden" name="room_id" id="room_id" value="<?php echo $room_data->click_id; ?>">
<input type="hidden" name="room_url" id="room_url" value="<?php echo $room_data->room_url; ?>">
        
        <input type="submit" value="Send Invitation" id="sub" name="sub"> </td>
    </tr>

</table>

 

 </form>
 
 <?php } ?>
 <ul class="formMainUl clearfix fieldLineStyle1">
    
    
    
    
           
    
   
	
    
    <li class="fieldLine clearfix jsAccessTypeBox" id="tokenProtectedBox" style="display:none">
        <label></label>
        <span style="width:400px" class="tF-Text tF-t-2">Secure your invites with a special token so that your meetings can be accessed only by those users who received your emails. </span>
    </li>
	


</ul>

</body>
</html>