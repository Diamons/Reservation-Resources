<?php echo $this->Html->script('properties/index', array('block' => 'scriptBottom'));?>
<?php
//currency code options
	$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
	echo $this->Form->create('Property',array('class'=>'formee'));
	echo $this->Form->input('property_address',array('placeholder'=>'Enter your property address'));
	echo $this->Form->input('address');
	echo $this->Form->input('city');
	echo $this->Form->input('state');
	echo $this->Form->input('zip_code');
	echo $this->Form->input('Country');
	echo $this->Form->input('title',array('placeholder'=>'Enter the title of your listing, this is what others will see when they are searching'));
	echo $this->Form->input('description');
	echo $this->Form->input('house_rules');
	echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD'));
	echo $this->Form->input('price_per_night');
	echo $this->Form->input('price_per_week');
	echo $this->Form->input('price_per_month');
	echo $this->Form->end('Publish');
?>