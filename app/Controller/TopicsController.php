<?php
	class TopicsController extends AppController {
	
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
			$this->AjaxHandler->handle('delete');
			
		}
		public function delete(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>true);
		
			foreach($this->request->data as $key => $value){
				$this->Topic->create();
				$this->Topic->id = $key;
				$this->Topic->set($value,$this->Auth->user('id'));
				$this->Topic->save();
				
			}
			
			return $this->AjaxHandler->respond('json',$response);
			//update selected topic ids where id = array of ids AND from user = auth id or to user = auth id
		}
	
	
	}
?>