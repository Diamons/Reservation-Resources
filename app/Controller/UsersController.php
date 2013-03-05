<?php

	class UsersController extends AppController{
	 public $components = array('Password');
	
		public function beforeRender()
		{
			parent::beforeRender();
	
			
		}
		public function beforeFilter() {
			$this->Auth->allow('register','login','logout','checkloginstatus', 'getloginpage', 'viewuser','forgotpassword');
			$this->AjaxHandler->handle('register','login','checkloginstatus', 'getloginpage','logout');
		}
		public function index(){
			if($this->Auth->loggedIn()){
				if($this->referer() == Router::url('/',true).'users/forgotpassword'){
						$this->redirect('/dashboard/#editaccount');
				}		
				
			}
		}
		public function login(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success' => false);
			if($this->Auth->login()){
				$response['success'] = true;
				$response['code'] = 1;
				//set user variables for header
				$this->set('user',$this->Auth->user());
				$this->set('notificationcount',parent::getNotificationCount($this->Auth->user('id')));
				$response['data'] = $this->render('/Elements/Layout/User/header');
			
				
				
				return $this->AjaxHandler->respond('html',$response);
			}
			else{
				$response['data'] = "Username/Password Combination Incorrect";
				$response['code'] = 0;
				return $this->AjaxHandler->respond('json',$response);
			}
			
			
			
		}
		public function logout(){
			$this->autoRender  = FALSE;
			$this->layout = 'ajax';
			$response = array('success' => false);
			
			  if($this->Auth->user())
				{
					parent::notifyNode('logout',array('userId'=>$this->Auth->user('id')));
				   if($this->Auth->logout()){
					$response['success'] = true;
					$response['data']  = $this->render('/Elements/Layout/Guest/header');
					return $this->AjaxHandler->respond('html',$response);
				   }
				   else{
					$response['success'] = false;
					return $this->AjaxHandler->respond('json',$response);
				   }
				}
		}
		public function register(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			
				$this->User->create();
				if($this->User->save($this->request->data)){
					$this->User->createUserDirectory($this->User->id);

					$this->Mailchimp = $this->Components->load('Mailchimp.Mailchimp');
					$this->Mailchimp->initialize($this, array('listId' => '226886c1bb'));
					$this->loadModel('Subscription');
					$this->Subscription->set($this->request->data);
					if($this->Subscription->validates()) {
						$this->Mailchimp->listSubscribe($this->request->data['User']['username'], $this->request->data['User']['first_name']);
					}
					
					
					
					if($this->Auth->login()){
						$this->set('user',$this->Auth->user());
						$this->set('notificationcount',parent::getNotificationCount($this->Auth->user('id')));
						$response['success'] = true;
						$response['data'] = $this->render('/Elements/Layout/User/header');
						return $this->AjaxHandler->respond('html',$response);
					}
				}
				else{
					$response = array('success' => false);
					$response['data'] = $this->User->validationErrors;
					$response['code'] = 0;
					return $this->AjaxHandler->respond('json',$response);
				}
				
	
			
			

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
			$this->render('/Elements/User/viewuser');
		}
		public function edit(){
		
			if(!empty($this->request->data['User']['password'])){
				$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
				$allowed = array('first_name','last_name','password','profile_picture','phone','paypal_email','about_me');
			}
			else{
				$allowed = array('first_name','last_name','profile_picture','phone','paypal_email','about_me');
			}
			
			if($this->request->data){
				if($this->User->save($this->request->data,false,$allowed)){
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