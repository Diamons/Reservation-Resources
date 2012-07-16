<?php
	class SearchController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('searchresults');
	}
	public $uses = array('Property');
	public function searchresults(){
		//parameters passed via URL
		//Example: http://localhost/cakephp/search/searchresults?lat=40.664191&long=-73.950712004100001&miles=5
		$coordinates = $this->request->query;
	//Distance parameter MUST be passed
		if(empty($coordinates['miles']))
			$coordinates['miles'] = 10;
		if($this->request->is('get')){
			//Calculus function. Returns based on shape of Earth and ARCTAN
			$this->set("properties", $this->Property->find('nearest', array('coordinates' => $coordinates)));
		}		
	}
}