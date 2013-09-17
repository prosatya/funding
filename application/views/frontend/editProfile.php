<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
  <div class="videodiv">
  <div class="fucher_cont">
  <div class="box"> 
  <div class="box-heading">Edit Profile</div>
		 <?php 
             $user_status = $this->session->userdata('user_status'); 
          ?>
          <?php 
            switch($user_status){ 
              case '0':
           ?>    <p> 
                  Hello, <?php echo $this->session->userdata('user_name'); ?> <br/> 
                  Welcome to your profile page. You need to verify your email address. Please check your email for further information. </p>
				 <p> If you not find in inbox please check <b>"Spam"</b> Folder. </p>
               </p>
				<!--<p>
				  If you not find in inbox please check <b>"Spam"</b> Folder or</br>
				<span><a href="<?php echo base_url().'user/resend' ; ?>" title="Forget Password"> Resend Activation Email</a></span> 
				</p>
				-->
            <?php 
                break;
               case '1':
             ?> 
             <?php echo form_open_multipart('user/editProfileSave');?>

			<fieldset>
				<legend>Please fill the from to create a Profile </legend>
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
							'name' => 'about_me',
							'id'   => 'about_me',
							'size' => '35',
							'value' => set_value('about_me'),
					); ?>

					<p>
						<?php echo form_label('About me *:', 'about_me', $latts); ?>
						<br />
						<?php echo form_textarea($atts); ?>
						<?php echo publicOrPrivate("about_me_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'upload_photo',
							'id'   => 'upload_photo',
							'size' => '35',
							'value' => set_value('upload_photo'),
					); ?>

					<p>
						<?php echo form_label('Upload Photo *:', 'upload_photo', $latts); ?>
						<br />
						<?php echo form_upload($atts); ?>
						<?php echo publicOrPrivate("upload_photo_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'contact_address',
							'id'   => 'contact_address',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Contact Address *:', 'contact_address', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("contact_address_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'contact_number',
							'id'   => 'contact_number',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Contact Number *:', 'contact_number', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("contact_number_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'email',
							'id'   => 'email',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Company Email *:', 'email', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("email_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'skype',
							'id'   => 'skype',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Skype:', 'skype', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("skype_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'fb',
							'id'   => 'fb',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Facebook:', 'fb', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("fb_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'vk',
							'id'   => 'vk',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Vkontekte Address:', 'vk', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("vk_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'od',
							'id'   => 'od',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Odnoklassniki Address:', 'od', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("od_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'linkedIn',
							'id'   => 'linkedIn',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('linkedIn Address:', 'linkedIn', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("linkedIn_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'company_url',
							'id'   => 'company_url',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Company Url *:', 'company_url', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
						<?php echo publicOrPrivate("company_url_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'company_description',
							'id'   => 'company_description',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Company description *:', 'company_description', $latts); ?>
						<br />
						<?php echo form_textarea($atts); ?>
						<?php echo publicOrPrivate("company_description_pp")?>
					</p>

					<?php $atts = array(
							'name' => 'company_reg_doc',
							'id'   => 'company_reg_doc',
							'size' => '35',
					); ?>
					<p>
						<?php echo form_label('Company registration Document *:', 'company_reg_doc', $latts); ?>
						<br />
						<?php echo form_upload($atts); ?>
						<?php echo publicOrPrivate("company_reg_doc_pp")?>
					</p>

					<p>
						<?php echo form_label('Are you interested in participating in on-line courses about business development? *:', 'course_interested', $latts); ?>
						<br />

						<?php $data = array(
								'name'        => 'course_interested',
								'id'          => 'course_interested_y',
								'value'       => 'yes',
								'checked'     => TRUE,
						);
						?>
						<span style="margin-top: 10px; display: inline-block;"> <?php echo form_radio($data); ?>
						</span> <span
							style="margin: 0 12px 0 4px; vertical-align: text-bottom;"> Yes </span>

						<?php $data = array(
								'name'        => 'course_interested',
								'id'          => 'course_interested_n',
								'value'       => 'no',
								'checked'     => FALSE,
						);
						?>
						<span style="margin-top: 10px; display: inline-block;"> <?php echo form_radio($data); ?>
						</span> <span style="vertical-align: text-bottom;"> No </span>
						<?php echo publicOrPrivate("course_interested_pp")?>
					</p>

					<?php $atts = array(
							'name'    => 'submit',
							'value'   => 'Save Profile',
							'class'   => 'button',
					); ?>
					<p>
						<span> <?php echo form_submit($atts); ?>
						</span>
					</p>

				</div>
			</fieldset>
			</div>
			<?php echo form_close(); ?>


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
<div class="clear"></div>