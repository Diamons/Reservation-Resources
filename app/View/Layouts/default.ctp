<?php
	$cakeDescription = __d('cake_dev', 'Reservation Resources - ');
?>
<!DOCTYPE HTML>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width">
	
	<?php 
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('kickstart/kickstart', 'kickstart/kickstart-buttons', 'kickstart/kickstart-forms', 'kickstart/kickstart-grid', 'kickstart/kickstart-icons', 'kickstart/kickstart-menus', 'kickstart/prettify', 'kickstart/tiptip', 'kickstart/jquery.fancybox-1.3.4', 'stylesheet'));
	?>
	<?php echo $this->fetch('scriptTop'); ?>
</head>
<body>
	<div id = "container">
		<header>

		</header>
		<div id = "body" role="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
			Footer
		</footer>
	</div>
	
<?php echo $this->element('sql_dump'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php echo $this->Html->script(array('kickstart/kickstart', 'kickstart/prettify')); ?>
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