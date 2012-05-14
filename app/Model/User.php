<?php
	class User extends  AppModel{
	public $name = 'User';
	public $validate = array(
		'username' => array(
			'must_be_email' =>array(
				'rule' => 'email',
				'message' => 'Please enter a valid Email address'
			)
		)
		
	);
	
}
?>