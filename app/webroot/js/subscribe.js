function chat(){
	$zopim.livechat.say("I'm interested in a room for rent!");
}
$(document).ready(function(){
setTimeout(chat,5000);
	window.onload = function() {
		$.ajax({
		type:"POST",
		url:getDomain()+"subscriptions",
		async:false,
		success:function(responseHtml){
			Shadowbox.open({
				content:    responseHtml,
				player:     "html",
				title:      "",
				height:     580,
				width:     680,
				handleOversize: "resize",
				modal: true
				
			});
			eval($("#sb-player"));
		} 
	});	
	}

	var formId		= '#SubscriptionIndexForm';	// id of your form <form id=""
	var button		= '#SubscribeEmail';	// id of your submit <input id="" type="submit"
	var validate	= ajaxValidation();

	$("body").on("submit", formId, function(){
		event.preventDefault();
		var	url		= $(formId).attr('action');
		var element	= $(formId);
		
		validate.doPost({
			url: url,
			element: element,
			callback: function(message) {
				$("#subscribeAjaxContent").fadeOut().fadeIn().html("<h2><b>Success! You have been subscribed to our newsletter!</b></h2>")
			}
		});
		
		return false; // prevent the browser from submitting the form the normal way
	});
});