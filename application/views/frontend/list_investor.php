<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

      <div class="clear"></div>
      <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Investor List </div></div>
      <?php  foreach($investor_list as $row) { ?>
             <div class="description01">
             	<div class="images">
            		 <img alt="Logo." src="<?php  echo  base_url().$row->company_logo; ?>">
                </div>
                
                <div class="name">
				<b><a href="<?php echo base_url(); ?>BrowseInvestor/viewinvestor/<?php  echo $row->id; ?>"><?php  echo $row->first_name; ?></a> </b>
			 </div>
              <div class="rating"> <img alt="iPhone" src="<?php echo base_url(); ?>images/stars-0.png"></div>
			   <div class="description"><b>Details :- </b> <?php  echo $row->investor_details; ?></div>
             </div>
             <?php }  ?> 
            
             
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>