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
				var memberData = ajaxutil.findOne("search/member/id/"+memberId, function(memberData){
					if(memberData){
						vm.memberData(memberData);
					}else{
						vm.memberData(undefined);
					}	
				}, function(){
					vm.memberData(undefined);
				});
				
			};
			vm.showMemberPage = function(memberId){
				vm.findOne(memberId);
			};
			vm.back = function(){
				vm.mainVM.searchVM.searchByCriteria();
			};
		};
	};
});