<?php
/*
 * jQuery File Upload Plugin PHP Example 5.7
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

//reporting(E_ALL | E_STRICT);

require('upload.class.php');

$upload_handler = new UploadHandler();

header('Pragma: no-cache');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Content-Disposition: inline; filename="files.json"');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');
if($_SERVER['HTTP_REFERER'] == "http://reservationresources.com/properties" ){
switch ($_SERVER['REQUEST_METHOD']) {
    case 'OPTIONS':
        break;
    case 'HEAD':
    case 'GET':
        $upload_handler->get();
        break;
    case 'POST':
        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
            $upload_handler->delete();
        } else {
            $upload_handler->post();
        }
        break;
    case 'DELETE':
        $upload_handler->delete();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}
}
else{

$upload_edit =   new UploadHandler();
$uid = $_GET['uid'];
$pid = $_GET['pid'];
switch ($_SERVER['REQUEST_METHOD']) {

    case 'OPTIONS':
        break;
    case 'HEAD':
    case 'GET':
		$options = array( 'upload_dir' => '../images/'.$uid.'/'.$pid.'/','upload_url'=>'http://reservationresources.com/images/'.$uid.'/'.$pid.'/','image_versions'=>array('thumbnail'=>array('upload_dir' => '../images/'.$uid.'/'.$pid.'/thumbnails/','upload_url'=>'http://reservationresources.com/images/'.$uid.'/'.$pid.'/thumbnails/')));
		//var_dump($options);
		$upload_edit =   new UploadHandler($options);
        $upload_edit->get();
        break;
    case 'POST':
        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
            $upload_edit->delete();
        } else {
            $upload_edit->post();
        }
        break;
    case 'DELETE':
		$options = array('upload_dir' => '../images/'.$uid.'/'.$pid.'/','upload_url'=>'http://reservationresources.com/images/'.$uid.'/'.$pid.'/','image_versions'=>array('thumbnail'=>array('upload_dir' => '../images/'.$uid.'/'.$pid.'/thumbnails/','upload_url'=>'http://reservationresources.com/images/'.$uid.'/'.$pid.'/thumbnails/')));
		//var_dump($options);
		$upload_edit =   new UploadHandler($options);
        $upload_edit->delete();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
}

}

