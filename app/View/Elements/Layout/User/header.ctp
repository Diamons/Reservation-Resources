


<div id="header" class="row-fluid">
	<div id="header_container">
		<div class="span4"><a href="<?php echo $this->webroot; ?>"><?php echo $this->Html->image('logo.png', array( 'id' => 'logo', 'alt' => 'Reservation Resources')); ?></a></div>
		<?php if(!isset($showSearch)){ ?>
		<div id="search" class="span4">
		<?php } else { ?>
		<div style="visibility:hidden;" id="search" class="span4">
		
		<?php } ?>			
			<?php
			echo $this->Form->create(false,array('url'=>'/searches/searchresults','type'=>'GET','id'=>'searchresultsForm'));
			echo $this->Form->input('search', array('id' => 'searchStart', 'placeholder' => 'Start searching for a place to stay here...'));
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
			echo $this->Form->input('zip',array('type'=>'hidden','value'=>$state));
			}
			else{
			echo $this->Form->input('zip',array('type'=>'hidden'));
			}
			echo $this->Form->end();


			?>
		</div>

		</div>
		<div class="span4">

		
			<div id="menu">	
				<a class="clearfix" href="http://support.reservationresources.com"><?php echo $this->Html->image('icons/Support.png', array('class' => 'sub_icon', 'alt' => 'Reservation Resources Support')); ?><div>Support</div></a>
				
				<a id="dashboard_container" class="clearfix" href="<?php echo $this->webroot; ?>dashboard"><?php echo $this->Html->image('icons/dashboard.png', array('class' => 'sub_icon', 'alt' => 'Reservation Resources Dashboard')); ?><div id = "dashboardText">Dashboard 
				
				<?php if($notificationcount > 0){ ?>
				<div>
					<span class="notification" style = "text-align:center;">
				<?php echo  $notificationcount; ?>
				</span> 
				</div>
				<?php } ?>
				</div>
				</a>
				<a class="clearfix" href="<?php echo $this->webroot; ?>"><?php echo $this->Html->image('icons/home-icon.png', array('class' => 'sub_icon', 'alt' => 'Reservation Resources Home')); ?><div>Home</div></a>
			
				<div id="dashboard_notifications" class="row-fluid dashboard">
				
			</div>
			<a style="display:block; padding: 5px; background: transparent !important; transition: none; -moz-transition: none; -webkit-transition: none; -o-transition: none;" href="<?php echo $this->webroot."properties" ?>"><div id="listmyspace">List My Space</div></a>
		</div>
			
	</div>

</div>	
<div class="clearfix usermenu">	
	<span id = "usersocket" data-uid = "<?php echo $user['id'];?>" >Welcome back, <?php echo $user['username']; ?>!</span> <a id = "logout" href='javascript:void(0);'>(logout)</a>
</div>