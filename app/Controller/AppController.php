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
	var $components = array('Session','Auth'=>array( 'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')), 'AjaxHandler', 'Twilio.Twilio','Cookie');
	var $helpers = array('Form','Html','Session','PaypalIpn.Paypal');
	public function beforeRender()
	{
		// only compile it on development mode
		if (Configure::read('debug') > 0)
		{
			// import the file to application
			App::import('Vendor', 'lessc');
	 
			// set the LESS file location
			$less = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'less' . DS . 'main.less';
	 
			// set the CSS file to be written
			$css = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'css' . DS . 'main.css';
	 
			// compile the file
			lessc::ccompile($less, $css);
		}
		parent::beforeRender();
	}
	public function beforeFilter(){
		$this->Auth->allow('display','process');
			if($this->Auth->loggedIn()){
				$this->set('auth',true);
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
		$Folder = new Folder('../View/'.$path['controller']);
		
		//If home, gets tricky. Manually set action to home.
		if($path['action'] == "display")
			$path['action'] = "home";
		
		//Find all with the name of the action, return a random entry.
		$files = $Folder->find("^(".$path['action'].").*", true);
		return str_replace(".ctp", "", $files[array_rand($files, 1)]);
	}
}
