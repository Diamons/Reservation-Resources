<?php

	//Debugger::log($results['results'][11]['images']);
	//Debugger::log($results['results']);
	
?>
<?php if(!empty($results['results'])){?>
<?php foreach($results['results'] as $key => $value) { ?>
<?php  	if(!empty($results['results'][$key]['accountName'])) { ?>
<div class="row-fluid search_property">
			<div class="span2">
				<div>
				<?php if(isset($results['results'][$key]['images'])){ 
					echo $this->Html->image($results['results'][$key]['images'][0],array('fullBase'=>true,'class'=>'property_search_image'));
				}
				else{
					echo $this->Html->image('nopic.png',array('class'=>'property_search_image'));	
				}

				?>
			<?php /*<a href = "javascript:void(0);" class = "guest_host" data-index = "<?php echo $key; ?>" ><div   class="contact_me" style = "width:200px; float:right; position:relative; bottom:50px; left:25px;">	Contact Me</div></a>
			<a href = "<?php echo $this->webroot.'properties/viewproperty/'.'1'; ?>"><input type = "button" class = 'btn btn-large btn-success' value = 'View Property Details'/></a> */ ?>
			</div>
			</div>
			
			<div class="user_profile inner span10">
				<div>
				<?php 
				//if(isset($property['User']['profile_picture'])){
						//echo $this->Html->image($property['User']['profile_picture'],array('class'=>'quickinfo ajax','title'=>'../users/viewuser/'.$property['User']['id']));
				//	}
				//	else{
						echo $this->Html->image('anonymous.jpg');
					//}
				
				?>
						
					<div class="rating actions_available">
						<a href = "javascript:void(0);" class = "guest_host" data-type = 'cl' data-index = "<?php echo $key; ?>" ><div><i class="icon-user"></i> Contact Host</div></a>
						<div class="prices">
						<?php if(!empty($results['results'][$key]['price'])){?>
							<div><span>$<?php echo $results['results'][$key]['price']; ?></span> / Daily</div>
						<?php }else{ ?>
							<div><span>N/A</span> / Daily</div>
						<?php } ?>
					</div>
						<!-- <a href = "javascript:void(0);" class = "guest_host" data-index = "<?php echo $key; ?>" ><div class="green"><i class="icon-calendar"></i> Book Now</div></a> -->
						<div class="score" data-rating="<?php echo $results['results'][$key]['rating']; ?>"></div>
					</div>
					<div class="clearfix inner name"><?php echo $this->Html->link($results['results'][$key]['heading'],array('controller'=>'properties','action'=>'viewproperty','1'));?> </a>
					<span class="small"><i class="icon-map-marker"></i><?php echo $city.",".$state; ?></span>
					</div>
					
					<?php //echo substr($results['results'][$key]['body'], 0,100); ?>
					
						<?php /* if(!empty($results['results'][$key]['price'])){?>
						<div class="span4"><span>$<?php echo $results['results'][$key]['price']; ?></span> / Daily</div>
						<?php }else{ ?>
						<div class="span4"><span>N/A</span> / Daily</div>
						<?php } if(!empty($results['results'][$key]['price_per_week'])){ ?>
						<div class="span4"><span>$<?php echo $results['results'][$key]['price_per_week']; ?></span> / Weekly</div>
						<?php } else{ ?>
							<div class="span4"><span>N/A</span> / Weekly</div>
						<?php } if(!empty($results['results'][$key]['price_per_month'])){ ?>
						<div class="span4"><span>$<?php echo $results['results'][$key]['price_per_month']; ?></span> / Monthly</div>
						<?php } else { ?>
						<div class="span4"><span>N/A</span> / Monthly</div>
						<?php } */ ?>
			</div></div>
		</div>
<?php }}} ?>