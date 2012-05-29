<?php
	class Property extends AppModel{
	public $name = 'Property';
	public $validate = array(
		'address'=>array(
			'address_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter an address for you property'
				)
			),
		'city'=>array(
				'city_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter the city in which you property is located'
				)
			),
		'state'=>array(
				'state_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter the state or region of your property listing'
				)
			),
		'country'=>array(
			'country_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter your country'
				)
			),
		'title'=>array(
				'title_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter the title of you listing. This is what others will see when searching your property.(Ex: "Beautiful fully furnished room in NYC")'
				)
			),
		'description'=>array(
				'description_not_empty'=>array(
					'rule'=>'notEmpty',
					'message'=>'Please enter a description of you property. The more accurate you make your property description can increase your chances of getting bookings'
				)
			),
		'price_per_night'=>array(
				'property_must_have_price'=>array(
					'rule'=>'mustHavePrice',
					'message'=>'at least one of fields price per night, price per week, or price per month must have value',
					'last'=>true //we set last to true becuse if this rule fails we return this error message and no furthur rules are applied to this field
				),
				'price'=>array(
					'rule'=>array('money','left'),
					'message'=>'Please enter a valid monetary value',
					'allowEmpty' =>true //we can allow an empty field but if it has a value then check if its a valid monetary amount
				)
				
			),
		'price_per_week'=>array(
			'property_must_have_price'=>array(
				'rule'=>'mustHavePrice',
				'message'=>'at least one of fields price per night, price per week, or price per month must have value',
				'last'=>true //we set last to true becuse if this rule fails we return this error message and no furthur rules are applied to this field
				),
			'price'=>array(
				'rule'=>array('money','left'),
				'message'=>'Please enter a valid monetary value',
				'allowEmpty' =>true //we can allow an empty field but if it has a value then check if its a valid monetary amount
				)
				
			),
		'price_per_month'=>array(
			'property_must_have_price'=>array(
				'rule'=>'mustHavePrice',
				'message'=>'at least one of fields price per night, price per week, or price per month must have value',
				'last'=>true //we set last to true becuse if this rule fails we return this error message and no furthur rules are applied to this field
				),
			'price'=>array(
				'rule'=>array('money','left'),
				'message'=>'Please enter a valid monetary value',
				'allowEmpty' =>true //we can allow an empty field but if it has a value then check if its a valid monetary amount
				)
				
			)
			
		);
	
	public function mustHavePrice(){
			if($this->data['Property']['price_per_night']||$this->data['Property']['price_per_week']||$this->data['Property']['price_per_month']){
				return true;
			}
			else{
				return false;
			}
		}
	public function handleImage($propertyid, $userid){//this will apply gd watermark to uploaded property images and apply them to approperiate directory
			$watermark = imagecreatefromjpeg(Router::url('/img/watermark.jpg',true));//path to water mark image. true returns full base address
			$watermark_width = imagesx($watermark);
			$watermark_height = imagesy($watermark);
			debug($watermark);
			return true;
	
		}
	
	}

?>