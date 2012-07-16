<?php
App::uses('Topic','Model');
App::uses('Message','Model');
App::uses('CakeEmail', 'Network/Email');
class Craigslist extends AppModel{
	public $name = 'Craigslist';
	
	
	public function moveToInbox($id = null,$pid = null){
	
		if(!empty($id)&&!empty($pid)){
			$topic = new Topic();
			$this->id = $id;
			$result = $this->read();
			$topic->set('property_id',$pid);
			$topic->set('from_user_id',$result['Craigslist']['user_id']);
			if($topic->save()){
				$message = new Message();
				$message->set('topic_id',$topic->id);
				$message->set('message',$result['Craigslist']['message']);
				$message->save();
				
			
			}
			 
			
		
		
		
		}
	
	}
	public function afterSave($created){
		if($created){
			//Debugger::log($this->data['Craigslist']['email']);
			$email = new CakeEmail('smtp');
			$email->viewVars(array('hash' => $this->id));
			$email->template('email_craigslist_owner', 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($this->data['Craigslist']['email'])->subject('You have a property inquery on Reservation Resources')->send(); 
		
		}
	
	}


}

?>