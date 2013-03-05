<?php

	class PropertiesController extends AppController{
		public function beforeRender(){
			parent::beforeRender();
		}
		public function beforeFilter(){
			parent::beforeFilter();
				$this->Auth->allow('index', 'viewproperty','quickbook','finalizeposting','preview');
				$this->AjaxHandler->handle('quickbook','post','comment');
				$this->Cookie->time = 31536000; // cookie valid for one year before expiration  
		}
		public function index(){
			$this->set('title_for_layout', 'List your space, room, or vacation rental for free');
			if($this->request->is('post')&&$this->Auth->loggedIn()){
				$this->Property->set('user_id',$this->Auth->user('id'));
				$this->Property->set('status','0');
				
	
				if($this->data['Image']){
					$this->Property->set('default_image',$this->data['Image'][0]);
					$property_pictures = $this->data['Image'];//set property pictures array
				}
				if($this->Property->save($this->request->data)){
					$this->loadModel('Fee');//lets set the default extra guest fee for saving
					$this->loadModel('Notification');//set notification for user to add additional property details
					$this->Notification->setNotification($this->Auth->user('id'),1,$this->webroot.'properties/edit/'.$this->Property->id,'Reservation Resources recommend that you update your property to include items such as amenities, fees, etc. Doing so will help potential guest make a better informed decision','Additional Property Information','Add Property Details');
					$this->Notification->save();
					$this->Fee->set('property_id',$this->Property->id);
					$this->Fee->set('fee_name','fee per extra guest');
					$this->Fee->set('fee_price','0.00');
					$this->Fee->set('required','0');
					$this->Fee->save();
					if(!empty($this->request->data['Craigslist']) && isset($this->request->data['Craigslist'])){
						$this->loadModel('Craigslist');
						//since i kept the two models seperate and didnt bind assocation we need to update the craigslist table if this property was reffered by craigslist.
						$this->Craigslist->id = $this->request->data['Craigslist']['id'];
						$this->Craigslist->set('active',false);
						$this->Craigslist->set('owner_id',$this->Auth->user('id'));
						$this->Craigslist->save($this->request->data);//we still need to move the actual message to users inbox
						//we will move the craigslist message to user inbox if any
						$this->Craigslist->moveToInbox($this->Craigslist->id,$this->Property->id);
					
					}
					
				
					$this->Property->createPropertyFolder($this->Property->id,$this->Auth->user('id'),$property_pictures);
					if($property_pictures){
						if($this->Property->handleImage($this->Property->id,$this->Auth->user('id'),$property_pictures)){
							$this->Notification->create();
							$this->Notification->setNotification($this->Auth->user('id'),2,$this->webroot.'properties/viewproperty/'.$this->Property->id,'Congrats your property is active! Click the button below to view your live listing','Your property:'.$this->request->data['Property']['title'].' is live!','View Property');
							$this->redirect(array('controller'=>'dashboard','action'=>'index'));
						}
						else{
							$this->Session->setFlash('Your property is live, but we could not upload your images at this time. Sorry for the inconvenience. You can add images by clicking on edit in your property information page','flash_success');
							$this->redirect(array('controller'=>'dashboard','action'=>'index'));
						}
					}
					else{
						$this->Notification->create();
						$this->Notification->setNotification($this->Auth->user('id'),0,$this->webroot.'properties/edit/'.$this->Property->id,'Although your property is live it is highly recommended that you upload property pictures. Please do so now by click the button below','Upload Property Photos','Add Images');
						$this->Notification->save();
						$this->redirect(array('controller'=>'dashboard','action'=>'index'));
					}
					
				}
				else{
						$this->Session->setFlash('Oops! It seems you may have some incorrect fields','flash_error');
				}
			}
	
		}
		
		
		public function viewpropertyajax($property_id = NULL){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$this->Property->id = $property_id;
			$this->set('property', $this->Property->read());
			$this->render('/elements/Property/viewpropertyajax');
		}
		public function viewproperty($property_id = null){
			$this->loadModel('Amenity');
			$this->Cookie->path = '/properties/viewproperty/'.$property_id;//set path for cookie to update count
			$this->Property->id = $property_id;
			$this->Property->contain(array('Review'=>array('User'),'User','Fee','Amenity','Booking'));
			$property = $this->Property->read();
			$property['Amenity'] = $this->Amenity->parseAmenity($property['Amenity'],true);
			$this->set('property',$property);
			$this->set('images',$this->Property->findPropertyImages($property['User']['id'],$property['Property']['id']));
			//set title for layout
			$this->set('title_for_layout', $property['Property']['title']);
			if(!$this->Cookie->read('viewed')){
				$this->Property->updateAll(array('Property.viewcount'=>'Property.viewcount+1'), array('Property.id'=>$property_id));
				$this->Cookie->write('viewed', 'true',false);
				
			}//lets set if the review button should be generated or not
			//the button gets displayed if a reservation is created and todays date is > than booking start date and they have not left a review before.
			$this->loadModel('Reservation');
			$reservations = $this->Reservation->find('all',array('conditions'=>array('Reservation.user_id'=>$this->Auth->user('id'),'Reservation.property_id'=>$property_id)));
			if(!empty($reservations)){
				$last_booking = end($reservations);
				$date = strtotime($last_booking['Booking']['start_date']);
				$today = strtotime('now');
					if($today > $date){
						$this->set('reviewButton',true);
					}
					else{
						$this->set('reviewButton',false);
					}
			}
			else{
				$this->set('reviewButton',true);
			}
		
		}
		public function edit($property_id = null){
			$this->Property->id = $property_id;
			
				if($this->request->is('get')){
					$this->loadModel('Amenity');//need to load this model since i need to modify the amenity results
					$this->request->data = $this->Property->read();
					$this->request->data['Amenity'] = $this->Amenity->parseAmenity($this->request->data['Amenity'],false);
					$this->set('propertyid',$property_id);
					
				}
				else{
					if(isset($this->data['Image'])){
						//Debugger::log($this->data['Image']);
						$this->request->data['Property']['default_image'] = $this->data['Image'][0] ;//we will set it to index 0 for now until we add default image functionality
					}
					if($this->Property->saveAssociated($this->request->data)){
						if(isset($this->data['Image'])){
							//Debugger::log($this->data['Image']);
							$this->Property->handleImage($property_id,$this->Auth->user('id'),$this->data['Image']);
						}
						$this->Session->setFlash('Congrats! Your property has been updated','flash_success');
						$this->redirect(array('controller'=>'properties','action'=>'viewproperty',$property_id));
					}
					else{
						$this->Session->setFlash('Sorry, we could not update your property at this time. Please double check for any information error', "flash_error");
					}
					$this->set('propertyid',$property_id);
					
				}
				
		
		}
		public function quickbook(){
			$this->loadModel('Booking');//since model are lazy loaded we need to load the booking model at this point
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			//lets access our post data from ajax
			$checkin = $this->request->data['checkin'];
			$checkout = $this->request->data['checkout'];
			if(!empty($checkin)&&!empty($checkout)&&!empty($this->request->data['pid'])){
				$this->Property->id = $this->request->data['pid'];
				$property = $this->Property->read();//need to retrieve price information
				$guest = $this->request->data['guest'];
				if($property['Property']['minimum_stay'] <= $this->Booking->getDates($checkin,$checkout,"interval",null)){
					$response['data'] = $this->Booking->quickbook($checkin,$checkout,$guest,$property['Property']['price_per_night'],$property['Property']['price_per_week'],$property['Property']['price_per_month'],$property['Fee'][0]['fee_price'],$property['Fee']);
					$response['success'] = true;
					return $this->AjaxHandler->respond('json',$response);
				}
				else{
					$response['success'] = false;
					$response['data'] = $property['Property']['minimum_stay'];
					return $this->AjaxHandler->respond('json',$response);
				}
			}
			else{
				return $this->AjaxHandler->respond('json',$response);
			}
		}
		

		public function post(){
			$this->autoLayout = FALSE;
			$this->layout = 'ajax';
			$response = array('success'=>false);
			$html = $this->Property->postToCraigslist($this->request->data('area'),$this->request->data('step'),$this->request->data('title'),$this->request->data('description'),null, $this->request->data('pid'));
			$response['success'] = true;
			$response['data'] = $html;
			
			return $this->AjaxHandler->respond('json',$response);
		
		}
		public function comment($pid = null){
			$this->autoLayout = false;
			$this->layout = 'ajax';
			if($this->request->data){
				$this->loadModel('Review');
				$this->Review->set('review',$this->request->data['comment']);
				
				if($this->Review->save($this->request->data)){
				//we save the comment first along with rating then requery database to get an updated avg then save the property model with the updated avg
					$avg = $this->Review->find( 'all',array('conditions' => array( 'Review.property_id' => $this->request->data['Review']['property_id'] ),'recursive' => 0,'fields'=> array( 'AVG( Review.rating) AS average')));
					$response['success'] = true;
					$this->Property->id = $this->request->data['Review']['property_id'];
					$this->Property->set('rating',$avg[0][0]['average']);
					$this->Property->save();
					//once property has been updated we send the user a notification
					$this->loadModel('Notification');
					$this->Property->contain(array());
					$owner = $this->Property->read(array('user_id','id'),$pid);
					$this->Notification->setNotification($owner['Property']['user_id'],3,$this->webroot.'properties/viewproperty/'.$owner['Property']['id']."#reviews",'You have received a new property comment on one of your properties. Click the button below to view your property comments','New Comment','View Property Comments');
					$this->Notification->save();
				}
				else{
					$response['success'] = false;
				}
				return $this->AjaxHandler->respond('json',$response);
			}
			else{
				$this->set('pid',$pid);
				$this->render('/Elements/comment');
			}
		
		}
		public function finalizeposting($uuid = null){
			if(!empty($uuid)){
				$this->loadModel('Craigslist');
				$this->Session->setFlash('Please finalize your property posting. Once complete you will be redirected to your dashboard where you can access your new message in your inbox on the left','flash_success');
				$this->Craigslist->id = $uuid;
				$posting = $this->Craigslist->read();
				//Debugger::log($posting);
				$this->set('title',$posting['Craigslist']['title']);
				$this->set('description',$posting['Craigslist']['body']);
				$this->set('uuid',$posting['Craigslist']['id']);
				$this->set('finalizeposting',true);
				$this->render('index');
			
			}
			else{
				$this->redirect(array('controller'=>'properties','action'=>'index'));
			}
		
		}
		
		public function preview($key = null,$postkey = null){//this will preview the cl post
		$properties = $this->Session->read('Property.results');
			if(!empty($key) && $properties['results'][$key]['id'] == $postkey){
				$results = $properties;
				$this->set('property',$results['results'][$key]);
				$this->set('index',$key);
				$this->set('title_for_layout', $results['results'][$key]['heading']);
			
			}
			else{//query 3 taps for data
				$this->loadModel('Search');
				$results = $this->Search->previewproperty($postkey);
			
				$this->set('property',$results['results'][0]);
				$this->set('index',0);
				$this->set('title_for_layout', $results['results'][0]['heading']);
			}
			
		
		}

	}
?>