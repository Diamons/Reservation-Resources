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
	$("#container").on("click",'.manageBookingsButton',null,function(){
		
		pid = $(this).data('pid')
		updatePage('managebookings',pid);
	});
	
	$("#content").on("mouseover", ".person", function(event){
		userId = $(this).data('id');
		start = new Date($(this).data('startdate'));
		end = new Date($(this).data('enddate'));
		startDay = start.getDate()+1; //the day of the start date
		endDay = end.getDate()+1;//the end day from 1-31
		startMonth = start.getMonth()+1;
		endMonth = end.getMonth()+1;//end month
		calendarMonth = $('.calendar').data('month'); 
		calendarYear = $('.calendar').data('year');
		end = new Date(end.getFullYear(),end.getMonth(),endDay);
		//alert(calendarMonth);
		//alert(startDay);
		//alert(endDay);
		//alert(startMonth);
		//alert(endMonth);
		//alert(start);
		//alert(end);
		if(calendarMonth == startMonth || calendarMonth == endMonth){
			
			$(".pending").each(function(){
				currentDate = new Date(calendarYear,calendarMonth-1,parseInt($(this).find("span").text()));
				//alert(currentDate);
				if(currentDate >= start && currentDate <= end ){
					$(this).addClass("pending_hover");
				}
			});
		}
		/*$("#calendar .dates div.pending").each(function(){
			if($(this).data('user-id') == userId){
				$(this).addClass("pending_hover");
				}
				
		});*/
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

function updatePage(url,data){
	$("#content").html("<img id = 'loading' src = '"+getDomain()+"img/loading.gif' />");
	if(data != null){
	$.ajax({
	  url: getDomain()+'dashboard/view/'+url+"/"+data,
	  success: function(data) {
		$("#content").html(data);
	  }
	});
	}
	else{
	$.ajax({
	  url: getDomain()+'dashboard/view/'+url,
	  success: function(data) {
		$("#content").html(data);
	  }
	});
	}
}