<?php
App::uses('CakeEmail', 'Network/Email');
	class Message extends AppModel{
		public $name = 'Message';
		public $belongsTo = 'User';
		
		
		/*public function afterSave($created){
			if($created){
			//$this->loadModel('ModelName');
			Debugger::log($this->data);
			//$email = new CakeEmail('smtp');
			//$email->viewVars(array('title' =>$this->data['Property']['title']));
			//$email->template('new_message', 'email_layout')->emailFormat('html');
			//$email->sender('noreply@reservationresources.com')->to(AuthComponent::user('username'))->subject('You have a new message on Reservation Resources!')->send(); 
		
			}
		
		
		}*/

	
	}
	

?>