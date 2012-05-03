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
	
	<?php 
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('kickstart/kickstart-buttons', 'kickstart/kickstart-grid', 'kickstart/kickstart-icons', 'kickstart/prettify', 'kickstart/tiptip', 'kickstart/jquery.fancybox-1.3.4', 'formee-style', 'formee-structure', 'main', 'stylesheet'));
	?>
	<?php echo $this->fetch('scriptTop'); ?>
	<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id = "container">
		<?php if(isset($auth) && $auth == 1){
			echo $this->element('Layout\header');
		} else {
			echo $this->element('Layout\Guest\header');
		} ?>
		<div id = "body" role="main">
			<?php echo $this->Session->flash(); ?>
			<?php for($i = 0; $i < 1000; $i++){echo $this->fetch('content');} ?>
		</div>
		<?php echo $this->element('Layout\footer'); ?>
	</div>
	
<?php echo $this->element('sql_dump'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php echo $this->Html->script(array('kickstart/kickstart', 'kickstart/prettify', 'formee', 'main')); ?>
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