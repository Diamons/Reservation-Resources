<?php
	class SubscriptionsController extends AppController{
		function beforeFilter(){
			
			parent::beforeFilter();
			$this->Auth->allow('index');
		}
		var $components = array('Mailchimp.Mailchimp');
		var $uses = array('Subscription');
		//Subscribe to monthly newsletter
		public function index(){
			
			$this->layout 		= 'ajax';  	// uses an empty layout
			
			if(isset($this->request->data) && !empty($this->request->data['Subscription']) && $this->request->is('ajax')) {
	
				Configure::write('debug', 0);
				$this->autoRender 	= false; 	// renders nothing by default
				$this->Subscription->set($this->request->data);
				if($this->Subscription->validates()) {
					$this->Mailchimp->listSubscribe($this->request->data['Subscription']['email'], $this->request->data['Subscription']['name']);
					$response	= array(
						'error'		=> 0,
						'message'	=> 'Success'
					);
					
					return json_encode($response);
					
				} else {
					$response	= array(
						'error'		=> 1,
						'message'	=> 'failure'
					);
					
				}
		
				
				$response['data']['Subscription']	= $this->Subscription->invalidFields();
				unset($response['data']['Subscription']['email'][1]);
				return json_encode($response);
				
			}
		}
	}
?>