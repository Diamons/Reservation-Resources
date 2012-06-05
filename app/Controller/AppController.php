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

App::uses('Controller', 'Controller');

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
	var $components = array('Session','Auth'=>array( 'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')), 'AjaxHandler', 'Twilio.Twilio');
	var $helpers = array('Form','Html','Session');
	public function beforeRender()
	{
		$this->layout = "dashboard";
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
		echo "A";
		$this->Auth->allow('display');
			if($this->Auth->loggedIn()){
				$this->set('auth',true);
			}
			else{
				$this->set('auth',false);
			}
	}
}
