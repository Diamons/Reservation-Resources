<?php
class CraigslistsController extends AppController{


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('getimages');
		$this->AjaxHandler->handle('index','getimages');
	}
	
	public function index(){
	
	//Debugger::log($this->request->data);
	$posts = $this->Session->read('Property.results');
	$key = $this->request->data['Craigslist']['key'];
	//Debugger::log($posts['results'][$this->request->data['Craigslist']['key']]);
	$this->Craigslist->set('user_id',$this->Auth->user('id'));
	$this->Craigslist->set('email',$posts['results'][$key]['annotations']['source_account']);
	$this->Craigslist->set('post_key',$posts['results'][$key]['id']);
	$this->Craigslist->set('url',$posts['results'][$key]['sourceUrl']);
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
	public function getimages($id = null){
		$this->Craigslist->id = $id;
		$this->loadModel('Search');
		$cl_property = $this->Craigslist->read();
		$property = $this->Search->previewproperty($cl_property['Craigslist']['post_key']);
		Debugger::log($property['results'][0]['images']);
		if(!empty($property['results'][0]['images'])){
			$response['success'] = true;
			//$response['data'] =  array('size'=>10000,'src'=>array('img'=>$property['results'][0]['images'],'name'=>basename($property['results'][0]['images']),'type'=>'jpg');
			$links = array();
			foreach($property['results'][0]['images'] as $key =>$value){
					$links[$key] = json_encode(array('src'=>$property['results'][0]['images'][$key],'name'=>basename($property['results'][0]['images'][$key]),'mozFullPath'=>$property['results'][0]['images'][$key],'size'=>10000));
			}
			$response['data'] = $links;
		}
		return $this->AjaxHandler->respond('json',$response);
	}


}

?>