<div class="rightdivsite">
  <div cl ass="clear" style="height:14px"></div>
 <div class="videodiv">
   
      <div class="clear"></div>
      <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Company List </div></div>
      <?php foreach($project as $row) { ?>
             <div class="description01">
             	<div class="images">
            		 <img alt="" src="<?php  echo base_url().$row->image; ?>">
                </div>
                
                <div class="name">
				<b><a href="<?php echo base_url(); ?>BrowseProject/viewproject/<?php  echo $row->id; ?>"><?php  echo $row->company_name; ?></a> </b>
			 </div>
              <div class="rating">
			  <img alt="iPhone" src="<?php echo base_url(); ?>images/stars-0.png">
			  </div>

			   <div class="description"><b>Details :-</b> <?php  echo $row->introduction_for_investors; ?></div>
               <div class="description"><?php $row->company_details; ?></div>
             </div>
             <?php }  ?>  
            
             
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>