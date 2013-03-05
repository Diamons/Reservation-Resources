<?php 
	$this->start('scriptBottom');
		echo $this->Html->script('main_page'); 
	$this->end();
	$this->start('cssTop');
		echo $this->Html->css('main_page');
	$this->end();
	
	$this->viewVars['showSearch'] = false;
        echo $this->Html->meta('description','Find short term housing, sublet, lodging or a room in exotic locations for your next vacation. Get more space and experience local culture.');
		echo $this->Html->meta("keywords", "vacation rental homes, short term apartments, room for rent, lodging, sublets, place to stay, book hotel, housing");
?>
<script>
	$(document).ready(function(){
		$("#bigGreenSearchButton, a input.listmyspace").height($("#searchMain").outerHeight());
	});
</script>

<div class="row-fluid main_search inner">
	<div style="padding-top:15px;" class="span9">
		<h1>Search for Places to Stay</h1>
		<input id="searchMain" placeholder="Start searching by zip code, city, or country here..." type="text" />
		<input type="button" id = "bigGreenSearchButton" class="search_button btn btn-large btn-success" value="Search Places to Stay" />
	</div>
	<div style="padding-top:15px;" class="action span3">
		<h1>List your Space</h1>
		<a href = "<?php echo $this->webroot."properties" ?>"><input type="button" class="listmyspace btn btn-large btn-danger" value="List my Space" /></a>
	</div>
</div>
<div class="row-fluid inner">
	<div class="span9">
		<div id="myCarousel" class="carousel slide">
       	<div class="carousel-inner">
	  <div class="item">
		<?php echo $this->Html->image('/img/home/1.jpg', array('alt' => 'Beautiful sunset in New York City')); ?>
		<div class="carousel-caption">
		  <h4>Sun Setting Down in New York City</h4>
		  <p>There's nothing better than ending the day with a view of the big apple's sun going down.</p>
		</div>
	  </div>
	  <div class="item active">
			<?php echo $this->Html->image('/img/home/home5.jpg', array('alt' => 'Beautiful Home with a Beautiful View')); ?>
		<div class="carousel-caption">
		  <h4>Beautiful Home in a Quiet Area with a Cozy Feel</h4>
		</div>
	  </div>
	  <div class="item">
		<?php echo $this->Html->image('/img/home/3.jpg', array('alt' => 'Central Park')); ?>
		<div class="carousel-caption">
		  <h4>Central Park</h4>
		  <p>Bask in the delights and hidden treatures of Central Park. In a city that's fast paced faced, Central Park is an oasis in a concrete jungle.</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/4.jpg', array('alt' => 'Theater District')); ?>
		<div class="carousel-caption">
		  <h4>Theater District</h4>
		  <p>Broadway's latest and greatest pack the streets in the Theater District and there's no bettber way to be a part of the action than to live right next to it!</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home8.jpg', array('alt' => 'A Quiet Brownstone')); ?>
		<div class="carousel-caption">
		  <h4>Beautiful Living Quarters</h4>
		</div>
	  </div>
	</div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><?php echo $this->Html->image('icons/arrow_left.gif', array('alt' => 'Left Arrow')); ?></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><?php echo $this->Html->image('icons/arrow_right.gif', array('alt' => 'Right Arrow')); ?></a>
          </div>
	</div>
	<div class="action span3">
	<h2>Why Reservation Resources?</h2>
		<div class="inner">
			<p>
				<h3>Search from thousands, not hundreds</h3>
				Search thousands of places to stay from all over the world with Reservation Resources. 
			</p>
			<p>
				<h3>Quick and Easy!</h3>
				Reservation Resources makes renting and staying at a place as easy as 1 - 2 - 3. From the moment you book a room, rest assured you're in for a long and comforting stay.
			</p>
			<p>
				<h3>Safe, Fun, and Exciting!</h3>
				Social integration as well as reputations and trust features are implemented into the system to ensure you know exactly where and who you're staying with.
			</p>
		</div>
	</div>
</div>
