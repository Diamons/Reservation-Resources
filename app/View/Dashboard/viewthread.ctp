<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
<div class="inner">
<?php foreach($message as $key => $value){ ?>
	<div class="messages" data-uid = "<?php echo $message[$key]['Message']['user_id']; ?>" >
	<?php if($message[$key]['Message']['user_id'] == AuthComponent::user('id')){ ?>
		<div class="row-fluid person_message">
		<?php } else { ?>
		<div class="row-fluid person_message person_message_blue">
		<?php } ?>
			<div class="span1">
			<?php if(isset($message[$key]['User']['profile_picture'])){
					echo $this->Html->image($message[$key]['User']['profile_picture'],array('class'=>'profile_picture'));
					} 
					else{
					echo $this->Html->image('anonymous.jpg',array('class'=>'profile_picture'));
				}
			?>
			</div>
			<div style="position: relative;" class="span7">
				<div class="user_message_details"><?php echo $message[$key]['User']['first_name']." ".  $message[$key]['User']['last_name']; ?> </div>
			</div>
			<div class="user_message_info span4">
				<div><?php echo  $message[$key]['Message']['created']; ?> </div>
			</div>
		</div>
		<div class="inner">
			<?php echo  $message[$key]['Message']['message']; ?> 
		</div>
	</div>
<?php } ?>
	<!--<div class="messages">
		<div class="row-fluid person_message person_message_blue">
			<div class="span1">
				<img src="http://www.ucar.edu/communications/staffnotes/0609/images/Kyle.jpg" />
			</div>
			<div style="position: relative;" class="span7">
				<div class="user_message_details">Elliott James</div>
			</div>
			<div class="user_message_info span4">
				<div>01/01/12</div>
			</div>
		</div>
		<div class="inner">
			asdasdasd
		</div>
	</div>-->
</div>
<hr />
<div class="inner">
	
	<?php 
	echo $this->Form->create('Message',array('controller'=>'messages','action'=>'reply'));
	echo $this->Form->input('message', array('style' => 'width: 100%;')); 
	echo $this->Form->input('user_id',array('type'=>'hidden','value'=>AuthComponent::user('id')));
	echo $this->Form->input('topic_id',array('type'=>'hidden','value'=>$topic_id));
	echo $this->Form->end();
	?>
<a  style = "float:right;" id = "reply" href="#" class="btn btn-primary"><i class="icon-comment icon-white"></i> Reply</a>
</div>