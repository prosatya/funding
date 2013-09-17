<?php $class='';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo $basepath;?>">
	<meta charset="utf-8">
	<title>Welcome to clickmeeting Room Setup</title>
<link rel="stylesheet" href="public/css/style.css" type="text/css" />
<link rel="stylesheet" href="public/css/style_table.css" type="text/css" />
<link rel="stylesheet" href="public/css/modal.css" />
<script type="text/javascript"src="public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	<?php if(isset($class1)) { ?>
		$("ul.tabs li:eq(1)").addClass("active").show();
		$(".tab_content:eq(1)").show();
		//$("ul.tabs li:last").addClass("active").show(); //Activate first tab
		//$(".tab_content:last").show(); //Show first tab content
	<?php } else { ?>
	//$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	<?php } ?>
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
});
</script>
<script type="text/javascript" src="public/js/jquery-latest.js"></script>
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="public/js/scrolltable.js"></script>
<script type="text/javascript" src="public/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="public/js/jquery.tablesorter.pager.js"></script>
<script src="public/js/modal.js"></script>

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
<script type="text/javascript" >
	$(document).ready(function() {
	  	var tbl = $("table#tbl1");
	 	addZebraStripe(tbl);
	    addMouseOver(tbl);
		/* make the table scrollable with a fixed header */
	    $("table#scroll").createScrollableTable({
	    width: '800px',
	    height: '230px'
	 });
});
function addZebraStripe(table) {
     table.find("tbody tr:odd").addClass("alt");
}
function addMouseOver(table) {
	table.find("tbody tr").hover(
    function() {
    	$(this).addClass("over");
   },
   function() {
   	$(this).removeClass("over");
  });
 }
</script>
<script type="text/javascript" id="js">
$(document).ready(function() { 
     
    $('table').tablesorter({
    sortList: [[0,0], [1,0]]
});
}); 
</script>
<script>
	$(function() {
		// Create a modal instance.
		var $m = $('body').modal(),
		// Access an instance API
		api = $m.data('modal');
		// Bind a click event to copy a hidden elements content into the modal window
		$(".js-open").click(function () 
		//$(document).on('click', '.js-open', function()
		{
			var rowid = $(this).attr('id');
			api.open( document.getElementById('example-content' + rowid).innerHTML );
		});
		window.$m = $m;
	});
</script>
<script>
	$(function() {
		// Create a modal instance.
		var $m = $('body').modal(),
		// Access an instance API
		api = $m.data('modal');
		// Bind a click event to copy a hidden elements content into the modal window
		$(".js-open1").click(function () 
		//$(document).on('click', '.js-open', function()
		{
			var rowid = $(this).attr('id');
			api.open( document.getElementById('example-cat' + rowid).innerHTML );
		});
		window.$m = $m;
	});
</script>

<script>
$(function() {
	// Create a modal instance.
	var $m = $('body').modal(),
	// Access an instance API
	api = $m.data('modal');
	// Bind a click event to copy a hidden elements content into the modal window
	$(".js-open2").click(function () {
	//$(document).on('click', '.js-open', function()
		var rowid = $(this).attr('id');
		api.open( document.getElementById('example-dif' + rowid).innerHTML );
	});
	window.$m = $m;
});
</script>

</head>
<body>
<h1><a href="meeting">Create Meeting</a></h1>
<h1>View Meeting</h1>

 <div class="wrapper">
   <div class="main">
     <div class="sitemain">
       <div class="tbaledata">
         <div class="container">
           <ul class="tabs">
                <li <?php if(isset($class1)) { ?> class="<?php echo $class1; ?>" <?php } ?>><a href="#tab1">Show All</a></li>
                <li class="<?php echo $class;?>"><a href="#tab2">Meeting</a></li>
                <li><a href="#tab3">Webinar</a></li>
                
            </ul>
                <div class="tab_container">
                    <div id="tab1" class="tab_content">
                    <form name="showall" id="showall" method="post" action="meeting/view">
	<input type="hidden" name="page" id="page" value="" />
	</form>
                        <table cellspacing="1" class="tablesorter" id="tbl1 scroll">  
                            <thead>
                                <tr>
                                  
                                 <th> Date  </th>
                                 <th>Webinar </th>
                                 <th></th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            
							<?php 
							if($rows) { 
							foreach($rows as $meeting) {?>
                            <tr> 
                            <td><strong>Starts on <?php 
							
							$str=str_replace('T0',' ',$meeting->starts_at);
							$dateString = $str;
							$dateObject = new DateTime($dateString);
							$start= $dateObject->format('Y-m-d h:i A');
							
							$str1=str_replace('T0',' ',$meeting->ends_at);
							$dateString1 = $str1;
							$dateObject1 = new DateTime($dateString1);
							$end= $dateObject1->format('h:i A');
							
							echo $start.'-'.$end; 
							 ?></strong></td>
                            <td><?php echo $meeting->name .'<br/>'.$meeting->room_url.'<br/>Phone Presenter PIN: '.$meeting->phone_presenter_pin.'<br/>Phone Participant PIN: '.$meeting->phone_listener_pin; ?></td>
                           <td><a href="meeting/details/<?php echo base64_encode($meeting->room_id);?>">View Details </a><br/> <a href="meeting/edit/<?php echo base64_encode($meeting->room_id);?>">Edit Details</a><br/> <a href="meeting/delete/<?php echo base64_encode($meeting->click_id);?>">Delete</a>
                           <br/> <a href="meeting/invite/<?php echo base64_encode($meeting->click_id);?>">Invite user</a>
                           </td>
                                  </tr>                        
                           <?php } ?>
                           
                            </tbody>
                        </table>
                        <table align="center">
                         <tr>
                                 <td colspan="3" align="center"><?php echo 'Total &nbsp;'.$total; if($total>2){?>
            						<div id="paging">
           				              Page&nbsp;<?php echo $this->pagination->create_links();?></div>
         				          <?php } } else { ?>
							   
							   <tr>
                               		<td  colspan="3" align="center"><strong>No record(s) found.</strong></td>
                               </tr>
							   <?php } ?>	
                                  </td>
                            </tr>
                        </table>
                    </div>
                    <div id="tab2" class="tab_content">
                        <table cellspacing="1" class="tablesorter" id="tbl1 scroll">  
                            <thead>
                                <tr>
                                  
                                 <th> Date  </th>
                                 <th>Webinar </th>
                                 <th></th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            
							<?php 
							 if($rows1) {
							foreach($rows1 as $meeting1) {?>
                            <tr> 
                            <td><strong>Starts on <?php 
							
							$str1=str_replace('T0',' ',$meeting1->starts_at);
							$dateString1 = $str1;
							$dateObject1 = new DateTime($dateString1);
							$start1= $dateObject1->format('Y-m-d h:i A');
							
							$str11=str_replace('T0',' ',$meeting1->ends_at);
							$dateString11 = $str11;
							$dateObject11 = new DateTime($dateString11);
							$end1= $dateObject11->format('h:i A');
							
							echo $start1.'-'.$end1; 
							 ?></strong></td>
                            <td><?php echo $meeting1->name .'<br/>'.$meeting1->room_url.'<br/>Phone Presenter PIN: '.$meeting1->phone_presenter_pin.'<br/>Phone Participant PIN: '.$meeting1->phone_listener_pin; ?></td>
                            <td><a href="meeting/details/<?php echo base64_encode($meeting1->room_id);?>">View Details </a><br/> <a href="meeting/edit/<?php echo base64_encode($meeting1->room_id);?>">Edit Details</a><br/> <a href="meeting/delete/<?php echo base64_encode($meeting1->click_id);?>">Delete</a>
                             <br/> <a href="meeting/invite/<?php echo base64_encode($meeting1->click_id);?>">Invite user</a>
                            
                            </td>
                                  </tr>                        
                           <?php }  } else { ?>
							   
							   <tr>
                               		<td  colspan="3" align="center"><strong>No record(s) found.</strong></td>
                               </tr>
							   
                           <?php } ?>
                            </tbody>
                        </table>
                        
                </div>
                    <div id="tab3" class="tab_content">
                       <table cellspacing="1" class="tablesorter" id="tbl1 scroll">  
                            <thead>
                                <tr>
                                  
                                 <th> Date  </th>
                                 <th>Webinar </th>
                                 <th></th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            
							<?php 
							if($rows2) { 
							foreach($rows2 as $meeting2) {?>
                            <tr> 
                            <td><strong>Starts on <?php 
							
							$str2=str_replace('T0',' ',$meeting2->starts_at);
							$dateString2 = $str2;
							$dateObject2 = new DateTime($dateString2);
							$start2= $dateObject2->format('Y-m-d h:i A');
							
							$str12=str_replace('T0',' ',$meeting2->ends_at);
							$dateString12 = $str12;
							$dateObject12 = new DateTime($dateString12);
							$end2= $dateObject12->format('h:i A');
							
							echo $start2.'-'.$end2; 
							 ?></strong></td>
                            <td><?php echo $meeting2->name .'<br/>'.$meeting2->room_url.'<br/>Phone Presenter PIN: '.$meeting2->phone_presenter_pin.'<br/>Phone Participant PIN: '.$meeting2->phone_listener_pin; ?></td>
                           <td><a href="meeting/details/<?php echo base64_encode($meeting2->room_id);?>">View Details </a><br/> <a href="meeting/edit/<?php echo base64_encode($meeting2->room_id);?>">Edit Details</a><br/> <a href="meeting/delete/<?php echo base64_encode($meeting2->click_id);?>">Delete</a>
                           <br/> <a href="meeting/invite/<?php echo base64_encode($meeting2->click_id);?>">Invite user</a>
                           </td>
                                  </tr>                        
                           <?php } } else { ?>
							   
							   <tr>
                               		<td colspan="3" align="center"><strong>No record(s) found.</strong></td>
                               </tr>
							   
							   
							   
							   <?php
							   } ?>
                           
                          
                            </tbody>
                        </table>
                </div>
                    
                    
               </div>
          </div>
        </div>
   </div>
    </div>
</div>

</body>
</html>