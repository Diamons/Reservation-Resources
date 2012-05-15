<?php
	class UsersController extends AppController{
		public function beforeRender()
		{
			parent::beforeRender();
			
		}
		public function beforeFilter() {
			$this->Auth->allow('register');
		}
		
		public function login(){
			    if ($this->request->is('post')) {
					if ($this->Auth->login()) {
						debug('test');
						//return $this->redirect($this->Auth->redirect());
			} else {
					debug('failed');
					$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
				}
			}
		}
		public function logout(){
			$this->autoRender  = FALSE;
			  if($this->Auth->user())
				{
				$this->redirect($this->Auth->logout());
				}
		}
		public function register(){
			
			if($this->request->is('post')){
				$this->autoRender  = FALSE;
				$this->User->create();
				if($this->User->save($this->request->data)){
					$this->redirect('/');
				}
				else{
					
					debug($this->User->validationErrors);
				}
			}
		}
	}
?>