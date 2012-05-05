<?php 
	$this->start('scriptBottom');
	echo $this->Html->script('main_page');
	$this->end();
	$this->start('cssTop');
	echo $this->Html->css('main_page');
	$this->end();
?>
<div id = "main_slider">
	<div id = "captions">
		<span class = "caption">Landlords and Hosts list <em>properties</em></span><br />
		 <span style = "margin-top: 22px;" class = "caption">Tenants book places to <em>stay</em></span><br /> 
	</div>
	<div id = "searchBar">
		<form class = "formee">
			<div class="grid-12-12">
				<label style = "font-size: 12pt;">What's your destination?</label>
				<input type = "text" placeholder = "Search by Location " />
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
					<p>
						<ul>
							<li>Search for where you want to stay</li>
							<p>Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site! </p>
							<li>Browse, explore, and communicate</li>
							<p>View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.</p>
							<li>Rent and manage your vacation online</li>
							<p>With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!</p>
						</ul>
					</p>
				</div>
		</div><div>
			<h1 class = "letter">Features</h1>
			<div class = "feature_individual">
				<p>
					<ul>
						<li>Search for where you want to stay</li>
						<p>Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site! </p>
						<li>Browse, explore, and communicate</li>
						<p>View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.</p>
						<li>Rent and manage your vacation online</li>
						<p>With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!</p>
					</ul>
				</p>
			</div>
		</div><div>
			<h1 class = "letter">Benefits</h1>
			<div class = "feature_individual">
				<p>
					<ul>
						<li>Search for where you want to stay</li>
						<p>Start off with a simple search query for where you're looking for a place to stay! Reservation Resources allows you to search over <span class = "important">10,000</span> listings all from one site! </p>
						<li>Browse, explore, and communicate</li>
						<p>View various listings in locations from all over the world posted by members like you! Send messages with questions, search by property type and price, and view stunning pictures for rentals all in your budget.</p>
						<li>Rent and manage your vacation online</li>
						<p>With a few clicks, you can rent out the places you see online straight from your computer. Await confirmation from the landlord and you're all set!</p>
					</ul>
				</p>
			</div>
		</div>
	</div>
</div>