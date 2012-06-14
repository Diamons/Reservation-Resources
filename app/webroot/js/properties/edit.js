$(document).ready(function(){
// Load existing files:
	if($("#PropertyRentOnce").is(":checked")){
		prompt("A");
	}
    $('#fileupload').each(function () {
        var that = this;
	
        $.getJSON(this.action, function (result) {
            if (result && result.length) {
                 $(that).fileupload('option', 'done')
                    .call(that, null, {result: result});
                }
            });
        });
	$('#fileupload').bind('fileuploaddone', function (e, data) {//this is the allback function after the image is successfully uploaded we dynamically add hidden input elements to form upload so we can water mark and move the images to correct directory
		
		$('#PropertyEditForm').append("<input type = 'hidden' data-delete ='"+data.result[0].delete_url+"' name = 'data[Image]["+data.result[0].name+"]' value = '"+data.result[0].name+"'></input>");
			
		});
	$('#fileupload').bind('fileuploaddestroy', function (e, data) {
			//var del = $("input").attr("data-delete",data.url);
			$("[data-delete*='"+data.url+"']").remove();
		});
	$("#PropertyEditForm").formToWizard();
	
	$("#customAmenity").on("click",function(){
		
		var name = prompt('What is the amenity name?');
		if(name != null){
			name = name.charAt(0).toUpperCase() + name.slice(1);
				//alert(name);
			$("#AmenityAdditionalAmenities").after("<div class = 'checkbox'><div class='checker' id='uniform-AmenityAdditionalAmenities"+name+"'><span class = 'checked' ><input type='checkbox' checked = 'checked' id='AmenityAdditionalAmenities"+name+"' value='"+name+"' name='data[Amenity][additional_amenities][]' style='opacity: 0;'></span></div><label for='AmenityAdditionalAmenities"+name+"'>"+name+"</label></div>");
		
		}
		
	});
	
	$("#customFee").on("click",function(){
		var feeName = prompt("What is the fee name?");
		var feePrice = prompt("What is the price of the fee?");
		var count = $('fieldset#additionalFees').children('div').length;
		//alert(count);
		$("#customFee").before("<div class = 'input text'> <label style='display: none;' for='Fee"+count+"FeeName'>Fee Name</label><input name='data[Fee]["+count+"][fee_name]' maxlength='255' value='"+feeName+"' id='Fee"+count+"FeeName' type='text'></div>");
		$("#customFee").before("<div class = 'input number'> <label for='Fee"+count+"FeePrice'>Fee Price</label><input name='data[Fee]["+count+"][fee_price]' value='"+feePrice+"' step='any' maxlength='11' id='Fee"+count+"FeePrice' type='number'></div>")
	
	});
});