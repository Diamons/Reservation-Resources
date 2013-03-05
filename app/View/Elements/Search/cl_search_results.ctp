<?php

	//Debugger::log($results['results'][11]['images']);
	//Debugger::log($results['results']);
	
?>

<?php if(!empty($results['results'])){?>
<?php foreach($results['results'] as $key => $value) { ?>

<?php  	if(!empty($value['annotations']['source_account'])) { ?>
<div class="row-fluid search_property">

			<div class="span2">
				<div>
				<?php if($value['hasImage']){ 
				
					echo $this->Html->image($value['images'][0]['full'],array('fullBase'=>true,'class'=>'property_search_image'));
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
						<?php if($value['price']){?>
							<div><span>$<?php echo $value['price']; ?></span> / Daily</div>
						<?php }else{ ?>
							<div><span>N/A</span> / Daily</div>
						<?php } ?>
						</div>
						
						<!--<div class="score" data-rating="<?php echo $results['results'][$key]['rating']; ?>"></div>-->
					</div>
					<div class="clearfix inner name"><?php echo $this->Html->link($value['heading'],array('controller'=>'properties','action'=>'preview',$key,$value['id']));?> </a>
					<span class="small"><i class="icon-map-marker"></i><?php echo $value['annotations']['source_loc'].",".$value['annotations']['source_state']; ?></span>
					</div>
					
					<?php echo substr($value['body'], 0,100); ?>
					
				</div>
			</div>
		
		</div>

<?php }}} ?>