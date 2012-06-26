<?php
	class SearchController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('searchresults');
	}
	public $uses = array('Property');
	public function searchresults(){
		//Third parameter is the number of miles
		debug($this->request);
		if($this->request->is('get')){	
			$properties = $this->Property->find('nearest', array('coordinates' => $coordinates));
		}
		//In whichever view, send coordinates in hidden input elements
		//Use custom find Calculus rule to find nearest and limit results
	
		debug($properties);
		
	}
}