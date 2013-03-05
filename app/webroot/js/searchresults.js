$(document).ready(function(){
	$('.score').raty({
		readOnly: true,
		path: getDomain()+'img/',
		score: function() {
		return $(this).attr('data-rating');
	  }
	});
	//May need to for loop through the elements
	
	var highestCol = Math.max($('.search_property > div > img').height(),$('.search_property .user_profile').height());
	$('.search_property > div > img, .search_property .user_profile').height(highestCol);
	
/*$('.contact_me_button').on('click',function(event){
	status = checkLoginStatus();
	//alert(status);
	if(status){
	
		var pid = $(this).data('pid');
		openLightBox(getDomain()+"messages/contactform/"+pid, "Contact Host", 980,275);
	}
		


});*/

$('.guest_host').on('click',function(event){

	status = checkLoginStatus();

	if(status){
		if($(this).data('type') == 'reg'){
			var pid = $(this).data('pid');
			openLightBox(getDomain()+"messages/contactform/"+pid, "Contact Host", 980,275);
		
		}
		else{
			var key = $(this).data('index');
			openLightBox(getDomain()+"craigslists/contactform/"+key, "Contact Host", 980,275);
		}
	
	}
		

});
$(document).on('submit','#MessageSubmitMessageForm',null,function(event){
	event.preventDefault();
		$.ajax({
			url:getDomain()+"messages/submitmessage",
			type:"POST",
			data:$('#MessageSubmitMessageForm').serialize(),
			beforeSend: function(xhr){
				Shadowbox.close();
				$('.info.ajaxmessage').slideDown();
			
			},
			success:function(data){
				if(data.success == true){
					$('.info.ajaxmessage').slideUp();
					$('.success.ajaxmessage').slideDown();
					setTimeout(function(){$('.success.ajaxmessage').slideUp();},5000);
				
				}
				else{
					$('.info.ajaxmessage').slideUp();
					$('.error.ajaxmessage').slideDown();
					setTimeout(function(){$('.error.ajaxmessage').slideUp();},5000);
				
				}
			}
		});
});

$(document).on('submit','#CraigslistSubmitMessageForm',null,function(event){
	event.preventDefault();
		$.ajax({
			url:getDomain()+"craigslists/index",
			type:"POST",
			data:$('#CraigslistSubmitMessageForm').serialize(),
			success:function(data){
				Shadowbox.close();
				alert(data.data);
			}
		});
});
});