$(document).ready(function(){


	function changeImage(index){
		$(cur[index]).fadeIn().delay(delayTime-200).fadeOut(400);
		var price = $(cur[index]).data('price');
		var location = $(cur[index]).data('location');
		$("#captions #price").text(price);
		$("#captions #location").text(location);
		count++;
	}

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
