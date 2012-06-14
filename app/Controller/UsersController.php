<?php
	class UsersController extends AppController{
		public function beforeRender()
		{
			parent::beforeRender();
			
		}
		public function beforeFilter() {
			$this->Auth->allow('register','index','login','checkloginstatus', 'getloginpage', 'viewuser');
			$this->AjaxHandler->handle('register','login','checkloginstatus', 'getloginpage');
		}
		public function index(){
		}
		public function login(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
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
				if($this->User->save($this->request->data)){
					$this->User->createUserDirectory($this->User->id);
					$response['success'] = true;
					$response['data'] = 1;	
				}
				else{
					$response['data'] = $this->User->validationErrors;
					$response['code'] = 0;
					
				}
			
			return $this->AjaxHandler->respond('json',$response);
			

		}
		public function checkloginstatus(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success' => false);
			if($this->Auth->loggedIn()){
					$response['success'] = true;
					$response['data'] = 1;
			}
			else{
					$response['data'] = 0;
					
			}
			return $this->AjaxHandler->respond('json',$response);
	
		}
		
		public function getloginpage(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			if(!$this->Auth->loggedIn()){
				$this->render('/elements/login_register');
			}
	
		}
		
		public function viewuser($userid = NULL){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->User->id = $userid;
			$this->set('user', $this->User->read());
			$this->render('/elements/User/viewuser');
		}

	}
?>