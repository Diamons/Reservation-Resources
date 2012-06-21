$(document).ready(function(){

	$( "input[name='checkin'], input[name='checkout'], input.checkin, input.checkout" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	$(".dashboard > ul > li a").click(function(){
		$(this).parent().find("ul li").stop(true,true).slideToggle();
	});
	Shadowbox.init({
		handleOversize: "drag",
		modal: true
	});	
	$(document).on("click", "#sb-overlay", function(){
		Shadowbox.close();
	});
	
	if($(".content").height() < $(".dashboard").height()){
		$(".content").css({'height': $(".dashboard").height()});
	}
	else if($(".content").height() > $(".dashboard").height()){
		$(".dashboard").css({'height': $(".content").height()});
	}
	$("form.formee div.input.textarea label, form.formee div.input.text label").livequery(function(){
		$("form.formee div.input.textarea label, form.formee div.input.text label").inFieldLabels();
	});
	$(".quickinfo").livequery(function(){
		  Tipped.create('.quickinfo');
		  Tipped.create('.quickinfo.ajax', {
			ajax: true,
			closeButton: true,
			closeButtonSkin: 'default'
		  });
	});
	$("input:checkbox, input:radio, input:file").uniform();
	$("#calendar_button").on("click", function(){
		$("#calendar").stop(true,true).slideToggle();
	});
});

function checkLoginStatus(){
	var auth;
		$.ajax({
		type:"POST",
		url:getDomain()+"users/checkloginstatus",
		dataType:"json",
		async: false,
		success:function(data){
			auth = data.success;
			if(data.success == false){
				//user is not logged in
				openLightBox(getDomain()+ "users/getloginpage", "Please login or signup to use this feature", 980, 700);
				
			
			} 
		}

	});
	return auth;


}

function openLightBox(url, title, width, height){
	$.ajax({
		type:"POST",
		url:url,
		success:function(responseHtml){
			Shadowbox.open({
				content:    responseHtml,
				player:     "html",
				title:      title,
				height:     height,
				width:      width
			});
			eval($("#sb-player"));
		} 
	});	
}
