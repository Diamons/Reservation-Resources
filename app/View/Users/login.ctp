<div class = "row-fluid" id = "body" role = "main">
	<div class = "span7">
		<div class = "features_block blue"><h1>Hi there! <span class = "highlight">Login</span> with your user details!</h1></div>
		<?php 
			echo $this->Form->create('User', array('class' => 'formee'));
			echo $this->Form->input('Username', array('placeholder' => 'Enter your e-mail address here...'));
			echo $this->Form->input('Password', array('type' => 'password'));
			echo $this->Form->end('Login');
		?>
	</div><div class = "span5">
		<div class = "features_block"><h1>Don't have an account? <span class = "highlight">Register</span> today! It's free!</h1></div>
		<ul class = "list">
			<li>It's absolutely <span class = "highlight">free!</span></li>
		</ul>
			<?php 
			echo $this->Form->create('User', array('class' => 'formee','action'=>'register'));
			echo $this->Form->input('Username', array('placeholder' => 'Enter your e-mail address here...'));
			echo $this->Form->input('Password', array('type' => 'password'));
			echo $this->Form->input('Password_Confirmation', array('type' => 'password'));
			echo $this->Form->end('Register');
		?>
	</div>
	
</div>