<?php 
	$this->start('scriptBottom');
	echo $this->Html->script('main_page');
	$this->end();
	$this->start('cssTop');
	echo $this->Html->css('main_page');
	$this->end();
?>
<div id = "main_slider">
	<div id = "slider_images">
		<div data-price = "$200" data-location = "New York City, NY" style = "background-image: url('http://farm6.staticflickr.com/5284/5344607573_3a6dcdd76e_o.jpg'); background-position: 140px -240px;" class = "image"></div>
		<div data-price = "$100" data-location = "Washington D.C." style = "background-image: url('http://farm3.staticflickr.com/2724/4260668021_0191a5fe07_b.jpg'); background-position: 0 -200px;" class = "image"></div>
		<div data-price = "$160" data-location = "Fort Lauderdale, FL" style = "background-image: url('http://farm6.staticflickr.com/5066/5829442256_376d379d1b_b.jpg'); background-position: 0 -200px;" class = "image"></div>
	</div>
	
	<?php
	/* PORTION A */
	/* PORTION A */
	/* PORTION A */
	/* PORTION A */
	/* PORTION A */
	
	if(1 == 1){ ?>
		<div id = "captions">
			<div class = "caption">Starting at <em><span id = "price">$100</span> a night</em><br />
				<span id = "location">New York City, NY</span>
			</div>		
		</div>
	<?php } ?>
	<?php 
	/* PORTION B */
	/* PORTION B */
	/* PORTION B */
	/* PORTION B */
	/* PORTION B */
	
	if(1 !== 1){ ?>
	<div id = "captions">
		 <span class = "caption">Landlords and Hosts list <em>properties</em></span><br />
		 <span style = "margin-top: 22px;" class = "caption">Tenants book places to <em>stay</em></span><br /> 
	</div>
	<?php } ?>
	
	<div id = "searchBar">
		<form class = "formee">
			<div class="grid-12-12">
				<label style = "font-size: 12pt;">What's your destination?</label>
				<input type = "text" id = "searchField" placeholder = "Search by Location " />
			</div>
			<input type = "submit" title = "search" value = "search" />	
		</form>
	</div>
</div>
<div id = "banners">
	<a href = "#">
		<?php echo  $this->Html->image('icons/explore_world.png', array('class' => 'banner')); ?>
		<?php echo  $this->Html->image('icons/absolutely_free.png', array('class' => 'banner')); ?>
		<?php echo  $this->Html->image('icons/new_experience.png', array('class' => 'banner')); ?>
	</a>
</div>
<div class = "full" id = "body" role="main">
	<div id = "features">
		<div>
		
			<h1 class = "letter">How it Works</h1>
			<div class = "feature_individual">
				<h1>Search for where you want to stay</h1>
				Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site!
				<h1>Browse, explore, and communicate</h1>
				View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.
				<h1>Rent and manage your vacation online</h1>
				With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!
			</div>
			<div class = "howitworks sprite"></div>
			
		</div><div>
		
			<h1 class = "letter">Features</h1>
			<div class = "feature_individual">
				<h1>Search for where you want to stay</h1>
				Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site!
				<h1>Browse, explore, and communicate</h1>
				View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.
				<h1>Rent and manage your vacation online</h1>
				With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!
			</div>
			<div class = "features sprite"></div>
			
		</div><div>
		
			<h1 class = "letter">Benefits</h1>
			<div class = "feature_individual">
				<h1>Search for where you want to stay</h1>
				Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site!
				<h1>Browse, explore, and communicate</h1>
				View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.
				<h1>Rent and manage your vacation online</h1>
				With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!
			</div>
			<div class = "benefits sprite"></div>
		</div>
	</div>
</div>