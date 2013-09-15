define(function(require) {
	return {
		symbolsArray : ["/", "="],
		sitePath : sitePath,
		showLoader : function(){
			$("#ajaxLoader").show();
		},
		hideLoader : function(){
			$("#ajaxLoader").hide();
		},
		get : function(url, data, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				data : data,
				beforeSend : this.showLoader,
				success : successCallback,
				error : errorCallback,
				complete : this.hideLoader,
				async : true
			});
		},		
		post : function(url, data, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				data : data,
				beforeSend : this.showLoader,
				success : successCallback,
				error : errorCallback,
				complete : this.hideLoader,
				async : true
			});
		},
		findAll : function(url, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				url : this.sitePath + url,
				dataType : "json",
				beforeSend : this.showLoader,
				success : successCallback,
				error : errorCallback,
				complete : this.hideLoader,
				async : false
			});
		},
		findOne : function(url, uuid) {
	        if ($.inArray(url.charAt(url.length - 1), this.symbolsArray) == -1) {
	                url = url + "/";
	        }
	        var jsonData = $.ajax({
	                type : 'GET',
	                url : this.sitePath + url + "id/"+uuid,
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
