$(document).ready(function(){
	$("#main_slider").hide();
	$("#main_slider").fadeIn(1000);
	$(".caption").first().animate({
		'left': 0
	}, 1400);
	$(".caption").delay(400).animate({
		'left': 0
	}, 1400);
});
