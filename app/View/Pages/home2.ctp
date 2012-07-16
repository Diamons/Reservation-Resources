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
<div class="inner" id = "banners">
	<h2> As Seen on </h2>
	<?php echo $this->Html->image('press/cnn-bw.png'); ?>
	<?php echo $this->Html->image('press/newsweek-bw.png'); ?>
	<?php echo $this->Html->image('press/tech-crunch-bw.png'); ?>
	<?php echo $this->Html->image('press/the-new-york-times.png'); ?>
	<?php echo $this->Html->image('press/wall-street-journal.png'); ?>

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