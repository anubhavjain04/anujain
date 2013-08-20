define(function(require) {
	return {
		symbolsArray : ["/", "="],
		sitePath : sitePath,
		get : function(url, data, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				data : data,
				success : successCallback,
				error : errorCallback,
				async : true
			});
		},		
		post : function(url, data, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				data : data,
				success : successCallback,
				error : errorCallback,
				async : false
			});
		},
		findAll : function(url, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				success : successCallback,
				error : errorCallback,
				async : false
			});
		},
		findOne : function(url, uuid) {
	        if ($.inArray(url.charAt(url.length - 1), this.symbolsArray) == -1) {
	                url = url + "/";
	        }
	        var jsonData = $.ajax({
	                type : 'GET',
	                url : url + uuid,
	                dataType : "json",
	                async : false
	        }).responseText;
	        return $.parseJSON(jsonData);
		},
		uploadFile : function(resourceUrl, fileFormFieldId, formId, success, error) {
			data = $('#' + formId).serializeObject();
			$.ajaxFileUpload({
				url : resourceUrl,
				secureuri : false,
				fileElementId : fileFormFieldId,
				data : data,
				dataType : 'text',
				success : success,
				error : error
			});
		}
	};
});
