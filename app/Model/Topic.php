<?php 
	class Topic extends AppModel{
	public	$name = 'Topic';
	public $hasMany = 'Message';
	public $belongsTo = 'Property';

	}
?>
