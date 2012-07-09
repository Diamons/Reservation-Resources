<?php 
	$this->start('scriptBottom');
		echo $this->Html->script('main_page'); 
	$this->end();
	$this->start('cssTop');
		echo $this->Html->css('main_page');
	$this->end();
?>
<div class="row-fluid main_search inner">
	<div style="padding-top:15px;" class="span9">
		<h1>Search for Places to Stay: </h1>
		<input id="searchMain" placeholder="Start searching by zip code, city, or country here..." type="text" />
		<input type="button" id = "bigGreenSearchButton" class="search_button btn btn-large btn-success" value="Search Places to Stay" />
	</div>
	<div class="action span3">
		<h1>List your Space</h1>
		Have a spare room to rent? A couch laying around and gathering dust?
		
		<input type="button" class="listmyspace btn btn-large btn-danger" value="List my Space" />
	</div>
</div>
<div class="row-fluid inner">
	<div class="span9">
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
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="img/icons/arrow_left.gif" /></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="img/icons/arrow_right.gif" /></a>
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
				Reservation Resources makes it renting and staying at a place as easy as 1 - 2 - 3. From the moment you book a room, rest assured you're in for a long and comforting stay.
			</p>
			<p>
				<h3>Safe, Fun, and Exciting!</h3>
				Social integration as well as reputations and trust features are implemented into the system to ensure you know exactly where and who you're staying with.
			</p>
		</div>
	</div>
</div>
