<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Update Password</div></div>
     <?php echo form_open('user/changePasswordSave');?>
			<fieldset>
              <legend>Please fill the from to Update Password </legend>
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
                       
                       
                       <?php $atts = array(
                              'name'    => 'register',
                              'value'   => 'Update Password',
                              'class'   => 'button',
                           ); ?>
                        <p> 
                            <span> <?php echo form_submit($atts); ?></span> 
                           
                       </p>
                       
                 </div>
            </fieldset>

			<?php echo form_close(); ?>
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>