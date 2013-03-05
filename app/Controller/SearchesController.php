<?php
class SearchesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('searchresults','tapsobject');
		//$this->AjaxHandler->handle('tapsobject');
	}

	public function searchresults(){
		set_time_limit(0);
		if(!empty($this->request->query)){
			
			$lat = $this->request->query['latitude'];
			$long = $this->request->query['longtitude'];
			$city = $this->request->query['city'];
			$state = $this->request->query['state'];
			$zip = $this->request->query['zip'];
		}
		else{
			$lat = $this->request->params['latitude'];
			$long = $this->request->params['longtitude'];
			$city = $this->request->params['city'];
			$state = $this->request->params['state'];
			$zip = $this->request->params['zip'];
		
		}
			//lets set up sw and northwest bounding box area;
			$swpoint = $this->Search->setBoundingBox('sw',$lat,$long,5);
			$nepoint = $this->Search->setBoundingBox('ne',$lat,$long,5);
			$this->loadModel('Property');
			$this->Property->contain(array('User'));
			$properties = $this->Property->find('all',array('conditions'=>array('Property.status =' => 0, 'Property.latitude BETWEEN ? AND ?' => array($swpoint['lat'],$nepoint['lat']),'Property.longtitude BETWEEN ? AND ?' => array($swpoint['long'],$nepoint['long']))));//return all properties within area
			$this->set('properties',$properties);
			$this->set('city',$city);
			$this->set('state',$state);
			if($this->Session->read('Property.state') == $state && $this->Session->read('Property.city') == $city){
				$results = $this->Session->read('Property.results');
			}
			else{
				$results = $this->Search->tapsgeolocation($city,$state,$zip);
					if(!empty($results['results'])){
						$this->Session->write('Property.city',$city);
						$this->Session->write('Property.state',$state);
						$this->Session->write('Property.results',$results);
					}
			}
			
			$this->set('clresults',$results);
			
			//Check cookie, if set they've been here before and they don't want to subscribe. Also don't harass users of the website.
			if(!$this->Auth->user() && !$this->Cookie->read('Subscription.unique'))
			{
				$this->Cookie->write('Subscription.unique', 'false');
				
				//Set variable to show the javascript block to ask them to subscribe
				$this->set("subscription", true);
				
			}
		$this->set('title_for_layout', 'Rentals in '.$city.' '.$state);
		}

}

?>