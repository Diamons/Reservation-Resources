<?php
	class PostsController extends AppController{
		public $helpers = array('Html','Form');
		public $components = array('Session');
		
		public function index(){
		
			$this->set('posts',$this->Post->find('all'));
		}
		public function add(){
			if($this->request->is('post')){
				if($this->Post->save($this->request->data)){
					$this->Session->setFlash('Your post has been save');
					$this->redirect(array('action'=>'index'));
				}
				else{
					$this->Session->setFlash('Unable to add your post');
				}
			}
		
		}
		public function edit($id = null){
			$this->Post->id = $id;
			if($this->request->is('get')){
				$this->request->data = $this->Post->read();
			}
			else{
				if($this->Post->save($this->request->data)){
					$this->Session->setFlash('Your post has been updated');
				}
				else{
					$this->Session->setFlash('Unable to update your post');
				}
			}
		}
	
	}
?>