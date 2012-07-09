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

$('.contact_me').on('click',function(){
	status = checkLoginStatus();
	if(status == true){
		var pid = $(this).data('pid');
		openLightBox(getDomain()+"messages/contactform/"+pid, "Contact Host", 980,275);
	}
		


});
$('#easybook').on('click',function(){
	status = checkLoginStatus();
	if(status == true){
		$("#easyBookForm").submit();
	}

});
$(document).on('click','#comment',null,function(){
	var pid = $(this).data('pid');
	status = checkLoginStatus();
	if(status == true){
		openLightBox(getDomain()+"properties/comment/"+pid, "Leave Property Review", 980,350);
	
	
	}

});
$(document).on('click','#submitCommentButton',null,function(){
	var  html = $('pre').html();
	var comment = $(html).text();
//	var rating = $('#rating').val();
	//alert(comment);
	//alert(rating);
	$.ajax({
		url:getDomain()+"properties/comment/",
		data: $("#PropertyCommentForm").serialize()+'&comment='+comment,
		type:'POST',
		success:function(data){
			if(data.success == true){
				
				Shadowbox.close();
				alert('Review submitted');
			}
			else{
				Shadowbox.close();
				alert('We could not submitt your review at this time.');
			}
		}
	
	});

});
$(document).on('submit','#MessageSubmitMessageForm',null,function(event){
	event.preventDefault();
		$.ajax({
			url:getDomain()+"messages/submitmessage",
			type:"POST",
			data:$('#MessageSubmitMessageForm').serialize(),
			success:function(data){
				Shadowbox.close();
				alert(data.data);
			}
		});
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
						$("#price").text("$"+data.data.subtotal).css('color','green');
					}
					else{
						$("#price").text("The minimum stay restrictions is "+data.data+" days").effect('pulsate').css('color','red');
					}
				}
			});
		}
	
	}
/*$('.score').raty({
		readOnly: true,
		
		score: function() {
		return $(this).attr('data-rating');
	  }
	});*/
$('.score').raty({
  readOnly : true,
  score    :  function() {
		return $(this).attr('data-rating');
	  },
  path: getDomain()+'img/',
});
//$('#star').raty();



