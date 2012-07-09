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
	
$('.contact_me').on('click',function(){
	status = checkLoginStatus();
	if(status == true){
		var pid = $(this).data('pid');
		openLightBox(getDomain()+"messages/contactform/"+pid, "Contact Host", 980,275);
	}
		


});
$(document).on('submit','#MessageSubmitMessageForm',null,function(event){
	event.preventDefault();
		$.ajax({
			url:getDomain()+"messages/submitmessage",
			type:"POST",
			data:$('#MessageSubmitMessageForm').serialize(),
			success:function(data){
				Shadowbox.close();
				alert(data.data);
			}
		});
});
});