<?php
	class BookingsController extends AppController{
		
		public function beforeRender(){
			parent::beforeRender();
			
		}
		public function beforeFilter(){
			parent::beforeFilter();
				$this->Auth->allow('calendar');
				$this->AjaxHandler->handle('calendar','easybook','comment');			
		}
		public function calendar(){
			$this->loadModel('Property');
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			if(!empty($this->request->data['x'])&&!empty($this->request->data['y'])&&!empty($this->request->data['pid'])){
				$this->Property->id = $this->request->data['pid'];
				$property = $this->Property->read();
				$this->set('dates',$property['Booking']);
				$this->set('x',$this->request->data['x']);
				$this->set('y',$this->request->data['y']);
				$this->set('pid',$this->request->data['pid']);
				$response['success'] = true;
				$returnhtml = $this->render('/elements/calendar');
				$response['data'] =  $returnhtml->body();
				
			}
			return $this->AjaxHandler->respond('html',$response);
		}
		public function easybook(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			$this->Booking->set('user_id',$this->Auth->user('id'));
			if($this->Booking->save($this->request->data)){
				$response['success'] = true;
				
			}
			else{
				$response['data'] = 0;
				
			}
			return $this->AjaxHandler->respond('json',$response);
		}
		public function comment(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			if($this->Booking->save($this->request->data)){
				$response['success'] = true;
				$response['data'] = 'Successfully saved!';
			}
			else{
				$response['data'] = 'Error!Not saved';
			}
			return $this->AjaxHandler->respond('json',$response);
			
		}
	}

?>