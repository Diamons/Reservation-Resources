<?php
class SearchesController extends AppController{

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('searchresults','tapsobject');
		//$this->AjaxHandler->handle('tapsobject');
	}

	public function searchresults(){
	
		if(!empty($this->request->query)){
			set_time_limit(0);
			$lat = $this->request->query['latitude'];
			$long = $this->request->query['longtitude'];
			$city = $this->request->query['city'];
			$state = $this->request->query['state'];
			//lets set up sw and northwest bounding box area;
			$swpoint = $this->Search->setBoundingBox('sw',$lat,$long,5);
			$nepoint = $this->Search->setBoundingBox('ne',$lat,$long,5);
			$this->loadModel('Property');
			$this->Property->contain(array('User','Amenity'));
			$properties = $this->Property->find('all',array('conditions'=>array('Property.status =' => 0, 'Property.latitude BETWEEN ? AND ?' => array($swpoint['lat'],$nepoint['lat']),'Property.longtitude BETWEEN ? AND ?' => array($swpoint['long'],$nepoint['long']))));//return all properties within area
			$this->set('properties',$properties);
			$this->set('city',$city);
			$this->set('state',$state);
			if($this->Session->read('Property.state') == $state && $this->Session->read('Property.city') == $city){
				$results = $this->Session->read('Property.results');
			}
			else{
				$results = $this->Search->tapsgeolocation($city,$state);
					if(!empty($results['results'])){
						$this->Session->write('Property.city',$city);
						$this->Session->write('Property.state',$state);
						$this->Session->write('Property.results',$results);
					}
			}
			$this->set('clresults',$results);
			}
		}
	/*public function tapsobject(){
		$this->autoLayout = false;
		$this->autoRender  = FALSE;
		$this->layout = 'ajax';
		$results = $this->Search->tapsgeolocation($this->request->data['city'],$this->request->data['state']);
		$response['success'] = true;
		$response['data'] = $results;
		Debugger::log($response['data']['results'][11]);
		return $this->AjaxHandler->respond('json',$response);
	}*/
}

?>