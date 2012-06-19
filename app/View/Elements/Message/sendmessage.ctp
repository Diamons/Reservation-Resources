<div class = "row-fluid inner booking_card">
	<div class = "span4">
		<img class = "quickinfo ajax" title = "./users/viewuser/<?php echo $bookinginformation['User']['id'];?>" src = "http://placehold.it/340x362" />
		<h1><?php echo $bookinginformation['User']['first_name']." ".$bookinginformation['User']['last_name'];  ?></h1>
		<div class = "person_card">
			<div class="social_media">
				<div class="clearfix">
					<img src="/cakephp/img/icons/tick.png"> <div>Phone Verified</div>
				</div>
				<div class="clearfix">
					<img src="/cakephp/img/icons/facebook-icon.png"> <div>Facebook Verified</div>
				</div>
				<div class="clearfix">
					<img src="/cakephp/img/icons/thumbsup.png"> <div>Positively Reviewed</div>
				</div>
			</div>
		</div>
	</div>
<?php if($status == "accept") { ?>
	<div class = "span8">
		<div class = "alert alert-success">
			You have chosen to <b><?php echo $status; ?></b> the booking. Please leave a brief message welcoming your guest as well as stating any details they may need to know.
		</div>
		<div class = "alert alert-warning">
			<b>NOTICE!</b>: The guest is bringing <?php echo $bookinginformation['Booking']['guests']; ?> guests with him or her.
		</div>
		<div class = "sub_info">
			<div class = "row-fluid dates">
				<div class = "span4">
					Check In<br/>
					<b><?php echo date('F d Y',strtotime($bookinginformation['Booking']['start_date'])); ?></b>
				</div>
				<div class = "span4">
					Check Out
					<b><?php echo date('F d Y',strtotime($bookinginformation['Booking']['end_date'])); ?></b>
				</div>
				<div class = "span4">
					Total Price
					<b><?php echo "$".$bookinginformation['Booking']['subtotal']; ?></b>
				</div>
			</div>
		</div>
		
		<!-- PUT FORM HERE AND MOVE CLASS FORMEE TO FORM ELEMENT -->
		
		
		<?php echo $this->Form->create('Booking', array('class' => 'formee', 'inputDefaults' => array('label' => false))); ?>
			<?php echo $this->Form->input('comment'); 
				  echo $this->Form->input('id',array('value'=>$bookinginformation['Booking']['id'],'type'=>'hidden'));?>
		<?php echo $this->Form->end(array('label'=>'Send Message','class'=>'submitQuickMessage')); ?>
	</div>
<?php } elseif($status == "decline"){ ?>
	<div class = "span8">
		<div class = "alert alert-error">
			You have chosen to <b><?php echo $status; ?></b> the booking. Please leave a brief message on why you are declining their reservation for future reference.
		</div>
		<div class = "alert alert-warning">
			<b>NOTICE!</b>: The guest is bringing <?php echo $bookinginformation['Booking']['guests']; ?> guests with him or her.
		</div>
		<div class = "sub_info">
			<div class = "row-fluid dates">
				<div class = "span4">
					Check In<br/>
					<b><?php echo date('F d Y',strtotime($bookinginformation['Booking']['start_date'])); ?></b>
				</div>
				<div class = "span4">
					Check Out
					<b><?php echo date('F d Y',strtotime($bookinginformation['Booking']['end_date'])); ?></b>
				</div>
				<div class = "span4">
					Total Price
					<b><?php echo "$".$bookinginformation['Booking']['subtotal']; ?></b>
				</div>
			</div>
		</div>
		
		<!-- PUT FORM HERE AND MOVE CLASS FORMEE TO FORM ELEMENT -->
		
		<?php echo $this->Form->create('Booking', array('class' => 'formee', 'inputDefaults' => array('label' => false))); ?>
			<?php echo $this->Form->input('comment'); 
				  echo $this->Form->input('id',array('value'=>$bookinginformation['Booking']['id'],'type'=>'hidden'));?>
		<?php echo $this->Form->end(array('label'=>'Send Message','class'=>'submitQuickMessage')); ?>
	</div>
<?php } ?>
</div>