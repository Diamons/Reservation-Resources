<?php 
$this->start('scriptBottom');
	echo $this->Html->script(array('jquery.raty.min', 'searchresults'));
$this->end(); ?>

<div class="inner row-fluid" id="content search_oontainer">
	<div id="search_panel" class="span3">
		<div id="map"></div>
		
		Refinement stuff goes here
	</div>
	<div id="search_entries" class="span9">
		<?php for($i = 0; $i < 10; $i++){ ?>
		<div class="row-fluid search_property">
			<div class="span5">
				<img class="property_search_image" src="http://hdwallpaperpics.com/wallpaper/picture/image/Four_Seasons_Wallpaper.jpg" />
			</div>
			<div class="user_profile inner span7">
				<div>
					<img class = "quickinfo ajax" title = "../users/viewuser/33" src="http://localhost/cakephp/img/anonymous.jpg" />
					<div class="rating">
						<div class="score" data-rating=5"></div>
					</div>
					<div class="inner name">Beautiful Villa Beautiful
					<span class="small"><i class="icon-map-marker"></i>New York, NY</span></div>
				</div>
				<div class="inner">
					<?php echo substr("	asdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsaasdadsa", 0, 250); ?> ...
					
					<div class="row-fluid prices">
						<div class="span4"><span>$3</span> / Daily</div>
						<div class="span4"><span>$3</span> / Weekly</div>
						<div class="span4"><span>$424,453</span> / Monthly</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>