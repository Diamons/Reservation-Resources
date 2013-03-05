<?php
	class DashboardController extends AppController{
		public function beforeFilter() {
			parent::beforeFilter();
			$this->layout = "ajax";
		}
		
		private function __checkEmpty($variable, $name=NULL){
			if(empty($variable))
			{	
				$this->set("message", "You have no ".$name." to view.");
				echo $this->render(DS.'Elements'.DS.'flash_error');
			}	
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
			
			$this->__checkEmpty($topics, "topics");
			$this->render('inbox');
		}
		private function __viewthread($tid = null){
			$this->loadModel('Message');
			$this->Message->bindModel(array('belongsTo'=>array('User')));
			$message = $this->Message->find('all',array('conditions'=>array('Message.topic_id'=>$tid)));
			$this->loadModel('Topic');
			$this->Topic->id = $tid;
			if(count($message) == 1){
			//query other user so we an output the hidden div in view for responding
			$this->Topic->contain(array());
			$topic = $this->Topic->read();
			if($topic['Topic']['to_user_id'] == $this->Auth->user('id')){
					$this->loadModel('User');
					$this->User->contain(array());
					$this->User->id = $topic['Topic']['to_user_id'];
					$user = $this->User->read();
					$this->set('owner',$user);
				}
		
			}
			//lets set the from or to user view to true
			$userviewed = $this->Topic->checkMessageUser($tid,$this->Auth->user('id'));
			
			if($userviewed[0] == 'from'){//since we know the user is from user then we set their viewed message status to true
				$this->Topic->set('from_user_viewed',true);
			}
			elseif($userviewed[0] == 'to'){
				$this->Topic->set('to_user_viewed',true);
			}
			$this->Topic->save();
			$this->set('message',$message);
			$this->set('topic_id',$tid);
			//Debugger::log($message[0]['User']);
			$this->render('viewthread');
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
			$this->loadModel('Notification');
			$notifications = $this->Notification->find('all',array('conditions'=>array('Notification.user_id'=>$this->Auth->user('id'),'Notification.deleted'=>0)));
			$this->set('notifications',$notifications);
			
			$this->__checkEmpty($notifications, "notifications");
			$this->render('index');
		}
		private function __manageproperties(){
			$this->loadModel('Property');
			$this->Property->contain(array());
			$properties = $this->Property->find('all',array('conditions'=>array('Property.user_id'=>$this->Auth->user('id'))));
			$this->set('properties',$properties);
			$this->__checkEmpty($properties, "properties");
			$this->render('manageproperties');
		}
		private function __manageBookings($pid = null){
			if($pid != null){
				$this->loadModel('Property');
				$this->Property->contain(array('Booking'=>array('User')));
				$this->Property->id = $pid;
				//although booking and property relationship is already set we need to temp. rebind it with the filer conditions because w/o this it will throw an exception complaing how booking.status field was not found
				$this->Property->bindModel(array('hasMany' => array( 'Booking' => array( 'conditions' =>array('Booking.status' => 0)))));
				$properties = $this->Property->read();
				$this->set("property", $properties);
				$this->__checkEmpty($properties, "bookings");
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
			$this->__checkEmpty($paidbookings, "paid bookings");
			//Debugger::log($paidbookings);
			$this->render('allbookings');
		}
		private function __managereservations(){
			$this->loadModel('Reservation');
			$this->Reservation->contain(array('Booking'=>array('User','Property')));
			$paidbookings = $this->Reservation->find('all',array('conditions'=>array('Reservation.user_id ='=>$this->Auth->user('id'),'Reservation.status = '=> 2)));//this will select paid all bookings paid for a particular host if it was declined or accepted will be checked in view file
			$this->set('confirmedbooking',$paidbookings);
			$this->__checkEmpty($paidbookings, "paid bookings");
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
				$this->Property->contain('User','Amenity');
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