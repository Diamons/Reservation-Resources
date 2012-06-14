$(document).ready(function(){
	var currentUrl = String(window.location.hash);
	var currentUrl = currentUrl.substring(currentUrl.lastIndexOf("#")+1, currentUrl.length)
	if(currentUrl === ""){
		updatePage('notifications');
	}else{
		updatePage(currentUrl);
		$("#dashboard li, #dashboard li i").removeClass("active").removeClass("icon-white");
		$("a[href='#"+currentUrl+"']").parent("li").addClass("active").find("i").addClass("icon-white");
	}
	$("#dashboard a").on("click", function(event){
		$("#dashboard li, #dashboard li i").removeClass("active").removeClass("icon-white");
		$(this).parent("li").addClass("active").find("i").addClass("icon-white");
		updatePage($(this).attr('href').replace(/\#/, ""));
	});
	
	$("#content").on("mouseover", ".person", function(event){
		userId = $(this).data('id');
		$("#calendar .dates div.pending").each(function(){
			if($(this).data('user-id') == userId)
				$(this).addClass("pending_hover");
		});
	});
	$("#content").on("mouseout", ".person", function(){
		$("#calendar .dates div.pending_hover").each(function(){
			$(this).removeClass("pending_hover");
		});
	});
	$("#content").on("click", '#questions > ul > li > a', function(event){
		if($("#answer").data('question-id') == $(this).data('question-id')){
			$("#answer").data('question-id', '0');
			$("#answer").stop(true,true).slideToggle(400);
		} else {
			$("#answer").stop(true,true).slideUp(100).slideDown(100);
			$("#answer").data('question-id', $(this).data('question-id'));
			$("#answer > div").html($(this).data('answer'));
		}
	});
});

function updatePage(url){
	$("#content").html("<img id = 'loading' src = '"+getDomain()+"img/loading.gif' />");
	$.ajax({
	  url: getDomain()+'dashboard/view/'+url,
	  success: function(data) {
		$("#content").html(data);
	  }
	})
}