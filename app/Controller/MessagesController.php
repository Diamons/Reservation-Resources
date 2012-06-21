<?php
	class MessagesController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->AjaxHandler->handle('submitMessage');
	} 
	
	function sendMessage($uid, $pid, $status, $rid){//this function would update the booking data
		$this->loadModel('Booking');
		$this->autoRender = false;
		$this->layout = "ajax";
		//If this is a message accepting or Declining a RESERVATION
		if(isset($rid) && !empty($rid)){
			
			$this->Booking->id = $rid;
			$this->Booking->contain(array('User'));
			$booking = $this->Booking->read();
			$this->set('status', $status);
			$this->set('bookinginformation', $booking);
			$this->Booking->set('status',$this->Booking->updateBooking($status));
			$this->Booking->save();
			//In the view we'll decide what to do if they're accepting or declining
			$this->render('../Elements/Message/sendmessage');
		//Otherwise it's a regular contact message
		} 
	}
	public function contactform($pid = null ){//generate the ajax contact form
		$this->autoLayout = FALSE;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->set('pid',$pid);
		$this->render('../Elements/Message/contactform');
		
	}
	public function submitMessage(){
		$this->loadModel('Topic');
		$this->loadModel('Property');
		$this->autoLayout = FALSE;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$response = array('success'=>false);
		//lets find the owner of the property
		$this->Property->id = $this->request->data['Topic']['property_id'];
		$this->Property->contain(array('User'));
		$property = $this->Property->find();
		$this->Topic->set('from_user_id',$this->Auth->user('id'));
		$this->Topic->set('to_user_id',$property['User']['id']);
		if($this->Topic->save($this->request->data['Topic'])){
			
			$this->request->data['Message']['topic_id'] =  $this->Topic->id;
			$this->request->data['Message']['user_id'] =  $this->Auth->user('id');
			if($this->Message->save($this->request->data['Message'])){
				$response['success'] = true;
				$response['data'] = "Message sent";
				
			}
		}
		else{
			$response['data'] = "Something went wrong we apologize";
		}
	
		return $this->AjaxHandler->respond('json',$response); 
		
	//	Debugger::log($this->request->data);
	}
}
?>