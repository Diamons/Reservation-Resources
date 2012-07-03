$(document).ready(function(){
	$('.score').raty({
		readOnly: true,
		path: getDomain()+'img/',
		score: function() {
		return $(this).attr('data-rating');
	  }
	});
	//May need to for loop through the elements
	
	var highestCol = Math.max($('.search_property > div > img').height(),$('.search_property .user_profile').height());
	$('.search_property > div > img, .search_property .user_profile').height(highestCol);
});