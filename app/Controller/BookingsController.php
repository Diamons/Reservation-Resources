<?php
	class BookingsController extends AppController{
		
		public function beforeRender(){
			parent::beforeRender();
			
		}
		public function beforeFilter(){
			parent::beforeFilter();
				$this->Auth->allow('calendar');
				$this->AjaxHandler->handle('calendar','easybook','comment','blackbook','hostconfirm');			
		}
		public function bookRoom($propertyid = NULL){
			$this->loadModel('Property');
			$this->loadModel('User');
			$this->Property->id = $propertyid;
			$property = $this->Property->read();
			$this->set('property',$property);
			/*$this->User->id = $this->Auth->user('id');
			$this->User->contain(array());
			$user = $this->User->read();
			$this->set('user',$user);*/
			//Debugger::log($property);
		}
		public function calendar(){
			$this->loadModel('Property');
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			if(!empty($this->request->data['x'])&&!empty($this->request->data['y'])&&!empty($this->request->data['pid'])){
				$this->Property->id = $this->request->data['pid'];
				$property = $this->Property->read();
				$this->set('dates',$property['Booking']);
				$this->set('x',$this->request->data['x']);
				$this->set('y',$this->request->data['y']);
				$this->set('pid',$this->request->data['pid']);
				$response['success'] = true;
				$returnhtml = $this->render('/elements/calendar');
				$response['data'] =  $returnhtml->body();
				
			}
			return $this->AjaxHandler->respond('html',$response);
		}
		
		public function fullcalendar(){
			$this->loadModel('Property');
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			//if(!empty($this->request->data['x'])&&!empty($this->request->data['y'])){
				$properties = $this->Property->find("all", array("conditions" => array("Property.user_id" => $this->Auth->user("id"))));
				debug($properties);
				$this->set('properties',$properties);
				$this->set('x',$this->request->data['x']);
				$this->set('y',$this->request->data['y']);
				$response['success'] = true;
				$returnhtml = $this->render('/elements/fullcalendar');
				$response['data'] =  $returnhtml->body();
				
			//}
			return $this->AjaxHandler->respond('html',$response);
		}
		public function easybook(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->loadModel('User');
			$response = array('success'=>false);
			$this->Booking->set('user_id',$this->Auth->user('id'));
			if($this->User->save($this->request->data)){
				
				if($this->Booking->save($this->request->data)){
					$response['success'] = true;
					$response['data'] = $this->Booking->id; 
					
				}
				else{
					$response['data'] = 'Your profile was updated but booking was not saved. Please check the form for any input errors';
				
				}
			}
			else{//if the user fails the save we have an error in the form
			
				$response['data'] = $this->User->validationErrors;
			}

			return $this->AjaxHandler->respond('json',$response);
		}
		public function comment(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			if($this->Booking->save($this->request->data)){
				$response['success'] = true;
				$response['data'] = 'Successfully saved!';
			}
			else{
				$response['data'] = 'Error!Not saved';
			}
			return $this->AjaxHandler->respond('json',$response);
			
		}
		public function hostconfirm(){//this function gets called soon as host hits accepts. reason for this is beacuase host may not want to leave a commment. if they do leave a comment then the comment function get called
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			if(isset($this->request->data)){
				$this->Booking->id = $this->request->data('bid');//we only need to save the status field so we know if host accepts or declines reservation
				$booking = $this->Booking->read();
				//lets create the reservation which is a confirmed booking
				$this->loadModel('Reservation');
				$this->Reservation->set('booking_id',$this->Booking->id);
				$this->Reservation->set('status',2);
				$this->Reservation->set('user_id',$booking['User']['id']);
				$this->Reservation->set('booking_id',$this->Booking->id);
				$this->Reservation->set('property_id',$booking['Property']['id']);
				$this->Reservation->set('host_id',$booking['Property']['user_id']);
				$this->Reservation->set('host_paid',0);
				$this->Reservation->save();
				$this->Booking->set('status',$this->Booking->updateBooking($this->request->data['status']));
				Debugger::log($this->Booking->updateBooking($this->request->data['status']));
				$this->Booking->set('reservation_id',$this->Reservation->id);
				//Debugger::log($booking);
				if($this->Booking->save()){
				
					//lets notify the user via email the action the host took on thier booking request
					if($this->request->data['status'] == 'accept'){
	
						$this->Booking->notifyGuest($booking['User']['username'],'host_accept','Congrats! Host has accepted your Booking request');
					}
					else{
						$this->Booking->notifyGuest($booking['User']['username'],'host_decline','Host has declined your reservation request');
					}
					$response['success'] = true;
					//lets update the reservation at this point
					
				}
				return $this->AjaxHandler->respond('json',$response);
			}
		}
		public function blackbook($pid = null){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			//if request data is set then save if not then render blackbooking element
			if(isset($pid)){
				$this->set('pid',$pid);
				$returnhtml = $this->render('/elements/Booking/blackbook');
				$response['success'] = true;
				$response['data'] =  $returnhtml->body();
				return $this->AjaxHandler->respond('html',$response);
			}
			else{
				if($this->request->data){
					$this->Booking->set('user_id',$this->Auth->user('id'));
					if($this->Booking->save($this->request->data)){
						//Debugger::log($this->request->data['Booking']['start_date']);
						$response['success'] = true;
						
						}
					return $this->AjaxHandler->respond('json',$response);
				
				}
			
			}
		}
	}

?>