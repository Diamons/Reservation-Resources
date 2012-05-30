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
				if($this->Property->save($this->request->data)){
					
				}
				else{
					debug($this->Property->validationErrors);
				}
			}
			else{
				if($this->request->is('post') ){
					
				}
			
			}
		}
		
		public function viewproperty(){
		
		}
	}
?>