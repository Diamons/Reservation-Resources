<?php
	class DashboardsController extends AppController{
		public function beforeFilter() {
			$this->Auth->allow('register','index','login','checkloginstatus', 'getloginpage');
			$this->AjaxHandler->handle('login','register','checkloginstatus');
			$this->layout = "Dashboard";
		}
		
		public function index(){
		
		}
	}
?>