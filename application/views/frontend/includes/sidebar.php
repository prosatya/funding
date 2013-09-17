 <div class="clear"></div>
 <div class="leftdivced">
    <div class="box">
     <?php if($this->session->userdata('user_login')) { ?>
      <div class="box-heading">My Account</div>
        <div class="box-content box-category">
            <ul id="custom_accordion">
		           <?php 
				   if($this->session->userdata('user_status')==1){
				   if($this->session->userdata('user_type') == "company") { ?>
                   <li class="category57"><a href="<?php echo base_url()?>company">Add/Edit Company</a></li>
                    <?php  } ?>
                    <?php if($this->session->userdata('user_type') == "investor") { ?>
                        <li class="category57"><a href="<?php echo base_url()?>investor">Add/Edit Investor</a></li>
                    <?php  } ?> 
                     <?php }else{ ?>
					<li class="category57"><a href="<?php echo base_url()?>user/profile">My Profile</a></li>
					<?php } ?> 
					<li class="category57"><a href="<?php echo base_url(); ?>user/changepassword">Update Password</a></li>	
					<li class="category57"><a href="<?php echo base_url(); ?>user/logout">logout</a></li>	
					
			</ul>
        </div>
      <?php }else { ?>
        <div class="box-heading">Categories</div>
        <div class="box-content box-category">
            <ul id="custom_accordion">
		      <li class="category57"><a class="nochild " href="<?php echo base_url(); ?>/news/viewnews/4">
Why Invest in Russia? </a></li>
			  <li class="category57"><a class="nochild " href="<?php echo base_url(); ?>/news/viewnews/5">Why Firebird ? </a></li>
              <li class="category57"><a class="nochild " href="<?php echo base_url(); ?>/news/viewnews/6">Why Crowdfunding? </a></li>
        
			</ul>
        </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <?php if(!isset($is_project)){ ?>
    <div class="box">
        <div class="box-heading">Latest Companies</div>
        <div class="box-content box-category">
            <ul id="custom_accordion">
				  <?php foreach($project as $row) { ?>
				<li class="category57"><a class="nochild " href="<?php echo base_url(); ?>browseproject/viewproject/<?php  echo $row->id; ?>"><?php  echo $row->company_name; ?> </a></li>
                <?php }  ?>
            </ul>
        </div>
    </div>
	<?php } ?>
    <div class="clear"></div>
    <?php if(!isset($is_event)){ ?>
    <div class="box">
        <div class="box-heading">Latest Events</div>
        <div class="box-content box-category">
            <ul id="custom_accordion">
				  <?php foreach($latest_event_list as $row) { ?>
				<li class="category57"><a class="nochild " href="<?php echo base_url(); ?>meeting/viewevent/<?php  echo $row->id; ?>"><?php  echo $row->name; ?> by  <?php echo date("Y-m-d", strtotime($row->starts_at)); ?> </a></li>
                <?php }  ?>
            </ul>
        </div>
    </div>
    <?php } ?> 
	<div class="clear"></div>
     <?php if(!isset($is_news)){ ?>
    <div class="box">
        <div class="box-heading">Latest News</div>
        <div class="box-content box-category">
            <ul id="custom_accordion">
                    <?php foreach($news as $row) { ?>
                   <li class="category57"><a class="nochild " href="<?php echo base_url(); ?>news/viewnews/<?php  echo $row->id; ?>"><?php  echo $row->page_name; ?></a></li>
                   <?php }  ?>
            </ul>
        </div>
    </div>
     <?php } ?>
	<div class="clear"></div>
     
       
   </div>
