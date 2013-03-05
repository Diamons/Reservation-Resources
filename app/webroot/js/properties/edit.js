$(document).ready(function(){
// Load existing files:
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
		
		$('#PropertyEditForm').append("<input type = 'hidden' data-delete ='"+data.result[0].delete_url+"' name = 'data[Image][]' value = '"+data.result[0].name+"'></input>");
			
		});
	$('#fileupload').bind('fileuploaddestroy', function (e, data) {
			//var del = $("input").attr("data-delete",data.url);
			$("[data-delete*='"+data.url+"']").remove();
		});
	$("#PropertyEditForm").formToWizard();
	$("li[id*='step']").click(function(){
		var targetId = $(this).attr('id');
		var currentId = $("li.current").attr('id');
		targetId = targetId.charAt(targetId.length-1);
		currentId = currentId.charAt(currentId.length-1);
		if(currentId < targetId){
			for(i = currentId; i < targetId; i++){
				$("a#step"+i+"Next").click();
			}
		} else if ( currentId > targetId){
			for(i = currentId; i > targetId; i--){
				$("a#step"+i+"Prev").click();
			}
		}
	});
	$("#customAmenity").on("click",function(){
			$("#AmenityAdditionalAmenities").after("<input name='data[Amenity][additional_amenities][]' type='text' value='' />");
		
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