<pre>
<span contenteditable="true"  class="bubble" id = "#commentSpan">

</span>
</pre>
<h1 style = color:white;>On a scale from 1-5 how many stars would you rate this property?</h1><br/>
<div>
<?php
	echo $this->Form->create('Property');
	$options = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5);
	echo $this->Form->input('Review.rating',array('options'=>$options,'type'=>'select'));
	echo $this->Form->input('Review.property_id',array('type'=>'hidden','value'=>$pid));
	echo $this->Form->input('Review.user_id',array('type'=>'hidden','value'=>AuthComponent::user('id')));
	echo $this->Form->end();
?>
<input type="button" id = "submitCommentButton" value="Submit Comment" class="btn btn-small btn-primary" style = "position:relative; bottom:25px;left:50px;">
</div>