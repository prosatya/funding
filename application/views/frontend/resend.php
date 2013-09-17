    <!--Middle Part Start-->
    <div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="#">Home</a> » Forget password </div>
      <!--Breadcrumb Part End-->

     <div class="box">
        <div class="box-heading">Forget password </div>
      <div class="login-content">
          <?php echo form_open('user/forgetpasswordvalidation');?>

            <fieldset>
              <legend>Please fill the from to get password </legend>
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
                              'name'    => 'forgetpassword',
                              'value'   => 'Get Now',
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