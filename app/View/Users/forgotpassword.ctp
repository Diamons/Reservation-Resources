<?php

	echo $this->Form->create('User',array('class'=>'formee'));
	echo $this->Form->input('username',array('label'=>'enter your email address'));
	echo $this->Form->end('submit');
?>