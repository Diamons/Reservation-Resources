<?php
	$this->start('cssTop');
		echo $this->Html->css(array('formwizard')); 
	$this->end();
	
	$this->start('scriptBottom');
		echo $this->Html->script(array('formwizard', 'properties/edit')); 
	$this->end();

?>

<div id = "body" class = "inner row-fluid" role = "main">
	<div class = "span7">
	<?php
		$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Condo'=>'Condo');
		$bedrooms_bathrooms = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10);
		$privacy = array('Private Room'=>'Private Room','Shared Room'=>'Shared Room','Entire Property'=>'Entire Property');
		$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
		$minimum_stay = array();
		//loop for minimum stay
		for($i = 0; $i <= 31; $i++ ){
			$minimum_stay[$i] = $i; 
		}
		$payment_method = array('Check'=>'Check','Paypal'=>'Paypal');
	?>
		<?php 
		echo $this->Form->create('Property', array('class' => 'formee')); ?>
		<fieldset>
		<legend>Location</legend>
		<?php 
			echo $this->Form->input('address');
			echo $this->Form->input('city');
			echo $this->Form->input('state');
			echo $this->Form->input('zip_code');
			echo $this->Form->input('country'); ?>
		</fieldset>
		<fieldset>
		<legend>Details</legend>
		<?php 
			echo $this->Form->input('title');
			echo $this->Form->input('description'); ?>
			<div class = "row-fluid">
				<div class = "span6">
					<?php echo $this->Form->input('bedrooms',array('options'=>$bedrooms_bathrooms)); ?>
				</div>
				<div class = "span6">
					<?php echo $this->Form->input('bathrooms',array('options'=>$bedrooms_bathrooms)); ?>
				</div>
			</div>
			<div class = "row-fluid">
				<div class = "span6">
					<?php echo $this->Form->input('privacy',array('options'=>$privacy)); ?>
				</div>
				<div class = "span6">
					<?php echo $this->Form->input('type',array('options'=>$property_type)); ?>
				</div>
			</div>
			<?php	
				echo $this->Form->input('house_rules');
			?>
			
		</fieldset>
		<fieldset>
		<legend>Booking</legend>
		<div class = "row-fluid">
			<div class = "span6">
				<?php echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD')); ?>
			</div>
			<div class = "span6">
				<?php echo $this->Form->input('payment_method',array('options'=>$payment_method)); ?>
			</div>

		</div>
		<div class = "row-fluid">
			<div class = "span4">
				<?php echo $this->Form->input('price_per_night'); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_week'); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_month'); ?>
			</div>
		</div>
		<?php 
				echo $this->Form->input('rent_once',array('label'=>array('text' => 'Is this a one time rental? ', 'style' => 'display: inline-block;'),'format'=>array('before', 'label', 'between', 'input', 'after', 'error'))); ?>
		</fieldset>
		<fieldset>
		<legend>Availability</legend>
			<div class = "row-fluid">
				<div class = "span6">
					<?php echo $this->Form->input('available_from'); ?>
				</div>
				<div class = "span6">
					<?php echo $this->Form->input('available_to'); ?>
				</div>
			</div>
			<div class = "row-fluid">
				<div class = "span6">
					<?php echo $this->Form->input('check_in_time'); ?>
				</div>
				<div class = "span6">
					<?php echo $this->Form->input('check_out_time'); ?>
				</div>
			</div>
			<?php echo $this->Form->input('minimum_stay',array('options'=>$minimum_stay)); ?>
		</fieldset>

	
	<fieldset id="amenities">
		<legend>Amenities</legend>
		
		<?php 
		echo $this->Form->input('Amenity.bedroom_amenities',array('type'=>'select','multiple'=>'checkbox','options'=>array('King'=>'King','Queen'=>'Queen','Single'=>'Single','Double'=>'Double')));
		echo $this->Form->input('Amenity.electronic_amenities',array('type'=>'select','multiple'=>'checkbox','options'=>array('WiFi'=>'WiFi','Internet'=>'Internet','Television'=>'Television','Cable'=>'Cable','Washer'=>'Washer')));
		echo $this->Form->input('Amenity.kitchen_amenities',array('type'=>'select','multiple'=>'checkbox','options'=>array('Refrigerator'=>'Refrigerator','Stove'=>'Stove','Microwave'=>'Microwave','Coffee Maker'=>'Coffee Maker','Toaster'=>'Toaster')));
		if(!empty($this->request->data['Amenity']['additional_amenities'])){
			//build options
			$options = array();
			foreach($this->request->data['Amenity']['additional_amenities'] as $key => $value){
				$options[$value]= $value;
			}
			echo $this->Form->input('Amenity.additional_amenities',array('type'=>'select','multiple'=>'checkbox','options'=>$options));
		}
		else{
			echo $this->Form->input('Amenity.additional_amenities',array('type'=>'select','multiple'=>'checkbox'));
		}
		echo $this->Form->input('Amenity.id',array('type'=>'hidden'));
		echo $this->Form->input('id',array('type'=>'hidden'));
		?>
		<a href = "#" id = "customAmenity">Add Custom Amenity</a> 
	</fieldset>
	<fieldset id = "additionalFees">
		<legend>Fees</legend>
	<?php
	
		//debug($this->request->data); 
		foreach($this->request->data['Fee'] as $key => $value){
			echo $this->Form->input('Fee.'.$key.'.fee_name',array('label'=>'Fee Name'));
			echo $this->Form->input('Fee.'.$key.'.fee_price',array('value'=>$this->request->data['Fee'][$key]['fee_price']));
			echo $this->Form->input('Fee.'.$key.'.id',array('type'=>'hidden','value'=>$this->request->data['Fee'][$key]['id']));
			echo $this->Form->input('Fee.'.$key.'.required',array('label'=>'Is this fee required for guests?'));
		}
	?>
	<a href = "#" id = "customFee" >Add Custom Fee</a>
	</fieldset>
	<?php
		echo $this->Form->end('Update Listing');
	?>
	
	</div>
	<div class = "span5">
			<?php
				echo $this->element('file_upload',array('userid'=>AuthComponent::user('id'),'propertyid'=>$propertyid));
			?>
	</div>
</div>