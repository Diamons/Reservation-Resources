<div class="inner row-fluid" id="body" role="main">
	<div class="span8 row-fluid inner checkout_dates ">
		<div class="row-fluid cart cart_info">
			<div style="text-align:right;" class="span2">
				<i class="icon-time"></i> <b>TIP:</b>
			</div>
			<div class="span10">
				The property you are booking is [TITLE GOES HERE]. The host must accept your reservation request in order for the reservation to be confirmed. If the host declines the offer, Reservation Resources will offer you similar choices of accomodation.
			</div>
		</div>
		<h1 style="margin-top: 20px;" class="heading">Checkout Process</h1>
	</div>
	<div class="span4 inner cart">
		<?php echo $this->Html->image('checkout.png', array('id' => 'checkout')); ?>
			<div class="property_image">
				<img src="http://www.about-interior-design.net/gallery/modern-interior-design-ideas/modern_interior_design_ideas_4.jpg" />
			</div>
			<div class="clearfix booking_info">
				
				<b>Host Fees:</b>
				<div class="all_fees">
					<div>Cleaning Fee -- $1.25</div>
					<div>Pet Fee -- $1.25</div>
				</div>	
			</div>
			
			<div class="clearfix booking_info">
				
				<b>Host Fees:</b>
				<div class="all_fees">
					<div>Cleaning Fee -- $1.25</div>
					<div>Pet Fee -- $1.25</div>
				</div>	
			</div>
			
			<div class="row-fluid booking_labels">
				<div class="span5">
					Check In
				</div>
				<div class="span2"></div>
				<div class="span5">
					Check Out
				</div>
			</div>
			
			<div class="booking_dates row-fluid">
				<div id="bookingCheckin" class="span5">
					01/02/03
				</div>
				<div class="span2">--</div>
				<div id="bookingCheckout" class="span5">
					01/02/03
				</div>
			</div>
			
			<div class="booking_labels booking_pricing row-fluid">
				<div class="span6">
					Subtotal:
				</div>
				<div id="subtotal" class="price span6">
					$197.00
				</div>
			</div>
			
			<div class="booking_labels booking_pricing row-fluid">
				<div id="guests" class="span6">
					+1 Guest:
				</div>
				<div id="guests_fee" class="price span6">
					$10.00
				</div>
			</div>
			
			<div class="booking_labels booking_pricing booking_pricing_final row-fluid">
				<div class="span6">
					Reservation Resources:
				</div>
				<div id="reservation_resources_fee" class="price span6">
					$11.00
				</div>
			</div>
			
			<div class="booking_labels booking_pricing row-fluid">
				<div class="span4">
					Total:
				</div>
				<div class="price span8">
					<span id="finalPrice">$208.49</span>
				</div>
			</div>
			<a href="#"><div id="paypal_checkout"></div></a>
	</div>
</div>