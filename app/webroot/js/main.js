$(document).ready(function(){
	$( "input[name='checkin'], input[name='checkout']" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	$("select, input:checkbox, input:radio, input:file").uniform();
});

	
