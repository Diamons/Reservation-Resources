<?php 
App::uses('CakeEmail', 'Network/Email');
App::uses('User','User');
	class Topic extends AppModel{
	public	$name = 'Topic';
	public $hasMany = 'Message';
	public $belongsTo = 'Property';
	
	/*public function afterSave($created){
		
		if($created){
			$user = new User();
			$property_owner = $user->read(null,$this->data['Topic']['to_user_id']);//need to find property owner email address
			//Debugger::log($property_owner);
			$email = new CakeEmail('smtp');
			$email->viewVars(array('first' =>'elliott','last'=>'james'));
			$email->template('new_message', 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($property_owner['User']['username'])->subject('You have a new message on Reservation Resources!')->send(); 
		
		}
	}*/
	
	public function checkMessageUser($topicid = null,$uid = null){//function returns string indicating if the person is a from user or a to user
		$this->id = $topicid;
		$this->contain(array());
		$topic = $this->read();
		//Debugger::log($topic);
		if($uid == $topic['Topic']['from_user_id']){
			return array('from',$topic['Topic']['to_user_id']);//second key should be other user
		}
		elseif($uid == $topic['Topic']['to_user_id']){
				return array('to',$topic['Topic']['from_user_id']);
		}
	
	}
}
?>
