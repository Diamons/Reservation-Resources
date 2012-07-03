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
	
	$("#container").on("click",'.craigslistPostButton',null,function(){
		
		pid = $(this).data('pid');
	
		updatePage('postcraigslist',pid);
	
	});
	$("#container").on("click",'#postNowButton',null,function(){
		var confirmpost = confirm("Please note that it may take up to two minutes to finish the submission process. Please by patient while our servers communicate with craigslist");
		if(confirmpost){
		$.ajax({
			url:getDomain()+"properties/post",
			data:"area="+$("#cl_locationselect").val()+"&step=1"+"&title="+$("#PropertyTitle").val()+"&description="+$("#PropertyDescription").val(),
			type:"POST",
			success:function(html){
				if(html.success == true){
					window.open(html.data,'_blank');

				
				}
				else{
					alert('Something went wrong trying to post to craigslist, however you may finish the submission process');
					window.open(html.data,'_newtab');
				}
			}
		
		});
		}
	
	
	});
	

	$(document).on("click",'.submitQuickMessage',null,function(event){
		event.preventDefault();
		$.ajax({
			type:"POST",
			data:$("#BookingSendmessageForm").serialize(),
			url: getDomain()+"bookings/comment/",
			success:function(data){
				alert(data.success);
				Shadowbox.close();
			}
			
		});
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
	
		if(calendarMonth == startMonth || calendarMonth == endMonth){
			
			$(".pending").each(function(){
				currentDate = new Date(calendarYear,calendarMonth-1,parseInt($(this).find("span").text()));
				//alert(currentDate);
				if(currentDate >= start && currentDate <= end ){
					$(this).addClass("pending_hover");
				}
			});
		}

	});
	$(document).on("click","#blackbook",function(event){
		openLightBox(getDomain()+"bookings/blackbook/"+$(this).data('pid'), "Mark dates as available or unavailable", 700,500);
	
	});
	$(document).on("click",".availability",function(event){
		$("#BookingStatus").val($(this).data('status'));
		//alert($(this).data('status'));
		$.ajax({
			url:getDomain()+"bookings/blackbook",
			type:"POST",
			data:$("#BookingBlackbookForm").serialize(),
			success:function(data){
				if(data.success == true){
					Shadowbox.close();
					alert('Calendar Successfully Updated');
				}
				else{
					Shadowbox.close();
					alert('Sorry we could not update your property calendar at this time');
				}
			}
		
		})
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
$(document).on("click",'a.btn.btn-large.btn-danger',function(){
		var topics = {};
		//var counter = 0;
		$(":checkbox").each(function(index){
			if($(this).is(":checked")){
				
				id =  $(this).attr('id');
				topics[id] =  $(this).data('message');
				$(this).parent().parent().addClass('deleted');
			}
			
		});
	 $.ajax({
			url: getDomain()+"topics/delete",
			data: topics,
			type:"POST",
			success: function(data){
				if(data.success == true){
					$('.deleted').slideUp(400,'linear');
				}
				else{
					alert("We could not delete your messages at this time please contact support");
				}
			}
	 
		});
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
$(document).on("click", ".sendmessage", function(event){
	var bid = $(this).data('bid');
	var status = $(this).data('status');
	$.ajax({
		
		type:"POST",
		url:getDomain()+"bookings/hostconfirm",
		data:"bid="+$(this).data('bid')+"&status="+$(this).data('status'),
		success:function(data){
		
			if(data.success == true){
				leaveMessage(bid,status);
				
			
			}
			else{
				alert("Sorry and error has occured our team is currently working on a fix. In the meantime you can contact tech support so they can update your booking manually");
			}
		}
		
	});
	
});
