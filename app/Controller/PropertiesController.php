<?php
	class PropertiesController extends AppController{
	
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index', 'viewproperty');
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
			debug($property);
		
		}
		public function edit($property_id = null){
			$this->Property->id = $property_id;
				if($this->request->is('get')){
					$this->request->data = $this->Property->read();
					$this->set('propertyid',$property_id);
					debug($this->request->data);
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
	}
?>