<?php
	class NotificationsController extends AppController {
	
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
			$this->AjaxHandler->handle('delete');
			
		}
		public function delete($id = null){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->Notification->id = $id;
			$this->Notification->set('deleted',1);
			if($this->Notification->save()){
					$count = $this->Notification->find('count',array('conditions'=>array('Notification.user_id'=>$this->Auth->user('id'),'Notification.deleted'=>0)));
					parent::notifyNode('delete notification',array('count'=>$count,'recipient'=>$this->Auth->user('id')));
					$response = array('success'=>true);
					
			}
			else{
				$response = array('success'=>false);
			}
			
			return $this->AjaxHandler->respond('json',$response);
			
		}
	
	
	}
?>