<?php 
$this->start('scriptBottom');
	echo $this->Html->script(array('jquery.raty.min', 'searchresults'));
	//Debugger::log($properties);
$this->end(); ?>

<div class="inner row-fluid" id="content search_oontainer">
	<div id="search_panel" class="span3">
		<div id="map"></div>
		
		Refinement stuff goes here
	</div>
	<div id="search_entries" class="span9">
		<?php foreach($properties as $property){  ?>
			
		<div class="row-fluid search_property">
			<div class="span2">
				<?php if(isset($property['Property']['default_image'])){ 
					echo $this->Html->image('/images/'.$property['Property']['user_id'].'/'.$property['Property']['id'].'/'.$property['Property']['default_image'],array('class'=>'property_search_image'));
				}
				else{
					echo $this->Html->image('nopic.png',array('class'=>'property_search_image'));	
				}

				?>
			
			<?php /*<a  href = "javascript:void(0);"><div  data-pid="<?php echo $property['Property']['id']; ?>"  class="contact_me host" style = "width:225px; float:right; position:relative; bottom:200px; left:25px;">	Contact Me</div></a>
			<a href = "<?php echo $this->webroot.'properties/viewproperty/'.$property['Property']['id']; ?>"><input type = "button" class = 'btn btn-large btn-success' value = 'View Property Details'/></a> */ ?>
			</div>
			
			<div class="user_profile inner span10">
				<div>
				<?php 
				if(isset($property['User']['profile_picture'])){
						echo $this->Html->image($property['User']['profile_picture'],array('class'=>'quickinfo ajax','title'=>'../users/viewuser/'.$property['User']['id']));
					}
					else{
						echo $this->Html->image('anonymous.jpg');
					}
				
				?>
			
					<div class="rating actions_available">
						<a   href = "javascript:void(0);" data-pid="<?php echo $property['Property']['id']; ?>"  class = 'guest_host' data-type='reg'><div  ><i class="icon-user"></i> Contact Host</div></a>
						<!-- <a href = "javascript:void(0);" class = "guest_host" data-index = "<?php echo $key; ?>" ><div class="green"><i class="icon-calendar"></i> Book Now</div></a> -->
						<div class="prices">
							<?php if(!empty($property['Property']['price_per_night'])){?>
							<div><span>$<?php echo $property['Property']['price_per_night']; ?></span> / Daily</div>
							<?php }else{ ?>
							<div><span>N/A</span> / Daily</div>
							<?php } ?>
						</div>
						<div class="score" data-rating="<?php echo $property['Property']['rating']; ?>"></div>
					</div>
					<div class="clearfix inner name">
						<?php echo $this->Html->link($property['Property']['title'],array('controller'=>'properties','action'=>'viewproperty',$property['Property']['id']));?> </a>
						<span class="small"><i class="icon-map-marker"></i><?php echo $property['Property']['city'].",".$property['Property']['state']; ?></span>
					</div>
				</div>
				
					<?php //echo substr($property['Property']['description'], 0,100); ?>
					
						<?php /*if(!empty($property['Property']['price_per_night'])){?>
						<div class="span4"><span>$<?php echo $property['Property']['price_per_night']; ?></span> / Daily</div>
						<?php }else{ ?>
						<div class="span4"><span>N/A</span> / Daily</div>
						<?php } if(!empty($property['Property']['price_per_week'])){ ?>
						<div class="span4"><span>$<?php echo $property['Property']['price_per_week']; ?></span> / Weekly</div>
						<?php } else{ ?>
							<div class="span4"><span>N/A</span> / Weekly</div>
						<?php } if(!empty($property['Property']['price_per_month'])){ ?>
						<div class="span4"><span>$<?php echo $property['Property']['price_per_month']; ?></span> / Monthly</div>
						<?php } else { ?>
						<div class="span4"><span>N/A</span> / Monthly</div>
						<?php }*/ ?>
			</div></div>
					<?php } 
			echo $this->element('/Search/cl_search_results',array('results'=>$clresults,'city'=>$city,'state'=>$state));
		?>
		</div>

	</div>
