<?php
	class UsersController extends AppController{
		public function beforeRender()
		{
			parent::beforeRender();
		}
		
		public function login(){
			if(isset($this->data) && !empty($this->data)){
				if($this->request->is('ajax')){
				
				} else if($this->request->is('post')){
				
				}
			} else{
				
			}
		}
	}
?>