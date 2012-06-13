<div class = "inner" id = "body" role = "main">
	<div class = "row-fluid">
		<div class = "span6">
			<div class = "features_block blue"><h1>Hi there! <span class = "highlight">Login</span> with your user details!</h1></div>
			<?php 
				echo $this->Form->create('User', array('class' => 'formee','action'=>'login'));
				echo $this->Form->input('username', array('id' => 'UsernameLogin'));
				echo $this->Form->input('password', array('type' => 'password', 'id' => 'UserPassword'));
				echo $this->Form->end(array('label'=>'Login','id'=>'loginbutton'));
				
			?>
		</div><div class = "span6">
			<div class = "features_block"><h1>Don't have an account? <span class = "highlight">Register</span> today! It's free!</h1></div>
			<?php 
				echo $this->Form->create('User', array('id' => 'UserRegister', 'class' => 'formee','action' =>'register'));
				echo $this->Form->input('username');
				echo $this->Form->input('confirm_username');
				echo $this->Form->input('first_name');
				echo $this->Form->input('last_name');
				echo $this->Form->input('password', array('type' => 'password'));
				echo $this->Form->input('password_confirmation', array('type' => 'password'));
			?> 
				<label class = "label_check">
				    <?php echo $this->Form->checkbox('Subscribe', array('value' => 'subscribe')); ?>  Allow Reservation Resources to send me important email about my properties, bookings, reservatons, and more.
				</label>
				<label class = "label_check">
				   <?php echo $this->Form->checkbox('TermsofService'); ?>  I have read and agree to the Terms of Service listed below. 
				</label>
				<div class="termsofservice">
					<?php 
						echo $this->element('legal/termsofservice');
					?>
				</div>
				
			<?php 
			
				echo $this->Form->end(array('label'=>'Register','id'=>'registerbutton'));
			?>
			
		</div>

	</div>
</div>