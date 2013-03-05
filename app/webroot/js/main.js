$(document).ready(function(){
	/* Only if #MENU is not in the header, means user is not logged in */
	$("#menu > a").height($("#menu").outerHeight());
	$("#header #menu > a").height($("div#header").outerHeight());
	
		// hide #back-top first
	$("#back-top").hide();
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	$(window).bind("load", function() { 
		   
		   var footerHeight = 0,
			   footerTop = 0,
			   $footer = $("footer");
			   
		   positionFooter();
		   
		   function positionFooter() {
		   
					footerHeight = $footer.height();
					footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
				   if ( ($(document.body).height()+footerHeight) < $(window).height()) {
					   $footer.css({
							position: "absolute"
					   }).animate({
							top: footerTop
					   })
				   } else {
					   $footer.css({
							position: "static"
					   })
				   }
				   
		   }

		   $(window)
				   .scroll(positionFooter)
				   .resize(positionFooter)
				   
	});


	/* ANALYTICS */
		mixpanel.track("Page loaded", {"page name" : document.title, "url" : window.location.pathname, "pageVariation" : $("#pageName").text()});
		$("#listmyspace").click(function(){
			mixpanel.track("List My Space Clicked", {"page name" : document.title, "url" : window.location.pathname, "pageVariation" : $("#pageName").text()});
		});
	/* END ANALYTICS */
	/* INLINE LABELS */
	//$('div.input.text.required label, div.input.textarea.required label').inlineLabel();
	/* END INLINE LABELS */
	
	/*var highestCol = Math.max($('#header').height(),$('#menu > a').height());
	$('#header, #menu > a.clearfix').height(highestCol);*/
	

	$( "input[name='checkin'], input[name='checkout'], input.checkin, input.checkout" ).datepicker({ minDate: 0 });
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	$(".dashboard > ul > li a").click(function(){
		$(this).parent().find("ul li").stop(true,true).slideToggle();
	});
	Shadowbox.init({
			enableKeys:false,
			 skipSetup: true
	});	
	$(document).on("click", "#sb-overlay", function(){
		Shadowbox.close();
	});
	
	$(document).on('mouseenter','#dashboard_container',function(){
		if($("#dashboard_notifications").children().length >= 1){
			$("#dashboard_notifications").fadeIn();
		}
	});
	$(document).on('mouseleave',"#dashboard_notifications",function(){
	}, function(){
		$(this).fadeOut();
	});
	if($(".content").height() < $(".dashboard").height()){
		$(".content").css({'height': $(".dashboard").height()});
	}
	else if($(".content").height() > $(".dashboard").height()){
		$(".dashboard").css({'height': $(".content").height()});
	}

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
	
	
	

$("#searchStart").keydown(function (evt) {
//Deterime where our character code is coming from within the event
var charCode = evt.charCode || evt.keyCode;
if (charCode  == 13) { //Enter key's keycode
return false;
	}
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
		async:false,
		success:function(responseHtml){
			Shadowbox.open({
				content:    responseHtml,
				player:     "html",
				title:      title,
				height:     height,
				width:      width,
				handleOversize: "resize",
				modal: true
				
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
//since we have the lat and long lets approximate the reverse geo code zipcode if not supplied
//we pass the zip in for search
var geocoder =  new google.maps.Geocoder();
var latlng = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());
 geocoder.geocode({'latLng': latlng}, function(results, status){
	if(status == google.maps.GeocoderStatus.OK){
		
		 for(i = 0; i < results[0].address_components.length;i++){
		
			if(results[0].address_components[i].types == "postal_code"){
			
			address["zipcode"] = results[0].address_components[i].long_name;
			$("#zip").val(address["zipcode"]);
			}
		}
		$("#searchresultsForm").submit();
	}
 });





 });
