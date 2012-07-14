<div id="header" class="row-fluid">

	<div id ="header_container">
		<div class="span4"><a href="#"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo')); ?></a></div>
		<div id="search" class="span4">
				
			<?php
			echo $this->Form->create(false,array('url'=>'/searches/searchresults','type'=>'GET','id'=>'searchresultsForm'));
			echo $this->Form->input('search', array('id' => 'searchStart', 'placeholder' => 'Start your search here...'));
			echo $this->Form->input('latitude',array('type'=>'hidden'));
			echo $this->Form->input('longtitude',array('type'=>'hidden'));
			if(isset($city)){
			echo $this->Form->input('city',array('type'=>'hidden','value'=>$city));
			}else{
			echo $this->Form->input('city',array('type'=>'hidden'));
			}
			if(isset($state)){
			echo $this->Form->input('state',array('type'=>'hidden','value'=>$state));
			}
			else{
			echo $this->Form->input('state',array('type'=>'hidden'));
			}
			echo $this->Form->end();


			?>
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