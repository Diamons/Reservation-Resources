 <div class = "row-fluid inner">
	<div class = "span5">
	
	
		<!-- START FOR LOOP -->
		<!-- DATA-ID = USER ID OF THE PERSON BOOKING -->
		
		
		<div data-id = "33" class = "person">
			<div class = "row-fluid booking_person">
				<div class = "span3">
				
				
					<!-- REPLACE TITLE "33" WITH USER ID -->
					
					
					<img class = "quickinfo ajax" title = "./users/viewuser/33" src = "http://placehold.it/64x64" />
				</div>
				<div class = "span8">
					<h1>Shahruk Khan  (+2 Guests)</h1>
				</div>
			</div>
			<div class = "sub_info">
				<div class = "row-fluid dates">
					<div class = "span4">
						Check In<br/>
						<b>07/29/2012</b>
					</div>
					<div class = "span4">
						Check Out
						<b>08/29/2012</b>
					</div>
					<div class = "span4">
						Total Price
						<b>$500</b>
					</div>
				</div>
				<div class = "accept_or_decline">
				
				
					<!-- DATA-UID = USER ID, DATA-PID = PROPERTY ID, DATA-BID = BOOKING ID -->
					
					
					<input type = "button" data-uid = "33" data-pid = "1" data-status = "accept" data-bid = "1" type = "button" class = "btn btn-small btn-primary sendmessage" value = "Accept" />
					<input type = "button" data-uid = "33" data-pid = "1" data-status = "decline" data-bid = "1" type = "button" class = "btn btn-small btn-danger sendmessage" value = "Decline" />
				</div>
			</div>
		</div>
		
		
		<!-- END FOR LOOP -->
		
		
	</div>
	<div class = "span7">
		<div id = "calendar"><?php echo $this->element('calendar', array('dates' => $property['Booking'], 'pid' => 1)); ?></div>
	</div>
</div>