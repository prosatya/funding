<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Create Account </div></div>
        <?php echo form_open('user/registrationvalidation');?>

            <fieldset>
              <legend>Please fill the from to create a new account </legend>
              <?php
              if ($this->session->flashdata('message') != ''){
                  echo '<div class="box success">'.$this->session->flashdata('message').'</div>';
              } elseif(validation_errors()) {
                  echo  '<div class="warning">'.validation_errors('<p>').'</div>';

               } ?>

                   <div class="content">
                        <?php $latts = array(
                            'class' => 'label',
                        ); ?>

                         <?php $atts = array(
                            'name' => 'user_name',
                            'id'   => 'user_name',
                            'size' => '35',
                            'value' => set_value('user_name'),
                        ); ?>

                         <p>
                           <?php echo form_label('Full Name:', 'user_name', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>

                        <?php $atts = array(
                            'name' => 'user_email',
                            'id'   => 'user_email',
                            'size' => '35',
                            'value' => set_value('user_email'),
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
                            'name' => 'confirm_password',
                            'id'   => 'confirm_password',
                            'size' => '35',
                        ); ?>
                        <p>  
                           <?php echo form_label('Confirm Password:', 'confirm_password', $latts); ?><br/>
                           <?php echo form_password($atts); ?>
                        </p>
                        <p>  
                           <?php echo form_label('Join As:', 'usertype', $latts); ?><br/>
                           
                          <?php $data = array(
                            'name'        => 'usertype',
                            'id'          => 'investor',
                            'value'       => 'investor',
                            'checked'     => TRUE,
                            );
                          ?> 
                          <span style="margin-top:10px; display:inline-block;"> <?php echo form_radio($data); ?></span>
                          <span style="margin: 0 12px 0 4px; vertical-align: text-bottom;"> Investor </span>
                    
                          <?php $data = array(
                            'name'        => 'usertype',
                            'id'          => 'company',
                            'value'       => 'company',
                            'checked'     => FALSE,
                            );
                          ?> 
                          <span style="margin-top:10px; display:inline-block;"> <?php echo form_radio($data); ?></span>
                          <span style="vertical-align: text-bottom;"> Company </span>
                        </p>
                       
                       <?php $atts = array(
                              'name'    => 'register',
                              'value'   => 'Join Now',
                              'class'   => 'button',
                           ); ?>
                        <p> 
                            <span> <?php echo form_submit($atts); ?></span> 
                           <span style="margin-left: 25px;">Already have an account? <a href=" <?php echo ('login'); ?> " title="Login"> Login Now</a></span>
                       </p>
                       
                 </div>
            </fieldset>
         <?php echo form_close(); ?>
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>