$(document).ready(function(){

jQuery.fx.interval = 0;
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    skipSetup: true
});
var myOptions = {
          center: new google.maps.LatLng(1, 1),
          zoom: 2,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
		var markersArray = [];
		
//google autocomplete
var elementId= document.getElementById("address");
var autocomplete = new google.maps.places.Autocomplete(elementId);
google.maps.event.addListener(autocomplete, 'place_changed', function() {
	
	var place = autocomplete.getPlace();
	updateMap(place.geometry.location.lat(), place.geometry.location.lng(), 16);

	
	$(elementId).val(place.formatted_address);
	//alert(place.address_components);
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

$("#PropertyAddress").val(address["street"]);
$("#PropertyCity").val(address["city"]);
$("#PropertyState").val(address["state"]);
$("#PropertyCountry").val(address["country"]);
$("#PropertyZipCode").val(address["zip"]);
$("#PropertyLatitude").val( place.geometry.location.lat());
$("#PropertyLongtitude").val( place.geometry.location.lng());
$('input').css('border-color','#c6c6c6');
$('.fieldError').remove();
//lets show the hidden input elements upon google request completion
if(!$("#PropertyAddress").val()){
	$("#PropertyAddress").css('border-color','red');
	$("#PropertyAddress").after("<div style = 'color:red;'class = 'fieldError'>Sorry our system could not find your address,can you help us out?</div");
	
}
if(!$("#PropertyCity").val()){
	$("#PropertyCity").css('border-color','red');
	$("#PropertyCity").after("<div style = 'color:red;'class = 'fieldError'>Sorry our system could not find your city/town,can you help us out?</div");
	
}

if(!$("#PropertyState").val()){
	$("#PropertyState").css('border-color','red');
	$("#PropertyState").after("<div style = 'color:red;'class = 'fieldError'>Sorry our system could not find your state/region,can you help us out?</div");
	
}
if(!$("#PropertyZipCode").val()){
	$("#PropertyZipCode").css('border-color','red');
	$("#PropertyZipCode").after("<div style = 'color:red;'class = 'fieldError'>Sorry our system could not find your zip/postal code,can you help us out?</div");
	
}

if(!$("#PropertyCountry").val()){
	$("#PropertyCountry").css('border-color','red');
	$("#PropertyCountry").after("<div style = 'color:red;'class = 'fieldError'>Sorry our system could not find your country,can you help us out?</div");
	
}


$("#PropertyAddress").parent().slideDown(500);
$("#PropertyCity").parent().slideDown(500);
$("#PropertyState").parent().slideDown(500);
$("#PropertyZipCode").parent().slideDown(500);
$("#PropertyCountry").parent().slideDown(500);
$('.fieldError').effect('pulsate');

 });
//end google autocomplete
$("#PropertyAddress").parent().hide();
$("#PropertyCity").parent().hide();
$("#PropertyState").parent().hide();
$("#PropertyZipCode").parent().hide();
$("#PropertyCountry").parent().hide();

function updateMap(lati, longi, zoom){
	if(markersArray[0]!=undefined){
		markersArray[0].setMap(null);
	}
	var latLng = new google.maps.LatLng(lati, longi);
		var marker = new google.maps.Marker({
		  animation: google.maps.Animation.DROP,
		  position: latLng,
		  map: map
	  });
	  map.setCenter(latLng);
	  map.setZoom(zoom);
	  markersArray[0] = marker;
}
});
