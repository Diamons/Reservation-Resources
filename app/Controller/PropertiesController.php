<?php

	class PropertiesController extends AppController{
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
				$this->Auth->allow('index', 'viewproperty','quickbook');
				$this->AjaxHandler->handle('quickbook');
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
		
		public function viewproperty($property_id = null){
			$this->Property->id = $property_id;
			$property = $this->Property->read();
			$this->set('property',$property);
			$this->set('images',$this->Property->findPropertyImages($property['User']['id'],$property['Property']['id']));
			

		
		}
		public function edit($property_id = null){
			$this->Property->id = $property_id;
				if($this->request->is('get')){
					$this->request->data = $this->Property->read();
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
						$this->Session->setFlash('Sorry, we could not update your propety at this time. Please double check for any information error');
					}
					$this->set('propertyid',$property_id);
					
				}
				
		
		}
		public function quickbook(){
			$this->loadModel('Reservation');//since model are lazy loaded we need to load the reservation model at this point
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
				if($property['Property']['minimum_stay'] <= $this->Reservation->getDates($checkin,$checkout,"interval",null)){
					$response['data'] = $this->Reservation->quickbook($checkin,$checkout,$guest,$property['Property']['price_per_night'],$property['Property']['price_per_week'],$property['Property']['price_per_month']);
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
	}
?>