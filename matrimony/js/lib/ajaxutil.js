define(function(require) {
	return {
		symbolsArray : ["/", "="],
		sitePath : sitePath,
		post : function(url, inputData) {
			return $.ajax({
				type : 'POST',
				contentType : 'application/json',
				url : url,
				data : inputData,
				dataType : "json",
				async : false
			});
		},

		postWithCallbacks : function(url, inputData, success, error) {
			$.ajax({
				type : 'POST',
				contentType : 'application/json',
				url : url,
				data : inputData,
				dataType : "json",
				async : false,
				success: success,
				error: error
			});
		},

		add : function(url, inputData) {
			var jsonData = $.ajax({
				type : 'PUT',
				contentType : 'application/json',
				url : url,
				data : inputData,
				dataType : "json",
				async : false
			})
			return jsonData;
		},

		update : function(url, uuid, parentId, inputData) {

		updatedUrl = url + "/" + uuid + "?parentSpaceId=" + parentId;
			var jsonData = $.ajax({
				type : 'PUT',
				contentType : 'application/json',
				url :  updatedUrl,
				data : inputData,
				dataType : "json",
				async : false
			}).responseText;
			return $.parseJSON(jsonData);
		},

		findOne : function(url, uuid) {
			if ($.inArray(url.charAt(url.length - 1), this.symbolsArray) == -1) {
				url = url + "/";
			}
			var jsonData = $.ajax({
				type : 'GET',
				contentType : 'application/json',
				url : url + uuid,
				dataType : "json",
				async : false
			}).responseText;
			return $.parseJSON(jsonData);
		},
		
		findByData : function(url, data, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				//contentType : 'application/json',
				url : this.sitePath + url,
				dataType : "json",
				data : data,
				success : successCallback,
				error : errorCallback,
				async : true
			});
		},

		findAll : function(url, successCallback, errorCallback) {
			$.ajax({
				type : 'POST',
				contentType : 'application/json',
				url : this.sitePath + url,
				dataType : "json",
				success : successCallback,
				error : errorCallback,
				async : true
			});
		}
		/*,
		remove : function(url, uuid, completeCallback) {
			if ($.inArray(url.charAt(url.length - 1), this.symbolsArray) == -1) {
				url = url + "/";
			}

			$.ajax({
				type : 'DELETE',
				contentType : 'application/json',
				url : url + uuid,
				dataType : "json",
				async : true,
				complete : completeCallback
			});
		},
		isCsvFile : function(fileElement) {
				var fileName = fileElement;
				var regEx = /(.csv)$/i;
				if (regEx.test(fileName)) {
					return true;
				}
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
		},
		uploadMultipleFiles : function(resourceUrl, fd, success, error) {
			$.ajax({
				url : resourceUrl,
				type : "POST",
				data : fd,
				processData : false,
				contentType : false,
				dataType : 'text',
				success : success,
				error : error
			});
		}*/
	};
});
