$(document).ready(function(){
	var highestCol = Math.max($('#features > div').height());
	$('#features > div').height(highestCol);
	
	$("#searchMain").focus();
	$('.carousel').carousel('cycle');
//google autocomplete
var elementId= document.getElementById("searchField")
var autocomplete = new google.maps.places.Autocomplete(elementId);
google.maps.event.addListener(autocomplete, 'place_changed', function() {
 var place = autocomplete.getPlace();
		
		$(elementId).val(place.formatted_address);



});

});
