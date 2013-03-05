<?php
App::import('Vendor', '3taps');
	class Search extends AppModel{
		public $name = 'Search';
		public $useTable = false;
		
		public function setBoundingBox($type = null,$lat = null ,$long = null,$miles = null){
	
			if($type == 'sw'){
				$coordinate['type'] = 'sw';
				$coordinate['lat'] = $lat - ($miles * 0.014483);
				$coordinate['long'] = $long -($miles * 0.167469);
				return $coordinate;
			}
			if($type == 'ne'){
				$coordinate['type'] = 'ne';
				$coordinate['lat'] = $lat + ($miles * 0.014483);
				$coordinate['long'] = $long + ($miles * 0.167469);
				return $coordinate;
				
			}
		}
		public function tapsgeolocation($city,$state,$zip){
			set_time_limit(0);	
		 $client = new threeTapsReferenceClient('26f77f9c5f73f446babab99d5d94d343');
		 //$locations = array(array('text'=>$city.",".$state));
		//$locationcode = $client->geocode($locations);
		//Debugger::log($locationcode);
		$searchclient = new threeTapsSearchClient('26f77f9c5f73f446babab99d5d94d343');
		$results = $searchclient->search(array('source'=>'CRAIG','category'=>'RVAC','text'=>$zip));
		if(empty($results['results'])){//if no results return then we search by city and state
			$results = $searchclient->search(array('source'=>'CRAIG','category'=>'RVAC','text'=>$city));
		
		}
		
		return $results;
		
		}
		public function previewproperty($postkey = null){
				$searchclient = new threeTapsSearchClient('26f77f9c5f73f446babab99d5d94d343');
				$results = $searchclient->search(array('postKey'=>$postkey));
				return $results;
		
		}

	}

?>