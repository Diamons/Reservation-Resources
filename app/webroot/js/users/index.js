$(document).ready(function(){

	$("form#UserLoginForm").submit(function(event){
		event.preventDefault();
		$.ajax({
			type:"POST",
			url:"login",
			data:$(this).serialize(),
			success: function (data){
				alert(data.data);
			}
		});
	});
	$("form#UserRegisterForm").submit(function(event){
		event.preventDefault();
		$(".fieldError").remove();
		$.ajax({
			type:"POST",
			url:"register",
			dataType:"json",
			data:$(this).serialize(),
			success: function (data){
				
				if(data.success == false){
					$.each(data.data,function(field,value){
						$("#UserRegisterForm input[name$='data[User]["+field+"]']").css('border-color','red');
						$("#UserRegisterForm input[name$='data[User]["+field+"]']").after("<div style = 'color:red;'class = 'fieldError'>"+value+"</div");
						
					});
				$(".fieldError").effect("pulsate");
				}
				else{	//alert(data.success);
					$("form#UserRegisterForm").slideUp();
					
				}
			}
		});
	});

});
