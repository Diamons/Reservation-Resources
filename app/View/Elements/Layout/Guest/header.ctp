<div id="header" class="row-fluid">
	<div class="span4"><a href="#"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo')); ?></a></div>
	<div id="search" class="span4">
		<?php 
		echo $this->Form->create('Search',array('type'=>'GET','controller'=>'searches','action'=>'searchresults'));
		echo $this->Form->input('search', array('id' => 'searchStart', 'placeholder' => 'Start your search here...'));
		echo $this->Form->input('latitude', array('id' => 'latitude', 'type' => 'hidden'));
		echo $this->Form->input('longtitude', array('id' => 'longtitude', 'type' => 'hidden'));
		echo $this->Form->input('city', array('id' => 'city', 'type' => 'hidden'));
		echo $this->Form->input('state', array('id' => 'state', 'type' => 'hidden'));
		echo $this->Form->end();

		?>
	
	</div>
	<div class="span4">
		
		<div id="menu">	
			<a class="clearfix" id="register" href="#">Register</a>
			<a class="clearfix" id="login" href="#">Login</a>
			<a class="clearfix" id="listmyspace" href="#">List My Space</a>
		</div>
	</div>
</div>