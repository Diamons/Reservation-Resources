<?php
	class SearchesController extends AppController{
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('searchresults');
	}

	public function searchresults(){
		if(!empty($this->request->query)){
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
		
			}
		}		
	}

?>