<?php 
	class Booking extends AppModel{
		public $name = 'Booking';
		public $belongsTo = 'Property';
		
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
}
	

?>