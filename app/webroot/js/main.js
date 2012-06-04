$(document).ready(function(){
	$( "input[name='checkin'], input[name='checkout'], input.checkin, input.checkout" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	Shadowbox.init({
		handleOversize: "drag",
		modal: true
	});	
	$("#sb-overlay").on("click", function(){
		Shadowbox.close();
	});
	
	$("form.formee div.input.textarea label, form.formee div.input.text label").livequery(function(){
		$("form.formee div.input.textarea label, form.formee div.input.text label").inFieldLabels();
	});
	$("input:checkbox, input:radio, input:file").uniform();
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
								height:     $(window).height()- 120,
								width:      $(window).width() - 120
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

$("form#UserLoginForm").on("submit", function(event){
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
$("form#UserRegisterForm").on("submit", function(event){
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

	
