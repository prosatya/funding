<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
     		<div class="box-heading">My Profile</div>
          <?php 
             $user_status = $this->session->userdata('user_status'); 
          ?>
          <?php 
		   switch($user_status){ 
              case '0':
           ?>  <p> 
                  Hello, <?php echo $this->session->userdata('user_name'); ?> <br/> 
                  Welcome to your profile page. You need to verify your email address. Please check your email for further information. </p>
				 <p> If you not find in inbox please check <b>"Spam"</b> Folder. </p>
			  <?php 
                break;
               case '1':
             ?> 
              <p> 
                  Hello, <?php echo $this->session->userdata('user_name'); ?> <br/> 
                  Your Email Address Verified successfully. Please <a href="<?php echo base_url()?>user/editProfile"> click here </a> to complete your profile and get approved.
              </p> 
              <?php 
                break;
                case '3':
              ?>
                <p>My Profile Page............</p>
                <?php 
                  break;
                  default:
                ?>
                 <p>My Profile Page............</p>

            <?php } ?> 
      
      
      </div>
        
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>