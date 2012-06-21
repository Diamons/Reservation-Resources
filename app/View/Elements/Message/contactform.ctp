<?php 
	echo $this->Form->create('Message',array('class'=>'formee','action'=>'submitMessage'));
	echo $this->Form->input('message');
	echo $this->Form->input('Topic.property_id',array('type'=>'hidden','value'=>$pid));
	echo $this->Form->end(array('label'=>'Send Message','id'=>'contactHost'));

?>