
<div class = "inner content">
	<div>
	  <?php foreach($notifications as $notification) {?>
		<?php if($notification['Notification']['status'] == 2){?>
		<div class="alert alert-block alert-success fade in">
		
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h4 class="alert-heading"><?php echo $notification['Notification']['title']; ?></h4>
			<p> <?php echo $notification['Notification']['notification']; ?></p>
            <p>
              <a class="btn btn-success action" href="<?php echo $notification['Notification']['action']; ?>" data-notificationid ="<?php echo $notification['Notification']['id']; ?>" ><?php echo $notification['Notification']['button_title']; ?></a> <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn remove" href="#">Delete this notification</a>
            </p>
      </div>
	  <?php }?>
	  <?php if($notification['Notification']['status'] == 1){?>
		<div class="alert alert-block fade in">
		
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h4 class="alert-heading"><?php echo $notification['Notification']['title']; ?></h4>
			<p> <?php echo $notification['Notification']['notification']; ?></p>
            <p>
              <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn btn-warning action" href="<?php echo $notification['Notification']['action']; ?>"><?php echo $notification['Notification']['button_title']; ?></a> <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn remove" href="#">Delete this notification</a>
            </p>
      </div>
	  <?php }?>
	  <?php if($notification['Notification']['status'] == 0){?>
		<div class="alert alert-block alert-error fade in">
		
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h4 class="alert-heading"><?php echo $notification['Notification']['title']; ?></h4>
			<p> <?php echo $notification['Notification']['notification']; ?></p>
            <p>
              <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn btn-danger action" href="<?php echo $notification['Notification']['action']; ?>"><?php echo $notification['Notification']['button_title']; ?></a> <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn remove" href="#">Delete this notification</a>
            </p>
      </div>
	  <?php }?>
	  	<?php if($notification['Notification']['status'] == 3){?>
		<div class="alert alert-block alert-info fade in">
		
            <button type="button" class="close" data-dismiss="alert">x</button>
            <h4 class="alert-heading"><?php echo $notification['Notification']['title']; ?></h4>
			<p> <?php echo $notification['Notification']['notification']; ?></p>
            <p>
              <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn btn-primary action" href="<?php echo $notification['Notification']['action']; ?>"><?php echo $notification['Notification']['button_title']; ?></a> <a data-notificationid ="<?php echo $notification['Notification']['id']; ?>" class="btn remove" href="#">Delete this notification</a>
            </p>
      </div>
	  <?php }?>
	<?php }?>

		<!--<h1 class = "heading">Dashboard</h1>
			asdasdasdasdasdasdas-->
			
	</div>
</div>