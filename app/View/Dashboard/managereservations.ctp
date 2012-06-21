<div style = "background-color: transparent;" id = "calendar" class = "inner">
	<?php //echo $this->element('fullCalendar', array('bookings' => $bookings)); ?>
	<b> My Bookings </b>
	<div class = "booking_bookmark row-fluid">
		<h1>Saturday May 25th, 2012</h1>
	</div>
	<?php for($i = 0; $i < 5; $i++){ ?>
		<div class="sub-info alert alert-success">
		<div class="row-fluid dates">
			<div class="span1">
				<img class = "quickinfo ajax" title = "./properties/viewpropertyajax/33" src="http://placehold.it/32x32" />
			</div>
			<div class="span2">
				The Epic Bonanza<br />
				(+1 Guests)
			</div>
			<div class="big_dates span3">
				Check In<br>
				<b>01/01/12</b>
			</div>
			<div class="big_dates span3">
				Check Out<br>
				<b>01/01/12</b>
			</div>
			<div class="big_dates span3">
				Total Payment<br>
				<b>$500</b>
			</div>
		</div>
		<br />
		<p>
			<b>Message: </b> Keys in the room, door is open, check out google.com! Wifi password is harry12
		</p>
	</div>
	<?php } ?>
</div>