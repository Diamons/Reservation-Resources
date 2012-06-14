<div class = "row-fluid inner booking_card">
	<div class = "span4">
		<img class = "quickinfo ajax" title = "./users/viewuser/33" src = "http://placehold.it/340x362" />
		<h1>Shahruk Khan</h1>
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
			<b>NOTICE!</b>: The guest is bringing 2 guests with him or her.
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
		</div>
		
		<!-- PUT FORM HERE AND MOVE CLASS FORMEE TO FORM ELEMENT -->
		
		
		<?php echo $this->Form->create('Message', array('class' => 'formee', 'inputDefaults' => array('label' => false))); ?>
			<?php echo $this->Form->input('message', array('type' => 'textarea')); ?>
		<?php echo $this->Form->end('Send Message'); ?>
	</div>
<?php } elseif($status == "decline"){ ?>
	<div class = "span8">
		<div class = "alert alert-error">
			You have chosen to <b><?php echo $status; ?></b> the booking. Please leave a brief message welcoming your guest as well as stating any details they may need to know.
		</div>
		<div class = "alert alert-warning">
			<b>NOTICE!</b>: The guest is bringing 2 guests with him or her.
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
		</div>
		
		<!-- PUT FORM HERE AND MOVE CLASS FORMEE TO FORM ELEMENT -->
		
		<?php echo $this->Form->create('Message', array('class' => 'formee', 'inputDefaults' => array('label' => false))); ?>
			<?php echo $this->Form->input('message', array('type' => 'textarea')); ?>
		<?php echo $this->Form->end('Send Message'); ?>
	</div>
<?php } ?>
</div>