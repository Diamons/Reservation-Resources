<?php //Debugger::log($property) ?>
<div class = "clearfix person_card">
	<div>
	<?php if (isset($property['Property']['default_image'])){ ?>
		<img  class = 'profile_picture' src ="<?php echo $this->webroot."images/".$property['Property']['user_id']."/".$property['Property']['id']."/".$property['Property']['default_image']; ?>" />
		<?php } else{ ?>
		<img  class = 'profile_picture' src ="<?php echo $this->webroot."img/no_picture_available.jpg"; ?>" />
		<?php } ?>
	</div>
	<div>
		<h1><?php echo $property['Property']['title']; ?></h1>
		<?php echo $property['Property']['description']; ?>
		<div class = "row-fluid social_media">
			<div class = "span6">
				<div class = "clearfix">
					<?php echo $this->Html->image('icons/thumbsup.png'); ?> <div>Positively Reviewed</div>
				</div>
			</div>
			<div class = "score_card span6">
				<div class = "score">
					99%
				</div> 
				Approval Rating
			</div>
		</div>
	</div>
	
</div>