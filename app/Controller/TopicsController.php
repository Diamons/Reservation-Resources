<?php 
	class Topics extends AppController{
	
		function beforeFilter(){
			parent::beforeFilter();
			$this->AjaxHandler->handle('index');
		}
		
		function index(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			
		}
	
	}
?>