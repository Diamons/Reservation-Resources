<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Topic', 'Model');


class Message extends AppModel{
		public $name = 'Message';
		public $belongsTo = 'User';
		
		
	public function afterSave($created){
			if($created){
			$topic = new Topic();
			//Debugger::log($this->data);
			$topic_id = $topic->read(null,$this->data['Message']['topic_id']);
		
			if($this->data['Message']['user_id'] == $topic_id['Topic']['from_user_id']){
				//get from user email
					
				$useremail  = $this->User->read(null,$topic_id['Topic']['to_user_id']);
			
			}
			else{
				//get from user email
				
				$useremail  = $this->User->read(null,$topic_id['Topic']['from_user_id']);
	
		
			}	
			//Debugger::log($useremail);			
			$email = new CakeEmail('smtp');
			$email->viewVars(array('first' =>$useremail['User']['first_name']));
			$email->template('message_reply', 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($useremail['User']['username'])->subject('You have a new message on Reservation Resources!')->send(); 
		
		
			}
		
		
		}

	
	}
	

?>