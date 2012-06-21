<section class = "clearfix inner">
	<h1>What is the Inbox?</h1>
	<div>
		<h1>About Inbox</h1>
		Your inbox lets you connect to other members of Reservation Resources. From here you can interact with other users of the site regarding questions or concerns you may have following our <a href = "#">Acceptable Usage Policy</a>
	</div>
	<div id = "questions">
		<h1>Helpful Links</h1>
		<ul>
			<li><a data-question-id = "1" data-answer = "Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated.Messages should not be contaminated." href = "#">What should and shouldn't I say through messages?</a>
			</li>
			<li><a data-question-id = "howtomessage" data-answer = "To message someone, simply ask questions." href = "#">How do I message someone?</a>
			</li>
		</ul>
	</div>
</section>
<div class = "inner" id = "answer">
	<h1>Your Answer</h1>
	<div>
		<!-- Dynamically Inserted via jQuery -->
	</div>
</div>
<hr />
<div class = "inner">
	<div class = "clearfix">
		<div style = "float:right;">
			<a class="btn btn-large btn-danger" href="javascript:void(0);"><i class="icon-trash icon-white"></i> Delete Selected</a>
		</div>
		<b>My Inbox</b>
	</div>
	<!-- start for loop -->
	<?php foreach ($topics as $key => $value){?>
		<?php if(((AuthComponent::user('id') != $topics[$key]['Topic']['from_user_deleted']) && (AuthComponent::user('id') == $topics[$key]['Topic']['from_user_id']))||((AuthComponent::user('id') != $topics[$key]['Topic']['to_user_deleted']) && (AuthComponent::user('id') == $topics[$key]['Topic']['to_user_id']))){ ?>
	<div class = "row-fluid inner message">
		<div class = "span1">
			<?php 
			if(AuthComponent::user('id') == $topics[$key]['Topic']['from_user_id']){
				$options = array('id' => $topics[$key]['Topic']['id'],'data-message'=>'from_user_deleted');
				echo $this->Form->checkbox('delete', $options);
			}
			else{
				if(AuthComponent::user('id') == $topics[$key]['Topic']['to_user_id']){
					$options = array('id' => $topics[$key]['Topic']['id'],'data-message'=>'to_user_deleted');
					echo $this->Form->checkbox('delete', $options);
				}
				
			}

			?>
		</div>
		<div class = "span2">
			<a href = "#"><?php 
				if(isset($topics[$key]['Property']['default_image'])){
				echo $this->Html->image('../images/'.$topics[$key]['Property']['user_id']."/".$topics[$key]['Property']['id']."/".$topics[$key]['Property']['default_image'], array('alt' => 'reservation_resources_property_picture','class'=>'profile_picture')); 
				}
				else{
				echo $this->Html->image('no_picture_available.jpg',array('alt'=>'No Image Available','class'=>'profile_picture'));
				}
			
			?></a>
		</div>
		<div class = "topics span6">
			<a href = "#">RE: <?php echo $topics[$key]['Property']['title']; ?> </a>
			<a href = "#"><span class = "small">Last Message From: <?php  end($topics[$key]['Message']); $pointer = key($topics[$key]['Message']); echo $topics[$key]['Message'][$pointer]['User']['first_name']. " ". $topics[$key]['Message'][$pointer]['User']['last_name'] ; ?> </span></a>
			<p class = "subtext">
				<?php echo substr($topics[$key]['Message'][$pointer]['message'], 0, 70); ?>
			</p>
		</div>
		<div class = "span3">
			<b>Received: </b><?php echo $topics[$key]['Topic']['modified']; ?> 
		</div>
	</div>
	<?php 	}
	   }
	?>
	<!-- end for loop -->
</div>