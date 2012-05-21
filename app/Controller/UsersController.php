<?php
	class UsersController extends AppController{
		public function beforeRender()
		{
			parent::beforeRender();
			
		}
		public function beforeFilter() {
			$this->Auth->allow('register','index','login');
			$this->AjaxHandler->handle('login','register');
		}
		public function index(){
		
		}
		public function login(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			 $this->request->data['User']['Password'] = $this->User->hashPassword();
			$response = array('success' => false);
			if($this->Auth->login()){
				$response['success'] = true;
				$response['code'] = 1;
				//$response['data'] = $this->Auth->user();//we also need to figure out website flow functionality
			}
			else{
				$response['data'] = "Username/Password Combination Incorrect";
				$response['code'] = 0;
			}
			return $this->AjaxHandler->respond('json',$response);
			
		}
		public function logout(){
			$this->autoRender  = FALSE;
			  if($this->Auth->user())
				{
				   $this->redirect($this->Auth->logout());
				}
		}
		public function register(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success' => false);
				$this->User->create();
				debug($this->request);
				if($this->User->save($this->request->data)){
					$response['success'] = true;
					$response['data'] = 1;	
				}
				else{
					$response['data'] = $this->User->validationErrors;
					$response['code'] = 0;
					
				}
			
			return $this->AjaxHandler->respond('json',$response);
			

		}

	}
?>