<?php
	class DashboardController extends AppController{
		public function beforeFilter() {
			parent::beforeFilter();
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
			$this->loadModel('Topic');
			$this->loadModel('Message');//need to load this model to temprorary bind user so we can get the last message;
			$this->Topic->contain(array('Property','Topic','Message'=>array('User')));

			$topics = $this->Topic->find('all',array('conditions'=>array('OR'=>array('Topic.from_user_id'=>$this->Auth->user('id'),array('Topic.to_user_id'=>$this->Auth->user('id')))),'order'=>array('Topic.modified DESC')));
			//Debugger::log($topics);
			//Debugger::log($this->Auth->user('id'));
			$this->set('topics',$topics);
			$this->render('inbox');
		}
		private function __deleted(){
			$this->loadModel('Topic');
			$this->loadModel('Message');//need to load this model to temprorary bind user so we can get the last message;
			$this->Topic->contain(array('Property','Topic','Message'=>array('User')));
			$topics = $this->Topic->find('all',array('conditions'=>array('OR'=>array('Topic.from_user_id'=>$this->Auth->user('id'),array('Topic.to_user_id'=>$this->Auth->user('id')))),'order'=>array('Topic.modified DESC')));
			$this->set('topics',$topics);
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
		
		private function __allBookings(){
			$this->render('allbookings');
		}
		private function __managereservations(){
			$this->render('managereservations');
		}
		private function __editaccount(){
			$this->render('editaccount');
		}
	}
?>