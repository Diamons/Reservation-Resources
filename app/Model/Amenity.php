<?php
	class Amenity extends AppModel{
	public $name = 'Amenity';
	
	
	public function beforeSave(){
		if($this->data['Amenity']){
			if(!empty($this->data['Amenity']['bedroom_amenities'])){
				$this->data['Amenity']['bedroom_amenities'] = implode(';',$this->data['Amenity']['bedroom_amenities']);
			}
			else{
				$this->data['Amenity']['bedroom_amenities'] = "";
			}
			if(!empty($this->data['Amenity']['electronic_amenities'] )){
				$this->data['Amenity']['electronic_amenities'] = implode(';',$this->data['Amenity']['electronic_amenities']);
			}
			else{
				$this->data['Amenity']['electronic_amenities'] = "";
			}
			if(!empty($this->data['Amenity']['kitchen_amenities'])){
				$this->data['Amenity']['kitchen_amenities'] = implode(';',$this->data['Amenity']['kitchen_amenities']);
			}
			else{
				$this->data['Amenity']['kitchen_amenities'] = "";
			}
			
		}
	
	}
	
}
?>