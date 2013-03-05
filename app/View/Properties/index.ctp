<?php
	$this->start('scriptBottom');
		echo $this->Html->script('properties/index'); 
		if(isset($finalizeposting)&&$finalizeposting == true){
		echo $this->Html->script('properties/finalizeposting'); 
		}
	$this->end();
	echo $this->Html->meta(
    'description',
    'Rent any space, from a private home to a private island. Join thousands already renting space on Reservation Resources Listing your room is free!'
);
?>
<?php 
	$this->start('cssTop');
	echo $this->Html->css('properties/index');
	$this->end();
?>

<div id = "body" class = "inner row-fluid" role = "main">
	<div class = "span6">
	<h1 class = "heading">List Your Property<span class = "arrow-right"></span></h1>
		<div class = "panel_info formee">
		<input type = "text" id = "address" placeholder = "Where is your property located?" />
		</div>
		<div id="map_canvas" style="width:100%; height:100%"></div>
	</div>
	<div class = "span6">
		<?php
			echo $this->element('file_upload');
		?>
	<h1 class = "heading">Property Details <span class = "arrow-right"></span></h1>
		<?php
				//currency code options
				$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
				$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Guest Room'=>'Guest Room','Condo' => 'Condo');
				echo $this->Form->create('Property',array('controller'=>'properties','action'=>'index','class'=>'formee','onSubmit'=>'return checkLoginStatus();'));
		?>
		<section class = "row-fluid">
		<div class = "span4">
			<?php echo $this->Form->input('type',array('options'=>$property_type,'default'=>'Apartment','label'=>'Property Type')); ?>
		</div>
		<div class = "span4">
			<?php echo $this->Form->input('rent_once',array('label'=>array('text'=>'Is this a one time sublet? ','style'=>'display:inline'),'format'=>array('before', 'label', 'between', 'input', 'after', 'error' )));?>
		</div>
		<div class = "span4">
		
		 <?php 
		 $minimum_stay = array();
		//loop for minimum stay
		for($i = 0; $i <= 31; $i++ ){
			$minimum_stay[$i] = $i; 
		}
		 echo $this->Form->input('minimum_stay',array('options'=>$minimum_stay,'default'=>1,'label'=>'Minimum Stay in days')); ?>
		</div>
		<!--<div class = "span4">
			<?php echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD')); ?>
		</div>-->
		</section>
		<div id = "propertyAddressSection">
		<?php
			echo $this->Form->input('address',array('label'=>false,'placeholder'=>'address'));
			echo $this->Form->input('city',array('label'=>false,'placeholder'=>'city'));
			echo $this->Form->input('state',array('label'=>false,'placeholder'=>'state'));
			echo $this->Form->input('zip_code',array('label'=>false,'placeholder'=>'zip or postal code'));
			echo $this->Form->input('country',array('label'=>false,'placeholder'=>'country'));
			echo $this->Form->input('latitude',array('type'=>'hidden'));
			echo $this->Form->input('longtitude',array('type'=>'hidden')); ?>
		</div>
		<?php
			if(isset($title)){
				echo $this->Form->input('title',array('value'=>$title));
			}
			else{
				echo $this->Form->input('title');
			}
			if(isset($description)){
				echo $this->Form->input('description',array('value'=>$description));
			}
			else{
				echo $this->Form->input('description');
			}
				
			
		?>
		<div class = "row-fluid">
			<div class = "span4">
				<?php echo $this->Form->input('price_per_night',array('placeholder'=>'Amount without currency symbols')); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_week',array('placeholder'=>'Amount without currency symbols')); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_month',array('placeholder'=>'Amount without currency symbols')); ?>
			</div>
		</div>
	</div>
	<?php 
	
	if(isset($uuid)){
		echo $this->Form->input('Craigslist.id',array('type'=>'hidden','value'=>$uuid)); 
	}
	?>
	<div class = "formee"><?php echo $this->Form->end('Save and List My Property'); ?></div>
	</div>
</div>
