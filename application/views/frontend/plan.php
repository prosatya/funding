<script src="public/admin/js/jquery/jquery_main.js"  type="text/javascript"></script>
<script src="public/admin/js/jquery/jquery.validate.js"  type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {	

	var container = $('div.error-left');
	var validator1 = $("#manage_plan").validate({
	                    //FOR THIS Option You will have to use jquery.metadata.js 
	highlight:false,
	unhighlight:false,
	rules: {
		plan: {
			required: true
		}
	},
	messages: {
	   plan: {
			required: "Please select plan"
		}
	} 
		 
});
	 
	
});
</script>
<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Plan List </div></div>
       <div id="error-left" style="color:#F00;"></div>
      <form method="post" action="<?php echo base_url().'payment/paypal'; ?>" name="manage_plan" id="manage_plan">
       <?php foreach($plan_list as $row) { ?>
             <div class="description01">
            
                <div class="name">
				<b> Plan Name :   <?php  echo $row->plan_name; ?> </b>
			 </div>
              <div class="rating">Paln Description : <?php echo $row->plan_desc; ?> </div>
			   <div class="description">Plan amount $<?php  echo $row->plan_amt; ?></div>
                <div class="description">Select Paln <input type="radio"  name="plan" id="plan" value="<?php  echo $row->plan_amt.'##'.$row->id; ?>"/>
                
                 
                </div>
               
             </div>
             <?php }  ?>
             
            <input type="submit" name="sub" id="sub" value="Pay with Paypal"  />
        </form>     
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>