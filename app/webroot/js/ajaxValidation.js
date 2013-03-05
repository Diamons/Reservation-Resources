var ajaxValidation = (function(){
	
	return {
		doPost: function(settings){
			
			this.settings	= settings;
			
			var _this		= this;

			$.ajax({
				type: "POST",
				url: this.settings.url,
				data: this.settings.element.serialize(),
				success: function(data) {
					
					_this.readResponse(data);
					
				}
			});
		
		},

		readResponse: function(data) {
			
			var data	= JSON.parse(data); // parse JSON to object
			
			$('body').find('.error-message').remove();
			
			if(data.error != 1) {
						
				this.settings.callback(data.message);
				
			} else {
				this.addValidation(data);
			}
			
		},
		
		addValidation: function(data) {
			
			var _this	= this;
			
			if(data.data) {
			
				$.each(data.data, function(model, fields) { 
					
					if(fields) {
						
						$.each(fields, function(field, message) { 
							
							var inputId	= '#' + _this.camelize(model+'_'+field);
							var element	= $('<div>' + message + '</div>')
											.attr({
												'class' : 'error-message'
											})
											.css ({
												display: 'none'
											});
													
							$(inputId).after(element);
							$(element).fadeIn();
							
						});
					}
					
				});
				
			}

		},

		camelize: function(string) {
			
        	var a = string.split('_'), i;
        	s = [];
        
        	for (i=0; i<a.length; i++){
            	s.push(a[i].charAt(0).toUpperCase() + a[i].substring(1));
        	}
        
        	s = s.join('');
        
        	return s;
    
		}
		
	}; 
	
});