<div class="inner">
	<div class="form_label">
		<h1><i class="icon-user"></i> Edit Account</h1>
		<!-- MOVE THE FORMEE CLASS TO THE FORM ELEMENT -->
		<div  class = "formee" >
			<?php echo $this->Form->create('User',array('action'=>'edit','type'=>'file')); ?>
			<div class="inner row-fluid">
				
				<div class="small h1 span6">
					<h1>First Name</h1>
				</div>
				<div class="span6">
					<?php echo $this->Form->input('first_name',array('label'=>false,'value'=>$user['User']['first_name'])); ?>
				</div>
			
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>Last Name</h1>
				</div>
				<div class="span6">
						<?php echo $this->Form->input('last_name',array('label'=>false,'value'=>$user['User']['last_name'])); ?>
				</div>
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>Phone Number</h1>
				</div>
				<div class="span6">
					<?php  echo $this->Form->input('phone',array('label'=>false,'value'=>$user['User']['phone'])); ?>
				</div>
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>PayPal Email Address</h1>
				</div>
				<div class="span6">
					<?php echo $this->Form->input('paypal_email',array('label'=>false,'value'=>$user['User']['paypal_email'])); ?>
				</div>
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>About me</h1>
				</div>
				<div class="span6">
					<?php echo $this->Form->input('about_me',array('label'=>false,'value'=>$user['User']['about_me'])); ?>
				</div>
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>Change Password</h1>
				</div>
				<div class="span6">
				<?php
					echo $this->Form->input('password', array('type' => 'password'));
					echo $this->Form->input('password_confirmation', array('type' => 'password'));
				?>
				</div>
			</div>
			<div class="inner row-fluid">
				<div class="small h1 span6">
					<h1>Profile Picture</h1>
				</div>
				<div class="span6">
					<?php echo $this->Form->input('profile_picture', array('type' => 'file','label'=>false));?>
				</div>
			</div>
			<?php echo $this->Form->input('id',array('type'=>'hidden','value'=>$user['User']['id'])); ?>
			<?php echo $this->Form->end('Update Profile'); ?>
		</div>
	</div>
</div>