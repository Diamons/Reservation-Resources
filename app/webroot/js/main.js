$(document).ready(function(){
	/*$('.score').raty({
		readOnly: true,
		path: getDomain()+'img/',
		score: function() {
		return $(this).attr('data-rating');
	  }
	});
	$("#star_rating").raty();*/

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
	
	$("#dashboard_container").hover(function(){
		$("#dashboard_notifications").fadeIn();
	});
	$("#dashboard_notifications").hover(function(){
	}, function(){
		$(this).fadeOut();
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

//google autocomplete
var elementId= document.getElementById("searchStart");
var autocomplete = new google.maps.places.Autocomplete(elementId);
google.maps.event.addListener(autocomplete, 'place_changed', function() {
 var place = autocomplete.getPlace();
		
		$(elementId).val(place.formatted_address);
var address = [];
 
 //lets extract and parse the data needed since address componants can be variable length
 for(i = 0; i < place.address_components.length;i++){
	
	if(place.address_components[i].types == "street_number"){
		address["street"] = place.address_components[i].long_name;
	
	}
	if(place.address_components[i].types == "route"){
		
		if(address["street"]!=null){
			address["street"]+= " "+place.address_components[i].long_name;
		}
		else{
			address["street"] = place.address_components[i].long_name;
		}
	}
	if(place.address_components[i].types == "sublocality,political"){
	
		address["city"] = place.address_components[i].long_name;
			
	}
	if(place.address_components[i].types == "locality,political" ){
			if(address["city"] == null){
				address["city"] = place.address_components[i].long_name;
			
			}
	}
	if(place.address_components[i].types == "administrative_area_level_1,political"){
	
		address["state"] = place.address_components[i].long_name;
	}
	if(place.address_components[i].types == "country,political"){
	
		address["country"] = place.address_components[i].long_name;
	}
	if(place.address_components[i].types == "postal_code"){
	
		address["zip"] = place.address_components[i].long_name;
	}
	
 }


$("#city").val(address["city"]);
$("#state").val(address["state"]);
$("#latitude").val( place.geometry.location.lat());
$("#longtitude").val( place.geometry.location.lng());


 });
