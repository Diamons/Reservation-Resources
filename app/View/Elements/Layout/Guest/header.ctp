<header>
	<div class = "float_right">
		<input class="btn btn-small btn-warning" type = "button" value = "List my Property" />
		<input class="btn btn-small btn-primary" type = "button" value = "New Account" />
		<input class="btn btn-small btn-success" type = "button" value = "Login" />		
	</div>	
	<a href = "<?php echo $this->Html->root; ?>"><?php echo $this->Html->image('logo-light.png', array('id' => 'topLogo')); ?></a>
	<?php if($this->viewVars['page'] !== 'home'){ ?>
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