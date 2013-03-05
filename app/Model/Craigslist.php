<?php
App::uses('Topic','Model');
App::uses('Message','Model');
App::uses('CakeEmail', 'Network/Email');
App::uses('User','Model');
class Craigslist extends AppModel{
	public $name = 'Craigslist';
	
	
	public function moveToInbox($id = null,$pid = null){
	
		if(!empty($id)&&!empty($pid)){
			$topic = new Topic();
			$this->id = $id;
			$result = $this->read();
			$topic->set('property_id',$pid);
			$topic->set('from_user_id',$result['Craigslist']['user_id']);
			if($topic->save()){
				$message = new Message();
				$message->set('topic_id',$topic->id);
				$message->set('message',$result['Craigslist']['message']);
				$message->save();
				
			
			}
			 
			
		
		
		
		}
	
	}
	public function afterSave($created){
		if($created){
			
			//lets shorten link
			$short = $this->make_bitly_url('http://reservationresources.com/properties/finalizeposting/'.$this->id,'reservationresources','R_e80a3316f87076e6b58c279201978809','json','2.0.1');
			$email = new CakeEmail('craigslist');
			$email->viewVars(array('hash' => $short,'cluser'=>$this->data['Craigslist']['email'],'clmessage'=>$this->data['Craigslist']['message']));
			$email->template('email_craigslist_owner')->emailFormat('html');
			$email->sender('noreply@reservationresources.com')->to('noreply@reservationresources.com')->subject('You have a property inquery on Reservation Resources')->send(); 
		
		}
	
	}
	public function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1'){
	
		$bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;
		$response = file_get_contents($bitly);
 
		if(strtolower($format) == 'json') {
			$json = @json_decode($response,true);
			return $json['results'][$url]['shortUrl'];
		}
		else{
			$xml = simplexml_load_string($response);
			return 'http://bit.ly/'.$xml->results->nodeKeyVal->hash;
			}
	}
	function random_gen($length){
		$random= "";
		srand((double)microtime()*1000000);
		$char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$char_list .= "abcdefghijklmnopqrstuvwxyz";
		$char_list .= "1234567890";

		for($i = 0; $i < $length; $i++)  {    
			$random .= substr($char_list,(rand()%(strlen($char_list))), 1);  
			}  
		return $random;
		}
	
}

?>