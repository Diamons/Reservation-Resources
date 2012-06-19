<div class = "clearfix person_card">
	<div>
		<img src ="http://placehold.it/140x162" />
	</div>
	<div>
		<h1><?php echo $user['User']['first_name']." ".$user['User']['last_name']; ?></h1>
			<?php echo $user['User']['about_me']; ?>
		<div class = "row-fluid social_media">
			<div class = "span6">
				<div class = "clearfix">
					<?php echo $this->Html->image('icons/tick.png'); ?> <div>Phone Verified</div>
				</div>
				<div class = "clearfix">
					<?php echo $this->Html->image('icons/facebook-icon.png'); ?> <div>Facebook Verified</div>
				</div>
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