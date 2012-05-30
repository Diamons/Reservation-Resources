$(document).ready(function(){
	$( "input[name='checkin'], input[name='checkout']" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	$("select, input:checkbox, input:radio, input:file").uniform();
	Shadowbox.init({
		handleOversize: "drag",
		modal: true
	});	
});

function checkLoginStatus(){
	var auth;
		$.ajax({
			type:"POST",
			url:getDomain()+"users/checkloginstatus",
			dataType:"json",
			async: false,//we set async to false, usually defeats purpose of js but we need to make sure the auth variable gets set
			success:function(data){
				if(data.success == false){//user is not logged in
					auth = data.success;
					$.ajax({
						type:"POST",
						url:getDomain()+"users/getloginpage",
						success:function(responseHtml){
							Shadowbox.open({
								content:    responseHtml,
								player:     "html",
								title:      "Please Signup or Login",
								height:     $(window).height(),
								width:      $(window).width()
							});
							eval($("#sb-player"));
						}
					});						
				}
				else{//user is logged in
					auth =  data.success
				}
			}
			
			
		});
	return auth;
}

function getDomain(){
	return "http://localhost/cakephp/";
}

$("form#UserLoginForm").live("submit", function(event){
	event.preventDefault();
	$("form#UserLoginForm .fieldError").remove();
	$.ajax({
		type:"POST",
		url:$("form#UserLoginForm").attr('action'),
		data:$(this).serialize(),
		success: function (data){
			if(data.success == false){
				$("#UserLoginForm #UserUsername ").css('border-color','red').after("<div style = 'color:red;'class = 'fieldError'>"+data.data+"</div");
				$("#UserLoginForm #UserPassword ").css('border-color','red');
			
			}
		}
	});
});
$("form#UserRegisterForm").live("submit", function(event){
	event.preventDefault();
	$("form#UserRegisterForm .fieldError").remove();
	$.ajax({
		type:"POST",
		url:$("form#UserRegisterForm").attr('action'),
		dataType:"json",
		data:$(this).serialize(),
		success: function (data){
			
			if(data.success == false){
				$.each(data.data,function(field,value){
					prompt(data.data);
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

	
