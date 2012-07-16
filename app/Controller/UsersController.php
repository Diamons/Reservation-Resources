<?php
	class UsersController extends AppController{
	 public $components = array('Password');
		public function beforeRender()
		{
			parent::beforeRender();
			
		}
		public function beforeFilter() {
			$this->Auth->allow('register','index','login','checkloginstatus', 'getloginpage', 'viewuser','forgotpassword');
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
			$response = array('success' => false);
			if(!$this->Auth->loggedIn()){
				$response['data'] = $this->render('/Elements/login_register');
			}
			return $this->AjaxHandler->respond('html',$response);
	
		}
		
		public function viewuser($userid = NULL){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->User->id = $userid;
			$this->set('user', $this->User->read());
			$this->render('/elements/User/viewuser');
		}
		public function edit(){
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password'] );
			if($this->request->data){
				if($this->User->save($this->request->data,false)){
					$this->Session->setFlash('Sweet! Your profile has been updated','flash_success');
					$this->redirect($this->referer(),null,true);
				}
				else{
				//Debugger::log($this->User->validationErrors);
					$this->Session->setFlash('Sorry! We could not update your profile at this time','flash_error');
					$this->redirect($this->referer(),null,true);
				}
			}
		
		}
		
		public function profile($id=NULL){
			$user=$this->User->read(NULL, $id);
		}
		
		public function forgotpassword(){
			if($this->request->is('post')){
				$exists = $this->User->find('first', array('conditions' => array('User.username' => $this->request->data['User']['username'])));
				if(!empty($exists)){
					// generate random password then email
					$password = $this->Password->generatePassword();
					$this->User->id = $exists['User']['id'];
					if($this->User->saveField('password',$this->Auth->password($password),false)){
						//send email
						$this->User->passwordReset($exists['User']['username'],$exists['User']['first_name'],$password);
						$this->Session->setFlash('Your temporary password has been emailed to you. We recommend that you log into your account immediately and change your password','flash_success');
						$this->redirect(array('action'=>'index'));
					}
				
				}
				else{
					$this->Session->setFlash('That username was not found on our system','flash_error');
				}
			}
		
		}

	}
?>