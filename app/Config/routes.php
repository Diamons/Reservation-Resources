<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	//lets load map static pages to dynmaic search for google to index.
Router::connect('/searches/vacation-rentals-new-york-city.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'New+York%2C+NY%2C+USA','latitude'=>'40.7143528','longtitude'=>'-74.0059731','city'=>'New+York','state'=>'New+York','zip'=>'10007'));
Router::connect('/searches/vacation-rentals-San-Francisco.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'San+Francisco%2C+CA%2C+USA&','latitude'=>'37.7749295','longtitude'=>'-122.41941550000001','city'=>'San+Francisco','state'=>'California','zip'=>'94103'));
Router::connect('/searches/vacation-rentals-Miami.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'Miami%2C+FL%2C+USA','latitude'=>'25.7889689','longtitude'=>'-80.22643929999998','city'=>'Miami','state'=>'Florida','zip'=>'33125'));
Router::connect('/searches/vacation-rentals-orlando.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'Orlando%2C+FL%2C','latitude'=>'28.538335','longtitude'=>'-81.37923649999999','city'=>'Orlando','state'=>'Florida','zip'=>'32801'));
Router::connect('/searches/vacation-rentals-los-angeles.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'Los+Angeles%2C+CA%2C+USA','latitude'=>'34.05223424','longtitude'=>'-118.2436849','city'=>'Los+Angeles','state'=>'California','zip'=>'90012'));
Router::connect('/searches/vacation-rentals-San-Diego.html',array('controller' => 'searches', 'action' => 'searchresults','search'=>'San+Diego%2C+CA%2C+USA','latitude'=>'32.7153292','longtitude'=>'-117.15725509999999','city'=>'San+Diego','state'=>'California','zip'=>'92101'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

	
	
	
	
	
	
Router::connect('/paypal_ipn/process', array('plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'process'));
Router::connect('/paypal_ipn/:action/*', array('admin' => 'true', 'plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'index'));
Router::connect('/paypal_ipn', array('admin' => 'true', 'plugin' =>
'paypal_ipn', 'controller' => 'instant_payment_notifications',
'action' => 'index'));
/* End Paypal IPN plugin */

