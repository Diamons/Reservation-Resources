<?php
	$this->start('scriptBottom');
		echo $this->Html->script(array('../slider/slider.min', 'properties/viewproperty', 'smoothscroll')); 
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
				foreach($images['big'] as $key => $value){
					echo $this->Html->image('../images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/thumbnails/'.$images['small'][$key],array('url'=>'/images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/'.$images['big'][$key]));
				}
				?>
			</div>
		</div>
		<div class = "span5">
			<div class = "property_info">
				<div>
					<h1><?php echo $property['Property']['title'];?> <span>(<?php echo $property['Property']['city']?> ,<?php echo $property['Property']['state']?> )</span></h1>

					<p><?php echo nl2br($property['Property']['description']); ?></p>
				</div>
				<a href = "#"><div class = "book_now">
					Book Now
					<h2>(Starting at $79 a night)</h2>
				</div></a>
			</div>
		</div>
		<div class = "span12 row-fluid"  id = "contact_card">
			<div class = "span6">
				<?php echo $this->Html->image('icons/calendar.png'); ?> 
				<h3>Quick Book</h3> 
				<div class = "big_date"><?php echo $this->Form->create('Reservation', array('inputDefaults' => array('div' => false, 'label' => false)));
					echo $this->Form->input('Check In', array('class' => 'checkin', 'placeholder' => 'Check In Date'));
					echo $this->Form->input('Check Out', array('class' => 'checkout', 'placeholder' => 'Check Out Date'));
						$guestsCount = array(1 => '1 Guest', 2 => '2 Guests', 3 => '3 Guests', 4 => '4 Guests', 5 => '5 Guests');
					echo $this->Form->input('Guests',array('options'=>$guestsCount,'default'=>1));
				?>
				</div>
				<div class = "big_date">
					<span id = "price">$179</span>
				</div>
				<div class = "small">
					Reservation Resources fee not included
				</div>
				<a href = "#">
					<div class = "book_now small_book">
						Book Now
					</div>
				</a>
			</div>
			<div class = "profile span6">
			<a name = "hostprofile"></a>
				<h3>Shahruk Khan Profile</h3> 
				<div class = "row-fluid">
					<div class = "span4"><?php echo $this->Html->image('http://a2.muscache.com/users/30990/profile_pic/1337535972/square_225.jpg'); ?> </div>
					<div class = "span4">
						<div>99% Approval</div>
						<div>55 Other Listings</div>
						<div>100% Response Rate</div>
					</div>
					<div class = "span4">
						<a href = "#"><div class = "contact_me">
							Contact
						</div></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class = "inner row-fluid">
		<div class = "span8">
		<a name = "availability"></a>
			<h1 class = "calendar">Availability Calendar</h1>
			<div id = "calendar">
			</div>
		</div>
		<div name = "location" class = "renter span4">
		<a name = "location"></a>
			<h1>Location Details</h1>
			<div id = "map_canvas"></div>
		</div>
	</div>
	<div id = "property_moreinfo" class = "row-fluid inner">
		<div class = "span8">
		<a name = "basic"></a>
			<h1>Basic Details</h1>
			<section>
				<h1><span class="label label-info">House Rules</span></h1>
				<p><?php echo nl2br($property['Property']['house_rules']); ?></p>

			</section>
			<hr />
			<section>
				<h1><span class="label label-success">Booking Rates</span></h1>
				<table>
					<tr class = "prices"><td><?php if(!empty($property['Property']['price_per_night'])){echo "$".$property['Property']['price_per_night'];}else{echo "N/A";} ?></td><td><?php if(!empty($property['Property']['price_per_week'])){echo "$".$property['Property']['price_per_week'];}else{echo "N/A";} ?></td><td><?php if(!empty($property['Property']['price_per_month'])){echo "$".$property['Property']['price_per_month'];}else{echo "N/A";} ?></td></tr>
					<tr class = "time"><td>Per night</td><td>Per week</td><td>Per month</td></tr>
				</table>
				<div class = "fees">
					<b style = "font-style: italic;">Fees</b>: Guest Fee <b>(+$25)</b>, Cleaning Fee <b>(+$25)</b>, Pet Fee <b>(+$5)</b>, Utilities Fee <b>(+$25)</b>
				</div>
			</section>
			
		</div>
		<div class = "amenities span4">
		<a name = "amenities"></a>
			<h1>Amenities and Other Accommodations</h1>
			<?php echo $this->Html->image('icons/bed.png'); ?>
			<ul class = "bed_type amenities_list">
				<li>Single</li>
				<li>Double</li>
				<li>Twin</li>
			</ul>
			<?php echo $this->Html->image('icons/service.png'); ?>
			<ul class = "amenities_list">
				<li>WiFI</li>
				<li>Internet</li>
				<li>Television</li>
				<li>Cable</li>
				<li>Washer</li>
			</ul>
			<?php echo $this->Html->image('icons/kitchen.png'); ?>
			<ul class = "kitchen amenities_list">
				<li>Refrigerator</li>
				<li>Stove</li>
				<li>Microwave</li>
				<li>Coffee Maker</li>
				<li>Toaster</li>
			</ul>
		</div>
	</div>
	<div id = "property_booking" class = "row-fluid inner">
		<div class = "span4">
			<h1>Similar Listings</h1>
			
		</div>
		<div class = "span8">
		<a name = "reviews"></a>
			<h1>User Reviews</h1>
			<div class = "row-fluid comment">
				<div class = "span4">
					<?php echo $this->Html->image('http://a2.muscache.com/users/30990/profile_pic/1337535972/square_225.jpg'); ?> 
					<h1>Shahruk Khan</h1>
					<div class = "text">
						Posted April 2012<br />
						Rating: 
					</div>
				</div>
				<div class = "span8">
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
				</div>
			</div>

		</div>
	</div>
</div>

