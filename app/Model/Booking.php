<?php 
App::uses('CakeEmail', 'Network/Email');
App::import('model','Property');
App::import('model','Notification');

	class Booking extends AppModel{
		public $name = 'Booking';
		public $belongsTo =  array('Property','User');
		public $hasOne = array('Reservation');
		
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
	
	
	public function quickbook($checkin,$checkout,$guests,$daily,$weekly,$monthly,$guestprice,$fees = null){
		
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
				$totals['subtotal'] = number_format($this->getPrice($daily,$weekly,$monthly,$days,$weeks,$months)+($guests*$guestprice)+ $this->hostFeesRequired($fees),2);
				$sub = $this->getPrice($daily,$weekly,$monthly,$days,$weeks,$months)+($guests*$guestprice)+ $this->hostFeesRequired($fees);
				$totals['fee'] = number_format($this->rrfee($sub),2);
				$fee = $this->rrfee($sub);
				$totals['total'] = number_format($sub+$fee,2);
				return $totals;
			
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
	public function rrfee($subtotal = null){
		return $subtotal * FEE;
	}
	public function hostFeesRequired($fee = null){
		$totalfees = 0;
		foreach($fee as $key => $value){//lets add up all all fee totals except the first fee since that is the guest fee price
			if($key != 0 && $fee[$key]['required'] == true){
				$totalfees += $fee[$key]['fee_price'];
			}
		}
		
		return $totalfees;
	}
	public function updateBooking($status){
		if($status == 'accept'){
			return 1;//booking accepted so those dates become unavailable
		}
		else{
			return 2;//booking declined those dates are available
			}
		}
	public function sendNotification($pid,$template,$subject){//this will send notification to property Owner
			$property = new Property();
			$notification = new Notification();
			$owner = $property->read(null,$pid);
			$email = new CakeEmail('smtp');
			$email->viewVars(array('first' => $owner['User']['first_name'],'last' => $owner['User']['last_name'],'messagetitle'=>'Your property has been booked','action'=>'http://reservationresources.com'));
			$email->template($template, 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($owner['User']['username'])->subject($subject)->send(); 
			//lets also send a notification to the landlords dashboard.
			$notification->setNotification($owner['User']['id'],3,'#managebookings','You have a new paid booking request please respond promptly','New Booking','Click here to accept/reject booking');
			$notification->save();
	
	}
	public function notifyGuest($username,$template,$subject){
			$email = new CakeEmail('smtp');
			$email->viewVars(array('messagetitle' =>'Host Booking Response','action'=>'http://reservationresources.com'));
			$email->template($template, 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($username)->subject($subject)->send(); 
	
	}
}
	

?>