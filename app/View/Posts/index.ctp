<h1>Blog Post tutrial</h1>
<?php  echo $this->Html->link('Add Post',array('controller'=>'posts','action'=>'add')); ?>
<table border = "2">
<th>Title </th>
<th>ID</th>
<th>Created</th>
<?php
	 foreach( $posts as $key => $value){?>
	 <tr>
		<td>
		<?php echo $posts[$key]['Post']['title']; ?>
		</td>
		
		<td>
			<?php echo $this->Html->link('Edit Post',array('controller'=>'posts','action'=>'edit', $posts[$key]['Post']['id']),array('class'=>'button icon small orange','data-icon'=>'7'));?>
		</td>
	
	<td>
		<?php echo $posts[$key]['Post']['created']; }?>
	</td>
	</tr>

</table>