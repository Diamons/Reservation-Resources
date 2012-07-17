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
		public function tapsgeolocation($city,$state){
			set_time_limit(0);	
		 $client = new threeTapsGeocoderClient('gtntjmd4q5kdumhpmq44qtxb');
		 $locations = array(array('text' =>$city.', '.$state));
		$locationcode = $client->geocode($locations);
		$searchclient = new threeTapsSearchClient('gtntjmd4q5kdumhpmq44qtxb');
		$results = $searchclient->search(array('category'=>'RVAC','location'=>$locationcode[0][0],'source'=>'CRAIG'));
		return $results;
		
		}

	}

?>