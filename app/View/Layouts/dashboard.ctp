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
		echo $this->Html->css(array('bootstrap', 'bootstrap-responsive.min', 'formee-style', 'formee-structure', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/blitzer/jquery-ui.css', 'uniform.default', '../lightbox/shadowbox', 'main', 'stylesheet'));
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
		<div class = "row-fluid profile_bar">
			<div class = "span12">
				<nav class = "quick_links">
					<ul>
						<?php if(!isset($email)) { ?>
							<li><input class="btn btn-large btn-info" type="button" value="Verify Your E-mail" /></li> 
						<?php } else { ?>
							<li><b>Email <i class="icon-envelope"></i> </b><input class="btn btn-large" disabled="disabled" type="button" value="shahruksemail@gmail.com" /></li> 
						<?php } ?>
						
						<?php if(isset($email)) { ?>
							<li><input class="btn btn-large btn-info" type="button" value="Add Your Cellphone" /></li> 
						<?php } else { ?>
							<li><b>Cellphone <i class="icon-envelope"></i> </b><input class="btn btn-large" disabled="disabled" type="button" value="+19174355533" /></li> 
						<?php } ?>
						
						<?php if(isset($email)) { ?>
							<li><input class="btn btn-large" type="button" value="Verify Your E-mail" /></li> 
						<?php } else { ?>
							<li><b>Email <i class="icon-envelope"></i> </b><input class="btn btn-large" disabled="disabled" type="button" value="shahruksemail@gmail.com" /></li> 
						<?php } ?>
					</ul>
					<div style = "float:right; margin: 25px;">
						<input class="btn btn-large" type="button" id = "calendar_button" value="Show / Hide Calendar" />
					</div>
				</nav>
				<?php echo $this->Html->image('http://www.almostsavvy.com/wp-content/uploads/2011/04/profile-photo.jpg', array('class' => 'profile_picture')); ?> <section><h1>Welcome Back, Shahruk</h1>
				</section>
			</div>
			<div id = "calendar">
			<hr />
			</div>
		</div>
		<div class = "clearfix">
			<?php echo $this->element('Layout\Dashboard\dashboard'); ?>
			<div id = "body">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('Layout\footer'); ?>
	</div>
	
<?php echo $this->element('sql_dump'); ?>


<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js', 'bootstrap.min', 'jquery.livequery', 'formee', 'jquery.uniform.min', 'jquery.infieldlabel.min', '../lightbox/shadowbox', 'main')); ?>
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