
function getDomain(){
	return "http://reservationresources.com/"
}
function checkRedirectStatus(){
	var path = location.pathname;
	
	path = path.split('/');
	//commented the following out to implement ajax login change instead of refreshing
	/*if($.inArray('properties',path) != -1 || $.inArray('finalizeposting',path) != -1){
		return false;
	}
	else{
		return true;
	}*/
	return false;
}
function updateCalendar(x,y,z){

		$.ajax({
			type:"POST",
			url:getDomain()+"bookings/calendar",//?x="+x+"&y="+y,
			data:"x="+x+"&y="+y+"&pid="+z,
			success:function(responseHtml){
				$("#calendar").html(responseHtml);
			}
		});
}
function updateFullCalendar(x,y,z){

		$.ajax({
			type:"POST",
			url:getDomain()+"bookings/fullcalendar",//?x="+x+"&y="+y,
			data:"x="+x+"&y="+y+"&pid="+z,
			success:function(responseHtml){
				$("#calendar").html(responseHtml);
			}
		});
}
function leaveMessage(rid,status){
	openLightBox(getDomain()+"messages/sendmessage/"+rid+"/"+status, "Send your message below", 740, 480);
}
	
$(document).ready(function(){

	$(document).on('click','#loginbutton',function(event){
		event.preventDefault();
		$("form#UserLoginForm .fieldError").remove();
		$.ajax({
			type:"POST",
			url:$("form#UserLoginForm").attr('action'),
			data:$("form#UserLoginForm").serialize(),
			success: function (data){
				
				if(data.success == false){
					$("#UserLoginForm #UsernameLogin ").css('border-color','red').after("<div style = 'color:red;'class = 'fieldError'>"+data.data+"</div");
					$("#UserLoginForm #UserPassword ").css('border-color','red');
				
				}
				else{
					
					Shadowbox.close();
					var redirectStatus = checkRedirectStatus();
				
					if(redirectStatus == true){
						location.reload(true);
					}
					else{
						$("#menu").remove();
						$('#header').fadeOut('slow', function() {
							$('#header').replaceWith(function(){
								return $(data).hide().fadeIn('slow');
								 	
							});
							$( "#header" ).promise().done(function() {//promise function only fires after all match elements are compelted animating
								socket.emit('set id',$("#usersocket").data("uid"));
							});
							
						});
						
					}
			
				}
				//id = $("#usersocket").data("uid");
				//alert(id);
						
			}
		});
	});
	$(document).on("click","#registerbutton", function(event){
		event.preventDefault();
		$("form#UserRegister .fieldError").remove();
		$.ajax({
			type:"POST",
			url:$("form#UserRegister").attr('action'),
			data:$("form#UserRegister").serialize(),
			success: function (data){
				if(data.success == false){
					$.each(data.data,function(field,value){
						$("#UserRegister input[name$='data[User]["+field+"]']").css('border-color','red');
						$("#UserRegister input[name$='data[User]["+field+"]']").after("<div style = 'color:red;'class = 'fieldError'>"+value+"</div");
						
					});			
				}
				else{	
					Shadowbox.close();
					//$("form#UserRegister").slideUp();
					var redirectStatus = checkRedirectStatus();
				
					if(redirectStatus == true){
						location.reload(true);
					}
					else{
						$("#menu").remove();
						$('#header').fadeOut('slow', function() {
							$('#header').replaceWith(function(){
								 return $(data).hide().fadeIn('slow');
							});
							$( "#header" ).promise().done(function() {//promise function only fires after all match elements are compelted animating
								socket.emit('set id',$("#usersocket").data("uid"));
							});
							
						});
						
						
						
					}
			
				
					
				}
			}
		});
	});
	
	$(document).on("click","#logout",function(event){
	
		$.ajax({
			type:"POST",
			url:getDomain()+"users/logout",
			success:function(data){
				if(data.success != false){
					$(".usermenu").remove();
					$('#header').fadeOut('slow', function() {
					$('#header').replaceWith(function(){
						return $(data).hide().fadeIn('slow');
							});
							
					});
					
				}
			
			}
		
		});
	
	});



});