<div style = "background-color: transparent;" id = "calendar" class = "inner">
	<?php //echo $this->element('fullCalendar', array('bookings' => $bookings)); ?>
	<b> My Property Bookings </b>
	<div class = "booking_bookmark row-fluid">
		<h1>This is where you can view all confirmed bookings after the guest has successfully completed the transaction</h1>
	</div>
	<?php foreach($confirmedbooking as $key => $value){ ?>
		<div class="sub-info alert alert-success">
		<div class="row-fluid dates">
			<div class="span1">
				<?php if(isset($confirmedbooking[$key]['Booking']['User']['profile_picture'])){ 
							echo $this->Html->image($confirmedbooking[$key]['Booking']['User']['profile_picture'],array('class'=>'quickinfo ajax','title'=>'./users/viewuser/'.$confirmedbooking[$key]['Booking']['User']['id']));
						}
						else{
							echo $this->Html->image('anonymous.jpg',array('class'=>'quickinfo ajax'));
						}
				?>
					
			</div>
			<div class="span2">
				<?php echo $confirmedbooking[$key]['Booking']['User']['first_name']." ".$confirmedbooking[$key]['Booking']['User']['last_name']; ?><br />
				(+<?php echo $confirmedbooking[$key]['Booking']['guests']; ?> Guests)
			</div>
			<div class="big_dates span3">
				Check In<br>
				<b><?php echo date('m/d/y',strtotime($confirmedbooking[$key]['Booking']['start_date']));?></b>
			</div>
			<div class="big_dates span3">
				Check Out<br>
				<b><?php echo date('m/d/y',strtotime($confirmedbooking[$key]['Booking']['end_date']));?></b>
			</div>
			<div class="big_dates span3">
				Total Price<br>
				<b>$<?php echo $confirmedbooking[$key]['Reservation']['landlord_amount']; ?> </b>
			</div>
		</div>
	</div>
	<?php } 
	?>
</div>