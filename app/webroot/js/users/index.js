$(document).ready(function(){

	$("form#UserLoginForm").submit(function(event){
		event.preventDefault();
		$(".fieldError").remove();
		$.ajax({
			type:"POST",
			url:"http://localhost/cakephp/users/login",
			data:$(this).serialize(),
			success: function (data){
				if(data.success == false){
					$("#UserLoginForm #UserUsername ").css('border-color','red').after("<div style = 'color:red;'class = 'fieldError'>"+data.data+"</div");
					$("#UserLoginForm #UserPassword ").css('border-color','red');
				
				}
			}
		});
	});
	$("form#UserRegisterForm").submit(function(event){
		event.preventDefault();
		$(".fieldError").remove();
		$.ajax({
			type:"POST",
			url:"http://localhost/cakephp/users/register",
			dataType:"json",
			data:$(this).serialize(),
			success: function (data){
				
				if(data.success == false){
					$.each(data.data,function(field,value){
						$("#UserRegisterForm input[name$='data[User]["+field+"]']").css('border-color','red');
						$("#UserRegisterForm input[name$='data[User]["+field+"]']").after("<div style = 'color:red;'class = 'fieldError'>"+value+"</div");
						
					});
				$(".fieldError").effect("pulsate", {times: 1});
				}
				else{	//alert(data.success);
					$("form#UserRegisterForm").slideUp();
					
				}
			}
		});
	});

});
