<?php 
	class Booking extends AppModel{
		public $name = 'Booking';
		public $belongsTo =  array('Property','User');
		
	public function beforeSave() {
		if (!empty($this->data['Booking']['start_date']) && !empty($this->data['Booking']['end_date'])) {
			$this->data['Booking']['start_date'] = $this->dateFormatBeforeSave($this->data['Booking']['start_date']);
			$this->data['Booking']['end_date'] = $this->dateFormatBeforeSave($this->data['Booking']['end_date']);
		}
		return true;
	}

	public function dateFormatBeforeSave($dateString) {
		return date('Y-m-d', strtotime($dateString));
	}
	
	
	public function quickbook($checkin,$checkout,$guests,$daily,$weekly,$monthly){
		
			$weeks = $this->getDates($checkin,$checkout,"week");
			$months = $this->getDates($checkin,$checkout,"month");
			$days = $this->getDates($checkin,$checkout,"day",false);
			if($daily == null){//if no daily price is set then calculate as weekly price
					
					if($weekly == null){
					
						$daily = round($monthly/30);
						
						$days = $this->getDates($checkin,$checkout,"day",true);
					
					}else{
						$daily = round($weekly/7);
						$days = $this->getDates($checkin,$checkout,"day",false);
						if($months >= 1){
							$weeks = 0;
							$days = $this->getDates($checkin,$checkout,"day",true);
						}
					}
		
			}
			
				return $this->getPrice($daily,$weekly,$monthly,$days,$weeks,$months);
			
		}
		public function getDates($checkin,$checkout,$type,$check = null){
			$checkin = new DateTime($checkin);
			$checkout = new DateTime($checkout);
			$interval = date_diff($checkin,$checkout);
			
			switch($type){
				case "day":
				
					if($check == true){
					return $interval->d ;
					}
					else{
						return $interval->days % 7 ;
					}
					
					break;
					
				case "month":
					return $interval->m;
					break;
				
				case "week":
					return  floor($interval->days / 7); //only want whole number of week so we take the floor number;
					break;
				case "interval":
					return $interval->days;
					break;
			
			}
			
		}
		public function getPrice($daily = 0,$weekly = 0,$monthly = 0,$days = 0,$weeks = 0,$months = 0,$guest = null){
			$price = ($monthly*$months)+($weekly*$weeks)+($daily*$days);
			return $price;
		}
}
	

?>