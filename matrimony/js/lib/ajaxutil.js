define(function(require) {
	var ko    = require('knockout');
	return {
		symbolsArray : ["/", "="],
		sitePath : sitePath,		
		showLoader : function(){
			$("#ajaxLoader").show();
		},
		hideLoader : function(obj){
			$("#ajaxLoader").hide();
			if(obj.status===200 && obj.state()==='rejected'){
				//console.log("session expired");
				ko.observable(undefined).publishOn("loggedInUser", false);
				jHash.set('home', {});
			}
		},
		post : function(url, inputData) {
			var vm = this;
			return $.ajax({
				type : 'POST',
				url : vm.sitePath + url,
				data : inputData,
				dataType : "json",
				async : false
			});
		},
		syncFind : function(url, data, successCallback, errorCallback) {
			var vm = this;
			vm.showLoader();
			var t = setTimeout(function(){
				$.ajax({
					type : 'POST',
					url : vm.sitePath + url,
					dataType : "json",
					data : data,
					success : successCallback,
					error : errorCallback,
					complete : vm.hideLoader,
					async : false
				});
			}, 50);
		},	
		syncFindAll : function(url, successCallback, errorCallback) {
			this.syncFind(url, undefined, successCallback, errorCallback);
		},
		find : function(url, data, successCallback, errorCallback) {
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
			this.find(url, undefined, successCallback, errorCallback);			
		},
		findOne : function(url, successCallback, errorCallback) {
	        $.ajax({
				type : 'GET',
				url : this.sitePath + url,
				dataType : "json",
				beforeSend : this.showLoader,
				success : successCallback,
				error : errorCallback,
				complete : this.hideLoader,
				async : true
			});
		},
		put : function(url, data, successCallback, errorCallback) {
			this.find(url, data, successCallback, errorCallback);
		}
		/*,
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
		}*/
	};
});
