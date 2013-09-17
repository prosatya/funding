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
<script src="public/admin/js/jquery/jquery.min.js"></script>
<script src="public/admin/js/highslide/jquery/slides.min.jquery.js"></script>
<script type="text/javascript" src="public/admin/js/highslide/highslide-full.js"></script>
<link rel="stylesheet" type="text/css" href="public/admin/js/highslide/highslide.css" />
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="public/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				generateNextPrev: true,
				play: 4000,
				pause: 2500
			});
		});
		
		$(function(){
			$('#scroll').slides({
				preload: true,
				generateNextPrev: true
			});
		});
	</script>
<!--For slider end -->
<script type="text/javascript">
	hs.graphicsDir = 'public/admin/js/highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	hs.dimmingOpacity = 0.75;

	// define the restraining box
	hs.useBox = true;
	hs.width = 640;
	hs.height = 480;

	// Add the controlbar
	hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: 'fit',
		overlayOptions: {
			opacity: 1,
			position: 'bottom center',
			hideOnMouseOut: true
		}
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


<div id="page-heading"><h1>View Company</h1></div>


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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form"   >
		<tr>
			<th valign="top" width="490px">Company name:</th>
			<td><?php echo $row->company_name ; ?></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">First Name:</th>
			<td><?php echo $row->first_name ; ?></td>
			 
		</tr>
		<tr>
		<th valign="top">Last Name:</th>
		<td><?php echo $row->last_name ; ?>
		</td>
		<td></td>
		</tr>
		<tr>
		<th valign="top">Title:</th>
		<td><?php echo $row->title ; ?>
		</td>
		<td></td>
		</tr> 
		<tr>
			<th valign="top">Type:</th>
			<td><?php echo $row->type ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Address:</th>
			<td><?php echo $row->address ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">City:</th>
			<td><?php echo $row->city ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">State:</th>
			<td><?php echo $row->state ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Country:</th>
			<td><?php echo $row->country ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Zipcode:</th>
			<td><?php echo $row->zipcode ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Phone:</th>
			<td><?php echo $row->phone ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Email 1:</th>
			<td><?php echo $row->email1 ; ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Email 2:</th>
			<td><?php if(isset($row->email2)) { echo $row->email2 ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Company URL:</th>
			<td><?php if(isset($row->company_url)) { echo $row->company_url ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Facebook URL Personal:</th>
			<td><?php if(isset($row->facebook_url_personal)) { echo $row->facebook_url_personal ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Facebook URL Company:</th>
			<td><?php if(isset($row->facebook_url_company)) { echo $row->facebook_url_company ; } ?></td>
			<td></td>
		</tr>
        
        
        <tr>
			<th valign="top">Facebook URL Company:</th>
			<td><?php if(isset($row->facebook_url_company)) { echo $row->facebook_url_company ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Vkontekte Address Personal:</th>
			<td><?php if(isset($row->vkontekte_address_personal)) { echo $row->vkontekte_address_personal ; } ?></td>
			<td></td>
		</tr>
        
        
        
        <tr>
			<th valign="top">Vkontekte Address Company:</th>
			<td><?php if(isset($row->vkontekte_address_company)) { echo $row->vkontekte_address_company ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Odnoklassniki Address Personal:</th>
			<td><?php if(isset($row->odnoklassniki_address_personal)) { echo $row->odnoklassniki_address_personal ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Odnoklassniki Address Company:</th>
			<td><?php if(isset($row->odnoklassniki_address_company)) { echo $row->odnoklassniki_address_company ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Linkedin URL:</th>
			<td><?php if(isset($row->linkedin_url)) { echo $row->linkedin_url ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Twitter :</th>
			<td><?php if(isset($row->twitter)) { echo $row->twitter ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Company Registered :</th>
			<td><?php if($row->is_company_registered==1) { echo 'True'; }  if($row->is_company_registered==0) { echo 'False'; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Company Details :</th>
			<td><?php if(isset($row->company_details)) { echo $row->company_details ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Min Amount Requested:</th>
			<td><?php if(isset($row->min_amount_requested)) { echo $row->min_amount_requested ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Investment Towards:</th>
			<td><?php if(isset($row->investment_towards)) { echo $row->investment_towards ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Interested in Incrowdsourcing:</th>
			<td><?php if(isset($row->interested_in_incrowdsourcing)) { echo $row->interested_in_incrowdsourcing ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Interested in BD:</th>
			<td><?php if(isset($row->interested_in_bd)) { echo $row->interested_in_bd ; } ?></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">If so, please upload Company Registration Doc:</th>
			<td><?php if(isset($row->vkontekte_address_personal)) { echo $row->vkontekte_address_personal ; } ?></td>
			<td></td>
		</tr>
        
          <tr>
			<th valign="top">Business Plan Upload (if you have one):</th>
			<td>  <?php if(isset($row->business_plans) && !empty($row->business_plans)) { ?>
         <a href="uploads/<?php echo $row->business_plans; ?>" target="_blank"><?php $row->business_plans; ?></a> 
         <?php } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Financials Upload (any and all you may have):</th>
			<td> 
            <div class="image-left">
        	 
         <p>
         <?php if(isset($row->bios_pics1) && !empty($row->bios_pics1)) { ?>
         <a href="uploads/<?php echo $row->bios_pics1; ?>" class="highslide" onclick="return hs.expand(this)"><img src="uploads/<?php echo $row->bios_pics1; ?>" width="90" height="90" style="border:#333 1px solid"></a> 
         <?php } ?>
          <?php if(isset($row->bios_pics2) && !empty($row->bios_pics2)) { ?>
          	<a href="uploads/<?php echo $row->bios_pics2; ?>" class="highslide" onclick="return hs.expand(this)"><img src="uploads/<?php echo $row->bios_pics2; ?>" width="90" height="90" style="border:#333 1px solid; margin-left:10px;"></a>
            <?php } ?>
             <?php if(isset($row->bios_pics3) && !empty($row->bios_pics3)) { ?>
            <a href="uploads/<?php echo $row->bios_pics3; ?>" class="highslide" onclick="return hs.expand(this)"><img src="uploads/<?php echo $row->bios_pics3; ?>" width="90" height="90" style="border:#333 1px solid; margin-left:10px;"></a>
             <?php } ?>
             <?php if(isset($row->bios_pics4) && !empty($row->bios_pics4)) { ?>
              <a href="uploads/<?php echo $row->bios_pics4; ?>" class="highslide" onclick="return hs.expand(this)"><img src="uploads/<?php echo $row->bios_pics4; ?>" width="90" height="90" style="border:#333 1px solid; margin-left:10px;"></a>
             <?php } ?>
             <?php if(isset($row->bios_pics5) && !empty($row->bios_pics5)) { ?>
              <a href="uploads/<?php echo $row->bios_pics5; ?>" class="highslide" onclick="return hs.expand(this)"><img src="uploads/<?php echo $row->bios_pics5; ?>" width="90" height="90" style="border:#333 1px solid; margin-left:10px;"></a>
             <?php } ?>
          </p>
         
            
       	</div>
            	
            
            </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Bios and pics of Main Players, both Listed in Registration Material (and otheriwise) ):</th>
			<td><?php if(isset($row->vkontekte_address_personal)) { echo $row->vkontekte_address_personal ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Please upload all marketing materials you have for your project/company, including videos, slide presentations, VUIs, etc.:</th>
			<td>
            	<?php if(isset($row->marketing_material1) && !empty($row->marketing_material1)) { ?>
         <a href="uploads/<?php echo $row->marketing_material1; ?>" target="_blank"><?php $row->marketing_material1; ?></a> 
         <?php } ?>
          <?php if(isset($row->marketing_material2) && !empty($row->marketing_material2)) { ?>
         <a href="uploads/<?php echo $row->marketing_material2; ?>" target="_blank"><?php $row->marketing_material2; ?></a> 
         <?php } ?>
             <?php if(isset($row->marketing_material3) && !empty($row->marketing_material3)) { ?>
         <a href="uploads/<?php echo $row->marketing_material3; ?>" target="_blank"><?php $row->marketing_material3; ?></a> 
         <?php } ?>
            <?php if(isset($row->marketing_material4) && !empty($row->marketing_material4)) { ?>
         <a href="uploads/<?php echo $row->marketing_material4; ?>" target="_blank"><?php $row->marketing_material4; ?></a> 
         <?php } ?>
            <?php if(isset($row->marketing_material5) && !empty($row->marketing_material5)) { ?>
         <a href="uploads/<?php echo $row->marketing_material5; ?>" target="_blank"><?php $row->marketing_material5; ?></a> 
         <?php } ?>
            
            
            </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Please include all positive press/feedback from professionals you have about your company:</th>
			<td><?php if(isset($row->vkontekte_address_personal)) { echo $row->vkontekte_address_personal ; } ?></td>
			<td></td>
		</tr>
        
        
         <tr>
			<th valign="top">Strategy Details:</th>
			<td><?php if(isset($row->strategy_details)) { echo $row->strategy_details ; } ?></td>
			<td></td>
		</tr>
        
		<tr>
		<th valign="top">Status:</th>
		<td><?php if($row->status==1) { echo 'Active'; }  if($row->status==0) { echo 'Deactive'; } ?>
		</td>
		<td></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
        <form method="post" action="admin/edit_company/<?php echo $row->id ; ?>">
			<input type="image"  class="form-submit" />
			<input type="button" value="Back" class="form-reset"  onclick="window.history.back();" />
        </form>    
		</td>
		<td></td>
	</tr>
	</table>
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