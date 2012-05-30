<?php
	$this->start('scriptBottom');
		echo $this->Html->script('properties/index'); 
	$this->end();
?>
<?php 
	$this->start('cssTop');
	echo $this->Html->css('properties/index');
	$this->end();
?>
<?php /*	<div class = "row-fluid">
		<div class = "span7">
			<div class = "features_block blue">
				<h1>Start Listing Your Property</h1>
			</div>
			<div class="property_types">
				<h2>Property Type</h2>
				<div class = "types active">
					<div class="property_apartment"></div>
					Apartment
				</div>
				<div class = "types">
					<div class="property_house"></div>
					House
				</div>
				<div class = "types">
					<div class="property_bedandbreakfast"></div>
					Bed and Breakfast
				</div>
				<div class = "types">
					<div class="property_cabin"></div>
					Cabin
				</div>
				<div class = "types">
					<div class="property_villa"></div>
					Villa
				</div>
				<div class = "types">
					<div class="property_condo"></div>
					Condo
				</div>
			</div>
			<?php
			//currency code options
				$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
				$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Guest Room'=>'Guest Room','Condo' => 'Condo');
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
				echo $this->Form->input('rent_once',array('label'=>array('text'=>'Is this a one time sublet? ','style'=>'display:inline'),'format'=>array('before', 'label', 'between', 'input', 'after', 'error' )));
				echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD'));
				echo $this->Form->input('price_per_night');
				echo $this->Form->input('price_per_week');
				echo $this->Form->input('price_per_month');
				echo $this->Form->end('Publish');
			?>
	</div>
	<div class = "property_info span5">
		<h1>Property Listing</h1>
		
	</div>
	</div>
*/ ?>
<div id = "body" class = "row-fluid" role = "main">
	<div class = "panel_info span6">
		<div class = "formee">
			<h1 style = "color:#3a3a3a; text-transform: uppercase; font-size: 10pt;">List your Location</h1>
			<input type = "text" id = "address" placeholder = "Where is your property located?" />
		</div>
		<div id="map_canvas" style="width:100%; height:100%"></div>
		<div class = "panel">
			<?php
				echo $this->element('file_upload');
			?>
		</div>
	</div>
	<div class = "span6">
		<?php
				//currency code options
				$currency_options = array('USD'=>'USD','AUD'=>'AUD','CAD'=>'CAD','EUR'=>'EUR','GBP'=>'GBP','JPY'=>'JPY','ZAR'=>'ZAR');
				$property_type = array('Apartment'=>'Apartment','House'=>'House','Bed and Breakfast'=>'Bed and Breakfast','Cabin'=>'Cabin','Villa'=>'Villa','Guest Room'=>'Guest Room','Condo' => 'Condo');
				echo $this->Form->create('Property',array('class'=>'formee','onSubmit'=>'return checkLoginStatus();'));
		?>
		<section class = "row-fluid">
		<div class = "span4">
			<?php echo $this->Form->input('type',array('options'=>$property_type,'default'=>'Apartment','label'=>'Property Type')); ?>
		</div>
		<div class = "span4">
			<?php echo $this->Form->input('rent_once',array('label'=>array('text'=>'Is this a one time sublet? ','style'=>'display:inline'),'format'=>array('before', 'label', 'between', 'input', 'after', 'error' )));?>
		</div>
		<div class = "span4">
			<?php echo $this->Form->input('currency_code',array('options'=>$currency_options,'default'=>'USD')); ?>
		</div>
		</section>
		<?php
				echo $this->Form->input('address');
				echo $this->Form->input('city');
				echo $this->Form->input('state');
				echo $this->Form->input('zip_code');
				echo $this->Form->input('Country');
				echo $this->Form->input('latitude',array('type'=>'hidden'));
				echo $this->Form->input('longtitude',array('type'=>'hidden'));
				echo $this->Form->input('title',array('placeholder'=>'Enter the title of your listing, this is what others will see when they are searching'));
				echo $this->Form->input('description');
		?>
		<div class = "row-fluid">
			<div class = "span4">
				<?php echo $this->Form->input('price_per_night', array('placeholder' => 'With or without $ symbols')); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_week', array('placeholder' => 'With or without $ symbols')); ?>
			</div>
			<div class = "span4">
				<?php echo $this->Form->input('price_per_month', array('placeholder' => 'With or without $ symbols')); ?>
			</div>
		</div>
	</div>
	<div class = "formee"><?php echo $this->Form->end('Save and List My Property'); ?></div>
</div>

