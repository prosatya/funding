<div class="rightdivsite">
 <div class="clear" style="height:14px"></div>
 <div class="videodiv">
  <?php 
  foreach($details as $data_project) {  ?>
       <div class="fucher_cont">
      
      <div class="box"><div class="box-heading"> <?php echo  $data_project->company ; ?> </div></div>
              <div class="description01">
             	<div class="images">
					<?php if($data_project->company_logo!=""){ ?>
            		 <img alt="iPhone" src = <?php  echo base_url(); ?>upload_img/<?php $data_project->company_logo; ?> />
					 <?php }else{ ?> 
					 <img alt="Logo." src="<?php  echo  base_url(); ?>/images/clients/logo1.png">
					 <?php } ?> 
            		
                </div>
                 <div class="description">
				<b> Title :-</b> <?php  echo $data_project->title; ?> 
			   </div><br/>
                 <div class="description">
				<b>Project Type :-</b> <?php  echo $data_project->project_type; ?> 
			 </div>
                 <div class="description">
				<b> Address :-</b> <?php  echo $data_project->address; ?> 
			 </div>
              <div class="description">
				<b> City :-</b> <?php  echo $data_project->city; ?> 
			 </div>
             <div class="description">
				<b> State :-</b> <?php  echo $data_project->state; ?> 
			 </div>
             <div class="description">
				<b> Zipcode :-</b> <?php  echo $data_project->zipcode; ?> 
			 </div>
             <div class="description">
				<b> Contact Number :-</b> <?php  echo $data_project->contact_number; ?> 
			 </div>
             <div class="description">
				<b> E-mail1 :-</b> <?php  echo $data_project->email1; ?> 
			 </div>
             <div class="description">
				<b> E-mail2 :-</b> <?php  echo $data_project->email2; ?> 
			 </div><br/>
             <div class="description">
				<b> Company URL :-</b> <?php  echo $data_project->company_url; ?> 
			 </div>
             <div class="description">
				<b>Facebook Address Personal:-</b> <?php  echo $data_project->facebook_url_personal; ?> 
			 </div>
             <div class="description">
				<b>Facebook Address Company:-</b> <?php  echo $data_project->facebook_url_company; ?> 
			 </div>
             <div class="description">
				<b>Skype Address :-</b> <?php  echo $data_project->skype; ?> 
			 </div>
             <div class="description">
				<b> LinkedIn Address :-</b> <?php  echo $data_project->linkedin_url; ?> 
			 </div><br/>
             <div class="description">
				<b>State where Company is Registered :-</b> <?php  echo $data_project->state_company_registered; ?> 
			 </div>
             <div class="description">
				<b>Country :-</b> <?php  echo $data_project->country; ?> 
			 </div>
             <div class="description">
				<b>Company Type :-</b> <?php  echo $data_project->company_type; ?> 
			 </div>
             <div class="description">
				<b>Other Company Type :-</b> <?php  echo $data_project->other_company_type; ?> 
			 </div>
             <div class="description">
				<b> Current Capitalization :-</b> <?php  echo $data_project->current_capitalization; ?> 
			 </div>
             <div class="description">
              <b> Seeking for Company :-</b> <?php  echo $data_project->seeking_company; ?>
             </div>
             <div class="description">
              <b>Iinvestment Size :-</b> <?php  echo $data_project->investment_size; ?>
             </div>
             <div class="description">
              <b> Minmum Amount :-</b> <?php  echo $data_project->min_amt; ?>
             </div>
             <div class="description">
              <b>  	Maximum Amount :-</b> <?php  echo $data_project->max_amt; ?>
             </div>
             <div class="description">
              <b> Ownership Share :-</b> <?php  echo $data_project->ownership_share; ?>
             </div>
             <div class="description">
              <b> Control Percentage :-</b> <?php  echo $data_project->control_percentage; ?>
             </div>
             <div class="description">
              <b>Investors Details :-</b> <?php  echo $data_project->investor_details; ?>
             </div>
             <div class="description">
              <b>Companies Looking for :-</b> <?php  echo $data_project->companies_looking; ?>
             </div>
             <div class="description">
              <b>Experience In Russia :-</b> <?php  echo $data_project->experience_in_russia; ?>
             </div><br/> 
             <div class="description">
              <b>Experience In Investment :-</b> <?php  echo $data_project->experience_in_investment; ?>
             </div>
             <div class="description">
              <b>Portfolio :-</b> <?php  echo $data_project->portfolio; ?>
             </div>
             <div class="description">
              <b>Average ROI :-</b> <?php  echo $data_project->average_roi; ?>
             </div>
             <div class="description">
              <b>Time for Returns :-</b> <?php  echo $data_project->time_for_returns; ?>
             </div>
             <div class="description">
              <b>About Investment :-</b> <?php  echo $data_project->about_investment; ?>
             </div>
             <div class="description">
              <b>Investing Experience :-</b> <?php  echo $data_project->investing_experience; ?>
             </div>
             <div class="description">
              <b>Investing Experience :-</b> <?php  echo $data_project->investing_experience; ?>
             </div>
             <div class="description">
              <b>Ratings :-</b> <?php  echo $data_project->ratings; ?>
             </div>
             <div class="description">
              <b>Interested In Crowdsourcing :-</b> <?php  echo $data_project->interested_in_crowdsourcing; ?>
             </div>
             <div class="description">
              <b> Project Consideration :-</b> <?php  echo $data_project->project_consideration; ?>
             </div>
             <div class="description">
              <b>Partners Consideration :-</b> <?php  echo $data_project->partners_consideration; ?>
             </div>
             <div class="description">
              <b>Companies Intrested In :-</b> <?php  echo $data_project->companies_intrested_in; ?>
             </div>
             <div class="description">
              <b>Investment Strategies :-</b> <?php  echo $data_project->investment_strategies; ?>
             </div>
             <div class="description">
              <b>Competitors :-</b> <?php  echo $data_project->competitors; ?>
             </div><br/>
              <div class="date">
			  <b> Date of Registration :-</b> <?php echo date("Y-m-d", strtotime($data_project->create_date)); ?> <br/>
              </div><br/>
              
           </div>
       </div>
             
      </div>
 <?php }?> 
 </div>
 
 </div>
</div>
<div class="clear"></div>