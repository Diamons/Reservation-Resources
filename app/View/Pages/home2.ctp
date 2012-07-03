<?php $this->start('cssTop');
	echo $this->Html->css('fonts/fontawesome/css/font-awesome');
$this->end();
$this->start('scriptBottom');
		echo $this->Html->script('main_page'); 
	$this->end();
?>
<div id="myCarousel" class="carousel slide">
	<div class="carousel-inner">
	  <div class="item">
		<img src="http://www.zastavki.com/pictures/1280x800/2009/Interior_Design_of_rooms_with_a_fireplace_012365_.jpg" alt="">
		<div class="carousel-caption">
		  <h4>First Thumbnail label</h4>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	  </div>
	  <div class="item active">
		<img src="http://www.zastavki.com/pictures/1280x800/2009/Interior_Design_of_rooms_with_a_fireplace_012365_.jpg" alt="">
		<div class="carousel-caption">
		  <h4>Second Thumbnail label</h4>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	  </div>
	  <div class="item">
		<img src="http://www.smoothdivscroll.com/images/demo/gnome.jpg" alt="">
		<div class="carousel-caption">
		  <h4>Third Thumbnail label</h4>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		</div>
	  </div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="../img/icons/arrow_left.gif" /></a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="../img/icons/arrow_right.gif" /></a>
  </div>
<div class="inner" id = "banners">
	<h2> As Seen on </h2>
	<img src="../img/press/cnn-bw.png" />
	<img src="../img/press/nbc-bw.png" />
	<img src="../img/press/newsweek-bw.png" />
	<img src="../img/press/tech-crunch-bw.png" />
	<img src="../img/press/the-new-york-times.png" />
	<img src="../img/press/wall-street-journal.png" />
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