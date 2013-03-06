<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller','Controller');
App::import('Plugin/WebSocket/Lib/Network/Http', 'WebSocket', array('file'=>'WebSocket.php'));
/*loading the webocket plugin from the app/lib folder.
This is rather redundant since the websocket plugin is already loaded.
However I was experiencing a strange issue with cakephp. I can only seem to 
instantiate the class once. If I were to create a new websocket class
it would throw an error when i call it from my logout function. It says
class Websocket not found although I know its already loaded*/


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $components = array('Session','Auth'=>array( 'loginAction' => array('controller' => 'users', 'action' => 'index')), 'AjaxHandler', 'Twilio.Twilio','Cookie');
	var $helpers = array('Form','Html','Session','PaypalIpn.Paypal');
	
	public function beforeFilter(){
		$this->Auth->allow('display','process');
			if($this->Auth->loggedIn()){
				$this->set('auth',true);
				$this->set("user", $this->Auth->user());
				$this->set("notificationcount",$this->getNotificationCount($this->Auth->user('id')));
			}
			else{
				$this->set('auth',false);
			}
			
  	}
	
	function afterPaypalNotification($txnId){
    $transaction = ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->findById($txnId);
    $this->log($transaction['InstantPaymentNotification']['id'], 'paypal');
    //Tip: be sure to check the payment_status is complete because failure 
    //     are also saved to your database for review.
	$this->loadModel('Booking');
    if($transaction['InstantPaymentNotification']['payment_status'] == 'Completed'){//we update ipn model and update booking model when host accepts or declines we create the reservation.
		$this->loadModel('InstantPaymentNotification');
		$this->InstantPaymentNotification->id = $transaction['InstantPaymentNotification']['id'];
		$this->InstantPaymentNotification->set('ip_address',$this->request->clientIp());
		$this->InstantPaymentNotification->set('rr_amount',($transaction['InstantPaymentNotification']['mc_gross'] * FEE ));
		$this->InstantPaymentNotification->set('landlord_amount', $transaction['InstantPaymentNotification']['mc_gross']-($transaction['InstantPaymentNotification']['mc_gross'] * FEE));
		$this->InstantPaymentNotification->save();
		$this->Booking->id = $transaction['InstantPaymentNotification']['custom'];
		$this->Booking->set('status',0);
		$this->Booking->set('subtotal',$transaction['InstantPaymentNotification']['mc_gross']-($transaction['InstantPaymentNotification']['mc_gross'] * FEE));
		$this->Booking->set('instant_payment_notification_id',$transaction['InstantPaymentNotification']['id']);
		if($this->Booking->save()){
			$this->Booking->sendNotification($transaction['InstantPaymentNotification']['item_number'],'new_booking','Congrats! Your space has been booked!');//lets email landlord letting them know that they just received a booking on their property
		}
		
    }
    //else {
		//$this->Booking->sendNotification($transaction['InstantPaymentNotification']['item_number'],'declined','Your transaction has been declined');
        //Oh no, better look at this transaction to determine what to do; like email a decline letter.
    //}
	}

	function abTest($path){
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		$path = $path->request->params;
		$Folder = new Folder('..'.DS.'View'.DS.ucfirst($path['controller']));
		
		//If home, gets tricky. Manually set action to home.
		if($path['action'] == "display")
			$path['action'] = "home";
		
		//Find all with the name of the action, return a random entry.
		$files = $Folder->find("^(".$path['action'].").*", true);
		$page = str_replace(".ctp", "", $files[array_rand($files, 1)]);
		$this->set("abTestName", "<div id='pageName'>$page</div>");
		return $page;
	}
	
	function getNotificationCount($uid = null){
		if($uid){
			$this->loadModel('Notification');
			$notificationCount = $this->Notification->find('count',array('conditions'=>array('Notification.deleted'=>0,'Notification.user_id'=>$uid)));
			return $notificationCount;
		
		}
	
	}
	
	function notifyNode($event = null, $data = array()){
		$websocket = new WebSocket(array('port'=>8124,'scheme'=>'ws','host'=>'localhost'));
				
		if($websocket->connect()) {
			
			$websocket->emit($event, $data);
			$websocket->disconnect();
						

		}
	
	}

}
