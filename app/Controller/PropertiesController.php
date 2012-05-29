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
				if($this->Property->save($this->request->data)){
						if($this->Property->handleImage($this->Auth->user('id'),$this->Property->id)){
							$this->Session->setFlash('Awesome! Your property is live! :)');
						}
						else{
							$this->Session->setFlash('Your property is live, but we could not upload your images at this time. Sorry for the inconvenience. You can add images by clicking on edit in your property information page');
						}
				}
				else{
						$this->Session->setFlash('Oops! It seems you may have some incorrect fields');
				}
			}
	
		}
	}
?>