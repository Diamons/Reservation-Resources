<?php
	$cakeDescription = __d('cake_dev', 'Reservation Resources');
?>
<!DOCTYPE html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>
		<?php echo $title_for_layout; ?> - <?php echo $cakeDescription ?>
		
	</title>
	
	<meta name="description" content="">
	<meta name="author" content="Reservation Resources LLC">
	
	<?php 
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/blitzer/jquery-ui.css'));
		echo $this->Html->css(array('kickstart/kickstart-buttons', 'kickstart/kickstart-grid', 'kickstart/kickstart-icons', 'kickstart/prettify', 'kickstart/tiptip', 'kickstart/jquery.fancybox-1.3.4', 'formee-style', 'formee-structure', 'main', 'stylesheet'));
	?>
	<?php echo $this->fetch('cssTop'); ?>
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
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('Layout\footer'); ?>
	</div>
	
<?php echo $this->element('sql_dump'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

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