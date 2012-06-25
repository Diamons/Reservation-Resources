<div style = "background-color: transparent;" id = "calendar" class = "inner">
	<?php //echo $this->element('fullCalendar', array('bookings' => $bookings)); ?>
	<b> My Upcoming Reservation</b>
	<div class = "booking_bookmark row-fluid">
		<h1>Here is a quick over view of upcoming spaces you have booked and the host has accepted your reservation request</h1>
	</div>
	<?php foreach($confirmedbooking as $key => $value){ ?>
		<?php if( $confirmedbooking[$key]['Booking']['status'] == 1) {?>
		<div class="sub-info alert alert-success">
		<?php }
			else if($confirmedbooking[$key]['Booking']['status'] == 2){
		?>
		<div class="sub-info alert alert-error">
		<?php } ?>
		<div class="row-fluid dates">
			<div class="span1"><!-- quick info on host -->
				<?php if(isset($confirmedbooking[$key]['Booking']['Property']['default_image'])){  ?>
				<img class = "quickinfo ajax" title = "./properties/viewpropertyajax/<?php echo $confirmedbooking[$key]['Booking']['property_id']; ?>" src="<?php echo $this->webroot."images/".$confirmedbooking[$key]['Booking']['Property']['user_id']."/".$confirmedbooking[$key]['Booking']['Property']['id']."/thumbnails/".$confirmedbooking[$key]['Booking']['Property']['default_image']; ?>" />
				<?php } else{ ?>
				<img class = "quickinfo ajax" title = "./properties/viewpropertyajax/<?php echo $confirmedbooking[$key]['Booking']['property_id']; ?>" src="<?php echo $this->webroot."img/no_picture_available.jpg"; ?> " />
				<?php } ?>
			</div>
			<div class="span2">
				<?php echo $confirmedbooking[$key]['Booking']['Property']['title']; ?><br />
			</div>
			<div class="big_dates span3">
				Check In<br>
				<b><?php echo date('m/d/y',strtotime($confirmedbooking[$key]['Booking']['start_date'])); ?></b>
			</div>
			<div class="big_dates span3">
				Check Out<br>
				<b><?php echo date('m/d/y',strtotime($confirmedbooking[$key]['Booking']['end_date'])); ?></b>
			</div>
			<div class="big_dates span3">
				Total Payment<br>
				<b><?php echo "$".$confirmedbooking[$key]['Reservation']['total_amount']; ?></b>
			</div>
		</div>
		<br />
		<p>
			<b>Message: </b> <?php echo $confirmedbooking[$key]['Booking']['comment']; ?>
		</p>
	</div>
	<?php } ?>
</div>