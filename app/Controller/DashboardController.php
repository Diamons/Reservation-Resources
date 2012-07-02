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
			$this->Topic->contain(array('Property','Message'=>array('User')));

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
			$this->loadModel('Reservation');
			$this->Reservation->contain(array('Booking'=>array('User')));
			$paidbookings = $this->Reservation->find('all',array('conditions'=>array('Reservation.host_id ='=>$this->Auth->user('id'),'Reservation.status = '=> 2,'Booking.status ='=>1)));//this will select paid all bookings paid for a particular host that has accpeted the reservation
			$this->set('confirmedbooking',$paidbookings);
			//Debugger::log($paidbookings);
			$this->render('allbookings');
		}
		private function __managereservations(){
			$this->loadModel('Reservation');
			$this->Reservation->contain(array('Booking'=>array('User','Property')));
			$paidbookings = $this->Reservation->find('all',array('conditions'=>array('Reservation.host_id ='=>$this->Auth->user('id'),'Reservation.status = '=> 2)));//this will select paid all bookings paid for a particular host if it was declined or accepted will be checked in view file
			$this->set('confirmedbooking',$paidbookings);
			//Debugger::log($paidbookings[0]['Booking']);
			$this->render('managereservations');
		}
		private function __editaccount(){
			$this->loadModel('User');
			$this->User->contain(array());
			$this->User->id = $this->Auth->user('id');
			$user = $this->User->read();
			$this->set('user',$user);
			//Debugger::log($user);
			$this->render('editaccount');
		}
		private function __postcraigslist($pid = null){
			if(isset($pid)){
				$this->loadModel('Property');
				$this->Property->contain('User');
				$this->Property->id = $pid;
				$property = $this->Property->read();
				$images = $this->Property->findPropertyImages($this->Auth->user('id'),$pid);
				$this->set('property',$property);
				$this->set('images',$images);
				//Debugger::log($property);
				//Debugger::log($images);
				$this->render('promote');
			}
			else{
				$this->__manageproperties();
			}
		
		}
	}
?>