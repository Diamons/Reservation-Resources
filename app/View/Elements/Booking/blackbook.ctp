<?php 

echo $this->Form->create('Booking',array('class'=>'formee'));
echo $this->Form->input('start_date');
echo $this->Form->input('end_date');
$options = array('A1vacations'=>'A1vacations','craigslist'=>'Craigslist','cyber_rentals'=>'Cyber Rentals','great_rentals'=>'Great Rentals','home_away'=>'Home Away','home_away_connect'=>'Home Away Connect','homepage'=>'Homepage(direct)','offline_source'=>'Offline Source','VRBO'=>'VRBO','Airbnb'=>'Airbnb','room_lender'=>'Room Lender','other'=>'Other');
echo $this->Form->input('reason',array('options'=>$options,'label'=>'Booked Using'));
echo $this->Form->input('comment',array('label'=>'Additional Notes'));
echo $this->Form->input('property_id',array('type'=>'hidden','value'=>$pid));
echo $this->Form->input('status',array('type'=>'hidden','value'=>'0'));
echo $this->Form->end();

?>
<input type = "button"  class = "btn btn-large btn-success availability"  value = "Available" data-status = "2" >
<input type = "button" class = "btn btn-large btn-danger availability" value = "Not Available" data-status = "1" >