<?php
	class User extends  AppModel{
	public $name = 'User';
	public $validate = array(
		'username'=>array(
				'username_must_be_email'=>array(
					'rule'=>'email',
					'message'=>'Please enter a valid email address'
				),
				'username_must_be_unique'=>array(
					'rule'=>'isUnique',
					'message'=>'This email already exists'
				),
				'username_must_not_be_blank'=>array(
					'rule'=>'notEmpty',
					'message'=>'Email address cannot be blank'
				)
		
			),
		'password' => array(
			'password_must_not_be_empty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Please enter a password'
			),
			'password_must_match' =>array(
				'rule' => 'mustMatch',
				'mesage' => 'Passwords do not Match'
			)
		)
	);
	
	public function mustMatch($data){
		if($this->data['User']['password'] ==$this->data['User']['password_confirmation']  ){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
		}
		else{
			return false;
		}
	}
	
}
?>