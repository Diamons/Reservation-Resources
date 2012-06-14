<?php
	class MessagesController extends AppController{
	
	function beforeFilter(){
		parent::beforeFilter();
	}
	
	function sendMessage($uid, $pid, $status, $rid){
		$this->autoRender = false;
		$this->layout = "ajax";
		//If this is a message accepting or Declining a RESERVATION
		if(isset($rid) && !empty($rid)){
			$this->set('status', $status);
			//In the view we'll decide what to do if they're accepting or declining
			$this->render('../Elements/Message/sendmessage');
		//Otherwise it's a regular contact message
		} else {
		
		}
	}
		
}
?>