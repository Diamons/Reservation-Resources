<?php
	$this->start('scriptBottom');
		echo $this->Html->script(array('properties/edit')); 
	$this->end();
?>
<div id = "body" class = "row-fluid" role = "main">
	<div class = "panel_info span6">
		<div class = "formee">
<?php
	$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Condo'=>'Condo');
	$bedrooms_bathrooms = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10);
	$privacy = array('Private Room'=>'Private Room','Shared Room'=>'Shared Room','Entire Property'=>'Entire Property');
	$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
	$minimum_stay;
	//loop for minimum stay
	for($i = 0; $i <= 31; $i++ ){
		$minimum_stay[$i] = $i; 
	}
	$payment_method = array('Check'=>'Check','Paypal'=>'Paypal');
	echo $this->Form->create('Property');
	echo $this->Form->input('address');
	echo $this->Form->input('city');
	echo $this->Form->input('state');
	echo $this->Form->input('zip_code');
	echo $this->Form->input('country');
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('rent_once',array('label'=>'Is this a one time rental?'));
	echo $this->Form->input('price_per_night');
	echo $this->Form->input('price_per_week');
	echo $this->Form->input('price_per_week');
	echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD'));
	echo $this->Form->input('payment_method',array('options'=>$payment_method));
	echo $this->Form->input('type',array('options'=>$property_type));
	echo $this->Form->input('bedrooms',array('options'=>$bedrooms_bathrooms));
	echo $this->Form->input('bathrooms',array('options'=>$bedrooms_bathrooms));
	echo $this->Form->input('privacy',array('options'=>$privacy));
	echo $this->Form->input('available_from');
	echo $this->Form->input('available_to');
	echo $this->Form->input('check_in_time');
	echo $this->Form->input('check_out_time');
	echo $this->Form->input('house_rules');
	echo $this->Form->input('minimum_stay',array('options'=>$minimum_stay));
	echo $this->Form->input('id',array('type'=>'hidden'));
	echo $this->Form->end('Update Listing');
?>
		</div>
	</div>
	<div class = "panel">
			<?php
				echo $this->element('file_upload',array('userid'=>AuthComponent::user('id'),'propertyid'=>$propertyid));
			?>
		</div>
</div>