<div class="rightdivsite">
  <div class="clear" style="height:14px"></div>
 <div class="videodiv">

       <div class="fucher_cont">
      <div class="box"> 
      <div class="box-heading">Add a Project </div></div>
  	<?php echo form_open_multipart('project/addnewvalidation');?>

			<fieldset>
				<legend>Please fill the form to create a new Project </legend>
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
							'name' => 'porject_title',
							'id'   => 'porject_title',
							'size' => '85',
							'value' => set_value('porject_title'),
					); ?>

					<p>
						<?php echo form_label('Project Title *:', 'porject_title', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
					</p>	

					

					<?php $atts = array(
							'name' => 'project_description',
							'id'   => 'project_description',
							'rows' => '8',
							'cols' => '82',
							'value' => set_value('project_description'),
					); ?>
					<p>
						<?php echo form_label('Project Description/Business Plan *:', 'project_description', $latts); ?>
						<br />
						<?php echo form_textarea($atts); ?>
					</p>

						<?php $atts = array(
							'name' => 'financial_plan',
							'id'   => 'financial_plan',
							'rows' => '8',
							'cols' => '82',
							'value' => set_value('financial_plan'),
					); ?>
					<p>
						<?php echo form_label('Financial Plan *:', 'financial_plan', $latts); ?>
						<br />
						<?php echo form_textarea($atts); ?>
					</p>
				
					<?php $atts = array(
							'name' => 'minimum_investment',
							'id'   => 'minimum_investment',
							'size' => '35',
							'value' => set_value('minimum_investment'),
					); ?>
					<p>
						<?php echo form_label('Minimum Investment *:', 'minimum_investment', $latts); ?>
						<br />
						<?php echo form_input($atts); ?>
					</p>



					<?php $atts = array(
							'name' => 'project_doc',
							'id'   => 'project_doc',
							'size' => '35',
							'value' => set_value('project_doc'),
					); ?>

					<p>
						<?php echo form_label('Project Document (Slideshow, PDF,Doc):', 'project_doc', $latts); ?>
						<br />
						<?php echo form_upload($atts); ?>
					</p>

					<?php $atts = array(
							'name'    => 'submit',
							'value'   => 'Add Project',
							'class'   => 'button',
					); ?>
					<p>
						<span> <?php echo form_submit($atts); ?>
						</span>
					</p>

				</div>
			</fieldset>
			<?php echo form_close(); ?>
      </div>
 
 </div>
 
 </div>
</div>
<div class="clear"></div>