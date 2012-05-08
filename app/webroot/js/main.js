$(document).ready(function(){
	var div = $('header');
    var start = $(div).offset().top;
	/*
    $.event.add(window, "scroll", function() {
        var p = $(window).scrollTop();
        $(div).css('position',((p)>start) ? 'fixed' : 'static');
        $(div).css('top',((p)>start) ? '0px' : '');
    });
	*/
	$( "input[name='checkin'], input[name='checkout']" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
});