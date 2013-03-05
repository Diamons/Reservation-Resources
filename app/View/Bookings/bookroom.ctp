<?php
	$this->start('scriptBottom');
		echo $this->Html->script('Bookings/bookroom'); 
	$this->end();
?>
<div class="inner row-fluid" id="body" role="main">
	<div class="span8 row-fluid inner checkout_dates ">
		<div class="row-fluid cart cart_info">
			<div style="text-align:right;" class="span2">
				<i class="icon-time"></i> <b>TIP:</b>
			</div>
			<div class="span10">
				The property you are booking is <?php echo $property['Property']['title']; ?>. The host must accept your reservation request in order for the reservation to be confirmed. If the host declines the offer, Reservation Resources will offer you similar choices of accomodation.
			</div>
		</div>
		<h1 style="margin-top: 20px;" class="heading">Checkout Process</h1>
		<?php 
			echo $this->Form->create('User',array('controller'=>'bookings','action'=>'bookRoom','class'=>'formee'));
			echo $this->Form->input('Booking.start_date', array('type'=>'text','onChange'=>'javscript:quickbook();','class' => 'checkin', 'placeholder' => 'Check In Date','label'=>false));
			echo $this->Form->input('Booking.end_date', array('type'=>'text','onChange'=>'javascript:quickbook();','class' => 'checkout', 'placeholder' => 'Check Out Date','label'=>false));
			$guestsCount = array(0 => '0 Guest', 1 => '1 Guest', 2 => '2 Guests', 3 => '3 Guests', 4 => '4 Guests', 5 => '5 Guests');
			echo $this->Form->input('Booking.guest',array('options'=>$guestsCount,'default'=>0,'onChange'=>'quickbook()'));
			echo $this->Form->input('Booking.property_id',array('type'=>'hidden','value'=>$property['Property']['id']));
			echo $this->Form->input('first_name',array('value'=>AuthComponent::user('first_name')));
			echo $this->Form->input('last_name',array('value'=>AuthComponent::user('last_name')));
			echo $this->Form->input('phone',array('value'=>AuthComponent::user('phone')));
			echo $this->Form->input('address',array('value'=>AuthComponent::user('address')));
			echo $this->Form->input('city',array('value'=>AuthComponent::user('city')));
			echo $this->Form->input('state',array('value'=>AuthComponent::user('state')));
			echo $this->Form->input('zip',array('value'=>AuthComponent::user('zip')));
			echo $this->Form->input('country',array('value'=>'United States'));
			echo $this->Form->input('id',array('type'=>'hidden','value'=>AuthComponent::user('id')));
			
			echo $this->Form->end();
		
		?>
	</div>
	<div class="span4 inner cart">
		<?php echo $this->Html->image('checkout.png', array('id' => 'checkout')); ?>
			<div class="property_image">
				<?php 
					if(isset($property['Property']['default_image'])){
						echo $this->Html->image('/images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/'.$property['Property']['default_image']);
					}
					else
					echo $this->Html->image('no_picture_available.jpg',array('width'=>800));
				?>
			</div>
			<div class="clearfix booking_info">
				
				<b>Host Required Fees:</b>
				<div class="all_fees">
					<?php foreach($property['Fee'] as $key => $value){ ?>
						<?php if ($key  != 0 && $property['Fee'][$key]['required'] == 1){?>
							<div><?php echo $property['Fee'][$key]['fee_name']; ?> -- $<?php echo $property['Fee'][$key]['fee_price']; ?></div>
							
					
					<?php
						}}
					 ?>
				
					
				
				</div>	
			</div>
			
			<!--<div class="clearfix booking_info">
				
				<b>Host Optional Fees:</b>
				<div class="all_fees">
					<div>Cleaning Fee -- $1.25</div>
					<div>Pet Fee -- $1.25</div>
				</div>	
			</div>-->
			
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
				
				</div>
				<div class="span2">--</div>
				<div id="bookingCheckout" class="span5">
				
				</div>
			</div>
			<div class="booking_labels booking_pricing row-fluid">
				<div id="guests" class="span6">
					+0 Guest:
				</div>
				<div id="guests_fee" class="price span6">
					$<?php echo $property['Fee'][0]['fee_price']; ?>/ Per Extra Guest
				</div>
			</div>
			<div class="booking_labels booking_pricing row-fluid">
				<div class="span6">
					Subtotal:
				</div>
				<div id="subtotal" class="price span6">
					$0.00
				</div>
			</div>
			

			
			<div class="booking_labels booking_pricing booking_pricing_final row-fluid">
				<div class="span6">
					Reservation Resources:
				</div>
				<div id="reservation_resources_fee" class="price span6">
					
				</div>
			</div>
			
			<div class="booking_labels booking_pricing row-fluid">
				<div class="span4">
					Total:
				</div>
				<div class="price span8">
					<span id="finalPrice"></span>
				</div>
			</div>
			<a href = "javascript:void(0);"><div id = "paypal_checkout">
			<?php echo $this->Paypal->button(null, array('amount' => '12.00', 'item_name' => $property['Property']['title'],'item_number'=>$property['Property']['id'],'custom'=>2)); ?>
			</div></a>
	</div>
</div>