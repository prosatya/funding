<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">
 <?php 
 foreach($details as $data_project) {  ?>
       <div class="fucher_cont">
      
      <div class="box"><div class="box-heading"> <?php echo  $data_project->company_name ; ?> </div></div>
              <div class="description01">
             	<div class="images">
            		 <img alt="iPhone" src = <?php  echo base_url(); ?>upload_img/<?php $data_project->image; ?> />
                </div>
                <div class="description">
                    <b> Company Details :-</b> <?php  echo $data_project->company_details; ?>
                </div>
                <div class="description">
			    	<b> Introduction :-</b> <?php  echo $data_project->introduction_for_investors ; ?> 
			    </div><br/>
                <div class="description">
				  <b> Type :-</b> <?php  echo $data_project->type; ?> 
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
				<b> Country :-</b> <?php  echo $data_project->country; ?> 
			 </div>
             <div class="description">
				<b> Phone :-</b> <?php  echo $data_project->phone; ?> 
			 </div>
             <div class="description">
				<b> E-mail1 :-</b> <?php  echo $data_project->email1; ?> 
			 </div>
             <div class="description">
				<b> E-mail2 :-</b> <?php  echo $data_project->email2; ?> 
			 </div><br/>
             <div class="description">
				<b> Company URL Address :-</b> <?php  echo $data_project->company_url; ?> 
			 </div>
             <div class="description">
				<b>Personal Facebook Address :-</b> <?php  echo $data_project->facebook_url_personal; ?> 
			 </div>
             <div class="description">
				<b>Company Facebook  Address :-</b> <?php  echo $data_project->facebook_url_company; ?> 
			 </div>
             <div class="description">
				<b>Personal Vkontekte Address :-</b> <?php  echo $data_project->vkontekte_address_personal; ?> 
			 </div>
             <div class="description">
				<b>Company Vkontekte Address :-</b> <?php  echo $data_project->vkontekte_address_company; ?> 
			 </div>
             <div class="description">
				<b>Personal Odnoklassniki Address :-</b> <?php  echo $data_project->odnoklassniki_address_personal; ?> 
			 </div>
             <div class="description">
				<b>Company Odnoklassniki Address :-</b> <?php  echo $data_project->odnoklassniki_address_company; ?> 
			 </div>
             <div class="description">
				<b> LinkedIn Address :-</b> <?php  echo $data_project->linkedin_url; ?> 
			 </div>
             <div class="description">
				<b> Twitter Address :-</b> <?php  echo $data_project->twitter; ?> 
			 </div><br/>
             <div class="description">
				<b> Business Plans :-</b> <?php  echo $data_project->business_plans; ?> 
			 </div>
             <div class="description">
              <b> Financial Uploads :-</b> <?php  echo $data_project->financial_uploads; ?>
             </div>
             <div class="description">
              <b> Requested Minimum Amount :-</b> <?php  echo $data_project->min_amount_requested; ?>
             </div>
             <div class="description">
              <b> Investment Towards :-</b> <?php  echo $data_project->investment_towards; ?>
             </div>
             <div class="description">
              <b> Interested In Crowdsourcing :-</b> <?php  echo $data_project->interested_in_incrowdsourcing; ?>
             </div>
             <div class="description">
              <b> Interested In Business Development :-</b> <?php  echo $data_project->interested_in_bd; ?>
             </div>
             <div class="description">
              <b> Strategic Details :-</b> <?php  echo $data_project->strategy_details; ?>
             </div>
             <div class="description">
              <b>Investors Preference :-</b> <?php  echo $data_project->investor_preference; ?>
             </div>
             <div class="description">
              <b>Ideal Investors :-</b> <?php  echo $data_project->ideal_investor; ?>
             </div>
             <div class="description">
              <b>Current Valuation :-</b> <?php  echo $data_project->current_valuation; ?>
             </div>
             <div class="description">
              <b>Major Assets :-</b> <?php  echo $data_project->major_assets; ?>
             </div><br/>
             <div class="description">
              <b>Marketing Material-1 :-</b> <?php  echo $data_project->marketing_material1; ?>
             </div>
             <div class="description">
              <b>Marketing Material-2 :-</b> <?php  echo $data_project->marketing_material2; ?>
             </div>
             <div class="description">
              <b>Marketing Material-3 :-</b> <?php  echo $data_project->marketing_material3; ?>
             </div>
             <div class="description">
              <b>Marketing Material-4 :-</b> <?php  echo $data_project->marketing_material4; ?>
             </div>
             <div class="description">
              <b>Marketing Material-5 :-</b> <?php  echo $data_project->marketing_material5; ?>
             </div><br/> 	
              <div class="description">
              <b>Feedback :-</b> <?php  echo $data_project->feedback_text; ?>
             </div>
             <div class="description">
              <b>Short Term Goals :-</b> <?php  echo $data_project->short_term_goals; ?>
             </div>
             <div class="description">
              <b>Companies You Emulate :-</b> <?php  echo $data_project->companies_you_emulate; ?>
             </div>
             <div class="description">
              <b>Competitors :-</b> <?php  echo $data_project->competitors; ?>
             </div>
             <div class="description">
              <b>Market Research :-</b> <?php  echo $data_project->market_research; ?>
             </div>
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