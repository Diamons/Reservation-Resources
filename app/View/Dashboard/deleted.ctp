<div class = "inner">
	<div class = "clearfix">
		<b>My Deleted Messages</b>
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