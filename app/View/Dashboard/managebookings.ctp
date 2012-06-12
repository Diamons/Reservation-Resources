<div class = "row-fluid inner">
	<div class = "span5">
		<div data-id = "33" title = "users/viewuser/33" class = "quickinfo ajax row-fluid booking_person">
			<div class = "span4">
				<img src = "http://placehold.it/104x84" />
			</div>
			<div class = "span8">
				<h1>Shahruk Khan</h1>
				<div class = "small row-fluid dates">
					<div class = "span6">
						Check In<br/>
						<b>07/29/2012</b>
					</div>
					<div class = "span6">
						Check Out
						<b>08/29/2012</b>
					</div>
				</div>
				<div class = "accept_or_decline">
					<input type = "button" class = "btn btn-primary" value = "Accept" />
					<input type = "button" class = "btn btn-danger" value = "Decline" />
				</div>
			</div>
		</div>
	</div>
	<div class = "span7">
		<div id = "calendar"><?php echo $this->element('calendar', array('dates' => $property['Booking'], 'pid' => 1)); ?></div>
	</div>
</div>