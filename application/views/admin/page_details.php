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
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="public/admin/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="public/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="public/admin/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="public/admin/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="public/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="public/admin/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="css/datePicker.css" type="text/css" />
<script src="public/admin/js/jquery/date.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/manage-cmn.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/status.js" type="text/javascript"></script>
<!--Popup start-->
	<link rel="stylesheet" href="public/admin/css/general.css" type="text/css" media="screen" />
	<script src="public/admin/js/jquery/jquery-1.2.6.min.js" type="text/javascript"></script>
<script src="public/admin/js/jquery/popup.js" type="text/javascript"></script>


<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="public/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript"> 
 function scrollup(id) {
	pid=id;
	window.scrollBy(-500,-500);
}
function deleteuser(flag) {
	var delete_url="admin/deletepage/"+pid;	
	if(flag=='yes' && pid!='') {
		window.location.href=delete_url;
	} else {
		disablePopup();
	}
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	
	//LOADING POPUP
	//Click the button event!
	jQuery ("a.button").click(function(){
		//centering with css
		centerPopup();
		//load popup
		loadPopup();
	});
	//CLOSING POPUP
	//Click the x event!
	$("#popupContactClose").click(function(){
		disablePopup();
	});
	//Click out event!
	$("#backgroundPopup").click(function(){
		disablePopup();
	});
	//Press Escape event!
	$(document).keypress(function(e){
		if(e.keyCode==27 && popupStatus==1){
			disablePopup();
		}
	});

});
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

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Manage Pages</h1>
        <span style="float:right;margin-right:30px;font-size:18px;font-weight:bold;"><a href="admin/add_page" style="color:#000;">Add New Page</a></span>
	</div>
	<!-- end page-heading -->
 		<?php if($this->session->flashdata('flash_success')) ?>
		  <div align="center" style="color:#006600;">
		 
		  <?php 
		   { echo '<strong>'.$this->session->flashdata('flash_success').'</strong>'; 
		   ?>
		   </div>
		   <?php } ?>
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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			
				 
		
		 
				<!--  start product-table ..................................................................................... -->
				 <form name="record_list" method="post" action="admin/page_list" id="record_list">
                  <input type="hidden" name="orderby" value="<?php if(isset($orderby)) echo $orderby; else echo 'user_id'; ?>" />
                  <input type="hidden" name="order" value="<?php if(isset($order)) echo $order; else echo 'DESC'; ?>" />
                  <input type="hidden" name="page" value="" />
                  <input type="hidden" name="delreq" value="" />
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><span  style="color: #FFFFFF;font-family: Tahoma;font-size: 13px;font-weight: bold;line-height:14px;padding-left:5px;">S.No.</span> </th>
					<th class="table-header-repeat line-left minwidth-1"><a style="cursor:pointer; color:#FFFFFF;" onclick="fun_orderby('page_name ',record_list);" title="Click to arrange in ascending/descending order."><strong >  Page Name </strong></a>	</th>
					<th class="table-header-repeat line-left minwidth-1"><a style="cursor:pointer; color:#FFFFFF;" onclick="fun_orderby('page_heading',record_list);" title="Click to arrange in ascending/descending order."><strong > Page Heading </strong></a></th>
					 
					 
					<th class="table-header-options line-left"><span  style="color: #FFFFFF;font-family: Tahoma;font-size: 13px;font-weight: bold;line-height:14px;padding-left:5px;">Options</span></th>
				</tr>
                <?php
				$i=0;
				if($records) {
					if($page==0) { $i=1; } else { $i=$page+1; } 
					foreach($records as $row) {	
					if($i%2==0) { $class='alternate-row'; }	else { $class=''; } 
				?>	  
				<tr class="<?php echo $class; ?>">
					<td><?php echo $i;?></td>
					<td title="<?php $name=$row->page_name ;?>"><?php echo stripslashes($this->utility->limit_char($row->page_name,100));?></td>
					<td title="<?php $user_email=$row->page_heading ;?>"><?php echo stripslashes($this->utility->limit_char($row->page_heading,100));?></td>
					 
					 
					<td class="options-width">
                    <span id="st<?php echo $row->id;?>" title="click to change status."> <?php if($row->status==1){?> <img src="public/admin/images/ico4.png" style="cursor:pointer;" border="0" onclick="change_status(<?php echo $row->id;?>,'deactivate','pages');"><?php } else { ?> <img src="public/admin/images/ico5.png" style="cursor:pointer;" border="0" onclick="change_status(<?php echo $row->id;?>,'activate','pages');"> <?php }?></span>
					<span><a href="admin/view_page/<?php echo $row->id; ?>" title="View page  profile details."><img src="public/admin/images/view.png"/></a></span>
                    <span><a href="admin/edit_page/<?php echo $row->id; ?>" title="Click to edit page."><img src="public/admin/images/ico3.png"/></a></span>
                       <span><a class="button" title="Delete page profile."><img src="public/admin/images/ico7.png" width="15" height="15" hspace="5" vspace="2" align="absmiddle" onclick="scrollup('<?php echo $row->id; ?>')"/></a></span>
					
					</td>
				</tr>
                <?php
					$i++;
					}
				} else {	
				?>
			  <tr>
                <td colspan="4" align="center" height="50"><b>Sorry, no records found for this query.</b></td>
              </tr>
              <?php } ?>     
				
				
				</table>
				<!--  end product-table................................... --> 
				
			</div>
			<!--  end content-table  -->
		
			<!--  start actions-box ............................................... -->
			
			<!-- end actions-box........... -->
			
			<!--  start paging..................................................... -->
            
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				 
				<div id="page-info"><?php echo $this->pagination->create_links();?></div>
				 
			</td>
			
			</tr>
			</table>
            </form>
			<!--  end paging................ -->
	<div id="popupContact">
			   
		<h2 style="color:#000000;"><img src="public/admin/images/icon7.png" align="absmiddle" /> Alert Message</h2>
		<p class="txt14">
			Are you sure you want to delete this page?</p>
		
		<div style="width:330px; text-align:center; padding-top: 32px;"><a onclick="deleteuser('yes');" class="" id="popupContactClose"><img src="public/admin/images/yes_btn.png" border="0" /></a>
		<a onclick="deleteuser('no');" id="popupContactClose"><img src="public/admin/images/no_btn.png" border="0" /></a>
		
		</div>
		</div>		
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
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