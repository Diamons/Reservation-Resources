<?php
	class DashboardController extends AppController{
		public function beforeFilter() {
			$this->Auth->allow('*');
			$this->AjaxHandler->handle('login','register','checkloginstatus');
			$this->layout = "ajax";
		}
		
		public function index(){
			$this->layout = "dashboard";
		}
		
		public function view($page = NULL){
			$this->autoRender = false;
			if($this->request->is('ajax')){
				$functionname = "__".$page;
				$this->$functionname();
			}else{
				$this->redirect($this->referer());
			}
		}
		private function __inbox(){
			$this->render('inbox');
		}
		private function __deleted(){
			$this->render('deleted');
		}
		private function __notifications(){
			$this->render('index');
		}
		private function __manageproperties(){
			$this->render('manageproperties');
		}
		private function __manageBookings(){
			$this->render('managebookings');
		}
	}
?>