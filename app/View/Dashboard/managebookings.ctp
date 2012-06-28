
 <div class = "row-fluid inner">
	<div class = "span5">
	
		<!-- START FOR LOOP -->
		<!-- DATA-ID = USER ID OF THE PERSON BOOKING -->
		<?php foreach($property['Booking'] as $key => $value){?>
		<?php 	if($property['Booking'][$key]['user_id'] != AuthComponent::user('id')){ ?>
		<div>
		<div data-id = "<?php echo $property['Booking'][$key]['User']['id']; ?>" class = "person" data-startDate = "<?php echo $property['Booking'][$key]['start_date']; ?>" data-endDate = "<?php echo $property['Booking'][$key]['end_date']; ?>"> 
			<div class = "row-fluid booking_person">
				<div class = "span3">
				
					<!-- REPLACE TITLE "33" WITH USER ID -->
					<?php if(isset($property['Booking'][$key]['User']['profile_picture'])){?>
					<img class = "quickinfo ajax" title = "./users/viewuser/<?php echo $property['Booking'][$key]['User']['id']; ?>" src = "<?php echo $property['Booking'][$key]['User']['profile_picture']; ?>" />
					<?php } else{
							echo $this->Html->image('anonymous.jpg',array('class'=>'quickinfo ajax','title'=>'./users/viewuser/'.$property['Booking'][$key]['User']['id']));
						}
					?>

		
				</div>
				<div class = "span8">
					<h1><?php echo $property['Booking'][$key]['User']['first_name']." ".$property['Booking'][$key]['User']['last_name']; ?>(+<?php echo $property['Booking'][$key]['guests']; ?> Guests)</h1>
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
						<b><?php echo "$".$property['Booking'][$key]['subtotal'];?></b>
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
		<?php }}?>
		<!-- END FOR LOOP -->
		
		
	</div>
	<div class = "span7">
		<div id = "calendar"><?php  echo $this->element('calendar', array('cache' => false, 'dates' => $property['Booking'],'pid' => $property['Property']['id']));?></div>
	</div>
	<div style = "float:right;padding-top:25px;">
	<input id = "blackbook" class = "btn btn-large btn-danger" data-pid = '<?php echo $property['Property']['id'];  ?>' type = "button" value = "Manage Availability">
	</input>
	</div>
</div>

