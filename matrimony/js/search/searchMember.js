define(function (require) {
    
	var ko               = require('knockout');
	var ajaxutil		 = require('ajaxutil');

	return function(){ 
		var self = this;
		self.searchMemberViewModel = function(searchMainVM) {
			var vm = this;
			vm.searchMainVM = searchMainVM;
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
					vm.searchMainVM.switchToMemberPage();
				}, function(){					
					vm.memberData(undefined);
					vm.searchMainVM.switchToMemberPage();
				});
				
			};
			vm.showMemberPage = function(memberId){
				vm.findOne(memberId);
			};
			vm.back = function(){
				vm.searchMainVM.searchVM.searchByCriteria();
			};
		};
	};
});