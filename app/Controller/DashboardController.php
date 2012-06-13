<?php
	class DashboardController extends AppController{
		public function beforeFilter() {
			
			$this->layout = "ajax";
		}
		
		public function index(){
			$this->layout = "dashboard";
		}
		
		public function view($page = NULL){
			$this->autoRender = false;
			if($this->request->is('ajax')){
				$functionname = "__".$page;
				$this->$functionname();
			}else{
				$this->redirect($this->referer());
			}
		}
		private function __inbox(){
			$this->render('inbox');
		}
		private function __deleted(){
			$this->render('deleted');
		}
		private function __notifications(){
			$this->render('index');
		}
		private function __manageproperties(){
			$this->loadModel('Property');
			$properties = $this->Property->find('all',array('conditions'=>array('Property.user_id'=>$this->Auth->user('id'))));
			$this->set('properties',$properties);
			$this->render('manageproperties');
		}
		private function __manageBookings(){
			$this->loadModel('Property');
			$this->Property->id = 1;
			$property = $this->Property->find();
			$this->set("property", $property);
			$this->render('managebookings');
		}
	}
?>