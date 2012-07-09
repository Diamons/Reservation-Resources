<div id="header" class="row-fluid">
	<div id="header_container">
		<div class="span4"><a href="#"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo')); ?></a></div>
		<div id="search" class="span4">
						
			<?php
			echo $this->Form->create(false,array('url'=>'/searches/searchresults','type'=>'GET','id'=>'searchresultsForm'));
			echo $this->Form->input('search', array('id' => 'searchStart', 'placeholder' => 'Start your search here...'));
			echo $this->Form->input('latitude',array('type'=>'hidden'));
			echo $this->Form->input('longtitude',array('type'=>'hidden'));
			echo $this->Form->input('city',array('type'=>'hidden'));
			echo $this->Form->input('state',array('type'=>'hidden'));
			echo $this->Form->end();


			?>
		</div>
		<div class="span4">

		
			<div id="menu">	
				<a class="clearfix" href="#"><?php echo $this->Html->image('icons/Support.png', array('class' => 'sub_icon')); ?><div>Support</div></a>
				
				<a id="dashboard_container" class="clearfix" href="#"><?php echo $this->Html->image('icons/dashboard.png', array('class' => 'sub_icon')); ?><div>Dashboard <span class="notification">55</span>
				</div>
				</a>
				<a class="clearfix" href="#"><?php echo $this->Html->image('icons/home-icon.png', array('class' => 'sub_icon')); ?><div>Home</div></a>
			
					<div id="dashboard_notifications" class="row-fluid dashboard">
						<div>Shahruk just left you a comment on your property. <a href="#">(view)</a></div>
						<div>You have one new booking request. <a href="#">(view)</a></div>
						<div>Shahruk just sent you a message! <a href="#">(view)</a></div>
					</div>
			</div>
		</div>
	</div>
</div>