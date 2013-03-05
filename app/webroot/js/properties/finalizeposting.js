$(document).ready(function(){


var clid = $('#CraigslistId').val();
$.getJSON(getDomain()+'craigslists/getimages/'+clid, function(data) {
	//alert(data);

	$('#fileupload').fileupload('add', {files: data.data});
	$(".preview span").addClass('fade in');
	$('.preview span').each(function(index,value){
	
		jsonobject = JSON.parse(data.data[index]);
		$(this).html("<img height = '60' width = '80' src ='"+jsonobject.src+"'>");
	})

});
	/*$("input[type='file']").on('change',function() {
		//alert('test');
		//var files = $(this).files.length;
		//alert($("input[type='file']").files);
		//var inp = $("input[type='file']");
		//alert(this.files.item(0).name);
	for (var i = 0; i < this.files.length; ++i) {
		var name = this.files.item(i).name;
		alert("here is a file name: " + name);
		console.log(this.files.item(i));
		}
		
	});*/

});