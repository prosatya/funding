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
		company: {
			required: true
		},
		title: {
			required: true
		},
		first_name: {
			required: true
		},
		last_name: {
			required: true
		},
		project_type: {
			required: true
		},
		address: {
			required: true
		},
		contact_number: {
			required: true
		},
		country: {
			required: true
		},
		company_type: {
			required: true
		},
		current_capitalization: {
			required: true
		},
		email1: {
			required: true,
			email:true
		},
		company_url: {
			required: true,
			url:true
		},
		min_amt: {
			required: true
		},
		max_amt: {
			required: true
		},
		ownership_share: {
			required: true
		},
		experience_in_investment: {
			required: true
		},
		portfolio: {
			required: true
		},
		average_roi: {
			required: true
		},
		experience_in_russia: {
			required: true
		},
		major_assets: {
			required: true
		},
		companies_you_emulate: {
			required: true
		},
		competitors: {
			required: true
		},
		companies_you_emulate: {
			required: true
		},
		market_research: {
			required: true
		}
		
	},
	messages: {
	   company: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The company field is required.</div></td>"
		},
		title: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The title field is required.</div></td>"
			 	
		},
		first_name: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The first name field is required.</div></td>"	
		},
		last_name: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The last name field is required.</div></td>" 
			 		
		},
		project_type: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The project type field is required.</div></td>"	
		},
		address: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The address field is required.</div></td>" 
			 
		},
		contact_number: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The contact number field is required.</div></td>"	
		},
		country: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The country field is required.</div></td>" 
			 	
		},
		company_type: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The company type field is required.</div></td>" 
			 	
		},
		current_capitalization: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The current capitalization field is required.</div></td>" 
			 	
		},
		email1: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The email 1 field is required.</div></td>"	,
			email: "<td><div class='error-left'></div><div class='error-inner'>Invalid email address.</div></td>"	
		},
		company_url: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The company url field is required.</div></td>",
			url: "<td><div class='error-left'></div><div class='error-inner'>Invalid url.</div></td>"	
				
		},
		min_amt: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The mininum amt field is required.</div></td>"	
		},
		max_amt: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The maximum amount requested field is required.</div></td>" 
			 		
		},
		ownership_share: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The ownership share field is required.</div></td>"	
		},
		experience_in_investment: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The experience in investment field is required.</div></td>" 
			 	
		},
		portfolio: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The portfolio field is required.</div></td>"	
		},
		average_roi: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The average roi field is required.</div></td>"
			 	
		},
		experience_in_russia: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The experience in russia field is required.</div></td>"	
		},
		major_assets: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The major assets field is required.</div></td>" 
			 		
		},
		companies_you_emulate: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The companies you emulate field is required.</div></td>"	
		},
		competitors: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The competitors field is required.</div></td>" 
			 		
		},
		companies_you_emulate: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The companies you emulate field is required.</div></td>"	
		},
		market_research: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The market research field is required.</div></td>" 
			 	
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


<div id="page-heading"><h1>Edit Investor</h1></div>


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
		 <form name="manage_record" method="post" action="<?php echo ($invest_id) ? "admin/edit_investor/$invest_id" : "admin/edit_investor";?>" id="manage_record">
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        
        
		<tr>
			<th valign="top" style="width:250px;">Company name:</th>
			<td><input type="text" name="company" id="company" class="inp-form" value="<?php if(isset($row) && !empty($row->company)) { echo $row->company ; } ?>" /></td>
			<td></td>
		</tr>
        <th valign="top">Title:</th>
		<td>
                <select name="title" class="inp-form" id="title">
                    <option value="Mr" <?php if($row->title=='Mr') { echo 'selected' ;}?>>Mr</option>
                    <option value="Miss"  <?php if($row->title=='Miss') { echo 'selected' ;}?>>Miss</option>
                    <option value="Mrs"  <?php if($row->title=='Mrs') { echo 'selected' ;}?>>Mrs</option>
                    <option value="Dr"  <?php if($row->title=='Dr') { echo 'selected' ;}?>>Dr</option>
                </select>
        
        	
		
		</td>
		<td></td>
		</tr> 
		<tr>
			<th valign="top">First Name:</th>
			<td><input type="text" class="inp-form" name="first_name"  id="first_name" value="<?php if(isset($row) && !empty($row->first_name)) { echo $row->first_name ; } ?>" /></td>
			<td>
			
			</td>
		</tr>
		<tr>
		<th valign="top">Last Name:</th>
		<td>
	       <input type="text" class="inp-form" name="last_name"  id="last_name" value="<?php if(isset($row) && !empty($row->last_name)) { echo $row->last_name ; } ?>" />	
		 
		</td>
		<td></td>
		</tr>
		  <tr>
			<th valign="top">Project Type:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->project_type)) { echo $row->project_type ; } ?>" name="project_type"  id="project_type"/></td>
			<td></td>
		</tr>
		
		<!--<tr>
			<th valign="top">Type:</th>
			<td><select multiple="multiple" name="type" > <?php
            		#$option = array('New Media'=>'New Media','Design and Publishing Software'=>'Design and Publishing Software','Digital Advertising/Marketing Technology'=>'Digital Advertising/Marketing Technology','Dating and Matchmaking'=>'Dating and Matchmaking','On-Line Commerce'=>'On-Line Commerce','Digital Audio and Visual'=>'Digital Audio and Visual','Search Engine/SEO techs'=>'Search Engine/SEO techs','Gaming'=>'Gaming','VoIP'=>'VoIP','Social Networking Site/App'=>'Social Networking Site/App','Internet Security'=>'Internet Security','Internet Access'=>'Internet Access','Mobile Content'=>'Mobile Content','Mobile Deivices'=>'Mobile Deivices','Mobile Marketing'=>'Mobile Marketing','Satellites'=>'Satellites','IPTV'=>'IPTV','Digital TV'=>'Digital TV','Software'=>'Software','Anti-Virus Programs'=>'Anti-Virus Programs','Location-Based technology'=>'Location-Based technology','Wimax'=>'Wimax','LTE'=>'LTE','Other'=>'Other');       ?>  

					<option value="">Select</option>

					<?php #foreach($option as $key=>$value)

					#{

					?>

        <option value="<?php #echo $value;?>" <?php #if($row->type==$value){?> selected="selected" <?php # } ?>><?php #echo $value;?></option>

        <?php

			# }

					?>
            
            
            		
                   </select>
            	
            
           </td>
			<td></td>
		</tr>-->
		
	
    
    <tr>
			<th valign="top">Address:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->address)) { echo $row->address ; } ?>" name="address"  id="address"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Contact number:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->contact_number)) { echo $row->contact_number ; } ?>" name="contact_number"  id="contact_number"/></td>
			<td></td>
		</tr>
        
       <!-- <tr>
			<th valign="top">State:</th>
			<td> <input type="text" class="inp-form"  value="<?php #if(isset($row) && !empty($row->state)) { echo $row->state ; } ?>" name="state"  id="state"/></td>
			<td></td>
		</tr>-->
        
        <tr>
			<th valign="top">Country:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->country)) { echo $row->country ; } ?>" name="country"  id="country"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Company type:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->company_type)) { echo $row->company_type ; } ?>" name="company_type"  id="company_type"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Current Capitalization:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->current_capitalization)) { echo $row->current_capitalization ; } ?>" name="current_capitalization"  id="current_capitalization"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Email 1:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->email1)) { echo $row->email1 ; } ?>" name="email1"  id="email1"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Email 2:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->email2)) { echo $row->email2 ; } ?>" name="email2"  id="email2"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Company URL:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->company_url)) { echo $row->company_url ; } ?>" name="company_url"  id="company_url"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Facebook URL:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->facebook_url)) { echo $row->facebook_url ; } ?>" name="facebook_url"  id="facebook_url"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Skype:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->skype)) { echo $row->skype ; } ?>" name="skype"  id="skype"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Linkedin URL:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->linkedin_url)) { echo $row->linkedin_url ; } ?>" name="linkedin_url"  id="linkedin_url"/></td>
			<td></td>
		</tr>
        
       
        <tr>
			<th valign="top">Linkedin URL:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->linkedin_url)) { echo $row->linkedin_url ; } ?>" name="linkedin_url"  id="linkedin_url"/></td>
			<td></td>
		</tr>
        
        
        
        <tr>
			<th valign="top">Company Registered:</th>
			<td>  <select name="status" id="status" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->state_company_registered=='True') { echo 'selected'; }?> >True</option>                
                <option value="0" <?php if($row->state_company_registered=='False') { echo 'selected'; }?> >False</option>                
            </select>	
		 </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Company Type:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->company_type)) { echo $row->company_type ; } ?>" name="company_type"  id="company_type"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Current capitalization:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->current_capitalization)) { echo $row->current_capitalization ; } ?>" name="current_capitalization"  id="current_capitalization"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Seeking company:</th>
			<td> <textarea name="seeking_company"  id="seeking_company" rows="5" cols="60"><?php if(isset($row) && !empty($row->seeking_company)) { echo $row->seeking_company ; } ?></textarea></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Minimum amount:</th>
			<td>
            <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->min_amt)) { echo $row->min_amt ; } ?>" name="min_amt"  id="min_amt"/>
            
           </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Maximum amount:</th>
			<td>  <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->max_amt)) { echo $row->max_amt ; } ?>" name="max_amt"  id="max_amt"/>	
           </td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Ownership Share:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->ownership_share)) { echo $row->ownership_share ; } ?>" name="ownership_share"  id="ownership_share"/>	
           </td>
			<td></td>
		</tr>
		
         <tr>
			<th valign="top">Control Percentage:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->control_percentage)) { echo $row->control_percentage ; } ?>" name="control_percentage"  id="control_percentage"/>	
           </td>
			<td></td>
		</tr>
		   <tr>
			<th valign="top">Investor Details:</th>
			<td> 
            	<textarea name="investor_details"  id="investor_details" rows="5" cols="60"><?php if(isset($row) && !empty($row->investor_details)) { echo $row->investor_details ; } ?></textarea>
           </td>
			<td></td>
		</tr>
        
        
        <tr>
			<th valign="top">Companies Looking:</th>
			<td>
            		<textarea name="companies_looking"  id="companies_looking" rows="5" cols="60"><?php if(isset($row) && !empty($row->companies_looking)) { echo $row->companies_looking ; } ?></textarea>
             </td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Experience in Russia:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->experience_in_russia)) { echo $row->experience_in_russia ; } ?>" name="experience_in_russia"  id="experience_in_russia"/>	
           </td>
			<td></td>
		</tr>
        
        
        <tr>
			<th valign="top">Experience in Investment:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->experience_in_investment)) { echo $row->experience_in_investment ; } ?>" name="experience_in_investment"  id="experience_in_investment"/>	
           </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Control Percentage:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->control_percentage)) { echo $row->control_percentage ; } ?>" name="control_percentage"  id="control_percentage"/>	
           </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Portfolio:</th>
			<td>
            		<textarea name="portfolio"  id="portfolio" rows="5" cols="60"><?php if(isset($row) && !empty($row->portfolio)) { echo $row->portfolio ; } ?></textarea>
             </td>
			<td></td>
		</tr> 
        
        
         <tr>
			<th valign="top">Average ROI:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->average_roi)) { echo $row->average_roi ; } ?>" name="average_roi"  id="average_roi"/>	
           </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Time For Returns:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->time_for_returns)) { echo $row->time_for_returns ; } ?>" name="time_for_returns"  id="time_for_returns"/>	
           </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">About Investment:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->about_investment)) { echo $row->about_investment ; } ?>" name="about_investment"  id="about_investment"/>	
           </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Investing Experience:</th>
			<td> 
            	<textarea name="investing_experience"  id="investing_experience" rows="5" cols="60"><?php if(isset($row) && !empty($row->investing_experience)) { echo $row->investing_experience ; } ?></textarea>	
           </td>
			<td></td>
		</tr>
        
         <tr>
			<th valign="top">Ratings:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->ratings)) { echo $row->ratings ; } ?>" name="ratings"  id="ratings"/>	
           </td>
			<td></td>
		</tr>
        
      <tr>
			<th valign="top">Interested in Crowdsourcing 	:</th>
			<td>  <select name="interested_in_crowdsourcing" id="interested_in_crowdsourcing" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->interested_in_crowdsourcing ==1) { echo 'selected'; }?> >Yes</option>                
                <option value="0" <?php if($row->interested_in_crowdsourcing ==0) { echo 'selected'; }?> >No</option>                
            </select>	
		 </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Project Consideration:</th>
			<td>  <select name="project_consideration" id="project_consideration" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->project_consideration==1) { echo 'selected'; }?> >Yes</option>                
                <option value="0" <?php if($row->project_consideration==0) { echo 'selected'; }?> >No</option>                
            </select>	
		 </td>
			<td></td>
		</tr>  
        
        <tr>
			<th valign="top">Partners Consideration:</th>
			<td>  <select name="partners_consideration" id="partners_consideration" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->partners_consideration==1) { echo 'selected'; }?> >Yes</option>                
                <option value="0" <?php if($row->partners_consideration==0) { echo 'selected'; }?> >No</option>                
            </select>	
		 </td>
			<td></td>
		</tr>  
        
          <tr>
			<th valign="top">Companies intrested:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->companies_intrested_in)) { echo $row->companies_intrested_in ; } ?>" name="companies_intrested_in"  id="companies_intrested_in"/>	
           </td>
			<td></td>
		</tr>
        
        
          <tr>
			<th valign="top">Investment Strategies:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->investment_strategies)) { echo $row->investment_strategies ; } ?>" name="investment_strategies"  id="investment_strategies"/>	
           </td>
			<td></td>
		</tr>
        
        
          <tr>
			<th valign="top">Competitors:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->competitors)) { echo $row->competitors ; } ?>" name="competitors"  id="competitors"/>	
           </td>
			<td></td>
		</tr>
        
       <tr>
			<th valign="top">Create Date:</th>
			<td> 
            	<input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->create_date)) { echo $row->create_date ; } ?>" name="create_date"  id="create_date"/>	
           </td>
			<td></td>
		</tr>  
        
        <tr>
			<th valign="top">Status:</th>
			<td>  <select name="status" id="status" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->status==1) { echo 'selected'; }?> >Active</option>                
                <option value="0" <?php if($row->status==0) { echo 'selected'; }?> >Deactive</option>                
            </select>	
		 </td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Is feature:</th>
			<td>  <select name="is_feature" id="is_feature" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->is_feature==1) { echo 'selected'; }?> >Yes</option>                
                <option value="0" <?php if($row->is_feature==0) { echo 'selected'; }?> >No</option>                
            </select>	
		 </td>
			<td></td>
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