$(document).ready(function(){
	$("#captions").animate({
		'left': 0
	}, 1400);
	
	var cur = $("#slider_images div"); 
	var count = 0;
	var delayTime = 6500;
	
	changeImage(count);
	
	setInterval(function(){
		if(count >= cur.length){
			count = 0;
		}
		changeImage(count);
	}, delayTime);

	function changeImage(index){
		$(cur[index]).fadeIn().delay(delayTime-200).fadeOut(400);
		var price = $(cur[index]).data('price');
		var location = $(cur[index]).data('location');
		$("#captions #price").text(price);
		$("#captions #location").text(location);
		count++;
	}
//google autocomplete
var elementId= document.getElementById("searchField")
var autocomplete = new google.maps.places.Autocomplete(elementId);
google.maps.event.addListener(autocomplete, 'place_changed', function() {
 var place = autocomplete.getPlace();
		
		$(elementId).val(place.formatted_address);


 });
//end google autocomplete
});
