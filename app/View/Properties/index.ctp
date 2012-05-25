<?php echo $this->Html->script('properties/index', array('block' => 'scriptBottom'));?>
<div id = "body" role = "main">
	<div class = "row-fluid">
		<div class = "span6">
<?php
//currency code options
	$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
	$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Guest Room'=>'Guest Room','Condo');
	echo $this->Form->create('Property',array('class'=>'formee','onSubmit'=>'return checkLoginStatus();'));
	echo $this->Form->input('type',array('options'=>$property_type,'default'=>'Apartment','label'=>'Property Type'));
	echo $this->Form->input('property_address',array('placeholder'=>'Enter your property address'));
	echo $this->Form->input('address');
	echo $this->Form->input('city');
	echo $this->Form->input('state');
	echo $this->Form->input('zip_code');
	echo $this->Form->input('Country');
	echo $this->Form->input('latitude',array('type'=>'hidden'));
	echo $this->Form->input('longtitude',array('type'=>'hidden'));
	echo $this->Form->input('title',array('placeholder'=>'Enter the title of your listing, this is what others will see when they are searching'));
	echo $this->Form->input('description');
	echo $this->Form->input('rent_once',array('label'=>array('text'=>'Is this a one time sublet?','style'=>'display:inline'),'format'=>array('before', 'label', 'between', 'input', 'after', 'error' )));
	echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD'));
	echo $this->Form->input('price_per_night');
	echo $this->Form->input('price_per_week');
	echo $this->Form->input('price_per_month');
	echo $this->Form->end('Publish');
?>
		</div>
	</div>
</div>
<?php
	if($auth == false){
		?>
		<div id = 'registrationForm' style = "display:none;">
		<?php
		echo $this->element('login_register');
		}?>
		</div>
	
?>