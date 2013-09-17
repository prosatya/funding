<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Contact Us </div></div>
      <?php echo form_open('user/contactusvalidation');?>

            <fieldset>
              <legend>Please fill the from to contact us </legend>
              <?php
			 // echo $this->session->userdata->contactus;
			
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
                            'name' => 'cname',
                            'id'   => 'cname',
                            'size' => '35',
                            'value' => set_value('cname'),
                        ); ?>

                         <p>
                           <?php echo form_label('Full Name:', 'cname', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>
                         <?php $atts = array(
                            'name' => 'csubject',
                            'id'   => 'csubject',
                            'size' => '35',
                            'value' => set_value('csubject'),
                        ); ?>

                         <p>
                           <?php echo form_label('Subject:', 'csubject', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>

                        <?php $atts = array(
                            'name' => 'cmail',
                            'id'   => 'cmail',
                            'size' => '35',
                            'value' => set_value('cmail'),
                        ); ?>

                        <p>
                           <?php echo form_label('Email Address:', 'cmail', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>

                        <?php $atts = array(
                            'name' => 'contactno',
                            'id'   => 'contactno',
                            'size' => '35',
                        ); ?>
                        <p>  
                           <?php echo form_label('Contact No.:', 'contactno', $latts); ?><br/>
                           <?php echo form_input($atts); ?>
                        </p>

                         <?php $atts = array(
                            'name' => 'description',
                            'id'   => 'description',
                            'size' => '35',
                        ); ?>
                        <p>  
                           <?php echo form_label('Description:', 'description', $latts); ?><br/>
                           <?php echo form_textarea($atts); ?>
                        </p>
                         
                                                                      
                       <?php $atts = array(
                              'name'    => 'register',
                              'value'   => 'Contact Us',
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