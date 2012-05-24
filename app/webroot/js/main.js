$(document).ready(function(){
	$( "input[name='checkin'], input[name='checkout']" ).datepicker();
	$('a#search').click(function(){
		$("#searchBar").stop(true,true).slideToggle(400);
	});
	$("select, input:checkbox, input:radio, input:file").uniform();
	//Notifications
	var notifications = new $.ttwNotificationCenter();
	notifications.initMenu({
		properties: "#properties",
		reservations: "#reservations",
		bookings: "#bookings",
		messages: "#messages"
	});
	
	notifications.createNotification({
		message: "Your stay at [Beautiful Home By Water] is coming up!",
		category: "bookings",
		type: 'none'
	});
	
	$("#location").click(function(){
		notifications.createNotification({
		message: "John Doe just commented on your property!",
		category: "properties",
		type: 'none'
		});
		
		notifications.createNotification({
		message: "John Doe just messaged you!!",
		category: "messages",
		type: 'none'
		});
		
		$.notification ({
			title:      'Your property [Apartment by Water with Great View] was just booked!',
			content:    'Please respond as soon as possible to the booking request. Any requests not responded to within 48 hours will automatically be rejected and negatively impact your rating.',
			timeout:    9000,
			border:     true,
			fill:       true,
			showTime:   true,
			icon:       'N',
			color:      '#333',
			error:      true
		});
		
		notifications.createNotification({
		message: "Your property [Apartment by Water with Great View] was just booked!",
		category: "reservations",
		type: 'none'
	});
		
	});
	$("#main_navigation ul a.clearfix").click(function(){
		$(this).children(".notification-bubble").click();
	});

});

	
function parseGeoCoordinates(type,geocode){
	return geocode;
	
}