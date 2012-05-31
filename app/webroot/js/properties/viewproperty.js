$(document).ready(function(){
	Galleria.loadTheme(getDomain()+'slider/themes/classic/galleria.classic.js');
    Galleria.run('#gallery');
	
	var myOptions = {
          center: new google.maps.LatLng(1, 1),
          zoom: 2,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
		var markersArray = [];
		//updateMap(100, 250, 16);
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