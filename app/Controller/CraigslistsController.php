<?php
class CraigslistsController extends AppController{


	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('searchresults','tapsobject');
		$this->AjaxHandler->handle('index');
	}
	
	public function index(){
	//Debugger::log($this->request->data);
	$posts = $this->Session->read('Property.results');
	$key = $this->request->data['Craigslist']['key'];
	//Debugger::log($posts['results'][$this->request->data['Craigslist']['key']]);
	$this->Craigslist->set('user_id',$this->Auth->user('id'));
	$this->Craigslist->set('email',$posts['results'][$key]['accountName']);
	$this->Craigslist->set('post_key',$posts['results'][$key]['postKey']);
	$this->Craigslist->set('url',$posts['results'][$key]['externalURL']);
	$this->Craigslist->set('title',$posts['results'][$key]['heading']);
	$this->Craigslist->set('body',$posts['results'][$key]['body']);
	$this->Craigslist->set('active',true);
	if($this->Craigslist->save($this->request->data)){
		$response['success'] = true;
		$response['data'] = 'Message Sent! Please allow the host up to 72 hours to respond to your inquery';
	}
	else{
		$response['success'] = false;
		$response['data'] = 'We apologize. We could not properly deliver your message, please contact support at your earliest convenience';
	}
	return $this->AjaxHandler->respond('json',$response);
	
	
	}
	public function contactform($key = null){
		$this->autoLayout = FALSE;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->set('key',$key);
		$this->render('../Elements/Craigslist/contactform');
	
	}


}

?>