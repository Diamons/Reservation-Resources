<div id="header" class="row-fluid">
	<div id ="header_container">
		<div class="span4"><a href="#"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo')); ?></a></div>
		<div id="search" class="span4">
			<?php echo $this->Form->input('Search', array('id' => 'searchStart', 'placeholder' => 'Start your search here...')); ?>
		</div>
		<div class="span4">
			
			<div id="menu">	
				<a class="clearfix" id="register" href="#">Register</a>
				<a class="clearfix" id="login" href="#">Login</a>
				<a id="listmyspace" href="#">List My Space</a>
			</div>
		</div>
	</div>
</div>