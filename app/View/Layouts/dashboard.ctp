<?php
	$cakeDescription = __d('cake_dev', 'Reservation Resources');
?>
<!DOCTYPE html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> - <?php echo $cakeDescription ?>
	</title>
	
	<meta name="description" content="">
	<meta name="author" content="Reservation Resources LLC">
	
	<?php 
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('bootstrap', 'bootstrap-responsive.min', 'formee-style', 'formee-structure', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/blitzer/jquery-ui.css', 'uniform.default', '../lightbox/shadowbox', '../tooltip/css/tooltip', 'main', 'stylesheet'));
		echo $this->Html->css(array('fonts/proxima/stylesheet'));
	?>
	<?php echo $this->fetch('cssTop'); ?>
	<?php echo $this->fetch('scriptTop'); ?>

	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDaGX-geU4Vus1VavcQYujOOy2z8Y14QQQ&sensor=false"></script>
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id = "container">
		<?php if(isset($auth) && $auth == true){
			echo $this->element('Layout\User\header');
		} else {
			echo $this->element('Layout\Guest\header');
		} ?>
	
		<div class = "inner row-fluid" id = "body">
			<div class = "span3">
				<div id = "dashboard" class = "well">
					<h1>Navigation</h1>
					<ul class="nav nav-list">
					  <li><a href="#"><i class="icon-home"></i> Home</a></li>
					  <li><a href="#"><i class="icon-info-sign"></i> About</a></li>
					  <li><a href="#"><i class="icon-comment"></i> Blog</a></li>
					</ul>
					<h1>Messages & Notifications</h1>
					<ul class="nav nav-list">
					  <li><a href="#inbox"><i class="icon-inbox"></i> Inbox</a></li>
					  <li><a href="#deleted"><i class="icon-circle-arrow-right"></i> Deleted Messages</a></li>
					  <li class = "active"><a href="#notifications"><i class="icon-exclamation-sign icon-white"></i> Notifications</a></li>
					</ul>
					<h1>My Properties</h1>
					<ul class="nav nav-list">
					  <li><a href="../properties/"><i class="icon-plus"></i> List My Property</a></li>
					  <li><a href="#manageproperties"><i class="icon-edit"></i> Manage Properties</a></li>
					</ul>
					<h1>My Bookings</h1>
					<ul class="nav nav-list">
					  <li><a href="#managebookings"><i class="icon-calendar"></i> Manage Upcoming Bookings</a></li>
					   <li><a href="#pastbookings"><i class="icon-"></i> View Past Bookings</a></li>
					</ul>
					<h1>My Trips / Reservations</h1>
					<ul class="nav nav-list">
					  <li><a href="#managereservations"><i class="icon-flag"></i> Manage Upcoming Reservations</a></li>
					  <li><a href="#pastreservations"><i class="icon-"></i> View Past Reservations</a></li>
					</ul>
					<h1>My Account</h1>
					<ul class="nav nav-list">
					  <li><a href="#editaccount"><i class="icon-user"></i>Edit Account</a></li>
					  <li><a href="#trustsandverifications"><i class="icon-ok-circle"></i>Trusts & Verifications</a></li>
					</ul>
					<h1>Marketing / Promotion</h1>
					<ul class="nav nav-list">
					  <li><a href="#postcraigslist"><i class="icon-share-alt"></i>Post to Craigslist</a></li>
					</ul>
				</div>
			</div>
			<div id = "content" class = "span9">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('Layout\footer'); ?>
	</div>
	
<?php echo $this->element('sql_dump'); ?>


<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', 'jquery.ui.min', 'bootstrap.min', 'jquery.livequery', 'formee', 'jquery.uniform.min', '../tooltip/js/spinners/spinners.min', '../tooltip/js/tooltip/tooltip', 'jquery.infieldlabel.min', '../lightbox/shadowbox', 'main', 'dashboard')); ?>
<?php echo $this->fetch('scriptBottom'); ?>
<!-- end scripts-->
<script>
	var _gaq=[['_setAccount','UA-28088665-1'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>