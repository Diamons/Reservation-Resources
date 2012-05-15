

<div id = "body" role = "main">
	<div class = "row-fluid">
		<div class = "span6">
			<div class = "features_block blue"><h1>Hi there! <span class = "highlight">Login</span> with your user details!</h1></div>
			<?php 
				echo $this->Form->create('User', array('class' => 'formee'));
				echo $this->Form->input('Username', array('placeholder' => 'Enter your e-mail address here...'));
				echo $this->Form->input('Password', array('type' => 'password'));
				echo $this->Form->end('Login');
			?>
		</div><div class = "span6">
			<div class = "features_block"><h1>Don't have an account? <span class = "highlight">Register</span> today! It's free!</h1></div>
			<?php 
				echo $this->Form->create('User', array('class' => 'formee','action'=>'register'));
				echo $this->Form->input('username', array('placeholder' => 'Enter your e-mail address here...'));
				echo $this->Form->input('first_name', array('placeholder' => 'First name goes here...'));
				echo $this->Form->input('last_name', array('placeholder' => 'Last name goes here...'));
				echo $this->Form->input('password', array('type' => 'password'));
				echo $this->Form->input('password_confirmation', array('type' => 'password'));
			?> 
				<label class = "label_check">
				    <?php echo $this->Form->checkbox('Subscribe', array('value' => 'subscribe')); ?>  Allow Reservation Resources to send me important email about my properties, bookings, reservatons, and more.
				</label>
				<label class = "label_check">
				   <?php echo $this->Form->checkbox('TermsofService'); ?>  I have read agree to the Terms of Service listed below. 
				</label>
				<div class="termsofservice">
					<?php 
						echo $this->element('legal/termsofservice');
					?>
				</div>
			<?php 
				echo $this->Form->end('Register');
			?>
		</div>

	</div>
</div>
