
 <div class = "row-fluid inner">
	<div class = "span5">
	
		<!-- START FOR LOOP -->
		<!-- DATA-ID = USER ID OF THE PERSON BOOKING -->
		<?php foreach($property['Booking'] as $key => $value){?>
		<?php// Debugger::log($property['Booking'][8]['start_date']); ?>
		<div>
		<div data-id = "<?php echo $property['Booking'][$key]['User']['id']; ?>" class = "person">
			<div class = "row-fluid booking_person">
				<div class = "span3">
				
				
					<!-- REPLACE TITLE "33" WITH USER ID -->
					
					
					<img class = "quickinfo ajax" title = "./users/viewuser/33" src = "http://placehold.it/64x64" />
				</div>
				<div class = "span8">
					<h1><?php echo $property['Booking'][$key]['User']['first_name']." ".$property['Booking'][$key]['User']['last_name']; ?>(+2 Guests)</h1>
				</div>
			</div>
			<div class = "sub_info">
				<div class = "row-fluid dates">
					<div class = "span4">
						Check In<br/>
						<b><?php echo date('F d Y',strtotime($property['Booking'][$key]['start_date'])); ?></b>
					</div>
					<div class = "span4">
						Check Out
						<b><?php echo date('F d Y',strtotime($property['Booking'][$key]['end_date'])); ?></b>
					</div>
					<div class = "span4">
						Total Price
						<b>$500</b>
					</div>
				</div>
				<div class = "accept_or_decline">
				
				
					<!-- DATA-UID = USER ID, DATA-PID = PROPERTY ID, DATA-BID = BOOKING ID -->
					
					
					<input type = "button" data-uid = "<?php echo $property['Booking'][$key]['User']['id'];?>" data-pid = "<?php echo $property['Property']['id'];?>" data-status = "accept" data-bid = "<?php echo $property['Booking'][$key]['id'];?>" type = "button" class = "btn btn-small btn-primary sendmessage" value = "Accept" />
					<input type = "button" data-uid = "<?php echo $property['Booking'][$key]['User']['id'];?>" data-pid = "<?php echo $property['Property']['id'];?>" data-status = "decline" data-bid = "<?php echo $property['Booking'][$key]['id'];?>" type = "button" class = "btn btn-small btn-danger sendmessage" value = "Decline" />
				</div>
			</div>
		</div>
	</div>
		<?php }?>
		<!-- END FOR LOOP -->
		
		
	</div>
	<div class = "span7">
		<div id = "calendar"><?php  echo $this->element('calendar', array('cache' => false, 'dates' => $property['Booking'],'pid' => $property['Property']['id']));?></div>
	</div>
</div>

