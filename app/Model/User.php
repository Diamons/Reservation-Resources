<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
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
				),
				'username_must_match' => array(
					'rule' =>'emailMustMatch',
					'message'=>'Your email address do not match'
				)
		
			),

		'password' => array(
			'password_must_not_be_empty' =>array(
				'rule' => 'notEmpty',
				'message' => 'Please enter a password'
			),
			'password_must_match' =>array(
				'rule' => 'mustMatch',
				'message' => 'Passwords do not Match'
			)
		),
		'first_name' => array(
			'firstname_cannotbe_blank' =>array(
				'rule' =>'notEmpty',
				'message'  =>'Ooops! I think you forgot your first name'
			)
		
		),
		'last_name' => array(
			'lastname_cannotbe_blank' =>array(
				'rule' => 'notEmpty',
				'message' => 'Ooops! I think you forgot your last name'
			)
		)
	);
	
	public function mustMatch($data){
		if($this->data['User']['password'] == $this->data['User']['password_confirmation']  ){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
			return true;
		}
		else{
			return false;
		}
	}
	
	public function emailMustMatch($data){
		if($this->data['User']['username'] == $this->data['User']['confirm_username']  ){
			return true;
		}
		else{
			return false;
		}
	}
	public function hashPassword(){
		return  AuthComponent::password($this->data['User']['password']);
	}
	public function afterSave($created){
		if($created){
			$email = new CakeEmail('smtp');
			$email->viewVars(array('first' =>$this->data['User']['first_name'],'last'=>$this->data['User']['last_name']));
			$email->template('welcome', 'email_layout')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to($this->data['User']['username'])->subject('Welcome to Reservation Resources')->send(); 
		
		}
		
	
	}
	//we will set up user directory if successfully saved
	public function createUserDirectory($id){
		$dir = new Folder();//default constructor sets up a path to directory instance NOT create!
		$dir->create(WWW_ROOT.'images'.DS.$id);
	}
	

}
?>