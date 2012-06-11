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
			<a class="btn btn-large btn-danger" href="#"><i class="icon-trash icon-white"></i> Delete Selected</a>
		</div>
		<b>My Inbox</b>
	</div>
	<div class = "row-fluid inner message">
		<div class = "span1">
			<?php $options = array('id' => 'THISID'); echo $this->Form->checkbox('delete', $options); ?>
		</div>
		<div class = "span2">
			<a href = "#"><?php echo $this->Html->image('http://a1.muscache.com/airbnb/2012-06-07T08:13:29Z/images/page1/life/bucket2_en.jpg', array('class' => 'profile_picture')); ?></a>
		</div>
		<div class = "topics span6">
			<a href = "#">Concerning your property at 985 Nostrand Avenue!</a>
			<a href = "#"><span class = "small">Shahruk Khan</span></a>
			<p class = "subtext">
				<?php echo substr("First 90 chracters go here First 90 chracters go here First 90 chracters go here", 0, 70); ?>
			</p>
		</div>
		<div class = "span3">
			<b>Received: </b> 09/12/1223 6:15 PM
		</div>
	</div>
</div>