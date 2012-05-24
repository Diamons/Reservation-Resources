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
			if($this->request->is('post')){
				if($this->Property->save($this->request->data)){
					
				}
				else{
					debug($this->Property->validationErrors);
				}
			}
		}
	}
?>