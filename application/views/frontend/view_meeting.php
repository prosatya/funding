<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">
 <?php 
		foreach($details as $data_meeting) {
			 
			 ?>
       <div class="fucher_cont">
      
      <div class="box"> 
      <div class="box-heading"><?php echo  $data_meeting->name ; ?> </div></div>
              <div class="description01">
             	<div class="images">
            		 <img alt="iPhone" src="<?php echo base_url(); ?>/images/clients/logo1.png">
                </div>
                
                <div class="name">
				<b> Name:-</b> <?php  echo $data_meeting->name; ?> 
			 </div>
              <div class="rating">
			  <b> Start At :- </b><?php echo date("Y-m-d", strtotime($data_meeting->starts_at)); ?> <br/>
			  <b> Room :- </b><?php if($data_meeting->room_type=='meeting') { echo 'Meeting'; } elseif($data_meeting->room_type=='webinar') { echo 'Webinar'; } ?>
                    
              </div>
              
			   <div class="description"> <b> Waiting Room Message:- </b><?php  echo $data_meeting->description; ?></div>
             </div>
          
            
             
      </div>
 <?php }?> 
 </div>
 
 </div>
</div>
<div class="clear"></div>