
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
						$("#bookingCheckin").text($("#BookingStartDate").val());
						$("#bookingCheckout").text($("#BookingEndDate").val());
						$("#guests").text("+"+$("#BookingGuest").val()+" GUEST:");
						$("#subtotal").text("$"+data.data.subtotal).css('color','green');
						$("#reservation_resources_fee").text("$"+data.data.fee).css('color','green');
						$("#finalPrice").text("$"+data.data.total).css('color','green');
						$("input[name ='amount']").val(data.data.total);
					}
					else{
						$("#subtotal").text("The minimum stay restrictions is "+data.data+" days").css('color','red');
					}
				}
			});
		}
	
	}
$('#paypal_checkout').on('click',function(){
	var status = checkLoginStatus();
	$(".fieldError").remove();
	if(status == true ){
		$.ajax({
			type:"POST",
			data:$("#UserBookRoomForm").serialize(),
			url:getDomain()+"bookings/easybook",
			success:function(data){
				if(data.success == true){
					$("input[name ='custom']").val(data.data);
					$('.paypal-form').parent().submit();
				}
				else{
					$.each(data.data,function(field,value){
						$("#UserBookRoomForm input[name$='data[User]["+field+"]']").css('border-color','red');
						$("#UserBookRoomForm input[name$='data[User]["+field+"]']").after("<div style = 'color:red;'class = 'fieldError'>"+value+"</div");
						
					});		
					//alert('Dates not saved!!!!!');
				}
		
			}
		})
	
	}


});
quickbook();
