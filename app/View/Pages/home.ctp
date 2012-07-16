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
		
		<a href = "<?php echo $this->webroot."properties" ?>"><input type="button" class="listmyspace btn btn-large btn-danger" value="List my Space" /></a>
	</div>
</div>
<div class="row-fluid inner">
	<div class="span9">
		<div id="myCarousel" class="carousel slide">
       	<div class="carousel-inner">
	  <div class="item">
		<?php echo $this->Html->image('/img/home/home1.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Beautiful vacation rental baja california</h4>
		  <p>Luxury vacation rental in the heart of baja.</p>
		</div>
	  </div>
	  <div class="item active">
			<?php echo $this->Html->image('/img/home/home2.jpg'); ?>
		<div class="carousel-caption">
		  <h4>On the beach</h4>
		  <p>Relax and enjoy our beautiful sunsets! Just one hour south of San Diego. </p>
		</div>
	  </div>
	  <div class="item">
		<?php echo $this->Html->image('/img/home/home3.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Private House</h4>
		  <p>Family constructed home</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home4.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Private Retreat</h4>
		  <p>Welcome to luxury</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home5.jpg'); ?>
		<div class="carousel-caption">
		  <h4>The place to stay and enjoy</h4>
		  <p>For the guest</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home6.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Cozy and modern</h4>
		  <p>The kitchen is fully equipped, crockery and utensils are included. Continental breakfast is included too.</p>
		</div>
	  </div>	  <div class="item">
		<?php echo $this->Html->image('/img/home/home7.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Come relax</h4>
		  <p>In the heart of brazil</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home8.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Enjoy your stay upstate NY</h4>
		  <p>Lovely place to stay and keep warm when it gets cold</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home9.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Gorgous luxury villa</h4>
		  <p>Coconut Grove,Fl</p>
		</div>
	  </div>
	  	  <div class="item">
		<?php echo $this->Html->image('/img/home/home10.jpg'); ?>
		<div class="carousel-caption">
		  <h4>Entire House</h4>
		  <p>California</p>
		</div>
	  </div>
	</div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><?php echo $this->Html->image('icons/arrow_left.gif'); ?></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><?php echo $this->Html->image('icons/arrow_right.gif'); ?></a>
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
