<div class = "inner">
	<div class = "clearfix">
		<b>My Deleted Messages</b>
	</div>
	
	<?php foreach ($topics as $key => $value){?>
		<?php if((AuthComponent::user('id') == $topics[$key]['Topic']['from_user_deleted']) || (AuthComponent::user('id') == $topics[$key]['Topic']['to_user_deleted'])){ ?>
	<div class = "row-fluid inner message">
		<!--uncomment to add back in check box incase of future undelete feature<div class = "span1">
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
		</div>-->
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