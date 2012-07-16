<?php 
	echo $this->Form->create('Craigslist',array('class'=>'formee','action'=>'submitMessage'));
	echo $this->Form->input('message');
	echo $this->Form->input('key',array('type'=>'hidden','value'=>$key));
	echo $this->Form->end(array('label'=>'Send Message','id'=>'contactHost'));

?>