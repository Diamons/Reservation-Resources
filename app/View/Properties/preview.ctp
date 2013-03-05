<?php 
	
	//Debugger::log($property);
?>

<?php
	$this->start('scriptBottom');
		echo $this->Html->script(array('../slider/slider.min','jquery.raty.min', 'properties/viewproperty', 'smoothscroll')); 
	
	$this->end();
?>
<?php 
	
	$this->start('cssTop');
	echo $this->Html->css(array('properties/viewproperty'));
	$this->end();
	

?>
<div id = "body" role = "main">
	<nav class = "internal">
		<ul class = "clearfix">
			<li><a href = "#hostprofile">Host Profile</a></li>
			<li><a href = "#availability">Availability Calendar</a></li>
			<li><a href = "#location">Location Details</a></li>
			<li><a href = "#basic">Basic Details</a></li>
			<li style = "color:#ffaa5f;"><a href = "#basic">Booking Rates</a></li>
			<li><a href = "#amenities">Amenities and Other Accommodations</a></li>
			<li><a href = "#reviews">User Reviews</a></li>
		</ul>
	</nav>
	
	<div class = "inner row-fluid">
		<div class = "property_panel span7">
			<div id="gallery">
				<!--<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a>
				<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="Another title" data-description="My <em>HTML</em> description"></a>-->
				<?php 
				foreach($property['images'] as $key => $value){
				
					echo $this->Html->image($property['images'][$key]['full'],array('fullBase'=>true));
				}
				?>
			</div>
		</div>
		<div class = "span5">
			<div class = "property_info">
				<div>
					<h1><?php echo $property['heading'];?> <span>(<?php echo $property['annotations']['source_loc']?> ,<?php echo $property['annotations']['source_state']?> )</span></h1>

					<p><?php echo $property['body']; ?></p>
				</div>
				<a href = "javascript:void(0);"   ><div data-index= "<?php echo $index; ?>" class = "contact_me book_now">
					Contact Me Before Booking
			
				</div></a>
			</div>
		</div>
		<!--<div class = "span12 row-fluid"  id = "contact_card">
			<div class = "span6">
				<?php echo $this->Html->image('icons/calendar.png'); ?> 
				<h3>Quick Book Not Available</h3> 
			<!--	<div class = "big_date"><?php //echo $this->Form->create('Booking', array('inputDefaults' => array('div' => false, 'label' => false),'action'=>'bookroom/'.$property['Property']['id'],'id'=>'easyBookForm'));
					//echo $this->Form->input('start_date', array('type'=>'text','onChange'=>'javscript:quickbook();','class' => 'checkin', 'placeholder' => 'Check In Date'));
					//echo $this->Form->input('end_date', array('type'=>'text','onChange'=>'javascript:quickbook();','class' => 'checkout', 'placeholder' => 'Check Out Date'));
						//$guestsCount = array(0 => '0 Guest', 1 => '1 Guest', 2 => '2 Guests', 3 => '3 Guests', 4 => '4 Guests', 5 => '5 Guests');
					//echo $this->Form->input('guest',array('options'=>$guestsCount,'default'=>0,'onChange'=>'quickbook()'));
					//echo $this->Form->input('property_id',array('type'=>'hidden','value'=>$property['Property']['id']));
					//echo $this->Form->end();
				?>
				</div>-->
				<div class = "big_date">
					<span id = "price"></span>
				</div>
				<div class = "small">
					<!--Subtotal-->
				</div>
				<!--<a  id = "easybook">
					<!--<div  class = "book_now small_book">-->
					<!--<div class = "contact_me">
						contact me before booking
					</div>
				</a>-->
			</div>

	</div>
	<div class = "inner row-fluid">
		<div class = "span8">
		<a name = "availability"></a>
			<h1 class = "calendar">Availability Calendar</h1>
			<div id = "calendar" style = "display:block;">
					<?php
						echo $this->element('calendar',array('dates'=>$property['Booking'],'pid'=>$property['Property']['id']));
					?>
			</div>
		</div>
		<div name = "location" class = "renter span4">
		<a name = "location"></a>
			<h1>Location Details</h1>
			<div id = "map_canvas" data-lat = "<?php echo  $property['location']['latitude']; ?>" data-long = "<?php echo  $property['location']['longitude']; ?>"></div>
		</div>
	</div>
	<div id = "property_moreinfo" class = "row-fluid inner">
		<div class = "span8">
		<a name = "basic"></a>
			<h1>Basic Details</h1>
			<section>
				<h1><span class="label label-info">House Rules</span></h1>
				<p><?php echo  "N/A"; ?></p>

			</section>
			<hr />
			<section>
				<h1><span class="label label-success">Booking Rates</span></h1>
				<table>
					<tr class = "prices"><td><?php if(!empty($property['price'])){echo "$".$property['price'];}else{echo "N/A";} ?></td><td><?php if(!empty($property['Property']['price_per_week'])){echo "$".$property['Property']['price_per_week'];}else{echo "N/A";} ?></td><td><?php if(!empty($property['Property']['price_per_month'])){echo "$".$property['Property']['price_per_month'];}else{echo "N/A";} ?></td></tr>
					<tr class = "time"><td>Per night</td><td>Per week</td><td>Per month</td></tr>
				</table>
				<div class = "fees">
					<b style = "font-style: italic;">Fees</b>: <?php  echo "N/A"; ?> <!--Cleaning Fee <b>(+$25)</b>, Pet Fee <b>(+$5)</b>, Utilities Fee <b>(+$25)</b>-->
				</div>
			</section>
			
		</div>
		<div class = "amenities span4">
		<a name = "amenities"></a>
			<h1>Amenities and Other Accommodations</h1>
			<?php
			if(!empty($property['Amenity']['bedroom_amenities'][0])){
				echo $this->Html->image('icons/bed.png');
				Debugger::log($property['Amenity']);
			?>
			<ul class = "bed_type amenities_list">
				<?php foreach($property['Amenity']['bedroom_amenities'] as $key => $value ){?>
				<li><?php echo $property['Amenity']['bedroom_amenities'][$key];?> </li>
					<?php }?>
			</ul>
			<?php }?>
			<?php
			if(!empty($property['Amenity']['electronic_amenities'][0])){
				echo $this->Html->image('icons/service.png'); 
			
			?>
			<ul class = "amenities_list">
				<?php foreach($property['Amenity']['electronic_amenities'] as $key => $value){?>
				<li><?php echo $property['Amenity']['electronic_amenities'][$key]; ?></li>
				<?php }?>
			</ul>
			<?php } ?>
			<?php 
			if(!empty($property['Amenity']['kitchen_amenities'][0])){
				echo $this->Html->image('icons/kitchen.png'); 
				?>
			<ul class = "kitchen amenities_list">
				<?php foreach ($property['Amenity']['kitchen_amenities'] as $key => $value){?>
				<li><?php echo $property['Amenity']['kitchen_amenities'][$key]; ?></li>
				<?php }?>
			</ul>
			<?php }?>
		</div>
	</div>
	<div id = "property_booking" class = "row-fluid inner">
		<div class = "span4">
			<h1>Similar Listings</h1>
			
		</div>
		<div class = "span8">
		<a name = "reviews"></a>
		
			<h1>(0) User Reviews</h1><br/>
			Book now and be the first to leave a review!!!
			<!--<div>
			<?php if($reviewButton == true && $auth == true){ ?>
				<div style = "float:right;width:250px;" class="book_now small_book" id="comment"  data-pid = "<?php echo $property['Property']['id']; ?>" >Leave a  Review</div>
			<?php } ?>
			</div>
			<?php foreach ($property['Review'] as $key => $value ){?>
			<div class = "row-fluid comment">
				<div class = "span4">
					<?php 
					if(isset($property['Review'][$key]['User']['profile_picture'])){
							echo $this->Html->image($property['Review'][$key]['User']['profile_picture'],array('class'=>'commenter')); 
						}
						else{
						
							echo $this->Html->image('anonymous.jpg',array('class'=>'commenter'));
						}
					
					?> 
					<h1><?php echo $property['Review'][$key]['User']['first_name']. " ".$property['Review'][$key]['User']['last_name']; ?></h1>
					<div class = "text">
						Posted <?php echo date('F d Y',strtotime($property['Review'][$key]['created'])) ?><br />
						Rating: <div class = "score" data-rating= '<?php  echo $property['Review'][$key]['rating']; ?>' > </div> 
						
						

					</div>
				</div>
				<div class = "span8">
					<p><?php  echo $property['Review'][$key]['review']; ?>'</p>
	
				</div>
			</div>
			<?php }?>-->

		</div>
	</div>
</div>

