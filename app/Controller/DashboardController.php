<?php
	class DashboardController extends AppController{
		public function beforeFilter() {
			
			$this->layout = "ajax";
		}
		
		public function index(){
			$this->layout = "dashboard";
		}
		
		public function view($page = NULL,$data = NULL){
			$this->autoRender = false;
			if($this->request->is('ajax')){
				$functionname = "__".$page;
				$this->$functionname($data);
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
		private function __manageBookings($pid = null){
			if($pid != null){
				$this->loadModel('Property');
				$this->Property->contain(array('Booking'=>array('User')));
				$this->Property->id = $pid;
				$properties = $this->Property->read();
				$this->set("property", $properties);
				$this->render('managebookings');
			}
			else{
				$this->__manageproperties();
			}
		}
	}
?>