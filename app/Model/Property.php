<?php
App::import('Vendor', 'simple_html_dom');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility'); 
	class Property extends AppModel{
	public $name = 'Property';
	public $findMethods = array('nearest' => true);
	public $belongsTo = array('User'=>array('counterCache'=>true));
	public $hasOne = 'Amenity';
	public $hasMany = array('Booking','Fee','Review'=>array('order'=>'id DESC'),'Topic');
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
	public function beforeSave(){
		 $this->data['Property']['price_per_night'] = preg_replace("/[^0-9\.]/", "", $this->data['Property']['price_per_night']);
		 $this->data['Property']['price_per_week'] = preg_replace("/[^0-9\.]/", "", $this->data['Property']['price_per_week']);
		  $this->data['Property']['price_per_month'] = preg_replace("/[^0-9\.]/", "", $this->data['Property']['price_per_month']);
		
	}
	public function afterSave($created){
		if($created){
			$email = new CakeEmail('smtp');
			$email->viewVars(array('first' => AuthComponent::user('first_name'),'messagetitle'=>'Your property has been created!','action'=>'http://reservationresources.com/properties/viewproperty/'.$this->id));
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
				$watermark = imagecreatefrompng(Router::url('/img/watermark.png',true));//path to water mark image. true returns full base address
				$watermark_width = imagesx($watermark);
				$watermark_height = imagesy($watermark);
				$image = imagecreatefromjpeg('image_handler/files/'.$value);
				$size = getimagesize('image_handler/files/'.$value);
				$dest_x = $size[0] - $watermark_width - 5;
				$dest_y = $size[1] - $watermark_height - 450;
				imagealphablending($image, true);
				imagealphablending($watermark, true);
				imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);  
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
			$small_images = $small->find('.*',true);
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
	public function postToCraigslist($area = null, $step = null,$title = null,$description = null ,$url = null,$html = null){

		//initial request
		if($url == null){
			$server_output = $this->get_url('https://post.craigslist.org/c',null,false);//return initial content ie. select your area
		}
		//lets get the area contents
		if(isset($area) && $step == 1){
			$server_output  = $this->get_url($server_output."?s=area",null,true);
			$html = str_get_html($server_output);
			
			$form = $html->find('form');
		
			$form_action = $form[0]->action;
			$form = $form[0]->find('select');
			$select_name = $form[0]->name;
			$select_value = $area;
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			$step_two = $this->get_url($form_action,array($select_name=>$select_value,$hidden_name=>$hidden_value,'go'=>'Continue'),false);
			$html = file_get_html($step_two);
			$form = $html->find('form');
			$form_action = $form[0]->action;
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			$step_three = $this->get_url($form_action,array($hidden_name=>$hidden_value,'id'=>'ho'),false);//we select housing offered option
			$html = file_get_html($step_three);//get vacation rental form
			
			$form = $html->find('form');
			$form_action = $form[0]->action;
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			
			
			$step_four = $this->get_url($form_action,array($hidden_name=>$hidden_value,'id'=>'99'),false);//we choose vacation rental
			$html = file_get_html($step_four);//get subarea form
			$form = $html->find('form');
			$form_action = $form[0]->action;
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			Debugger::log($html->plaintext);
			$form =  $html->find('[type=radio]');
			$sub_area_name = $form[0]->name;
			$sub_area_value = '1';
			$step_five =  $this->get_url($form_action,array($hidden_name=>$hidden_value,$sub_area_name=>$sub_area_value ),false);//choose sub area
			$html  = file_get_html($step_five);//lets get the hood form we will choose to bypass this step if the form gets returned
			
			$form = $html->find('form');
			
			$form_action = $form[0]->action;
			$form =  $html->find('[type=radio]');
			
			$hood_name = $form[0]->name;
		
			$hood_value = '0';
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			
			$step_six = $this->get_url($form_action,array($hidden_name=>$hidden_value,$hood_name=>$hood_value),false);//choose to bypass hood area
			
			
			$html = file_get_html($step_six);//get posting posting form
			$form = $html->find('form');
			$form_action = $form[0]->action;
			$form = $html->find('[type=hidden]');
			$hidden_name = $form[0]->name;
			$hidden_value = $form[0]->value;
			$input = $html->find('input');
			$title_name = $input[2]->name;
			$title_value = $title;
			$from_email_name = 'FromEMail';
			$from_email_value = AuthComponent::user('username');
			$confirm_email_name = 'ConfirmEMail';
			$confirm_email_value = AuthComponent::user('username');
			$anonymize_name = $input[6]->name;
			$anonymize_value = 'A';
			$txtarea = $html->find('textarea');
			$txtarea_name = $txtarea[0]->name;
			
			$step_seven = $this->get_url($form_action,array($hidden_name=>$hidden_value,$title_name=>$title_value,$from_email_name=>$from_email_value,$confirm_email_name=>$confirm_email_value,$anonymize_name=>$anonymize_value,$txtarea_name=>$description,'go'=>'Continue'),false);
			$html = file_get_html($step_seven);//edit image form which we will bypass
			$form = $html->find('form');
			$form_action = $form[1]->action;
			$form = $form[1]->find('[type=hidden]');
			$hidden_name_one = $form[0]->name;
			$hidden_value_one = $form[0]->value;
			$hidden_name_two = $form[1]->name;
			$hidden_value_two = $form[1]->value;
			$hidden_name_three = $form[2]->name;
			$hidden_value_three = $form[2]->value;
			
			//execute final step and return final url back to user browser
			$step_eight = $this->get_url($form_action,array($$hidden_name_one=>$hidden_value_one,$hidden_name_two=>$hidden_value_two,$hidden_name_three=>$hidden_value_three,'go'=>'Done with Images'),false);
			return $step_eight;
			
		}
		
	
	
	}
	
	private function __getViewHtml($page, $variables){
		
	}
	public function get_url( $url, $postvars = null, $returncontents = false){
	$url = str_replace( "&amp;", "&", urldecode(trim($url)) );

    $cookie = tempnam ("/tmp", "CURLCOOKIE");
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_COOKIEJAR, $cookie );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    curl_setopt( $ch, CURLOPT_ENCODING, "" );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt( $ch, CURLOPT_TIMEOUT, 10);
    curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
	if($postvars != null){
			$data = http_build_query($postvars);
			;
		curl_setopt($ch,CURLOPT_POST,true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
	}
    $content = curl_exec( $ch );
    $response = curl_getinfo( $ch );
    curl_close ( $ch );
	if($returncontents == false){
		return $response['url'];
	}
	else{
		return $content;
	}
	
	}
}
?>