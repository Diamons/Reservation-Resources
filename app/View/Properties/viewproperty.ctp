<?php
	$this->start('scriptBottom');
		echo $this->Html->script(array('../slider/slider.min', 'properties/viewproperty')); 
	$this->end();
?>
<?php 
	$this->start('cssTop');
	echo $this->Html->css(array('properties/viewproperty'));
	$this->end();
?>

<div id = "body" class = "row-fluid" role = "main">
	<div class = "property_panel span8">
		<div id="gallery" style = "height:450px;">
			<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="My title" data-description="My description"></a>
			<a href="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg"><img src="http://net.onextrapixel.com/wp-content/uploads/2011/07/jqueryslideshow.jpg" data-title="Another title" data-description="My <em>HTML</em> description"></a>
		</div>
	</div>
	<div class = "span6">
		
	</div>
</div>

