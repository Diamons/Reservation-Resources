<?php
	class PropertiesController extends AppController{
	
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index');
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
	}
?>