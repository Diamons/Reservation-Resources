<header>
	<div class = "float_right">
		<button class="btn btn-small btn-warning">List my Property</button>
		<button class="btn btn-small btn-inverse">Logout</button>		
	</div>	
	<a href = "#"><?php echo $this->Html->image('logo-light.png', array('id' => 'topLogo')); ?></a>
	<nav id = "main_navigation">
		<ul id = "profile">
		<li><a class = "clearfix" id = "properties" href = "#"><?php echo $this->Html->image('icons/Key.png', array('class' => 'sub_icon')); ?><div>Properties</div></a></li>
			<li><a class = "clearfix" id = "reservations" href = "#"><?php echo $this->Html->image('icons/Calendar-Month.png', array('class' => 'sub_icon')); ?><div>Reservations</div></a></li>
			<li><a class = "clearfix" id = "bookings" href = "#"><?php echo $this->Html->image('icons/Airplane.png', array('class' => 'sub_icon')); ?><div>Bookings</div></a></li>
			<li><a class = "clearfix" id = "messages" href = "#"><?php echo $this->Html->image('icons/Chats.png', array('class' => 'sub_icon')); ?><div>Messages</div></a></li>
			<li class = "support_link"><a id = "support" class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Support.png', array('class' => 'sub_icon')); ?><div>Support</div></a></li>
			<li class = "active"><a id = "search" class = "clearfix" href = "#"><?php echo $this->Html->image('icons/Search.png', array('class' => 'sub_icon')); ?><div>Search</div></a></li>
		</ul>	
	</nav>
	<?php if($this->Html->request->action !== 'display'){ ?>
		<div id = "searchBar">
			<form class = "formee">
				<div class = "grid-2-12">
					<label>Check In Date</label>						
					<input type = "text" name = "checkin" placeholder = "mm/dd/yyyy" />
				</div>
				<div class = "grid-2-12">
					<label>Check Out Date</label>
					<input type = "text" name = "checkout" placeholder = "mm/dd/yyyy" />
				</div>
				<div class="grid-4-12">
					<label>Search Properties <em class="formee-req">*</em></label>
					<input type = "text" placeholder = "Search by Location " />
				</div>
				<div class="grid-2-12">
					<label>Number of People</label>
					<select name="guests">
						<option value="1" selected="selected">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10+</option>
					</select>
				</div>
				<div class = "grid-1-12">
					<label>Search</label>
					<input type = "submit" title = "search" value = "search" />
				</div>
			</form>
		</div>
	<?php } ?>
</header>