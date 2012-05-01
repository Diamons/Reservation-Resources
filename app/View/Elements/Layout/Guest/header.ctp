<header>
		<a href = "#"><?php echo $this->Html->image('logo-light.png', array('id' => 'topLogo')); ?></a>
			<nav id = "main_navigation">
				<ul class = "clearfix">
				<li><a href = "#">Home</a></li>
				<li><a href = "#">Dashboard</a>
					<ul>
						<li><a class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Key.png', array('class' => 'sub_icon')); ?><div>Properties</div></a></li>
						<li><a class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Calendar-Month.png', array('class' => 'sub_icon')); ?><div>Reservations</div></a></li>
						<li><a class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Airplane.png', array('class' => 'sub_icon')); ?><div>Bookings</div></a></li>
						<li><a class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Chats.png', array('class' => 'sub_icon')); ?><div>Messages</div></a></li>
					</ul>
				</li>
			</nav>
		</header>