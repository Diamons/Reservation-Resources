<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility'); 
	class Property extends AppModel{
	public $name = 'Property';
	public $findMethods = array('nearest' => true);
	public $belongsTo = array('User'=>array('counterCache'=>true));
	public $hasOne = 'Amenity';
	public $hasMany = array('Booking','Fee','Review','Topic');
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
	public function afterSave($created){
		if($created){
			$email = new CakeEmail('smtp');
			$email->viewVars(array('title' =>$this->data['Property']['title']));
			$email->template('new_property', 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to(AuthComponent::user('username'))->subject('Your property has been listed!')->send(); 
		
		}
		
	
	}
	public function createPropertyFolder($propertyid,$userid){//set up folder structure to copy images to
			$dir = new Folder();//default constructor sets up a path to directory instance NOT create!
			$dir->create(WWW_ROOT.'images'.DS.$userid.DS.$propertyid);
			$dir->create(WWW_ROOT.'images'.DS.$userid.DS.$propertyid.DS.'thumbnails');
	}
	public function handleImage($propertyid, $userid,$property_pictures){//this will apply gd watermark to uploaded property images and apply them to approperiate directory
		if($property_pictures){
			foreach($property_pictures as $key=>$value){
				$watermark = imagecreatefromjpeg(Router::url('/img/watermark.jpg',true));//path to water mark image. true returns full base address
				$watermark_width = imagesx($watermark);
				$watermark_height = imagesy($watermark);
				$image = imagecreatefromjpeg('image_handler/files/'.$value);
				$size = getimagesize('image_handler/files/'.$value);
				$dest_x = $size[0] - $watermark_width - 5;
				$dest_y = $size[1] - $watermark_height - 5;
				imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 100);  
				imagejpeg($image,'images/'.$userid.'/'.$propertyid.'/'.$value,100); //output new image with watermark
				imagedestroy($image);//clear from ram
				imagedestroy($watermark);//clear from ram
				$file = new File(WWW_ROOT ."/image_handler/files/".$value);
				$thumbnail = new File(WWW_ROOT ."/image_handler/thumbnails/".$value);
				//before we delete lets copy thumbails over.
				$thumbnail->copy(WWW_ROOT."/images/".$userid."/".$propertyid."/thumbnails/".$value,true);//set over write to true
				//delete image from images directory 
				$file->delete();
				$thumbnail->delete();
			
				}
			return true;
			}
		else{
			return false;
		}
	
		}
	public function findPropertyImages($uid,$pid){
			$big = new Folder(WWW_ROOT.'images'.DS.$uid.DS.$pid);
			$small = new Folder(WWW_ROOT.'images'.DS.$uid.DS.$pid.DS.'thumbnails');
			$big_images = $big->find('.*',true);
			$small_images = $small_images = $small->find('.*',true);
			$images['big'] = $big_images;
			$images['small'] = $small_images;
			return $images; 
	}

	protected function _findNearest($currentStatus, $query, $results=array()){
		if($currentStatus=="before"){
			$coordinates = $query['coordinates'];
			$query['conditions'] = "(3959 * acos(cos(radians(".$coordinates['lat'].")) * cos(radians(Property.latitude)) * cos(radians(Property.longitude) - radians(".$coordinates['long'].")) + sin(radians(".$coordinates['lat'].")) * sin(radians(Property.latitude)))) <=".$coordinates['miles'];
			return $query;
			
		} elseif($currentStatus=="after"){
			return $results;
		}
	}
}
?>