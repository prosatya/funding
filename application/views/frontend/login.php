<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Login </div></div>
       <?php echo form_open(base_url().'user/loginvalidation');?>

            <fieldset>
              <legend>Please Login</legend>
              <?php
                  if ($this->session->flashdata('errormessage') != ''){
                      echo '<div class="warning">'.$this->session->flashdata('errormessage').'</div>';
                  } 
              ?>
                   <div class="content">
                        <?php $latts = array(
                            'class' => 'label',
                        ); ?>

                        <?php $atts = array(
                            'name' => 'user_email',
                            'id'   => 'user_email',
                            'size' => '35',
                        ); ?>
                        <p>
                           <?php echo form_label('Email Address:', 'user_email', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>

                        <?php $atts = array(
                            'name' => 'password',
                            'id'   => 'password',
                            'size' => '35',
                        ); ?>
                        <p>  
                           <?php echo form_label('Password:', 'password', $latts); ?><br/>
                           <?php echo form_password($atts); ?>
                        </p>
                            <?php $atts = array(
                              'name'    => 'login',
                              'value'   => 'Login Now',
                              'class'   => 'button',
                           ); ?>
                        <p> 
                            <span> <?php echo form_submit($atts); ?></span> 
                            <span style="margin-left: 25px;"><?php echo form_checkbox('rememberme', 'rememberme', FALSE); ?></span>
                            <span>Remember Me</span>
                        </p>

                         <p> 
                            <span><a href="<?php echo base_url().'user/forgetpassword' ; ?>" title="Forget Password"> Forget password? </a></span> 
                            <span style="margin-left: 25px;">Don't Have Account? <a href="<?php echo base_url().'user/registration' ; ?>" title="Create Account"> Create Now </a></span>
                        </p>
                       
                 </div>
            </fieldset>
         <?php echo form_close(); ?>
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>