$(document).ready(function(){
	if($("#gallery").height() < $(".property_info").height()){
		$("#gallery").css("height", $(".property_info").height());
	}
	Galleria.loadTheme(getDomain()+'slider/themes/classic/galleria.classic.js');
    Galleria.run('#gallery');
	$('#gallery').data('galleria').play(4000);
	var latitude = $("#map_canvas").data("lat");
	var longtitude = $("#map_canvas").data("long");
	var myOptions = {
          center: new google.maps.LatLng(1, 1),
          zoom: 2,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
		  scrollwheel:false
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            myOptions);
		var markersArray = [];
		updateMap(latitude, longtitude, 16);
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
function quickbook(){
	
		var checkout = new Date($("#BookingEndDate").val());
		var checkin = new Date($("#BookingStartDate").val());
		var guest = $("#BookingGuest").val();
		if((checkin != null) &&(checkout != null) && (checkout >= checkin)){
		
			$.ajax({
				type:"POST",
				data:"checkin="+$("#BookingStartDate").val()+"&checkout="+$("#BookingEndDate").val()+"&guest="+guest+'&pid='+$('#BookingPropertyId').val(),
				url:getDomain()+"properties/quickbook",
				success:function(data){
					if(data.success == true){
						$("#price").text("$"+data.data).css('color','green');
					}
					else{
						$("#price").text("The minimum stay restrictions is "+data.data+" days").effect('pulsate').css('color','red');
					}
				}
			});
		}
	
	}
$('#easybook').on('click',function(){
	var status = checkLoginStatus();
	if(status == true ){
		$.ajax({
			type:"POST",
			data:$("#BookingEasybookForm").serialize(),
			url:getDomain()+"bookings/easybook",
			success:function(data){
				if(data.success == true){
					alert('Dates successfully saved');
				}
				else{
					alert('Dates not saved!!!!!');
				}
		
			}
		})
	
	}


});





