
<section class = "clearfix inner">
<?php Debugger::log($properties[9]); ?>
<?php Debugger::log($properties[8]); ?>

	<h1>Manage Properties</h1>
	<div>
		<h1>Managing My Properties</h1>
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
	<div>
		<b>Manage Properties</b>
	</div>
	<!-- Start for Loop -->
	<?php foreach($properties as $key => $value){?>
	<div class = "inner properties">
	<!-- Different Ribbons Based on Status of Property (i.e. Deleted, Active, Expired, etc.); -->
		<?php if ($properties[$key]['Property']['status'] == 0){?>
		<h1 class = "ribbon">Active Listing</h1>
		<?php } else if($properties[$key]['Property']['status'] == 1){?>
		<h1 class = "ribbon expired">Expired</h1>
		<?php }else if ($properties[$key]['Property']['status'] == 2){?>
		<h1 class = "ribbon deleted">Listing Deleted</h1>
		<?php } ?>
		<div class = "row-fluid">
			<div class = "span2">
			<?php if(isset($properties[$key]['Property']['default_image'])) { ?>
				<a href = "#"><?php echo $this->Html->image('../images/'.$properties[$key]['Property']['user_id']."/".$properties[$key]['Property']['id']."/".$properties[$key]['Property']['default_image'], array('alt' => 'reservation_resources_property_picture','class'=>'profile_picture')); ?></a>
				<?php } else{
				echo $this->Html->image('no_picture_available.jpg',array('alt'=>'No Image Available','class'=>'profile_picture'));
				}?>
			</div>
			<div class = "span7">
				<div class = "alert"><a href ="<?php echo $this->webroot."properties/viewproperty/".$properties[$key]['Property']['id']; ?>"><?php echo $properties[$key]['Property']['title']; ?></a> <span class = "small"><?php echo $properties[$key]['Property']['city'].",". $properties[$key]['Property']['state']; ?></span></div>
				<div class = "inner" style = "text-align: center;">
					<a href = "<?php echo $this->webroot."properties/edit/".$properties[$key]['Property']['id']; ?>"><input type = "button" class = "btn" value = "Edit Property" /></a>
					<a href = "#"><input type = "button" class = "btn btn-info" value = "Promote on Craigslist" /></a>
				</div>
			</div>
			<div class = "span3">
				<div class = "alert alert-success">
					<i class = "icon-signal"></i> <?php echo $properties[$key]['Property']['viewcount'];  ?> Views
				</div>
				<div class = "alert alert-success">
					<i class = "icon-calendar"></i> <?php echo count($properties[$key]['Booking']);  ?>  Bookings
				</div>
				<div class = "alert alert-success">
					<i class = "icon-comment"></i> <?php echo count($properties[$key]['Review']);  ?>  Reviews
				</div>
			</div>
		</div>
	</div>
	<?php }?>
	<!-- End For loop -->
</div>