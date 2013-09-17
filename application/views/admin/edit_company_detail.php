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
		introduction_for_investors: {
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
		type: {
			required: true
		},
		address: {
			required: true
		},
		city: {
			required: true
		},
		state: {
			required: true
		},
		zipcode: {
			required: true
		},
		phone: {
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
		company_details: {
			required: true
		},
		min_amount_requested: {
			required: true
		},
		investment_towards: {
			required: true
		},
		interested_in_incrowdsourcing: {
			required: true
		},
		interested_in_bd: {
			required: true
		},
		investor_preference: {
			required: true
		},
		ideal_investor: {
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
	   introduction_for_investors: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The introduction for investors field is required.</div></td>"
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
		type: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The type field is required.</div></td>"	
		},
		address: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The address field is required.</div></td>" 
			 
		},
		city: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The city field is required.</div></td>"	
		},
		zipcode: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The zipcode field is required.</div></td>" 
			 	
		},
		email1: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The email 1 field is required.</div></td>"	,
			email: "<td><div class='error-left'></div><div class='error-inner'>Invalid email address.</div></td>"	
		},
		company_url: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The company url field is required.</div></td>",
			url: "<td><div class='error-left'></div><div class='error-inner'>Invalid url.</div></td>"	
				
		},
		company_details: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The company details field is required.</div></td>"	
		},
		min_amount_requested: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The min amount requested field is required.</div></td>" 
			 		
		},
		investment_towards: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The investment towards field is required.</div></td>"	
		},
		interested_in_incrowdsourcing: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The interested in incrowdsourcing field is required.</div></td>" 
			 	
		},
		interested_in_bd: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The interested in bd field is required.</div></td>"	
		},
		investor_preference: {
			required: "<td><div class='error-left'></div><div class='error-inner'>The investor preference field is required.</div></td>"
			 	
		},
		ideal_investor: {
			required:"<td><div class='error-left'></div><div class='error-inner'>The ideal investor field is required.</div></td>"	
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


<div id="page-heading"><h1>Edit Company</h1></div>


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
		 <form name="manage_record" method="post" action="<?php echo ($comp_id) ? "admin/edit_company/$comp_id" : "admin/edit_company";?>" id="manage_record">
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <tr>
			<th valign="top">First of all, please describe in 100 words how you would like to be introduced to investors?:</th>
			<td> 
            	<textarea name="introduction_for_investors"  id="introduction_for_investors" rows="5" cols="60"><?php if(isset($row) && !empty($row->introduction_for_investors)) { echo $row->introduction_for_investors ; } ?></textarea>
           </td>
			<td></td>
		</tr>
        
		<tr>
			<th valign="top" style="width:250px;">Company name:</th>
			<td><input type="text" name="company_name" id="company_name" class="inp-form" value="<?php if(isset($row) && !empty($row->company_name)) { echo $row->company_name ; } ?>" /></td>
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
		
		<tr>
			<th valign="top">Type:</th>
			<td><select multiple="multiple" name="type" > <?php
            		$option = array('New Media'=>'New Media','Design and Publishing Software'=>'Design and Publishing Software','Digital Advertising/Marketing Technology'=>'Digital Advertising/Marketing Technology','Dating and Matchmaking'=>'Dating and Matchmaking','On-Line Commerce'=>'On-Line Commerce','Digital Audio and Visual'=>'Digital Audio and Visual','Search Engine/SEO techs'=>'Search Engine/SEO techs','Gaming'=>'Gaming','VoIP'=>'VoIP','Social Networking Site/App'=>'Social Networking Site/App','Internet Security'=>'Internet Security','Internet Access'=>'Internet Access','Mobile Content'=>'Mobile Content','Mobile Deivices'=>'Mobile Deivices','Mobile Marketing'=>'Mobile Marketing','Satellites'=>'Satellites','IPTV'=>'IPTV','Digital TV'=>'Digital TV','Software'=>'Software','Anti-Virus Programs'=>'Anti-Virus Programs','Location-Based technology'=>'Location-Based technology','Wimax'=>'Wimax','LTE'=>'LTE','Other'=>'Other');       ?>  

					<option value="">Select</option>

					<?php foreach($option as $key=>$value)

					{

					?>

        <option value="<?php echo $value;?>" <?php if($row->type==$value){?> selected="selected" <?php } ?>><?php echo $value;?></option>

        <?php

			}

					?>
            
            
            		
                   </select>
            	
            
           </td>
			<td></td>
		</tr>
		
	
    
    <tr>
			<th valign="top">Address:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->address)) { echo $row->address ; } ?>" name="address"  id="address"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">City:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->city)) { echo $row->city ; } ?>" name="city"  id="city"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">State:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->state)) { echo $row->state ; } ?>" name="state"  id="state"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Country:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->country)) { echo $row->country ; } ?>" name="country"  id="country"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Zipcode:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->zipcode)) { echo $row->zipcode ; } ?>" name="zipcode"  id="zipcode"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Phone:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->phone)) { echo $row->phone ; } ?>" name="phone"  id="phone"/></td>
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
			<th valign="top">Facebook URL Personal:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->facebook_url_personal)) { echo $row->facebook_url_personal ; } ?>" name="facebook_url_personal"  id="facebook_url_personal"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Facebook URL Company:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->facebook_url_company)) { echo $row->facebook_url_company ; } ?>" name="facebook_url_company"  id="facebook_url_company"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Facebook URL Compan:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->facebook_url_company)) { echo $row->facebook_url_company ; } ?>" name="facebook_url_company"  id="facebook_url_company"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Vkontekte Address Personal:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->vkontekte_address_personal)) { echo $row->vkontekte_address_personal ; } ?>" name="vkontekte_address_personal"  id="vkontekte_address_personal"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Vkontekte Address Company:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->vkontekte_address_company)) { echo $row->vkontekte_address_company ; } ?>" name="vkontekte_address_company"  id="vkontekte_address_company"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Odnoklassniki Address Personal:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->odnoklassniki_address_personal)) { echo $row->odnoklassniki_address_personal ; } ?>" name="odnoklassniki_address_personal"  id="odnoklassniki_address_personal"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Odnoklassniki Address Company:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->odnoklassniki_address_company)) { echo $row->odnoklassniki_address_company ; } ?>" name="odnoklassniki_address_company"  id="odnoklassniki_address_company"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Linkedin URL:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->linkedin_url)) { echo $row->linkedin_url ; } ?>" name="linkedin_url"  id="linkedin_url"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Twitter:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->twitter)) { echo $row->twitter ; } ?>" name="twitter"  id="twitter"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Company Registered:</th>
			<td>  <select name="status" id="status" style="width:150px;" class="inp-form"  >
            	
    			<option value="1" <?php if($row->is_company_registered==1) { echo 'selected'; }?> >True</option>                
                <option value="0" <?php if($row->is_company_registered==0) { echo 'selected'; }?> >False</option>                
            </select>	
		 </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Company Details:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->company_details)) { echo $row->company_details ; } ?>" name="company_details"  id="company_details"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Min Amount Requested:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->min_amount_requested)) { echo $row->min_amount_requested ; } ?>" name="min_amount_requested"  id="min_amount_requested"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Investment Towards:</th>
			<td> <input type="text" class="inp-form"  value="<?php if(isset($row) && !empty($row->investment_towards)) { echo $row->investment_towards ; } ?>" name="investment_towards"  id="investment_towards"/></td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Interested in Incrowdsourcing:</th>
			<td>
            <select name="interested_in_incrowdsourcing" id="interested_in_incrowdsourcing" style="width:150px;" class="inp-form"  >
            	<option value="1" <?php if($row->interested_in_incrowdsourcing==1) { echo 'selected'; }?> >True</option>                
                <option value="0" <?php if($row->interested_in_incrowdsourcing==0) { echo 'selected'; }?> >False</option>                
            </select>	
            
           </td>
			<td></td>
		</tr>
        
        <tr>
			<th valign="top">Interested in BD:</th>
			<td> <select name="interested_in_bd" id="interested_in_bd" style="width:150px;" class="inp-form"  >
            		<option value="1" <?php if($row->interested_in_bd==1) { echo 'selected'; }?> >True</option>                
                	<option value="0" <?php if($row->interested_in_bd==0) { echo 'selected'; }?> >False</option>                
            </select>	
           </td>
			<td></td>
		</tr>
		
        <tr>
			<th valign="top">Brief strategy description:</th>
			<td> 
            	<textarea name="strategy_details"  id="strategy_details" rows="5" cols="60"><?php if(isset($row) && !empty($row->strategy_details)) { echo $row->strategy_details ; } ?></textarea>
           </td>
			<td></td>
		</tr>
		
         <tr>
			<th valign="top">What is your current valuation you are attaching to your company/project and how have you roughly determined this?:</th>
			<td> 
            	<textarea name="current_valuation"  id="current_valuation" rows="5" cols="60"><?php if(isset($row) && !empty($row->current_valuation)) { echo $row->current_valuation ; } ?></textarea>
           </td>
			<td></td>
		</tr>
		   <tr>
			<th valign="top">Please describe your ideal investor in detail (200 words or less):</th>
			<td> 
            	<textarea name="ideal_investor"  id="ideal_investor" rows="5" cols="60"><?php if(isset($row) && !empty($row->ideal_investor)) { echo $row->ideal_investor ; } ?></textarea>
           </td>
			<td></td>
		</tr>
        
        
        <tr>
			<th valign="top">Investor preference:</th>
			<td>
            		<select multiple="multiple" name="investor_preference">
                   <?php 
                    $option1 = array('Individual'=>'Individual','Group'=>'Group','Incubator'=>'Incubator','Accelerator'=>'Accelerator','Venture capital fund'=>'Venture capital fund','Institutional investor'=>'Institutional investor','Experienced in sector'=>'Experienced in sector','Experienced in country'=>'Experienced in country','Region'=>'Region','Any'=>'Any');       ?>  

					<option value="">Select</option>

					<?php foreach($option1 as $key=>$value1)

					{

					?>

        <option value="<?php echo $value1;?>" <?php if($row->investor_preference==$value1){?> selected="selected" <?php } ?>><?php echo $value1;?></option>

        <?php

			}

					?>
                    
                    
                        
                    </select>
            
            
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
			<th valign="top">What are its major existing assets?:</th>
			<td> 
            	<textarea name="major_assets"  id="major_assets" rows="5" cols="60"><?php if(isset($row) && !empty($row->major_assets)) { echo $row->major_assets ; } ?></textarea>
           </td>
			<td></td>
		</tr>
		
	<tr>
			<th valign="top">Please include all positive press/feedback from professionals you have about your company.:</th>
			<td> 
            	<textarea name="feedback_text"  id="feedback_text" rows="5" cols="60"><?php if(isset($row) && !empty($row->feedback_text)) { echo $row->feedback_text ; } ?></textarea>
           </td>
			<td></td>
		</tr>
	<tr>
			<th valign="top">What are you short term goals for the company/project company?:</th>
			<td> 
            	<textarea name="short_term_goals"  id="short_term_goals" rows="5" cols="60"><?php if(isset($row) && !empty($row->feedback_text)) { echo $row->feedback_text ; } ?></textarea>
           </td>
			<td></td>
		</tr>
	
    <tr>
			<th valign="top">What companies/entrepreneurs do you emulate?:</th>
			<td> 
            	<textarea name="companies_you_emulate"  id="companies_you_emulate" rows="5" cols="60"><?php if(isset($row) && !empty($row->companies_you_emulate)) { echo $row->companies_you_emulate ; } ?></textarea>
           </td>
			<td></td>
		</tr>
	
    <tr>
			<th valign="top">What companies would you consider to be competitors to your own?:</th>
			<td> 
            	<textarea name="competitors"  id="competitors" rows="5" cols="60"><?php if(isset($row) && !empty($row->competitors)) { echo $row->competitors ; } ?></textarea>
           </td>
			<td></td>
		</tr>
	
      <tr>
			<th valign="top">What companies would you consider to be competitors to your own?:</th>
			<td> 
            	<textarea name="market_research"  id="market_research" rows="5" cols="60"><?php if(isset($row) && !empty($row->market_research)) { echo $row->market_research ; } ?></textarea>
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