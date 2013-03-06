<footer>
	<div id="footer_container">
		<div class = "inner_footer">
			<div class = "social_media"><a href = "http://www.facebook.com/ReservationResources"><?php echo $this->Html->image('icons/facebook.png', array('alt' => 'Facebook Profile')); ?></a> <a href = "http://twitter.com/R_CResources"><?php echo $this->Html->image('icons/twitter.png', array('alt' => 'Twitter Profile')); ?></a></div>
			<a href = "/"><?php echo $this->Html->image('logo_dark.png', array('id' => 'logo2', 'alt' => 'Reservation Resources')); ?></a>
			
			<nav>
				<ul>
					<li><a href = "<?php echo $this->webroot; ?>">Home</a></li>
					<li><a href = "http://blog.reservationresources.com">Blog</a></li>
					<li><a href = "http://support.reservationresources.com">Support</a></li>
					<!-- <li><a href = "#">Top Properties</a></li> -->
					<!-- <li><a href = "#">Blog</a></li> -->
					<!-- <li><a href = "#">FAQs</a></li> -->
					
				</ul>
				<ul>
					<!-- <li><a href = "#">How it Works</a></li> -->
					<!-- <li><a href = "#">Safety</a></li> -->
					<!-- <li><a href = "#">Support</a></li> -->
					<li><a href = "<?php echo $this->webroot; ?>pages/terms">Terms of Service</a></li>
					<li><a href = "<?php echo $this->webroot; ?>pages/privacy">Privacy Policy</a></li>
					<li><a href = "<?php echo $this->webroot; ?>pages/dmca">DMCA</a></li>
				</ul>
				<ul>
					<!-- <li><a href = "#">How it Works</a></li> -->
					<!-- <li><a href = "#">Safety</a></li> -->
					<!-- <li><a href = "#">Support</a></li> -->
					<li><?php echo $this->Html->link('New York',array('controller'=>'searches','action'=> 'vacation-rentals-new-york-city','ext'=>'html')); ?></li>
					<li><?php echo $this->Html->link('San Francisco',array('controller'=>'searches','action'=> 'vacation-rentals-San-Francisco','ext'=>'html')); ?></li>
					<li><?php echo $this->Html->link('Miami',array('controller'=>'searches','action'=> 'vacation-rentals-Miami','ext'=>'html')); ?></li>
				</ul>
				<ul>
					<!-- <li><a href = "#">How it Works</a></li> -->
					<!-- <li><a href = "#">Safety</a></li> -->
					<!-- <li><a href = "#">Support</a></li> -->
					<li><?php echo $this->Html->link('Orlando',array('controller'=>'searches','action'=> 'vacation-rentals-orlando','ext'=>'html')); ?></li>
					<li><?php echo $this->Html->link('Los Angeles',array('controller'=>'searches','action'=> 'vacation-rentals-los-angeles','ext'=>'html')); ?></li>
					<li><?php echo $this->Html->link('San Diego',array('controller'=>'searches','action'=> 'vacation-rentals-San-Diego','ext'=>'html')); ?></li>
				</ul>
			</nav>
			<p>
				<em>Reservation Resources is an online platform that connects tenants and landlords from all around the world. We help people seeking a short-term rental to find landlords looking to rent out their houses, apartments, condominiums and other housing properties. </em>
			</p>
			<div id="copyrightFooter">
				<div xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Organization"> 
				Copyright &copy; <?php echo Date('Y'); ?> <span property="v:name">Reservation Resources</span> | 
				<span rel="v:address">
					<span typeof="v:Address">
						<span property="v:street-address">110 West 34th St. Ste 1102</span>,
						<span property="v:locality">New York</span>,
						<span property="v:region">NY</span> 
						<span property="v:postal-code">10001</span>
					</span>
				</span>
				<span rel="v:geo">
					<span typeof="v:Geo">
						<span property="v:latitude" content="40.740619"></span>
						<span property="v:longitude" content="-74.032729"></span>
					</span>
				</span>
				</div>		
			</div>
		</div>
	</div>
</footer>