$(document).ready(function(){
	if($("#gallery").height() < $(".property_info").height()){
		$("#gallery").css("height", $(".property_info").height());
	}
	Galleria.loadTheme(getDomain()+'slider/themes/classic/galleria.classic.js');
    Galleria.run('#gallery');
	$('#gallery').data('galleria').play(4000);
	$.ajax({
		type:"POST",
		url:getDomain()+"calendar.php",
		success:function(responseHtml){
			$("#calendar").html(responseHtml);
		}
	});
	
	var myOptions = {
          center: new google.maps.LatLng(1, 1),
          zoom: 2,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  scrollwheel:false
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
		var markersArray = [];
		//updateMap(100, 250, 16);
		$("#map_canvas").live("mouseover", function(){
			options = { scrollwheel: true };
			setTimeout(function(){map.setOptions(options);}, 800);
		});
		$("#map_canvas").live("mouseout", function (){
			options = { scrollwheel: false };
			map.setOptions(options);
		});
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

function updateCalendar(x, y){
	$.ajax({
		type:"POST",
		url:getDomain()+"calendar.php?x="+x+"&y="+y,
		success:function(responseHtml){
			$("#calendar").html(responseHtml);
		}
	});
}