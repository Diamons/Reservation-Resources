<?php
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

	}

?>