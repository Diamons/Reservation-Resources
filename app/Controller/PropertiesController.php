<?php

	class PropertiesController extends AppController{
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
				$this->Auth->allow('index', 'viewproperty','quickbook');
				$this->AjaxHandler->handle('quickbook','post');
				$this->Cookie->time = 31536000; // cookie valid for one year before expiration  
		}
		public function index(){
			if($this->request->is('post')&&$this->Auth->loggedIn()){
				$this->Property->set('user_id',$this->Auth->user('id'));
				$this->Property->set('status','0');
				if($this->data['Image']){
					$property_pictures = $this->data['Image'];//set property pictures array
				}
				if($this->Property->save($this->request->data)){
					$this->Property->createPropertyFolder($this->Property->id,$this->Auth->user('id'),$property_pictures);
					if($property_pictures){
						if($this->Property->handleImage($this->Property->id,$this->Auth->user('id'),$property_pictures)){
							$this->Session->setFlash('Awesome! Your property is live! :)');
						}
						else{
							$this->Session->setFlash('Your property is live, but we could not upload your images at this time. Sorry for the inconvenience. You can add images by clicking on edit in your property information page');
						}
					}
					else{
						$this->Session->setFlash('Awesome! Your property is live!. You can add pictures later if you like in your property page.');
					}
				}
				else{
						$this->Session->setFlash('Oops! It seems you may have some incorrect fields');
				}
			}
	
		}
		
		public function viewpropertyajax($property_id = NULL){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->Property->id = $property_id;
			$this->set('property', $this->Property->read());
			$this->render('/elements/Property/viewpropertyajax');
		}
		public function viewproperty($property_id = null){
			$this->loadModel('Amenity');
			$this->Cookie->path = '/properties/viewproperty/'.$property_id;//set path for cookie to update count
			$this->Property->id = $property_id;
			$this->Property->contain(array('Review'=>array('User'),'User','Fee','Amenity','Booking'));
			$property = $this->Property->read();
			$property['Amenity'] = $this->Amenity->parseAmenity($property['Amenity'],true);
			$this->set('property',$property);
			$this->set('images',$this->Property->findPropertyImages($property['User']['id'],$property['Property']['id']));
			if(!$this->Cookie->read('viewed')){
				$this->Property->updateAll(array('Property.viewcount'=>'Property.viewcount+1'), array('Property.id'=>$property_id));
				$this->Cookie->write('viewed', 'true',false);
				
			}
		}
		public function edit($property_id = null){
			$this->Property->id = $property_id;
			
				if($this->request->is('get')){
					$this->loadModel('Amenity');//need to load this model since i need to modify the amenity results
					$this->request->data = $this->Property->read();
					$this->request->data['Amenity'] = $this->Amenity->parseAmenity($this->request->data['Amenity'],false);
					$this->set('propertyid',$property_id);
					
				}
				else{
					
					if($this->Property->saveAssociated($this->request->data)){
						if(isset($this->data['Image'])){
							$this->Property->handleImage($property_id,$this->Auth->user('id'),$this->data['Image']);
						}
						$this->Session->setFlash('Congrats! Your property has been updated');
					}
					else{
						$this->Session->setFlash('Sorry, we could not update your property at this time. Please double check for any information error', "flash_success");
					}
					$this->set('propertyid',$property_id);
					
				}
				
		
		}
		public function quickbook(){
			$this->loadModel('Booking');//since model are lazy loaded we need to load the reservation model at this point
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			//lets access our post data from ajax
			$checkin = $this->request->data['checkin'];
			$checkout = $this->request->data['checkout'];
			if(!empty($checkin)&&!empty($checkout)&&!empty($this->request->data['pid'])){
				$this->Property->id = $this->request->data['pid'];
				$property = $this->Property->read();//need to retrieve price information
				$guest = $this->request->data['guest'];
				if($property['Property']['minimum_stay'] <= $this->Booking->getDates($checkin,$checkout,"interval",null)){
					$response['data'] = $this->Booking->quickbook($checkin,$checkout,$guest,$property['Property']['price_per_night'],$property['Property']['price_per_week'],$property['Property']['price_per_month']);
					$response['success'] = true;
					return $this->AjaxHandler->respond('json',$response);
				}
				else{
					$response['success'] = false;
					$response['data'] = $property['Property']['minimum_stay'];
					return $this->AjaxHandler->respond('json',$response);
				}
			}
			else{
				return $this->AjaxHandler->respond('json',$response);
			}
		}
		
		public function testbooking(){
		
		
		}
		public function post(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			$html = $this->Property->postToCraigslist($this->request->data('area'),$this->request->data('step'),$this->request->data('title'),$this->request->data('description'),null);
			$response['success'] = true;
			$response['data'] = $html;
			
			return $this->AjaxHandler->respond('json',$response);
		
		}

	}
?>