<div id="header" class="row-fluid">

	<div id ="header_container">
		<div class="span4"><a href="<?php echo $this->webroot; ?>"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo', 'alt' => 'Reservation Resources')); ?></a></div>
		<?php if(!isset($showSearch)){ ?>
		<div id="search" class="span4">
		<?php } else { ?>
		<div style="visibility:hidden;" id="search" class="span4">
		
		<?php } ?>	
			<?php
			echo $this->Form->create(false,array('url'=>'/searches/searchresults','type'=>'GET','id'=>'searchresultsForm'));
			echo $this->Form->input('search', array('id' => 'searchStart', 'placeholder' => 'Search by city, state, or zipcode...'));
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
			if(isset($zip)){
			echo $this->Form->input('state',array('type'=>'hidden','value'=>$zip));
			}
			else{
			echo $this->Form->input('zip',array('type'=>'hidden'));
			}
			echo $this->Form->end();


			?>
		</div>
		<div class="span4">
			<div class="usermenu">
				<a style="color: #FFF;" class="clearfix" href="http://support.reservationresources.com"><?php echo $this->Html->image('icons/Support.png', array('class' => 'sub_icon', 'alt' => 'Reservation Resources Support')); ?><div>Support</div></a>
			</div>
		</div>
	</div>
</div>
<div class="clearfix" id="menu">	
				<a class="clearfix" id="register" href="javascript:void(0);" onClick = "javascript:checkLoginStatus();">Register</a>
				<a class="clearfix" id="login" href="javascript:void(0);" onClick = "javascript:checkLoginStatus();">Login</a>
				<a style="padding: 15px; background: transparent !important; transition: none; -moz-transition: none; -webkit-transition: none; -o-transition: none;" href="<?php echo $this->webroot."properties" ?>"><div id="listmyspace">List My Space</div></a>
			</div>