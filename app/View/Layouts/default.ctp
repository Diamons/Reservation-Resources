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
	?>
	<?php echo $this->fetch('cssTop'); ?>
	<?php echo $this->Html->script(array('//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', 'global')); ?>	
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
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('Layout\footer'); ?>
	</div>
	
<?php echo $this->element('sql_dump'); ?>


<?php echo $this->Html->script(array('jquery.ui.min', 'bootstrap.min', 'jquery.livequery', 'formee', 'jquery.uniform.min', '../tooltip/js/spinners/spinners.min', '../tooltip/js/tooltip/tooltip', 'jquery.infieldlabel.min', '../lightbox/shadowbox', 'main')); ?>
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