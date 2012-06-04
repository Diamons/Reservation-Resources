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
});