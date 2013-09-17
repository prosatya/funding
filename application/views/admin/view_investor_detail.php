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


<div id="page-heading"><h1>View Investor</h1></div>


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
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top" style="width:350px;">Company name:</th>
			<td><?php  if(isset($row->company)) { echo $row->company ; } ?></td>
			<td></td>
		</tr>
        <tr>
		<th valign="top">Title:</th>
		<td><?php if(isset($row->title)) { echo $row->title ; } ?>
		</td>
		<td></td>
		</tr> 
		<tr>
			<th valign="top">First Name:</th>
			<td><?php if(isset($row->first_name)) { echo $row->first_name ; } ?></td>
			 
		</tr>
		<tr>
		<th valign="top">Last Name:</th>
		<td><?php if(isset($row->last_name)) { echo $row->last_name ; }?>
		</td>
		<td></td>
		</tr>
		
		<tr>
			<th valign="top">Project type:</th>
			<td><?php if(isset($row->project_type)) { echo $row->project_type ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Address:</th>
			<td><?php if(isset($row->address)) { echo $row->address ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Contact number:</th>
			<td><?php  if(isset($row->contact_number)) {  echo $row->contact_number ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Email 1:</th>
			<td><?php  if(isset($row->email1)) { echo $row->email1 ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Email 2:</th>
			<td><?php if(isset($row->email2)) { echo $row->email2 ; } ?></td>
			<td></td>
		</tr>
         <tr>
			<th valign="top">Skype:</th>
			<td><?php if(isset($row->skype)) { echo $row->skype ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Company URL:</th>
			<td><?php if(isset($row->company_url)) { echo $row->company_url ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Facebook URL:</th>
			<td><?php if(isset($row->facebook_url)) { echo $row->facebook_url ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Linkedin URL:</th>
			<td><?php if(isset($row->linkedin_url)) { echo $row->linkedin_url ; } ?></td>
			<td></td>
		</tr>
        <tr>
			<th valign="top">State Company Registered:</th>
			<td><?php  if(isset($row->state_company_registered)) { echo   $row->state_company_registered ; } ?></td>
			<td></td>
		</tr> 
    
        <tr>
			<th valign="top">Country:</th>
			<td><?php if(isset($row->country)) {  echo $row->country ; } ?></td>
			<td></td>
		</tr> 
        
        <tr>
			<th valign="top">Company type:</th>
			<td><?php if(isset($row->company_type)) { echo $row->company_type ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">current_capitalization:</th>
			<td><?php if(isset($row->current_capitalization)) { echo $row->current_capitalization ; }  ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Seeking Company:</th>
			<td><?php if(isset($row->seeking_company)) {  echo $row->seeking_company ; } ?></td>
			<td></td>
		</tr>
        
       
        
         <tr>
			<th valign="top">Investment size:</th>
			<td><?php if(isset($row->investment_size)) { echo $row->investment_size ; } ?></td>
			<td></td>
		</tr>
        
        
        <tr>
			<th valign="top">Minimum Amt:</th>
			<td><?php if(isset($row->min_amt)) { echo $row->min_amt ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Maximum Amt:</th>
			<td><?php if(isset($row->max_amt)) { echo $row->max_amt ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Ownership Share:</th>
			<td><?php if(isset($row->ownership_share)) { echo $row->ownership_share ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Control Percentage:</th>
			<td><?php if(isset($row->control_percentage)) { echo $row->control_percentage ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Investor Details:</th>
			<td><?php if(isset($row->investor_details)) { echo $row->investor_details ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Companies Looking:</th>
			<td><?php if(isset($row->companies_looking)) { echo $row->companies_looking ; } ?></td>
			<td></td>
		</tr>
        
           <tr>
			<th valign="top">Experience in Russia:</th>
			<td><?php if(isset($row->experience_in_russia)) { echo $row->experience_in_russia ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Experience in Investment:</th>
			<td><?php if(isset($row->experience_in_investment)) { echo $row->experience_in_investment ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Portfolio:</th>
			<td><?php if(isset($row->portfolio)) { echo $row->portfolio ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Average ROI:</th>
			<td><?php if(isset($row->average_roi)) { echo $row->average_roi ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Time for returns:</th>
			<td><?php if(isset($row->time_for_returns)) { echo $row->time_for_returns ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">About Investment:</th>
			<td><?php if(isset($row->about_investment)) { echo $row->about_investment ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Investing Experience:</th>
			<td><?php if(isset($row->investing_experience)) { echo $row->investing_experience ; } ?></td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Ratings:</th>
			<td><?php if(isset($row->ratings)) { echo $row->ratings ; } ?></td>
			<td></td>
		</tr>
         	
        <tr>
			<th valign="top">Interested in Crowdsourcing:</th>
			<td><?php if(isset($row->interested_in_crowdsourcing)) { echo $row->interested_in_crowdsourcing ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Project Consideration:</th>
			<td><?php if($row->project_consideration==1) { echo 'True'; }  if($row->project_consideration==0) { echo 'False'; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Partners Consideration:</th>
			<td><?php if($row->partners_consideration==1) { echo 'True'; }  if($row->partners_consideration==0) { echo 'False'; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Companies Intrested in:</th>
			<td><?php if(isset($row->companies_intrested_in)) { echo $row->companies_intrested_in ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Investment strategies:</th>
			<td><?php if(isset($row->investment_strategies)) { echo $row->investment_strategies ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Competitors:</th>
			<td><?php if(isset($row->competitors)) { echo $row->competitors ; } ?></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Create Date:</th>
			<td><?php if(isset($row->create_date)) { echo $row->create_date ; } ?></td>
			<td></td>
		</tr>
        
            
		<tr>
		<th valign="top">Status:</th>
		<td><?php if($row->status==1) { echo 'Active'; }  if($row->status==0) { echo 'Deactive'; } ?>
		</td>
		<td></td>
		</tr>
        <tr>
		<th valign="top">Is Feature:</th>
		<td><?php if($row->is_feature==1) { echo 'Yes'; }  if($row->is_feature==0) { echo 'No'; } ?>
		</td>
		<td></td>
		</tr>
        
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
        <form method="post" action="admin/edit_investor/<?php echo $row->id ; ?>">
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