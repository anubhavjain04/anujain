define(function (require) {
    
	var ko               = require('knockout');
	var $                = require('jquery');
	var ajaxutil		 = require('ajaxutil');

	return function(){ 
		var self = this;
		self.memberViewModel = function(mainVM) {
			var vm = this;
			vm.mainVM = mainVM;
			vm.memberData = ko.observable();
			
			vm.resetModel = function(){
				vm.memberData('undefined');
			};
			
			vm.findOne = function(memberId){
				var memberData = ajaxutil.findOne("search/member", memberId);
				if(memberData){
					vm.memberData(memberData);
				}else{
					alert("no member found.");
				}
			};
			vm.showMemberPage = function(memberId){
				vm.findOne(memberId);
			};
			
			vm.getObjectText = function(list, key){
				return vm.mainVM.searchVM.getSelectedObjectText(list, key);
			};
			vm.back = function(){
				vm.mainVM.searchVM.searchByCriteria();
			};
		};
	};
});