<?php
	class MessagesController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->AjaxHandler->handle('submitMessage','reply');
	} 
	
	function sendMessage($rid,$status){//this function retrieves booking send message element. All updating wll be done in booking controller
		$this->loadModel('Booking');
		$this->autoRender = false;
		$this->layout = "ajax";
		//If this is a message accepting or Declining a RESERVATION
		if(isset($rid) && !empty($rid)){
			
			$this->Booking->id = $rid;
			$this->Booking->contain(array('User'));
			$booking = $this->Booking->read();
			$this->set('bookinginformation', $booking);
			$this->set('status',$status);
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
		$property = $this->Property->read();
	
		$this->Topic->set('from_user_id',$this->Auth->user('id'));
		$this->Topic->set('to_user_id',$property['Property']['user_id']);
		if($this->Topic->save($this->request->data['Topic'])){
			
			$this->request->data['Message']['topic_id'] =  $this->Topic->id;
			$this->request->data['Message']['user_id'] =  $this->Auth->user('id');
			if($this->Message->save($this->request->data['Message'])){
				$response['success'] = true;
				$response['data'] = "Message sent";
				$this->loadModel('Notification');
				$this->Notification->setNotification($property['Property']['user_id'],1,'#inbox','You have a new message on Reservation Resources click the button below to go to your inbox','New Message','Go to inbox');
				$notificationData = $this->Notification->save();
				$notification = $this->Notification->notificationCount($notificationData);
				
			}
					if($this->Auth->user('first_name')){
						$data = array('notificationCount'=>$notification['count'],'recipient'=>$notification['uid'],'message'=>$this->Auth->user('first_name').' just sent you a message!');
						}
					else{
						$data = array('notificationCount'=>$notification['count'],'recipient'=>$notification['uid'],'message'=>'You have a new message!');	
					}
					parent::notifyNode('new message', $data);

					
				

			
		
		
		}
		else{
			$response['data'] = "Something went wrong we apologize";
		}
	
		return $this->AjaxHandler->respond('json',$response); 
		
	//	Debugger::log($this->request->data);
	}
	
	public function reply(){
		if($this->Message->save($this->request->data)){//if message saves we load topic model and update so the recipient user will be recieved as new message.
			$response['success'] = true;
			$response['data'] = $this->request->data['Message']['message'];
			$response['code'] = $this->request->data['Message']['user_id'];
			$latestMessage = $this->Message->read(null,$this->Message->id);//grab the latest message to send to RTS along with DB timestamp
			
			
			$this->loadModel('Topic');
			$userviewed = $this->Topic->checkMessageuser($this->request->data['Message']['topic_id'],$this->request->data['Message']['user_id']);
			$this->Topic->id = $this->request->data['Message']['topic_id'];
			
			if($userviewed[0] == 'from'){//update to to user field as a new message
				$this->Topic->set('to_user_viewed',false);
				$receiver = $userviewed[1];
			}
			elseif($userviewed[0] == 'to'){
				$this->Topic->set('from_user_viewed',false);
				$receiver = $userviewed[1];
			}	
			$this->Topic->save();
			parent::notifyNode('reply',array('to'=>$receiver,'message'=>$latestMessage['Message']['message'],'time'=>$latestMessage['Message']['created'],'tid'=>$this->Topic->id,'from'=>$latestMessage['Message']['user_id']));
			/*
			@TODO: Need to figure out a way so that if both users are connected concurrently then we dont want to send a notification to user but rather just update RTS
			*/
			//lets send a notifcation to user
			$this->loadModel('Notification');
			$this->Notification->setNotification($receiver,1,'#inbox','You have a new message on Reservation Resources click the button below to go to your inbox','New Message','Go to inbox');
			$this->Notification->save();
		
		}
		else{
			$response['success'] = false;
		}
		return $this->AjaxHandler->respond('json',$response);
	
	}

}
?>