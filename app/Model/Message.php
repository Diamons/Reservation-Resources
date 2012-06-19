<?php
	class Message extends AppModel{
		public $name = 'Message';
		
		
		public function updateBooking($status){
			if($status == 'accept'){
				return 1;//booking accepted so those dates become unavailable
			}
			else{
				return 2;//booking declined those dates are available
			}
		}

	
	}
	

?>