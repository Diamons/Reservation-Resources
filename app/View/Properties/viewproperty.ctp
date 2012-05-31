<?php
	$this->start('scriptBottom');
		echo $this->Html->script(array('../slider/slider.min', 'properties/viewproperty')); 
	$this->end();
?>
<?php 
	$this->start('cssTop');
	echo $this->Html->css(array('properties/viewproperty'));
	$this->end();
?>
<div id = "body" role = "main">
	<div class = "row-fluid">
		<div class = "property_panel span7">
			<div id="gallery">
				<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a><a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a>
				<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="Another title" data-description="My <em>HTML</em> description"></a>
			</div>
		</div>
		<div class = "span5">
			<div class = "property_info">
				<div>
					<h1>Beautiful Apartment Located Upper west Side Access to Kitchen and Stuff</h1>

					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
				</div>
				<a href = "#"><div class = "book_now">
					Book Now
					<h2>(Starting at $79 a night)</h2>
				</div></a>
			</div>
		</div>
		<div class = "span12 row-fluid"  id = "contact_card">
			<div class = "span3">
				<?php echo $this->Html->image('icons/calendar.png'); ?> 
				<h3>Available From</h3> 
				<div class = "big_date">07/19/12</div>
			</div>
			<div class = "span3">
			<?php echo $this->Html->image('icons/calendar.png'); ?> 
				<h3>Available To</h3> 
				<div class = "big_date">09/19/12</div>
			</div>
			<div class = "profile span6">
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
	<div id = "property_body" class = "row-fluid inner">
		<div class = "span8">
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
		<div class = "span4">
			<h1>Location Details</h1>
			<div id = "map_canvas"></div>
		</div>
	</div>
</div>

