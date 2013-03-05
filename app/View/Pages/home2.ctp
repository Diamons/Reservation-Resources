<?php $this->start('cssTop');
	echo $this->Html->css('fonts/fontawesome/css/font-awesome');
$this->end();
$this->start('scriptBottom');
		echo $this->Html->script('main_page'); 
	$this->end();
		echo $this->Html->meta('description','Find short term housing, sublet, lodging or a room in exotic locations for your next vacation. Get more space and experience local culture.');
		echo $this->Html->meta('keywords', "vacation rental homes, short term apartments, room for rent, lodging, sublets, place to stay, book hotel, housing");
	
?>


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
<div class="inner" id = "banners">
	<h2> As Seen on </h2>
	<a href="http://www.abc12.com/story/19392189/reservationresourcescom-unveils-website-redesign"><?php echo $this->Html->image('press/abc-bw.png', array('alt' => 'As seen on ABC News')); ?></a>
	<a href="http://www.cbs8.com/story/19392189/reservationresourcescom-unveils-website-redesign"><?php echo $this->Html->image('press/cbs-bw.png', array('alt' => 'As seen on CBS News')); ?></a>
	<a href="http://www.nbc29.com/story/19392189/reservationresourcescom-unveils-website-redesign"><?php echo $this->Html->image('press/nbc-bw.png', array('alt' => 'As seen on NBC News')); ?></a>
	<a href="http://news.yahoo.com/reservationresources-com-unveils-website-redesign-071902106.html"><?php echo $this->Html->image('press/yahoo-bw.png', array('alt' => 'As seen on Yahoo News')); ?></a>
</div>
<div class = "full" id = "body" role="main">
	<div class="inner row-fluid" id = "features">
		<a href="#">
			<div class="row-fluid span4">
				<div class="span4">
					<i class="image-globe"></i>
				</div>
				<div class="text span8">
					Travel Anywhere, Explore Everywhere
				</div>
			</div>
		</a>
		<div class="span4">
		
		</div>
		<div class="span4">
		
		</div>
	</div>
</div>