function getDomain(){
		return "http://localhost/cakephp/";
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
				}
			}
		});
	});
	$(document).on("click","#registerbutton", function(event){
		event.preventDefault();
		$("form#UserRegister .fieldError").remove();
		$.ajax({
			type:"POST",
			url:$("form#UserRegister").attr('action'),
			dataType:"json",
			data:$("form#UserRegister").serialize(),
			success: function (data){
				
				if(data.success == false){
					$.each(data.data,function(field,value){
						$("#UserRegister input[name$='data[User]["+field+"]']").css('border-color','red');
						$("#UserRegister input[name$='data[User]["+field+"]']").after("<div style = 'color:red;'class = 'fieldError'>"+value+"</div");
						
					});			
				}
				else{	//alert(data.success);
					$("form#UserRegister").slideUp();
					
				}
			}
		});
	});


});