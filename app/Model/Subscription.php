<?php
	class Subscription extends AppModel{
		public $name = 'Subscription';
		public $useTable = false;
		public $validate = array(
			'email'=>array(
				'must_be_email'=>array(
					'rule'=>'email',
					'message'=>'Please enter a valid email address.'
				)		
			)
		);
		
	}
?>