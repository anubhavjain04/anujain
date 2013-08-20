define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');

	return function(){ 
		var self = this;
		self.memberViewModel = function(parent) {
			var vm = this;
			vm.parent = parent;
			vm.memberId = ko.observable();
			vm.memberData = ko.observable();
			vm.resetModel = function(){
				vm.memberId('undefined');
				vm.memberData('undefined');
			};
			
			vm.findOne = function(){
				var memberData = ajaxutil.findOne("search/member", vm.memberId());
					
			};
			vm.showMemberPage = function(){
				
			};
		};
	};
});