$(document).ready(function(){
	var highestCol = Math.max($('#features > div').height());
	$('#features > div').height(highestCol);
	
	$("#searchMain").focus();
	$('.carousel').carousel('cycle');
//google autocomplete
//google autocomplete
var elementId= document.getElementById("searchMain");

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
	
	}
 });


 });
 
 $("#bigGreenSearchButton").on("click",function(){
 
	$("#searchresultsForm").submit();
 
 });
});

