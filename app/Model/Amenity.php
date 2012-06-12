<?php
	class Amenity extends AppModel{
	public $name = 'Amenity';
//	public $belongsTo = 'Property';
	
	
	public function beforeSave(){
		if($this->data['Amenity']){
			if(!empty($this->data['Amenity']['bedroom_amenities'])){
				$this->data['Amenity']['bedroom_amenities'] = implode(';',$this->data['Amenity']['bedroom_amenities']);
			}
			if(!empty($this->data['Amenity']['electronic_amenities'] )){
				$this->data['Amenity']['electronic_amenities'] = implode(';',$this->data['Amenity']['electronic_amenities']);
			}
			if(!empty($this->data['Amenity']['kitchen_amenities'])){
				$this->data['Amenity']['kitchen_amenities'] = implode(';',$this->data['Amenity']['kitchen_amenities']);
			}
			
		}
	
	}
	public function parseAmenity($results,$primary){//primary should be false since we are querying by association 
		if($results){
			
			$results['bedroom_amenities'] = explode(';',$results['bedroom_amenities']);
			$results['kitchen_amenities'] = explode(';',$results['kitchen_amenities']);
			$results['electronic_amenities'] = explode(';',$results['electronic_amenities']);
		}
		
		return  $results;
	}
	
}
?>