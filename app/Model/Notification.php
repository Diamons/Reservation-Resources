<?php 


	class Notification extends AppModel{
		public $name = 'Notification';
		public $actsAs = array('WebSocket.Publishable' => array('fields' => array('deleted')));//we only need the deleted field to be monitered since we are monitiering if the notification has been deleted or viewed
		public function setNotification($userid,$status,$action,$notification,$title,$button_title){
			$this->set('user_id',$userid);
			$this->set('status',$status);
			$this->set('action',$action);
			$this->set('notification',$notification);
			$this->set('title',$title);
			$this->set('button_title',$button_title);
			
		
		}
		
	
		public function notificationCount($notificationData){//returns an array with the notification count and the user id who it belongs to, so it can be available to node.js instead of requiring db
			
			$notification['count'] = $this->find('count',array('conditions'=>array('Notification.user_id'=>$notificationData['Notification']['user_id'],'Notification.deleted'=>0)));
			$notification['uid'] = $notificationData['Notification']['user_id'];
			
			return $notification;
			
		}
		
	
	}	

?>